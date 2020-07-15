<?php

namespace App\Http\Controllers;

use App\Airline;
use App\Airplane;
use App\Client;
use App\ClientNatural;
use App\Flight;
use App\Helper\VoyargeHelper;
use App\Itinerary;
use App\Mail\FlightBooked;
use App\Payment;
use App\Reservation;
use App\Ticket;
use Auth;
use DateTime;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use function Sodium\add;

class BookingController extends Controller
{
    public function index(){
        return view('booking.index');
    }

    public function search(Request $request){
        $request->validate([
            'origin'=>'required|string',
            'destination'=>'required|string',
            'from'=>'required|date',
            'to'=>'required|date',
        ]);

        $origin = $request->input('origin');
        $destination = $request->input('destination');
        $from = $request->input('from');
        $to = $request->input('to');

        $date_from_2u = new DateTime($from);
        date_add($date_from_2u, date_interval_create_from_date_string('2 days'));
        $date_from_2d= new DateTime($from);
        date_sub($date_from_2d, date_interval_create_from_date_string('2 days'));

        $date_to_2u = new DateTime($to);
        date_add($date_to_2u, date_interval_create_from_date_string('2 days'));
        $date_to_2d= new DateTime($to);
        date_sub($date_to_2d, date_interval_create_from_date_string('2 days'));

        $today = new DateTime();

        if ($today>=$date_from_2d){
            return view('booking.index');
        }

        if ($today>=$date_to_2d){
            return view('booking.index');
        }



        $first_class = $request->input('first_class');
        $business = $request->input('business');
        $economy = $request->input('economy');
        $passengers = $request->input('passengers');
        $type = $request->input('type');
        if (!$passengers){
            $passengers=0;
        }

        $seat_classes = [];

        if ($first_class=='on'){
            array_push($seat_classes, 'Primera');
        }
        if ($business=='on'){
            array_push($seat_classes, 'Ejecutiva');
        }
        if ($economy=='on'){
            array_push($seat_classes, 'Economica');
        }

        $itineraries = Itinerary::where('status', '=', 'ready')
                        ->whereBetween('departure_date', [$date_from_2d->format('Y-m-d'), $date_from_2u->format('Y-m-d')])
                        ->whereBetween('arrival_date', [$date_to_2d->format('Y-m-d'), $date_to_2u->format('Y-m-d')])
                        ->where('origin','=' , $origin)
                        ->where('destination','=' , $destination);

        if ($type){
            $itineraries = $itineraries->where('type', '=', $type );
        }
        $itineraries= $itineraries->get();
        $itineraries_available = [];
        foreach ($itineraries as $itinerary){
            if($itinerary->hasSeats($seat_classes, $passengers)){
                array_push($itineraries_available, $itinerary);
            }
        }

        return view('booking.search', compact('itineraries_available', 'origin', 'destination', 'from', 'to', 'first_class', 'business', 'economy', 'passengers', 'type'));
    }


    public function check(Request $request){

        $first_class = $request->input('first_class');
        $business = $request->input('business');
        $economy = $request->input('economy');
        $passengers = $request->input('passengers');

        $seat_class = '';

        if ($first_class=='on'){
            $seat_class = 'Primera';
        }elseif ($business=='on'){
            $seat_class ='Ejecutiva';
        }elseif ($economy=='on'){
            $seat_class = 'Economica';
        }


        $itinerary = Itinerary::findOrFail($request->input('id'));

        $mensaje = ['tipo'=>'success', 'mess'=>'El vuelo sigue disponlible para los '.$passengers.' pasajeros !'];

        if ($itinerary->status == 'unready'){
            $mensaje = ['tipo'=>'danger', 'mess'=>'Itinerario no disponible'];
        }

        if (!$itinerary->hasSeats(array($seat_class), $passengers)){
            $mensaje = ['tipo'=>'danger', 'mess'=>'Itinerario no disponible'];
        }

        $vuelos = $itinerary->flights;

        $first_flight = $vuelos->first();
        $last_flight = $vuelos->last();

        $airport_dep = $first_flight->boarding_gateway->airport;
        $airport_arr = $last_flight->landing_gateway->airport;


        return view('booking.check', compact('mensaje', 'itinerary','first_class', 'business', 'economy', 'passengers', 'airport_arr', 'airport_dep'));
    }

