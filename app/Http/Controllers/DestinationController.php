<?php

namespace App\Http\Controllers;

use App\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Destionation = Destination::all();
        //return dd($Destionation);
        return view('destination.index', compact('Destionation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('destination.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Destination = new Destination;
        $Destination->city = $request->ciudad;
        $Destination->state = $request->estado;
        $Destination->country = $request->pais;
        $Destination->continent = $request->continente;
        $Destination->code = $request->codigo;
        $Destination->save();

        return redirect()->route('destinations.index')->with('datos', '¡El destino se guardó correctamente!');
        //return 'Registro guardado';
        //return dd($request); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function show(Destination $destination)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $destino = Destination::findOrFail($id);

        return view('destination.edit', compact('destino'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Destination = Destination::findOrFail($id);
        $Destination->city = $request->ciudad;
        $Destination->state = $request->estado;
        $Destination->country = $request->pais;
        $Destination->continent = $request->continente;
        $Destination->code = $request->codigo;
        $Destination->save();
        return redirect()->route('destinations.index')->with('datos', '¡El destino se editó correctamente!');
        
    }


    public function confirm($id)
    {
        $Destination = Destination::findOrFail($id);
        return view('destination.confirm', compact('Destination'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Destination  $destination
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Destination = Destination::findOrFail($id);
        $Destination->delete();
        return redirect()->route('destinations.index')->with('datos', '¡El destino se eliminó correctamente!');
    }


}
