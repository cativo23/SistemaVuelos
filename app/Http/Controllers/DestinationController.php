<?php

namespace App\Http\Controllers;

use App\Airline;
use App\Destination;
use App\Helper\VoyargeHelper;
use Exception;
use Gate;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $destinations = Destination::all();

        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('destination.index', compact('destinations', 'sidebar', 'header' , 'footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('destination.create', compact('sidebar', 'header', 'footer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:destinations,code',
            'ciudad' => 'required',
            'estado' => 'required',
            'pais' => 'required',
            'continente' => 'required'
        ]);

        $Destination = new Destination;
        $Destination->CITY = $request->ciudad;
        $Destination->state = $request->estado;
        $Destination->country = $request->pais;
        $Destination->continent = $request->continente;
        $Destination->code = $request->codigo;
        $Destination->save();

        return redirect()->route('destinations.index')->with('datos', '¡El destino se guardó correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param Destination $destination
     * @return void
     */
    public function show(Destination $destination)
    {
        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);
        return view('destination.show', compact('destination', 'sidebar', 'header', 'footer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $destino = Destination::findOrFail($id);

        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('destination.edit', compact('destino', 'sidebar', 'header', 'footer'));
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
        $Destination = Destination::findOrFail($id);
        $request->validate([
            'codigo' => ['required', Rule::unique('destinations', 'code')->ignore($Destination->id)],
            'ciudad' => 'required',
            'estado' => 'required',
            'pais' => 'required',
            'continente' => 'required'
        ]);
        $Destination->CITY = $request->ciudad;
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

        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('destination.confirm', compact('Destination', 'sidebar', 'header', 'footer'));
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
        $Destination = Destination::findOrFail($id);
        $Destination->delete();
        return redirect()->route('destinations.index')->with('datos', '¡El destino se eliminó correctamente!');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     * @return Response|void
     */
    public function mass(Request $request)
    {
        Destination::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
