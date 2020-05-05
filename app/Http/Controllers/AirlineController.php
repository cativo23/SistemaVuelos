<?php

namespace App\Http\Controllers;

use App\Airline;
use Illuminate\Http\Request;

class AirlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $airlines = Airline::all();
        return view('airline.index', compact('airlines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('airline.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $airline = new Airline;
        $airline->code = $request->codigo;
        $airline->short_name = $request->nombrecorto;
        $airline->official_name = $request->nombreoficial;
        $airline->email = $request->email;
        $airline->origin_country = $request->paisorigen;
        $airline->representative = $request->representante;
        $airline->web_page = $request->paginaweb;
        $airline->facebook = $request->facebook;
        $airline->instagram = $request->instagram;
        $airline->twitter = $request->twitter;
        $airline->whatsapp = $request->whatsapp;
        $airline->save();

        return redirect()->route('airlines.index')->with('datos', '¡La aerolinea se guardó correctamente!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $airline = Airline::findOrFail($id);
        return view('airline.show', compact('airline'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $airline = Airline::findOrFail($id);
        return view('airline.edit', compact('airline'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Airline  $airline
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $airline = Airline::findOrFail($id);
        $airline->code = $request->codigo;
        $airline->short_name = $request->nombrecorto;
        $airline->official_name = $request->nombreoficial;
        $airline->email = $request->email;
        $airline->origin_country = $request->paisorigen;
        $airline->representative = $request->representante;
        $airline->web_page = $request->paginaweb;
        $airline->facebook = $request->facebook;
        $airline->instagram = $request->instagram;
        $airline->twitter = $request->twitter;
        $airline->whatsapp = $request->whatsapp;
        $airline->save();

        return redirect()->route('airlines.index')->with('datos', '¡La aerolinea se editó correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Airline  $airline
     * @return \Illuminate\Http\Response
     */

    public function confirm($id)
    {
        $airline = Airline::findOrFail($id);
        return view('airline.confirm', compact('airline'));
    }



    public function destroy($id)
    {
        $airline = Airline::findOrFail($id);
        $airline->delete();
        return redirect()->route('airlines.index')->with('datos', '¡La aerolinea se eliminó correctamente!');
    }
}
