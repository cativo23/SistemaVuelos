<?php

namespace App\Http\Controllers;

use App\ClientCompany;
use App\Client;
use Illuminate\Http\Request;

class ClientCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clientes_c = ClientCompany::all();
        //$clientes = Client::all();

        return view('clientCompany.index', compact('clientes_c'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientCompany.create');
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
            'n_frecuente' => 'required|integer|max:1000000',
            'nombre_empresa' => 'required|string|max:150',
            'nombre_contacto' => 'required|string|max:150',
            'nic' => 'required',
            'nit' => 'required|min:17|max:17',
            'primer_nombre' => 'required|string|max:150',
            'segundo_nombre' => 'required|string|max:150',
            'primer_apellido' => 'required|string|max:150',
            'segundo_apellido' => 'required|string|max:150',
            'tel_fijo' => 'required|string|min:15|max:15',
            'tel_movil' => 'required|string|min:15|max:15',
            'direccion' => 'required|string|max:255'
        ]);

        $cliente = new Client();
        $cliente->frequent_customer_car_num = $request->n_frecuente;
        $cliente->mobile_phone = $request->tel_movil;
        $cliente->landline_phone =
        $cliente->first_name = $request->primer_nombre;;
        $cliente->second_name = $request->segundo_nombre;;
        $cliente->first_surname = $request->primer_apellido;
        $cliente->second_surname = $request->segundo_apellido;;
        $cliente->miles = 0;
        $cliente->save();

        $cliente_c = new ClientCompany();
        $cliente_c->company_name = $request->nombre_empresa;
        $cliente_c->contact_name = $request->nombre_contacto;
        $cliente_c->nic = $request->nic;
        $cliente_c->nit = $request->nit;
        $cliente_c->id = $cliente->id;
        $cliente_c->save();

        return redirect()->route('clientCompanys.index')->with('datos', '¡El cliente se guardó correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClientCompany  $clientCompany
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = ClientCompany::findOrFail($id);

        return view('clientCompany.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClientCompany  $clientCompany
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = ClientCompany::findOrFail($id);
        return view('ClientCompany.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClientCompany  $clientCompany
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'n_frecuente' => 'required|integer',
            'nombre_empresa' => 'required|string|max:150',
            'nombre_contacto' => 'required|string|max:150',
            'nic' => 'required',
            'nit' => 'required|min:17|max:17',
            'primer_nombre' => 'required|string|max:150',
            'segundo_nombre' => 'required|string|max:150',
            'primer_apellido' => 'required|string|max:150',
            'segundo_apellido' => 'required|string|max:150',
            'millas' => 'required|integer',
            'tel_fijo' => 'required|string|min:15|max:15',
            'tel_movil' => 'required|string|min:15|max:15',
            'direccion' => 'required|string|max:255'
        ]);

        $cliente = Client::findOrFail($id);
        dd($cliente);
        $cliente->frequent_customer_car_num = $request->n_frecuente;
        $cliente->mobile_phone = $request->tel_movil;
        $cliente->landline_phone =
        $cliente->first_name = $request->primer_nombre;;
        $cliente->second_name = $request->segundo_nombre;;
        $cliente->first_surname = $request->primer_apellido;
        $cliente->second_surname = $request->segundo_apellido;;
        $cliente->miles = 0;
        $cliente->save();

        $cliente_c = ClientCompany::findOrFail($id);
        $cliente_c->company_name = $request->nombre_empresa;
        $cliente_c->contact_name = $request->nombre_contacto;
        $cliente_c->nic = $request->nic;
        $cliente_c->nit = $request->nit;
        $cliente_c->id = $cliente->id;
        $cliente_c->save();
        dd($cliente_c);
        return redirect()->route('clientCompanys.index')->with('datos', '¡La aerolinea se editó correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClientCompany  $clientCompany
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $cliente = ClientCompany::findOrFail($id);

        return view('clientCompany.confirm', compact('cliente'));
    }



    public function destroy($id)
    {
        $cliente = ClientCompany::findOrFail($id);
        $cliente->delete();
        return redirect()->route('clienteCompanys.index')->with('datos', '¡La aerolinea se eliminó correctamente!');
    }
}

