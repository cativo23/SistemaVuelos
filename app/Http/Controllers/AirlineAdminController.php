<?php

namespace App\Http\Controllers;

use App\Airline;
use App\Airplane;
use App\Airport;
use App\Flight;
use App\Helper\VoyargeHelper;
use App\Itinerary;
use App\Payment;
use App\Seat;
use Auth;
use Gate;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AirlineAdminController extends Controller
{
    public function airplanes(Airline $airline)
    {
        if (!Gate::allows('manage-airline-' . $airline->id)) {
            abort(401);
        }

        $airplanes = Airplane::all();

        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('admin-airline.airplanes', compact('airplanes', 'sidebar', 'header', 'footer', 'airline'));
    }

    public function airplanes_create(Airline $airline)
    {
        if (!Gate::allows('manage-airline-' . $airline->id)) {
            abort(401);
        }

        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('admin-airline.airplanes_create', compact('airline', 'sidebar', 'header', 'footer'));

    }

    public function airplanes_store(Airline $airline, Request $request)
    {
        if (!Gate::allows('manage-airline-' . $airline->id)) {
            abort(401);
        }

        $request->validate([
            'modelo' => 'required|alpha_num|max:150',
            'tipo' => ['required', 'max:150', Rule::in(['Carga', 'Comercial', 'Militar'])],
            'fabricante' => 'required|alpha_num|max:191',
            'economica' => 'required|integer|min:0',
            'ejecutiva' => 'required|integer|min:0',
            'primera' => 'required|integer|min:0'
        ]);

        $airplane = new Airplane;
        $airplane->model = $request->modelo;
        $airplane->type = $request->tipo;
        //La capacidad total del avión es la suma de las 3 clases
        $airplane->seat_capacity = $request->economica + $request->ejecutiva + $request->primera;
        $airplane->manufacturer = $request->fabricante;
        $airplane->airline_id = $airline->id;
        $airplane->save();


        for ($i = 0; $i < $request->economica; $i++) {
            $asiento = new Seat;
            $id = $i + 1;
            $asiento->code = strtoupper(substr($airplane->model, 0, 3)) . ($airplane->id) . '-' . 'ECO' . $id;
            $asiento->class = 'Economica';
            $asiento->status = True;
            $asiento->airplane_id = $airplane->id;
            $asiento->save();
        }


        for ($i = 0; $i < $request->ejecutiva; $i++) {
            $asiento = new Seat;
            $id = $i + 1;
            $asiento->code = strtoupper(substr($airplane->model, 0, 3)) . ($airplane->id) . '-' . 'EXE' . $id;
            $asiento->class = 'Ejecutiva';
            $asiento->status = True;
            $asiento->airplane_id = $airplane->id;
            $asiento->save();
        }


        for ($i = 0; $i < $request->primera; $i++) {
            $asiento = new Seat;
            $id = $i + 1;
            $asiento->code = strtoupper(substr($airplane->model, 0, 3)) . ($airplane->id) . '-' . 'FIR' . $id;
            $asiento->class = 'Primera';
            $asiento->status = True;
            $asiento->airplane_id = $airplane->id;
            $asiento->save();
        }

        return redirect()->route('admin-airline.airplanes_index', $airline)->with('datos', '¡Avión' . ' ' . '"' . $airplane->model . ' '
            . $airplane->type . '"' . ' guardado correctamente!');

    }

    public function airplanes_edit(Airline $airline, Airplane $airplane)
    {
        if (!Gate::allows('manage-airline-' . $airline->id)) {
            abort(401);
        }

        $economicos = count(Seat::where("airplane_id", "=", $airplane->id)->where("class", "=", "Economica")->get());
        $ejecutivos = count(Seat::where("airplane_id", "=", $airplane->id)->where("class", "=", "Ejecutiva")->get());
        $primera = count(Seat::where("airplane_id", "=", $airplane->id)->where("class", "=", "Primera")->get());

        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('admin-airline.airplanes_edit', compact('airplane', 'airline', 'economicos', 'ejecutivos', 'primera', 'sidebar', 'header', 'footer', 'airline'));
    }

    public function airplanes_update(Airline $airline, Request $request)
    {
        if (!Gate::allows('manage-airline-' . $airline->id)) {
            abort(401);
        }

        $request->validate([
            'modelo' => 'required|string|max:150',
            'tipo' => 'required|max:150',
            'fabricante' => 'required|string|max:255',
            'economica' => 'integer|min:0',
            'ejecutiva' => 'integer|min:0',
            'primera' => 'integer|min:0'
        ]);

        $airplane = Airplane::findOrFail($request->input('id'));

        //Obteniendo cantidades de asientos
        $economicos = count(Seat::where("airplane_id", "=", $airplane->id)->where("class", "=", "Economica")->get());
        $ejecutivos = count(Seat::where("airplane_id", "=", $airplane->id)->where("class", "=", "Ejecutiva")->get());
        $primera = count(Seat::where("airplane_id", "=", $airplane->id)->where("class", "=", "Primera")->get());

        //Comprobando si exite un cambio en el número de asientos de actual y el nuevo valor
        //dd($economicos, $request->economica);
        if ($economicos != $request->economica) {
            //dd('primer if', $economicos,  $request->economica);
            if ($economicos < $request->economica) {
                //dd('2do if', $economicos,  $request->economica);

                //Nuevo valor es mayor
                //Hay que agregar asientos
                for ($i = 0; $i < ($request->economica - $economicos); $i++) {
                    //dd('for ite 0');
                    $asiento = new Seat;
                    $id = $economicos + $i + 1;
                    $asiento->code = strtoupper(substr($airplane->model, 0, 3)) . ($airplane->id) . '-' . 'ECO' . $id;
                    $asiento->class = 'Economica';
                    $asiento->status = True; // True = Disponible
                    $asiento->airplane_id = $airplane->id;
                    $asiento->save();
                }

            } else {
                //Nuevo valor es menor
                //Hay que quitar asientos
                for ($i = 0; $i < ($economicos - $request->economica); $i++) {
                    //dd('for ite 0');
                    $asiento = Seat::where("airplane_id", "=", $airplane->id)->where("class", "=", "Economica")->get()->last();
                    //dd($asiento);
                    $asiento->delete();
                }

            }
        }

        if ($ejecutivos != $request->ejecutiva) {
            //dd('primer if', $ejecutivos,  $request->ejecutiva);
            if ($ejecutivos < $request->ejecutiva) {
                //dd('2do if', $ejecutivos,  $request->ejecutiva);

                //Nuevo valor es mayor
                //Hay que agregar asientos
                for ($i = 0; $i < ($request->ejecutiva - $ejecutivos); $i++) {
                    //dd('for ite 0');
                    $asiento = new Seat;
                    $id = $ejecutivos + $i + 1;
                    $asiento->code = strtoupper(substr($airplane->model, 0, 3)) . ($airplane->id) . '-' . 'EXE' . $id;
                    $asiento->class = 'Ejecutiva';
                    $asiento->status = True; // True = Disponible
                    $asiento->airplane_id = $airplane->id;
                    $asiento->save();
                }

            } else {
                //Nuevo valor es menor
                //Hay que quitar asientos
                for ($i = 0; $i < ($ejecutivos - $request->ejecutiva); $i++) {
                    //dd('for ite 0');
                    $asiento = Seat::where("airplane_id", "=", $airplane->id)->where("class", "=", "Ejecutiva")->get()->last();
                    //dd($asiento);
                    $asiento->delete();
                }

            }
        }

        if ($primera != $request->primera) {
            //dd('primer if', $ejecutivos,  $request->ejecutiva);
            if ($primera < $request->primera) {
                //dd('2do if', $ejecutivos,  $request->ejecutiva);

                //Nuevo valor es mayor
                //Hay que agregar asientos
                for ($i = 0; $i < ($request->primera - $primera); $i++) {
                    //dd('for ite 0');
                    $asiento = new Seat;
                    $id = $primera + $i + 1;
                    $asiento->code = strtoupper(substr($airplane->model, 0, 3)) . ($airplane->id) . '-' . 'FIR' . $id;
                    $asiento->class = 'Primera';
                    $asiento->status = True; // True = Disponible
                    $asiento->airplane_id = $airplane->id;
                    $asiento->save();
                }

            } else {
                //Nuevo valor es menor
                //Hay que quitar asientos
                for ($i = 0; $i < ($primera - $request->primera); $i++) {
                    //dd('for ite 0');
                    $asiento = Seat::where("airplane_id", "=", $airplane->id)->where("class", "=", "Primera")->orderBy("id", "asc")->get()->last();
                    //dd($asiento);
                    $asiento->delete();
                }

            }
        }


        $airplane->model = $request->modelo;
        $airplane->type = $request->tipo;
        $airplane->seat_capacity = $request->economica + $request->ejecutiva + $request->primera;
        $airplane->manufacturer = $request->fabricante;
        $airplane->save();

        return redirect()->route('admin-airline.airplanes_index', $airline)->with('datos', '¡Avión' . ' ' . '"' . $airplane->model . ' '
            . $airplane->type . '"' . ' editado correctamente!');
    }

    public function airplanes_destroy(Airline $airline, Airplane $airplane)
    {
        if (!Gate::allows('manage-airline-' . $airline->id)) {
            abort(401);
        }

        $asientos = Seat::where("airplane_id", "=", $airplane->id)->get();
        //dd($asientos);
        foreach ($asientos as $asiento) {
            $asiento->delete();
        }
        $avion = $airplane->model . ' ' . $airplane->type;
        $airplane->delete();
        return redirect()->route('admin-airline.airplanes_index', $airline)->with('datos', '¡Avión' . ' ' . '"' . $avion . '"' . ' eliminado correctamente!');

    }

    public function airplanes_mass_destroy(Airline $airline)
    {
        if (!Gate::allows('manage-airline-' . $airline->id)) {
            abort(401);
        }

        Airplane::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }

    public function edit_airline(Airline $airline)
    {
        if (!Gate::allows('manage-airline-' . $airline->id)) {
            abort(401);
        }

        $user = Auth::user();
        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('admin-airline.edit', compact('airline', 'sidebar', 'header', 'footer'));
    }

    public function update_airline(Airline $airline, Request $request)
    {
        if (!Gate::allows('manage-airline-' . $airline->id)) {
            abort(401);
        }
        $request->validate([
            'codigo' => ['required', 'alpha_num', 'max:2', 'regex:/^[A-Z0-9]{2}$/', Rule::unique('airlines', 'code')->ignore($airline->id)],
            'nombrecorto' => 'required|alpha|max:100',
            'nombreoficial' => 'required|string|max:191',
            'email' => ['required', 'email:rfc,dns', Rule::unique('airlines', 'email')->ignore($airline->id)],
            'paisorigen' => 'required|string|max:191',
            'representante' => 'required|string|max:191',
            'paginaweb' => 'required|regex:/^[a-zA-Z0-9].{3,}$/|string|max:191',
            'facebook' => 'required|string|max:150|regex:/^[a-zA-Z0-9].{3,}$/',
            'instagram' => 'required|alpha_num|max:150|regex:/^[a-zA-Z0-9].{3,}$/',
            'twitter' => 'required|alpha_num|max:150|regex:/^[a-zA-Z0-9].{3,}$/',
            'whatsapp' => 'required|string|max:16'
        ]);
        $airline->code = $request->codigo;
        $airline->short_name = $request->nombrecorto;
        $airline->official_name = $request->nombreoficial;
        $airline->email = $request->email;
        $airline->origin_country = $request->paisorigen;
        $airline->representative = $request->representante;
        $airline->web_page = 'https://' . $request->paginaweb;
        $airline->facebook = $request->facebook;
        $airline->instagram = $request->instagram;
        $airline->twitter = $request->twitter;
        $airline->whatsapp = $request->whatsapp;
        $airline->save();

        return redirect()->route('dashboard')->with('datos', '¡La aerolinea se editó correctamente!');
    }

    public function itineraries_index(Airline $airline)
    {
        if (!Gate::allows('manage-airline-' . $airline->id)) {
            abort(401);
        }

        $itineraries = $airline->itineraries;

        $user = Auth::user();
        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('admin-airline.itinieraries', compact('itineraries', 'airline', 'sidebar', 'header', 'footer'));
    }

    public function itineraries_create(Airline $airline)
    {
        if (!Gate::allows('manage-airline-' . $airline->id)) {
            abort(401);
        }

        $user = Auth::user();
        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('admin-airline.itinieraries_create', compact('airline', 'sidebar', 'header', 'footer'));
    }

    public function itineraries_store(Airline $airline, Request $request)
    {
        if (!Gate::allows('manage-airline-' . $airline->id)) {
            abort(401);
        }
        $request->validate([
            'origin2' => 'required|exists:airports,id',
            'destination2' => 'required|exists:airports,id',
            'vuelo' => ['required', 'array'],
            'departure_date' => ['required', 'array'],
            'arrival_date' => ['required', 'array'],
            'departure_date.*.*' => ['required', 'date', 'after_or_equal:today'],
            'arrival_date.*.*' => ['required', 'date', 'after_or_equal:today', 'after_or_equal:departure_date'],
            'origin' => ['required', 'array'],
            'destination' => ['required', 'array'],
            'cost' => ['required', 'array'],
            'price' => ['required', 'array'],
            'flight_miles' => ['required', 'array'],
            'origin.*.*' => ['required', 'exists:airports,id'],
            'destination.*.*' => ['required', 'exists:airports,id'],
            'cost.*.*' => ['required', 'num'],
            'price.*.*' => ['required', 'num'],
            'flight_miles.*.*' => ['required', 'num'],
        ]);

        $total_price = 0.0;
        foreach ($request->input('price') as $price) {
            $to_add = number_format(str_replace(',', '', $price), 2, '.', '');
            $total_price += $to_add;
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

        if ($type == 'return') {
            if ($last_destination != $first_origin) {
                $user = Auth::user();
                list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

                return view('admin-airline.itinieraries_create', compact('airline', 'sidebar', 'header', 'footer'));
            } else if ($last_destination != $origin2->id) {
                $user = Auth::user();
                list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

                return view('admin-airline.itinieraries_create', compact('airline', 'sidebar', 'header', 'footer'));
            }
        } else {
            if ($last_destination == $first_origin) {
                $user = Auth::user();
                list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

                return view('admin-airline.itinieraries_create', compact('airline', 'sidebar', 'header', 'footer'));
            } else if ($last_destination != $destination2->id) {
                $user = Auth::user();
                list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

                return view('admin-airline.itinieraries_create', compact('airline', 'sidebar', 'header', 'footer'));
            }
        }

        $last_arrival_date = end($arrival_dates);
        $first_departure_date = reset($departure_dates);

        $itinerary = new Itinerary([
            'total_price' => $total_price,
            'destination' => $destination2->country,
            'origin' => $origin2->country,
            'departure_date' => $first_departure_date,
            'arrival_date' => $last_arrival_date,
            'departure_time' => null,
            'arrival_time' => null,
            'num_connections' => count($request->input('vuelo')),
            'total_duration' => 0,
            'airline_id' => $airline->id,
            'type' => $request->input('type')
        ]);

        $itinerary->save();

        for ($i = 0; count($request->input('vuelo')) > $i; $i++) {
            $flight_origin = Airport::findOrFail($request->input('origin')[$i]);
            $flight_destination = Airport::findOrFail($request->input('destination')[$i]);
            $last_code = 1;
            $last_vuelo = Flight::latest()->first();
            if ($last_vuelo) {
                $last_code = $last_vuelo->id;
            }

            $client = new Client();

            $country_origin = json_decode($client->request('GET', 'https://be77bddc8b14.ngrok.io/api/countries?q=' . $flight_origin->country)->getBody(), 'true')[0];
            $country_destination = json_decode($client->request('GET', 'https://be77bddc8b14.ngrok.io/api/countries?q=' . $flight_destination->country)->getBody(), 'true')[0];

            $city_destination = json_decode($client->request('GET', 'https://be77bddc8b14.ngrok.io/api/cities?q=' . $flight_destination->city . '&country=' . $country_destination['country_code'])->getBody(), 'true')[0];
            $city_origin = json_decode($client->request('GET', 'https://be77bddc8b14.ngrok.io/api/cities?q=' . $flight_origin->city . '&country=' . $country_origin['country_code'])->getBody(), 'true')[0];

            $latitude_origin = $city_origin['latitude'];
            $latitude_destination = $city_destination['latitude'];
            $longitude_origin = $city_origin['longitude'];
            $longitude_destination = $city_destination['longitude'];

            $distance = $this->distance($latitude_origin, $longitude_origin, $latitude_destination, $longitude_destination, 'M');

            $vuelo = new Flight([
                'arrival_date' => $request->input('arrival_date')[$i],
                'departure_date' => $request->input('departure_date')[$i],
                'departure_time' => null,
                'arrival_time' => null,
                'origin' => $city_origin['asciiname'],
                'destination' => $city_destination['asciiname'],
                'code' => $airline->code . $last_code,
                'cost' => str_replace(',', '', $request->input('cost')[$i]),
                'price' => str_replace(',', '', $request->input('price')[$i]),
                'flight_miles' => str_replace(',', '', $request->input('flight_miles')[$i]),
                'airline_id' => $airline->id,
                'status' => 'unready',
                'duration' => 2,
                'distance_miles' => intval($distance),
                'airplane_id' => $airline->airplanes[0]->id,
                'itinerary_id' => $itinerary->id,
                'boarding_terminal_id' => $flight_origin->gateways[0]->id,
                'landing_terminal_id' => $flight_destination->gateways[0]->id,
                'type' => $request->input('type_flight')[$i],
            ]);
            $vuelo->save();
        }
        return redirect()->route('admin.airline.itineraries', $airline)->with('datos', 'Itinerario Creado Correctamente');
    }

    public function form_report(Airline $airline){
        if (!Gate::allows('manage-airline-' . $airline->id)) {
            abort(401);
        }

        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('admin-airline.report', compact( 'sidebar', 'header', 'footer', 'airline'));
    }

    public function report(Airline $airline, Request $request){
        if (!Gate::allows('manage-airline-' . $airline->id)) {
            abort(401);
        }

        $request->validate([
            'from'=>'required|date:Y-m-d',
            'to'=>'required|date:Y-m-d'
        ]);

        $from = $request->input('from');
        $to = $request->input('to');

        $datos = Payment::selectRaw('sum(payments.total_price) as total_paid, sum(itineraries.total_price) as total_itineraries')->join('reservations', 'reservation_id', '=', 'reservations.id')
                        ->join('itineraries', 'reservations.itinerary_id', '=', 'itineraries.id')
                        ->where('itineraries.airline_id', '=', $airline->id)
                        ->whereBetween('payments.created_at',  [$from, $to])->get()[0];

        $pagos = Payment::whereBetween('payments.created_at',  [$from, $to])->get();

        $cost_tot = 0;

        foreach ($pagos as $pago){
            $cost_tot += $pago->reservation->itinerary->cost() * $pago->reservation->passengers;
        }

        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('admin-airline.report_show', compact('sidebar', 'header', 'footer', 'airline', 'datos', 'pagos', 'airline', 'cost_tot'));
    }

    function distance($lat1, $lon1, $lat2, $lon2, $unit)
    {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
            return 0;
        } else {
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
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
