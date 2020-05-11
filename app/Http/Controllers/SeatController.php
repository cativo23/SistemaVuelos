<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Seat;
use App\Airplane;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $seats = Seat::all();

        $user = Auth::user();

        list($sidebar, $header, $footer) = Helper::instance()->GetDashboard($user);

        return view('seat.index', compact('seats', 'sidebar', 'header', 'footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $airplanes = Airplane::all();

        $user = Auth::user();

        list($sidebar, $header, $footer) = Helper::instance()->GetDashboard($user);

        return view('seat.create', compact('airplanes', 'sidebar', 'header', 'footer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
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
     * @param Seat $seat
     * @return Response
     */
    public function show(Seat $seat)
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
        $asiento = Seat::findOrFail($id);
        $airplanes = Airplane::all();

        $user = Auth::user();

        list($sidebar, $header, $footer) = Helper::instance()->GetDashboard($user);

        return view('seat.edit', compact('asiento', 'airplanes', 'sidebar', 'header', 'footer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Seat $seat
     * @return RedirectResponse
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

        $user = Auth::user();

        list($sidebar, $header, $footer) = Helper::instance()->GetDashboard($user);

        return view('seat.confirm', compact('asiento', 'sidebar', 'header', 'footer'));
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
        $seat = Seat::findOrFail($id);
        $seat->delete();
        return redirect()->route('seats.index')->with('datos', '¡El asiento se eliminó correctamente!');
    }
}
