<?php

namespace App\Http\Controllers;

use App\Airline;
use App\Airplane;
use App\Destination;
use App\Flight;
use App\Helper\Helper;
use App\Itinerary;
use App\Terminal;
use App\User;
use Auth;
use Gate;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class FlightController extends Controller
{
    /**
     * Checks if user has permission to manage Flights
     *
     * @return bool|void
     */
    public function getPermissions(){
        if (! Gate::allows('manage-flights')) {
            return abort(401);
        }
        return true;
    }


    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|void
     */
    public function index()
    {

        $this->getPermissions();

        $flights = Flight::all();

        list($sidebar, $header, $footer) = Helper::instance()->GetDashboard(Auth::user());

        return view('flights.index', compact('flights', 'sidebar', 'header', 'footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|void
     */
    public function create()
    {
        $this->getPermissions();

        $destinations = Destination::all();
        $gateways = Terminal::all();
        $airplanes = Airplane::all();
        $airlines = Airline::all();
        $itinerary = Itinerary::all();

        list($sidebar, $header, $footer) = Helper::instance()->GetDashboard(Auth::user());

        return view('flights.create', compact('sidebar', 'header', 'footer', 'destinations', 'airlines', 'airplanes', 'itinerary', 'gateways'))->with('success', '¡El vuelo se guardó correctamente!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|void
     */
    public function store(Request $request)
    {

        $this->getPermissions();
        list($sidebar, $header, $footer) = Helper::instance()->GetDashboard(Auth::user());

        $request->validate([
            'arrival_date' => 'required',
            'arrival_time' => 'required',
            'departure_date' => 'required',
            'departure_time' => 'required',
            'origin' => 'required',
            'destination' => 'required',
            'code' => 'required',
            'cost' => 'required',
            'price' => 'required',
            'distance_miles' => 'required',
            'flight_miles' => 'required',
            'status' => 'required',
            'duration' => 'required',
            'landing_terminal_id' => 'required',
            'boarding_terminal_id' => 'required',
            'airplane_id' => 'required',
            'airline_id' => 'required',
            'itinerary' => 'required'
        ]);

        $flight = new Flight([
            'arrival_date' => $request->input('arrival_date'),
            'arrival_time' => $request->input('arrival_time'),
            'departure_date' => $request->input('departure_date'),
            'departure_time' => $request->input('departure_time'),
            'origin' => $request->input('departure_time'),
            'destination' => $request->input('departure_time'),
            'code' => $request->input('code'),
            'cost' => $request->input('cost'),
            'price' => $request->input('price'),
            'distance_miles' => $request->input('distance_miles'),
            'flight_miles' => $request->input('flight_miles'),
            'status' => $request->input('status'),
            'duration' => $request->input('duration'),
        ]);

        $flight->LANDING_TERMINAL_ID = $request->input('landing_terminal_id');
        $flight->BOARDING_TERMINAL_ID = $request->input('boarding_terminal_id');
        $flight->AIRPLANE_ID = $request->input('airplane_id');
        $flight->AIRLINE_ID = $request->input('airline_id');
        $flight->ITINERARY_ID = $request->input('itinerary');

        $flight->save();

        return redirect()->route('flights.index', compact('sidebar', 'footer', 'header'))->with('success', '¡El vuelos se guardó correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param Flight $flight
     * @return Application|Factory|View|void
     */
    public function show(Flight $flight)
    {
        if (!Gate::allows('manage-flights')) {
            return abort(401);
        }

        $user = Auth::user();

        list($sidebar, $header, $footer) = Helper::instance()->GetDashboard($user);

        return view('flights.show', compact('flight', 'sidebar', 'header', 'footer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Flight $flight
     * @return Application|Factory|Response|View|void
     */
    public function edit(Flight $flight)
    {
        if (!Gate::allows('manage-flights')) {
            return abort(401);
        }

        $user = Auth::user();

        list($sidebar, $header, $footer) = Helper::instance()->GetDashboard($user);

        return view('flights.edit', compact('flight', 'sidebar', 'header', 'footer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Flight $flight
     * @return RedirectResponse|Response|void
     */
    public function update(Request $request, Flight $flight)
    {
        $user = Auth::user();
        if (!$user->can('manage-flights')) {
            return abort(401);
        }

        $request->validate([
            'arrival_date' => 'required',
            'arrival_time' => 'required',
            'departure_date' => 'required',
            'departure_time' => 'required',
            'origin' => 'required',
            'destination' => 'required',
            'code' => 'required',
            'cost' => 'required',
            'price' => 'required',
            'distance_miles' => 'required',
            'flight_miles' => 'required',
            'status' => 'required',
            'duration' => 'required',
            'landing_terminal_id' => 'required',
            'boarding_terminal_id' => 'required',
            'airplane_id' => 'required',
            'airline_id' => 'required',
            'itinerary' => 'required'
        ]);

        $flight->ARRIVAL_DATE = $request->input('arrival_date');
        $flight->ARRIVAL_TIME = $request->input('arrival_time');
        $flight->DEPARTURE_DATE = $request->input('departure_date');
        $flight->DEPARTURE_TIME = $request->input('departure_time');
        $flight->ORIGIN = $request->input('departure_time');
        $flight->DESTINATION = $request->input('departure_time');
        $flight->CODE = $request->input('code');
        $flight->COST = $request->input('cost');
        $flight->PRICE = $request->input('price');
        $flight->DISTANCE_MILES = $request->input('distance_miles');
        $flight->FLIGHT_MILES = $request->input('flight_miles');
        $flight->STATUS = $request->input('status');
        $flight->DURATION = $request->input('duration');

        $flight->LANDING_TERMINAL_ID = $request->input('landing_terminal_id');
        $flight->BOARDING_TERMINAL_ID = $request->input('boarding_terminal_id');
        $flight->AIRPLANE_ID = $request->input('airplane_id');
        $flight->AIRLINE_ID = $request->input('airline_id');
        $flight->ITINERARY_ID = $request->input('itinerary');

        $flight->save();

        return redirect()->route('flights.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Flight $flight
     * @return void
     */
    public function destroy(Flight $flight)
    {
        if (! Gate::allows('manage-users')) {
            return abort(401);
        }
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('super.users.index');
    }
}
