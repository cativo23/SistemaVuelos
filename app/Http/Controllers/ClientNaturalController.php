<?php

namespace App\Http\Controllers;

use App\ClientCompany;
use App\ClientNatural;
use App\Client;
use App\Helper\VoyargeHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('clientNatural.index', compact('clientesn','sidebar', 'header', 'footer'));

    }

    /**
     * Show the form for creating a new resource.
     *p
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $last_clientNatural = ClientNatural::latest('id')->first();

        if(empty($last_clientNatural)){
            $numero_cliente = 1;
        }else{
            $numero = $last_clientNatural->client->frequent_customer_num;
            $resultado = substr($numero, 2, 7);
            $numero_cliente = (int)$resultado + 1;
        }

        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('clientNatural.create', compact('numero_cliente','sidebar', 'header', 'footer'));
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
            'n_frecuente' => 'required|string|max:100',
            'primer_nombre' => 'required|string|max:150',
            'segundo_nombre' => 'required|string|max:150',
            'primer_apellido' => 'required|string|max:150',
            'segundo_apellido' => 'required|string|max:150',
            'genero' => 'required',
            'estado_civil' => 'required',
            'tipo_documento' => 'required',
            'n_documento' => 'required|string|max:150',
            'cumple' => 'required',
            'tel_fijo' => 'required|string|max:15',
            'tel_movil' => 'required|string|max:15',
            'direccion' => 'required|string|max:255'
        ]);

        $cliente = new Client();
        $cliente->frequent_customer_car_num = 0;
        $cliente->frequent_customer_num = $request->n_frecuente;
        $cliente->first_name = $request->primer_nombre;
        $cliente->second_name = $request->segundo_nombre;
        $cliente->first_surname = $request->primer_apellido;
        $cliente->second_surname = $request->segundo_apellido;
        $cliente->landline_phone = $request->tel_fijo;
        $cliente->mobile_phone = $request->tel_movil;
        $cliente->miles = 0;
        $cliente->save();

        $clienten = new ClientNatural();
        $clienten->gender = $request->genero;
        $clienten->marital_status = $request->estado_civil;
        $clienten->document_typ = $request->tipo_documento;
        $clienten->document_num = $request->n_documento;
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
    public function show($id)
    {
        $cliente = ClientNatural::findOrFail($id);

        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);
        return view('clientNatural.show', compact('cliente','sidebar', 'header', 'footer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\clientNatural  $clientNatural
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente = ClientNatural::findOrFail($id);

        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);
        return view('ClientNatural.edit', compact('cliente','sidebar', 'header', 'footer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\clientNatural  $clientNatural
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nfrecuente' => 'required|string|max:100',
            'primer_nombre' => 'required|string|max:150',
            'segundo_nombre' => 'required|string|max:150',
            'primer_apellido' => 'required|string|max:150',
            'segundo_apellido' => 'required|string|max:150',
            'genero' => 'required',
            'estado_civil' => 'required',
            'tipo_documento' => 'required',
            'n_documento' => 'required|string|min:9',
            'cumple' => 'required',
            'tel_fijo' => 'required|string|max:15',
            'tel_movil' => 'required|string|max:15',
            'direccion' => 'required|string|max:255'
        ]);

        $cliente = Client::findOrFail($id);
        //$cliente->frequent_customer_car_num = $request->n_frecuente;
        $cliente->first_name = $request->primer_nombre;
        $cliente->second_name = $request->segundo_nombre;
        $cliente->first_surname = $request->primer_apellido;
        $cliente->second_surname = $request->segundo_apellido;
        $cliente->landline_phone = $request->tel_fijo;
        $cliente->mobile_phone = $request->tel_movil;
        //$cliente->miles = 0;
        $cliente->save();

        $clienten = ClientNatural::findOrFail($id);
        $clienten->gender = $request->genero;
        $clienten->marital_status = $request->estado_civil;
        $clienten->document_typ = $request->tipo_documento;
        $clienten->document_num = $request->n_documento;
        $clienten->birthday = Date::make($request->cumple);
        $clienten->direction = $request->direccion;
        //$clienten->id = $cliente->id;
        $clienten->save();

        return redirect()->route('clientNaturals.index')->with('datos', '¡El cliente se editó correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\clientNatural  $clientNatural
     * @return \Illuminate\Http\Response
     */
    public function confirm($id)
    {
        $cliente = ClientNatural::findOrFail($id);

        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('clientNatural.confirm', compact('cliente','sidebar', 'header', 'footer'));
    }



    public function destroy($id)
    {
        $cliente_n = ClientNatural::findOrFail($id);
        $cliente = Client::findOrFail($id);

        $cliente_n->delete();
        $cliente->delete();
        return redirect()->route('clientNaturals.index')->with('datos', '¡El cliente se eliminó correctamente!');
    }
}
