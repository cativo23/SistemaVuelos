<?php

namespace App\Http\Controllers;

use App\Airport;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Airports = Airport::all();
        return view('airport.index', compact('Airports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('airport.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $Airport =  new  Airport();
        $Airport->name = $request->nombre;
        $Airport->telephone = $request->telefono;
        $Airport->code = $request->codigo;
        $Airport->num_gateways = $request->terminales;
        $Airport->representative = $request->representante;
        $Airport->city = $request->ciudad;
        $Airport->country = $request->pais;
        $Airport->save();
        return redirect()->route('airport.index')->with('datos', '¡El aeropuerto se guardó correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function show(Airport $airport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Airport = Airport::findOrFail($id);

        return view('airport.edit', compact('Airport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Airport  $airport
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        //
        $Airport =  Airport::findOrFail($id);
        $Airport->name = $request->nombre;
        $Airport->telephone = $request->telefono;
        $Airport->code = $request->codigo;
        $Airport->num_gateways = $request->terminales;
        $Airport->representative = $request->representante;
        $Airport->city = $request->ciudad;
        $Airport->country = $request->pais;
        $Airport->save();
        return redirect()->route('airport.index')->with('datos', '¡El aeropuerto se guardó correctamente!');
    }

    public function confirm($id)
    {
        $Airport = Airport::findOrFail($id);
        return view('airport.confirm', compact('Airport'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Airport  $airport
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $Airport = Airport::findOrFail($id);
        $Airport->delete();
        return redirect()->route('airport.index')->with('datos','El aeropuerto se elimino correctamente');
    }
}
