<?php

namespace App\Http\Controllers;

use App\Airplane;
use App\Airline;
use Illuminate\Http\Request;

class AirplaneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $airplanes = Airplane::all();
        return view('airplane.index', compact('airplanes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $airlines = Airline::all();
        return view('airplane.create', compact('airlines'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $airplane = new Airplane;
        $airplane->model = $request->modelo;
        $airplane->type = $request->tipo;
        $airplane->seat_capacity = $request->capacidad;
        $airplane->manufacturer = $request->fabricante;

        //$airlinea = Airline::findOrFail($request->aerolinea);

        $airplane->airline_id = $request->aerolinea;
        $airplane->save();
        return redirect()->route('airplanes.index')->with('datos', '¡Avión guardado correctamente!');
        //return dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Airplane  $airplane
     * @return \Illuminate\Http\Response
     */
    public function show(Airplane $airplane)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Airplane  $airplane
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $airplane = Airplane::findOrFail($id);
        $airlines = Airline::all();
        return view('airplane.edit', compact('airplane', 'airlines'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Airplane  $airplane
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $airplane = Airplane::findOrFail($id);
        $airplane->model = $request->modelo;
        $airplane->type = $request->tipo;
        $airplane->seat_capacity = $request->capacidad;
        $airplane->manufacturer = $request->fabricante;

        //$airlinea = Airline::findOrFail($request->aerolinea);

        $airplane->airline_id = $request->aerolinea;
        $airplane->save();
        return redirect()->route('airplanes.index')->with('datos', '¡Avión editado correctamente!');    }

    public function confirm($id)
    {
        $airplane = Airplane::findOrFail($id);
        return view('airplane.confirm', compact('airplane'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Airplane  $airplane
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $airplane = Airplane::findOrFail($id);
        $airplane->delete();
        return redirect()->route('airplanes.index')->with('datos', '¡Avión eliminado correctamente!');
    }
}
