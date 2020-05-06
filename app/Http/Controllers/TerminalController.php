<?php

namespace App\Http\Controllers;

use App\Terminal;
use App\Airport;
use Illuminate\Http\Request;

class TerminalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Terminal = Terminal::all();
        return view('terminal.index', compact('Terminal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Airport = Airport::all();
        return view('terminal.create')->with('Airports',$Airport);
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
        $Terminal = new Terminal();
        $Terminal->code = $request->code;
        $Terminal->airport_id = $request->airport_id;
        $Terminal->save();

        return redirect()->route('gateway.index')->with('datos', 'La terminal se guardó correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Terminal  $gateway
     * @return \Illuminate\Http\Response
     */
    public function show(Terminal $gateway)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Terminal  $gateway
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Terminal = Terminal::findOrFail($id);
        $Airport = Airport::all();

        return view('terminal.edit')->with('Terminal',$Terminal)->with('Airport',$Airport);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Terminal  $gateway
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $Terminal = Terminal::findOrFail($id);
        $Terminal->code = $request->code;
        $Terminal->airport_id = $request->airport_id;
        $Terminal->save();

        return redirect()->route('gateway.index')->with('datos', '¡La terminal se actualizo correctamente!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Terminal  $gateway
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $Terminal = Terminal::findOrFail($id);
        return view('terminal.confirm', compact('Terminal'));
    }
    public function destroy($id)
    {
        //
        $Terminal = Terminal::findOrFail($id);
        $Terminal->delete();
        return redirect()->route('gateway.index')->with('datos', '¡La terminal se eliminó correctamente!');
    }
}
