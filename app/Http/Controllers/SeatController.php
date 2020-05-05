<?php

namespace App\Http\Controllers;

use App\Seat;
use App\Airplane;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seats = Seat::all();
        return view('seat.index', compact('seats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $airplanes = Airplane::all();
        return view('seat.create', compact('airplanes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $seat = new Seat;
        $seat->code = $request->codigo;
        $seat->class = $request->clase;
        $seat->status = $request->estado;
        $seat->airplane_id = $request->avion;
        $seat->save();

        return redirect()->route('seats.index')->with('datos', '¡Asiento guardado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function show(Seat $seat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asiento = Seat::findOrFail($id);
        $airplanes = Airplane::all();

        return view('seat.edit', compact('asiento', 'airplanes'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $seat = Seat::findOrFail($id);
        $seat->code = $request->codigo;
        $seat->class = $request->clase;
        $seat->status = $request->estado;
        $seat->airplane_id = $request->avion;
        $seat->save();

        return redirect()->route('seats.index')->with('datos', '¡Asiento editado correctamente!');
    }

    public function confirm($id)
    {
        $asiento = Seat::findOrFail($id);
        return view('seat.confirm', compact('asiento'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seat  $seat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $seat = Seat::findOrFail($id);
        $seat->delete();
        return redirect()->route('seats.index')->with('datos', '¡El asiento se eliminó correctamente!');
    }
}
