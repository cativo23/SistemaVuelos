<?php

namespace App\Http\Controllers;

use App\Airline;
use App\Helper\VoyargeHelper;
use Exception;
use Gate;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
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

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

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
        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('airline.create', compact('sidebar', 'header', 'footer'));
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
            'codigo' => 'required|alpha_num|max:2|unique:airlines,code|regex:/^[A-Z0-9]{2}$/',
            'nombrecorto' => 'required|alpha|max:100',
            'nombreoficial' => 'required|string|max:191',
            'email' => 'required|email:rfc,dns|unique:airlines,email',
            'paisorigen' => 'required|string|max:191',
            'representante' => 'required|string|max:191',
            'paginaweb' => 'required|regex:/^[a-zA-Z0-9].{3,}$/|string|max:191',
            'facebook' => 'required|string|max:150|regex:/^[a-zA-Z0-9].{3,}$/',
            'instagram' => 'required|alpha_num|max:150|regex:/^[a-zA-Z0-9].{3,}$/',
            'twitter' => 'required|alpha_num|max:150|regex:/^[a-zA-Z0-9].{3,}$/',
            'whatsapp' => 'required|string|max:16'
        ]);

        $airline = new Airline([
            'code' => $request->codigo,
            'short_name' => $request->nombrecorto,
            'official_name' => $request->nombreoficial,
            'email' => $request->email,
            'origin_country' => $request->paisorigen,
            'representative' => $request->representante,
            'web_page' => 'https://'.$request->paginaweb,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'whatsapp' => $request->whatsapp,
        ]);

        $airline->save();

        return redirect()->route('airlines.index')->with('datos', '¡Aerolínea' . ' ' . '"'
            . $airline->short_name . ' ' . $airline->origin_country . '"' . ' guardada correctamente!');

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

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);
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

        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);
        return view('airline.edit', compact('airline', 'sidebar', 'header', 'footer'));
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

        $request->validate([
            'codigo' => ['required','alpha_num','max:2','regex:/^[A-Z0-9]{2}$/', Rule::unique('airlines', 'code')->ignore($airline->id)],
            'nombrecorto' => 'required|alpha|max:100',
            'nombreoficial' => 'required|string|max:191',
            'email' => ['required','email:rfc,dns', Rule::unique('airlines', 'email')->ignore($airline->id)],
            'paisorigen' => 'required|string|max:191',
            'representante' => 'required|string|max:191',
            'paginaweb' => 'required|regex:/^[a-zA-Z0-9].{3,}$/|string|max:191',
            'facebook' => 'required|string|max:150|regex:/^[a-zA-Z0-9].{3,}$/',
            'instagram' => 'required|alpha_num|max:150|regex:/^[a-zA-Z0-9].{3,}$/',
            'twitter' => 'required|alpha_num|max:150|regex:/^[a-zA-Z0-9].{3,}$/',
            'whatsapp' => 'required|string|max:16'
        ]);

        $airline = Airline::findOrFail($id);
        $airline->code = $request->codigo;
        $airline->short_name = $request->nombrecorto;
        $airline->official_name = $request->nombreoficial;
        $airline->email = $request->email;
        $airline->origin_country = $request->paisorigen;
        $airline->representative = $request->representante;
        $airline->web_page = 'https://'.$request->paginaweb;
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

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('airline.confirm', compact('airline', 'sidebar', 'header', 'footer'));
    }


    public function destroy($id)
    {
        $airline = Airline::findOrFail($id);
        try {
            $airline->delete();
        } catch (Exception $e) {
            return redirect()->route('airlines.index')->with('datos', '¡error!');
        }
        return redirect()->route('airlines.index')->with('datos', '¡La aerolinea se eliminó correctamente!');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     * @return Response|void
     */
    public function mass(Request $request)
    {
        if (!Gate::allows('manage-airline')) {
            return abort(401);
        }
        Airline::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }
}
