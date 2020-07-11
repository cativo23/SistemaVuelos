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

        dd($clientes_c[0]->client);

        return view('clientCompany.index', compact('clientes_c'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $last_clientCompany = ClientCompany::latest('id')->first();

        if(empty($last_clientCompany)){
            $numero_cliente = 1;
        }else{
            $numero = $last_clientCompany->client->frequent_customer_num;
            $resultado = substr($numero, 2, 7);
            $numero_cliente = (int)$resultado + 1;
            //dd($numero_cliente);
        }

        return view('clientCompany.create', compact('numero_cliente'));
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
            'n_frecuente' => 'required',
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
        ]);

        $cliente = new Client();
        $cliente->frequent_customer_car_num = 0;
        $cliente->frequent_customer_num = $request->n_frecuente;
        $cliente->mobile_phone = $request->tel_movil;
        $cliente->landline_phone = $request->tel_fijo;
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
            'nombre_empresa' => 'required|string|max:150',
            'nombre_contacto' => 'required|string|max:150',
            'nic' => 'required|min:10|max:10',
            'nit' => 'required|min:17|max:17',
            'primer_nombre' => 'required|string|max:150',
            'segundo_nombre' => 'required|string|max:150',
            'primer_apellido' => 'required|string|max:150',
            'segundo_apellido' => 'required|string|max:150',
            'tel_fijo' => 'required|string|min:15|max:15',
            'tel_movil' => 'required|string|min:15|max:15'
        ]);

        $cliente = Client::findOrFail($id);
        $cliente->mobile_phone = $request->tel_movil;
        $cliente->landline_phone = $request->tel_fijo;
        $cliente->first_name = $request->primer_nombre;;
        $cliente->second_name = $request->segundo_nombre;;
        $cliente->first_surname = $request->primer_apellido;
        $cliente->second_surname = $request->segundo_apellido;;
        $cliente->save();

        $cliente_c = ClientCompany::findOrFail($id);
        $cliente_c->company_name = $request->nombre_empresa;
        $cliente_c->contact_name = $request->nombre_contacto;
        $cliente_c->nic = $request->nic;
        $cliente_c->nit = $request->nit;
        $cliente_c->id = $cliente->id;
        $cliente_c->save();
        return redirect()->route('clientCompanys.index')->with('datos', '¡El cliente se editó correctamente!');
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
        return redirect()->route('clientCompanys.index')->with('datos', '¡El cliente se eliminó correctamente!');
    }
}

