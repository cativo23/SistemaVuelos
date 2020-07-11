<?php

namespace App\Http\Controllers;

use App\Airline;
use App\Airport;
use App\Flight;
use App\Helper\VoyargeHelper;
use App\Itinerary;
use Auth;
use Carbon\Carbon;
use DateTime;
use Gate;
use GuzzleHttp\Client;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class ItineraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $itineraries = Itinerary::all();

        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('itinerary.index', compact('itineraries', 'sidebar', 'header', 'footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $user = Auth::user();
        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('itinerary.create', compact('sidebar', 'header', 'footer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'origin2'=>'required|exists:airports,id',
            'destination2'=>'required|exists:airports,id',
            'vuelo'=>['required', 'array'],
            'departure_date'=>['required','array'],
            'arrival_date'=>['required','array'],
            'departure_date.*.*'=>['required', 'date', 'after_or_equal:today'],
            'arrival_date.*.*'=>['required', 'date', 'after_or_equal:today', 'after_or_equal:departure_date'],
            'origin'=>['required','array'],
            'destination'=>['required','array'],
            'cost'=>['required','array'],
            'price'=>['required','array'],
            'flight_miles'=>['required','array'],
            'airline_id'=>['required','array'],
            'origin.*.*'=>['required','exists:airports,id'],
            'destination.*.*'=>['required','exists:airports,id'],
            'cost.*.*'=>['required', 'num'],
            'price.*.*'=>['required', 'num'],
            'flight_miles.*.*'=>['required', 'num'],
            'airline_id.*'=>['required', 'exists:airlines,id']
        ]);

        $total_price = 0.0;
        foreach ($request->input('price') as $price){
            $to_add =number_format(str_replace(',', '', $price), 2, '.', '');
            $total_price+= $to_add;
        }

        $destinations = $request->input('destination');
        $origins = $request->input('origin');
        $departure_dates = $request->input('departure_date');
        $arrival_dates = $request->input('arrival_date');
        $type = $request->input('type');
        $last_destination = end($destinations);
        $first_origin = reset($origins);
        $origin2 = Airport::findOrFail($request->input('origin2'));
        $destination2 = Airport::findOrFail($request->input('destination2'));

        if ($type == 'return'){
            if ($last_destination != $first_origin){
                dd('error');
            }else if ($last_destination!=$origin2->id){
                dd($last_destination);
            }
        }else{
            if ($last_destination == $first_origin){
                dd('error');
            }else if ($last_destination!=$destination2->id){
                dd($last_destination);
            }
        }

        $last_arrival_date = end($arrival_dates);
        $first_departure_date = reset($departure_dates);

        $itinerary = new Itinerary([
            'total_price'=>$total_price,
            'destination'=>$destination2->country,
            'origin'=>$origin2->country,
            'departure_date'=>$first_departure_date,
            'arrival_date'=>$last_arrival_date,
            'departure_time'=>null,
            'arrival_time'=>null,
            'num_connections'=>count($request->input('vuelo')),
            'total_duration'=>0,
            'airline_id'=>$request->input('airline_id')[0],
            'type'=>$request->input('type')
        ]);

       //$itinerary->save();

        for($i=0;count($request->input('vuelo'))>$i; $i++){
            $flight_origin = Airport::findOrFail($request->input('origin')[$i]);
            $flight_destination = Airport::findOrFail($request->input('destination')[$i]);
            $airline = Airline::findOrFail($request->input('airline_id')[$i]);
            $last_code = 1;
            $last_vuelo = Flight::latest()->first();
            if ($last_vuelo){
                $last_code = $last_vuelo->id;
            }

            $client = new Client();

            $country_origin = json_decode($client->request('GET', 'http://127.0.0.1:8001/api/countries?q='.$flight_origin->country)->getBody(), 'true')[0];
            $country_destination = json_decode($client->request('GET', 'http://127.0.0.1:8001/api/countries?q='.$flight_destination->country)->getBody(), 'true')[0];

            $city_destination = json_decode($client->request('GET', 'http://127.0.0.1:8001/api/cities?q='.$flight_destination->city.'&country='.$country_destination['country_code'])->getBody(), 'true')[0];
            $city_origin = json_decode($client->request('GET', 'http://127.0.0.1:8001/api/cities?q='.$flight_origin->city.'&country='.$country_origin['country_code'])->getBody(), 'true')[0];

            $latitude_origin = $city_origin['latitude'];
            $latitude_destination = $city_destination['latitude'];
            $longitude_origin = $city_origin['longitude'];
            $longitude_destination = $city_destination['longitude'];

            $destance = $this->distance($latitude_origin, $longitude_origin, $latitude_destination, $longitude_destination, 'M');

            $vuelo = new Flight([
                'arrival_date'=>$request->input('arrival_date')[$i],
                'departure_date'=>$request->input('departure_date')[$i],
                'departure_time'=>null,
                'arrival_time'=>null,
                'origin'=>$flight_origin->name,
                'destination'=>$flight_destination->name,
                'code'=>$airline->code.$last_code,
                'cost'=>$request->input('cost')[$i],
                'price'=>$request->input('price')[$i],
                'flight_miles'=>$request->input('flight_miles')[$i],
                'airline_id'=>$airline->id,
                'status'=>'unready',
                'duration'=>2,
                'distance_miles'=>intval($destance),
                'airplane_id'=>$airline->airplanes[0]->id,
                'itinerary_id'=>1,
                'boarding_terminal_id'=>$flight_origin->id,
                'landing_terminal_id'=>$flight_destination->id
            ]);
            $vuelo->save();
        }
        return redirect()->route('itineraries.index')->with('datos', 'Itinerario Creado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Itinerary  $itinerary
     * @return \Illuminate\Http\Response
     */
    public function show(Itinerary $itinerary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Itinerary  $itinerary
     * @return \Illuminate\Http\Response
     */
    public function edit(Itinerary $itinerary)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Itinerary  $itinerary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Itinerary $itinerary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Itinerary  $itinerary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Itinerary $itinerary)
    {
        //
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     * @return Response|void
     */
    public function mass(Request $request)
    {
        if (!Gate::allows('manage-airline')) {
            return abort(401);
        }
        Itinerary::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }

    function distance($lat1, $lon1, $lat2, $lon2, $unit) {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
            return 0;
        }
        else {
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $unit = strtoupper($unit);

            if ($unit == "K") {
                return ($miles * 1.609344);
            } else if ($unit == "N") {
                return ($miles * 0.8684);
            } else {
                return $miles;
            }
        }
    }
}
