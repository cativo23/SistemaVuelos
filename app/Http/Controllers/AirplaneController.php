<?php

namespace App\Http\Controllers;

use App\Airplane;
use App\Airline;
use App\Helper\Helper;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;

class AirplaneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {

        if (! Gate::allows('manage-airplanes')) {
            return abort(401);
        }

        $airplanes = Airplane::all();

        $user = Auth::user();

        list($sidebar, $header, $footer) = Helper::instance()->GetDashboard($user);

        return view('airplane.index', compact('airplanes', 'sidebar' , 'header', 'footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $airlines = Airline::all();

        $user = Auth::user();

        list($sidebar, $header, $footer) = Helper::instance()->GetDashboard($user);

        return view('airplane.create', compact('airlines', 'sidebar' , 'header', 'footer'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {

        $airplane = new Airplane;
        $airplane->model = $request->modelo;
        $airplane->type = $request->tipo;
        $airplane->seat_capacity = $request->capacidad;
        $airplane->manufacturer = $request->fabricante;

        $airplane->airline_id = $request->aerolinea;

        $airplane->save();

        return redirect()->route('airplanes.index')->with('datos', '¡Avión guardado correctamente!');
        //return dd($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Airplane  $airplane
     * @return Response
     */
    public function show(Airplane $airplane)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Airplane  $airplane
     * @return Response
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
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $airplane = Airplane::findOrFail($id);
        $airplane->model = $request->modelo;
        $airplane->type = $request->tipo;
        $airplane->seat_capacity = $request->capacidad;
        $airplane->manufacturer = $request->fabricante;

        $airplane->airline_id = $request->aerolinea;
        $airplane->save();
        return redirect()->route('airplanes.index')->with('datos', '¡Avión editado correctamente!');    }

    public function confirm($id)
    {
        $airplane = Airplane::findOrFail($id);

        $user = Auth::user();

        list($sidebar, $header, $footer) = Helper::instance()->GetDashboard($user);

        return view('airplane.confirm', compact('airplane', 'sidebar', 'header', 'footer'));
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
        $airplane = Airplane::findOrFail($id);
        $airplane->delete();
        return redirect()->route('airplanes.index')->with('datos', '¡Avión eliminado correctamente!');
    }
}
