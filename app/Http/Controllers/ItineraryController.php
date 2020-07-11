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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'origin2'=>'required|exists:airports,id',
            'destination2'=>'required|exists:airports,id',
            'vuelo'=>['required', 'array'],
            'departure_date'=>['required','array'],
            'arrival_date'=>['required','array'],
            'departure_time'=>['required','array'],
            'arrival_time'=>['required','array'],
            'departure_date.*.*'=>['required', 'date', 'after_or_equal:today'],
            'arrival_date.*.*'=>['required', 'date', 'after_or_equal:today', 'after_or_equal:departure_date'],
            'departure_time.*.*'=>['required','regex:/([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?/'],
            'arrival_time.*.*'=>['required','regex:/([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?/'],
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
        $departure_times= $request->input('departure_time');
        $arrival_times = $request->input('arrival_time');
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
        $last_arrival_time = end($arrival_times);
        $first_departure_date = reset($departure_dates);
        $first_departure_time = reset($departure_times);

        $arrival_dt = new DateTime( $last_arrival_date.' '.$last_arrival_time);
        $departure_dt = new DateTime($first_departure_date.' '.$first_departure_time);
        $diff= $arrival_dt->getTimestamp() - $departure_dt->getTimestamp();
        $duration = $diff / ( 60 * 60 );

        $itinerary = new Itinerary([
            'total_price'=>$total_price,
            'destination'=>$destination2->country,
            'origin'=>$origin2->country,
            'departure_date'=>$first_departure_date,
            'arrival_date'=>$last_arrival_date,
            'departure_time'=>$first_departure_time,
            'arrival_time'=>$last_arrival_time,
            'num_connections'=>count($request->input('vuelo')),
            'duration'=>$duration,
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

            $client = new GuzzleHttp\Client();

            $res_origin = $client->request('GET', 'http://127.0.0.1:8001/api/countries?q='.$flight_origin->country);

            dd($res_origin);
            $res_destination = $client->request('GET', 'http://127.0.0.1:8001/api/countries?q='.$flight_destination->country);



            $flight_country =


            $client1 = new GuzzleHttp\Client();
            $res = $client1->request('GET', 'http://127.0.0.1:8001/api/cities?q='.$flight_origin->city.'San%20Salvador&country=');

            $vuelo = new Flight([
                'arrival_date'=>$request->input('arrival_date')[$i],
                'departure_date'=>$request->input('departure_date')[$i],
                'departure_time'=>$request->input('departure_time')[$i],
                'arrival_time'=>$request->input('arrival_time')[$i],
                'origin'=>$flight_origin->name,
                'destination'=>$flight_destination->name,
                'code'=>$airline->code.$last_code,
                'cost'=>$request->input('cost')[$i],
                'price'=>$request->input('price')[$i],
                'flight_miles'=>$request->input('flight_miles')[$i],
                'airline_id'=>$airline->id,
                'status'=>'unready',
                ''
            ]);

            dd($vuelo);

        }




        dd($request);

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