    public function book(Request $request){
        $first_class = $request->input('first_class');
        $business = $request->input('business');
        $economy = $request->input('economy');
        $passengers = $request->input('passengers');

        $seat_class = '';

        if ($first_class=='on'){
            $seat_class = 'Primera';
        }elseif ($business=='on'){
            $seat_class ='Ejecutiva';
        }elseif ($economy=='on'){
            $seat_class = 'Economica';
        }


        $itinerary = Itinerary::findOrFail($request->input('id'));

        $mensaje = ['tipo'=>'success', 'mess'=>'El vuelo sigue disponlible para los '.$passengers.' pasajeros !'];

        if ($itinerary->status == 'unrready'){
            $mensaje = ['tipo'=>'danger', 'mess'=>'Itinerario no disponible'];
        }

        if (!$itinerary->hasSeats(array($seat_class), $passengers)){
            $mensaje = ['tipo'=>'danger', 'mess'=>'Itinerario no disponible'];
        }

        $flights_outbound = $itinerary->flights->where('type', '=', 'O');

        $first_flight = $flights_outbound->first();
        $last_flight = $flights_outbound->last();

        $airport_dep = $first_flight->boarding_gateway->airport;
        $airport_arr = $last_flight->landing_gateway->airport;

        $user = Auth::user();

        return view('booking.book', compact('mensaje', 'itinerary','first_class', 'business', 'economy', 'passengers', 'airport_arr', 'airport_dep', 'user'));
    }
    public function completed(Request $request){
        $user = Auth::user();
        $client = Client::where('first_name', '=', $request->primer_nombre)->where('second_name', '=',$request->segundo_nombre)->where('first_surname', '=', $request->primer_apellido)->where('second_surname', '=', $request->segundo_apellido)->get()->first();
        if ($request->input('client')=='natural'){
            $request->validate([
                'primer_nombre' => 'required|string|max:150',
                'segundo_nombre' => 'required|string|max:150',
                'primer_apellido' => 'required|string|max:150',
                'segundo_apellido' => 'required|string|max:150',
                'genero' => 'required',
                'estado_civil' => 'required',
                'tipo_documento' => 'required',
                'cumple' => 'required',
                'tel_fijo' => 'required|string|max:15',
                'tel_movil' => 'required|string|max:15',
                'direccion' => 'required|string|max:255'
            ]);

            if ($client){
                $user->client_id = $client->id;
            }else{
                $cliente = new Client();
                $cliente->frequent_customer_car_num = 0;
                $cliente->frequent_customer_num = 0;
                $cliente->first_name = $request->primer_nombre;
                $cliente->second_name = $request->segundo_nombre;
                $cliente->first_surname = $request->primer_apellido;
                $cliente->second_surname = $request->segundo_apellido;
                $cliente->landline_phone = $request->tel_fijo;
                $cliente->mobile_phone = $request->tel_movil;
                $cliente->miles = 0;
                $cliente->save();
                $client = $cliente;

                $num_doc = 0;

                if ($request->n_documento1){
                    $num_doc = $request->n_documento1;
                }elseif ($request->n_documento2){
                    $num_doc = $request->n_documento2;
                }
                elseif ($request->n_documento3){
                    $num_doc = $request->n_documento3;
                }

                $clienten = new ClientNatural();
                $clienten->gender = $request->genero;
                $clienten->marital_status = $request->estado_civil;
                $clienten->document_typ = $request->tipo_documento;
                $clienten->document_num = $num_doc;
                $clienten->birthday = date_create_from_format('d-m-Y', $request->cumple);
                $clienten->direction = $request->direccion;
                $clienten->id = $cliente->id;
                $clienten->save();
                $user->cliente_id = $cliente->id;
            }


        }else{
            $request->validate([
                'nombre_empresa' => 'required|string|max:150',
                'nombre_contacto' => 'required|string|max:150',
                'nic' => 'required',
                'nit' => 'required|min:17|max:17',
                'primer_nombre2' => 'required|string|max:150',
                'segundo_nombre2' => 'required|string|max:150',
                'primer_apellido2' => 'required|string|max:150',
                'segundo_apellido2' => 'required|string|max:150',
                'tel_fijo2' => 'required|string|min:15|max:15',
                'tel_movil2' => 'required|string|min:15|max:15',
            ]);
        }

        $itin = Itinerary::findOrFail($request->input('id'));

        $first_class = $request->input('first_class');
        $business = $request->input('business');
        $economy = $request->input('economy');
        $passengers = $request->input('passengers');

        $seat_class = '';

        if ($first_class=='on'){
            $seat_class = 'Primera';
        }elseif ($business=='on'){
            $seat_class ='Ejecutiva';
        }elseif ($economy=='on'){
            $seat_class = 'Economica';
        }

        $mensaje = ['tipo'=>'success', 'mess'=>'El vuelo sigue disponlible para los '.$passengers.' pasajeros !'];

        if ($itin->status == 'unready'){

            $mensaje = ['tipo'=>'danger', 'mess'=>'Itinerario no disponible'];

            $itinerary = $itin;
            $flights_outbound = $itin->flights->where('type', '=', 'O');

            $first_flight = $flights_outbound->first();
            $last_flight = $flights_outbound->last();

            $airport_dep = $first_flight->boarding_gateway->airport;
            $airport_arr = $last_flight->landing_gateway->airport;

            $user = Auth::user();

            return view('booking.book', compact('mensaje', 'itinerary','first_class', 'business', 'economy', 'passengers', 'airport_arr', 'airport_dep', 'user'));
        }

        if (!$itin->hasSeats(array($seat_class), $passengers)){

            $itinerary = $itin;
            $flights_outbound = $itinerary->flights->where('type', '=', 'O');

            $first_flight = $flights_outbound->first();
            $last_flight = $flights_outbound->last();

            $airport_dep = $first_flight->boarding_gateway->airport;
            $airport_arr = $last_flight->landing_gateway->airport;

            $user = Auth::user();

            $mensaje = ['tipo'=>'danger', 'mess'=>'Itinerario no disponible'];

            return view('booking.book', compact('mensaje', 'itinerary','first_class', 'business', 'economy', 'passengers', 'airport_arr', 'airport_dep', 'user'));
        }

        $price = $itin->total_price * $passengers;

        $last_res = Reservation::all()->last();
        $last_res_id = 0;
         if ($last_res){
             $last_res_id = $last_res->id;
         }

        $reservation = new Reservation([
            'number'=>$last_res_id+1,
            'suitcase_num'=>0,
            'payed'=>false,
            'passengers'=>$passengers,
            'client_id'=>$client->id,
            'itinerary_id'=>$itin->id
        ]);

         $reservation->save();

         //Payment

        $payment = new Payment([
            'total_price'=>$price,
            'paid'=>new DateTime(),
            'reservation_id'=>$reservation->id
        ]);

        $payment->save();

        //ticket

        $flights_inbound = $itin->flights->where('type', '=', 'I');
        $flights_outbound = $itin->flights->where('type', '=', 'O');

        $first_flight = $flights_inbound->first();
        $last_flight = $flights_outbound->last();

        $airport_dep = $first_flight->boarding_gateway->airport;
        $airport_arr = $last_flight->landing_gateway->airport;


        $tickets=[];
        foreach ($itin->flights as $flight){

            $seats = $flight->airplane->seats->where('class', '=', $seat_class)->take($passengers);

            foreach ($seats as $seat){
                $ticket = new Ticket([
                    'origin' =>$flight->origin,
                    'destination'=>$flight->destination,
                    'date_booking'=>new DateTime(),
                    'date_cancellation'=> new DateTime(),
                    'seat_num'=>$seat->code,
                    'class_seat'=>$seat->class,
                    'passenger_id'=>$client->id,
                ]);
                $ticket->save();
                array_push($tickets, $ticket);
                $seat->status=0;
                $seat->save();
            }
        }

        $email = $request->input('email');

        if (Auth::user()){
            \Mail::to(Auth::user())->send( new FlightBooked($itin, $price, $passengers));
            $email =  Auth::user()->email;
        }else{
            \Mail::to($email)->send( new FlightBooked($itin, $price, $passengers));
        }

        \Mail::to(Auth::user())->send( new FlightBooked($itin, $price, $passengers));

        $itinerary = $itin;

        return view('booking.completed', compact('mensaje', 'price', 'itinerary', 'reservation', 'tickets', 'passengers', 'client', 'email', 'airport_dep', 'airport_arr'));
    }
}
