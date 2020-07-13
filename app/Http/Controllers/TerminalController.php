<?php

namespace App\Http\Controllers;

use App\Helper\VoyargeHelper;
use App\Terminal;
use App\Airport;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);
        return view('terminal.index', compact('Terminal' ,'sidebar', 'header', 'footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $Airports = Airport::all();

        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        //return view('terminal.create')->with('Airports',$Airport, 'sidebar', $sidebar,'header', 'footer');
        return view('terminal.create', compact( 'Airports', 'sidebar', 'header', 'footer'));
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

        return redirect()->route('gateways.index')->with('datos', 'La terminal se guardó correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Terminal  $gateway
     * @return \Illuminate\Http\Response
     */
    public function show(Terminal $gateway)
    {
        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);
        return view('terminal.show', compact('gateway', 'sidebar', 'header', 'footer'));
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
        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('terminal.edit', compact('Terminal','Airport', 'sidebar', 'header', 'footer'));
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

        return redirect()->route('gateways.index')->with('datos', '¡La terminal se actualizo correctamente!');


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

    public function create_user(Airport $airport, Request $request){

        if (!Gate::allows('manage-airport-'.$airport->id)){
            abort(401);
        }

        dd("create terminal for airport ".$airport->name);
    }
    public function mass(Request $request)
    {
        Terminal::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
