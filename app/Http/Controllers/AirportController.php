<?php

namespace App\Http\Controllers;

use App\Airport;
use App\Helper\Helper;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AirportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $Airports = Airport::all();

        $user = Auth::user();

        list($sidebar, $header, $footer) = Helper::instance()->GetDashboard($user);

        return view('airport.index', compact('Airports', 'sidebar', 'header', 'footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $user = Auth::user();

        list($sidebar, $header, $footer) = Helper::instance()->GetDashboard($user);

        return view('airport.create', compact('sidebar', 'header', 'footer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
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
        return redirect()->route('airports.index')->with('datos', '¡El aeropuerto se guardó correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param Airport $airport
     * @return void
     */
    public function show(Airport $airport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {

        if (! Gate::allows('manage-airports')) {
            return abort(401);
        }

        $Airport = Airport::findOrFail($id);

        $user = Auth::user();

        list($sidebar, $header, $footer) = Helper::instance()->GetDashboard($user);

        return view('airports.edit', compact('Airport', 'sidebar', 'header', 'footer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Airport $airport
     * @return RedirectResponse
     */

    public function update(Request $request, $id)
    {
        $Airport =  Airport::findOrFail($id);
        $Airport->name = $request->nombre;
        $Airport->telephone = $request->telefono;
        $Airport->code = $request->codigo;
        $Airport->num_gateways = $request->terminales;
        $Airport->representative = $request->representante;
        $Airport->city = $request->ciudad;
        $Airport->country = $request->pais;
        $Airport->save();
        return redirect()->route('airports.index')->with('datos', '¡El aeropuerto se guardó correctamente!');
    }

    public function confirm($id)
    {
        $Airport = Airport::findOrFail($id);
        return view('airports.confirm', compact('Airport'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy($id)
    {
        //
        $Airport = Airport::findOrFail($id);
        $Airport->delete();
        return redirect()->route('airports.index')->with('datos','El aeropuerto se elimino correctamente');
    }
}
