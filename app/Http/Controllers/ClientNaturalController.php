<?php

namespace App\Http\Controllers;

use App\ClientNatural;
use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ClientNaturalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientesn = ClientNatural::all();

        return view('clientNatural.index', compact('clientesn'));

    }

    /**
     * Show the form for creating a new resource.
     *p
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientNatural.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nfrecuente2' => 'required|string|max:100',
            'primernombre' => 'required|string|max:150',
            'segundonombre' => 'required|string|max:150',
            'primerapellido' => 'required|string|max:150',
            'segundoapellido' => 'required|string|max:150',
            'genero' => 'required',
            'estadocivil' => 'required',
            'tipodocumento' => 'required',
            'ndocumento' => 'required|string|max:150',
            'cumple' => 'required',
            'telfijo' => 'required|string|max:15',
            'telmovil' => 'required|string|max:15',
            'direccion' => 'required|string|max:255'
        ]);

        $cliente = new Client();
        $cliente->frequent_customer_car_num = $request->nfrecuente2;
        $cliente->first_name = $request->primernombre;
        $cliente->second_name = $request->segundonombre;
        $cliente->first_surname = $request->primerapellido;
        $cliente->second_surname = $request->segundoapellido;
        $cliente->landline_phone = $request->telfijo;
        $cliente->mobile_phone = $request->telmovil;
        $cliente->miles = 0;
        $cliente->save();

        $clienten = new ClientNatural();

        $clienten->gender = $request->genero;
        $clienten->marital_status = $request->estadocivil;
        $clienten->document_typ = $request->tipodocumento;
        $clienten->document_num = $request->ndocumento;
        $clienten->birthday = Date::make($request->cumple);
        $clienten->direction = $request->direccion;
        $clienten->id = $cliente->id;
        $clienten->save();

        return redirect()->route('clientNaturals.index')->with('datos', '¡El cliente se guardó correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\clientNatural  $clientNatural
     * @return \Illuminate\Http\Response
     */
    public function show(clientNatural $clientNatural)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\clientNatural  $clientNatural
     * @return \Illuminate\Http\Response
     */
    public function edit(clientNatural $clientNatural)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\clientNatural  $clientNatural
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, clientNatural $clientNatural)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\clientNatural  $clientNatural
     * @return \Illuminate\Http\Response
     */
    public function destroy(clientNatural $clientNatural)
    {
        //
    }
}
