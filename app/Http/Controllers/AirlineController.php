<?php

namespace App\Http\Controllers;

use App\Airline;
use App\Helper\Helper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AirlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $airlines = Airline::all();

        $user = Auth::user();

        list($sidebar, $header, $footer) = Helper::instance()->GetDashboard($user);

        return view('airline.index', compact('airlines', 'sidebar', 'header', 'footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        $user = Auth::user();

        list($sidebar, $header, $footer) = Helper::instance()->GetDashboard($user);
        return view('airline.create' , compact('sidebar', 'header', 'footer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
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
     * @param $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $airline = Airline::findOrFail($id);
        $user = Auth::user();

        list($sidebar, $header, $footer) = Helper::instance()->GetDashboard($user);
        return view('airline.show', compact('airline', 'sidebar', 'header', 'footer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $airline = Airline::findOrFail($id);
        return view('airline.edit', compact('airline'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return RedirectResponse
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
     * @param $id
     * @return Application|Factory|View
     */

    public function confirm($id)
    {
        $airline = Airline::findOrFail($id);

        $user = Auth::user();

        list($sidebar, $header, $footer) = Helper::instance()->GetDashboard($user);

        return view('airline.confirm', compact('airline', 'sidebar', 'header', 'footer'));
    }



    public function destroy($id)
    {
        $airline = Airline::findOrFail($id);
        $airline->delete();
        return redirect()->route('airlines.index')->with('datos', '¡La aerolinea se eliminó correctamente!');
    }
}
