<?php

namespace App\Http\Controllers;

use App\Airline;
use App\Airplane;
use App\Helper\VoyargeHelper;
use App\Seat;
use Auth;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AirlineAdminController extends Controller
{
    public function airplanes(Airline $airline)
    {
        if (!Gate::allows('manage-airline-'.$airline->id)){
            abort(401);
        }

        $airplanes = Airplane::all();

        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('admin-airline.airplanes', compact('airplanes', 'sidebar' , 'header', 'footer', 'airline'));
    }

    public function airplanes_create(Airline $airline)
    {
        if (!Gate::allows('manage-airline-'.$airline->id)){
            abort(401);
        }

        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('admin-airline.airplanes_create', compact('airline', 'sidebar' , 'header', 'footer'));

    }

    public function airplanes_store(Airline $airline, Request $request)
    {
        if (!Gate::allows('manage-airline-'.$airline->id)){
            abort(401);
        }

        $request->validate([
            'modelo' => 'required|alpha_num|max:150',
            'tipo' => ['required', 'max:150', Rule::in(['Carga', 'Comercial', 'Militar'])],
            'fabricante' => 'required|alpha_num|max:191',
            'economica' => 'required|integer|min:0',
            'ejecutiva' => 'required|integer|min:0',
            'primera' => 'required|integer|min:0'
        ]);

        $airplane = new Airplane;
        $airplane->model = $request->modelo;
        $airplane->type = $request->tipo;
        //La capacidad total del avión es la suma de las 3 clases
        $airplane->seat_capacity = $request->economica + $request->ejecutiva + $request->primera;
        $airplane->manufacturer = $request->fabricante;
        $airplane->airline_id = $airline->id;
        $airplane->save();


        for ($i = 0; $i < $request->economica; $i++){
            $asiento = new Seat;
            $id = $i +1;
            $asiento->code =  strtoupper(substr($airplane->model, 0, 3)) .($airplane->id) .'-' .'ECO' .$id;
            $asiento->class = 'Economica';
            $asiento->status = True;
            $asiento->airplane_id = $airplane->id;
            $asiento->save();
        }


        for ($i = 0; $i < $request->ejecutiva; $i++){
            $asiento = new Seat;
            $id = $i +1;
            $asiento->code = strtoupper(substr($airplane->model, 0, 3)) .($airplane->id) .'-' .'EXE' .$id;
            $asiento->class = 'Ejecutiva';
            $asiento->status = True;
            $asiento->airplane_id = $airplane->id;
            $asiento->save();
        }


        for ($i = 0; $i < $request->primera; $i++){
            $asiento = new Seat;
            $id = $i +1;
            $asiento->code = strtoupper(substr($airplane->model, 0, 3)) .($airplane->id) .'-' .'FIR' .$id;
            $asiento->class = 'Primera';
            $asiento->status = True;
            $asiento->airplane_id = $airplane->id;
            $asiento->save();
        }

        return redirect()->route('admin-airline.airplanes_index', $airline)->with('datos', '¡Avión' .' ' .'"'. $airplane->model .' '
            .$airplane->type .'"' .' guardado correctamente!');

    }

    public function airplanes_edit(Airline $airline, Airplane $airplane)
    {
        if (!Gate::allows('manage-airline-'.$airline->id)){
            abort(401);
        }

        $economicos = count(Seat::where("airplane_id","=", $airplane->id)->where("class", "=", "Economica")->get());
        $ejecutivos = count(Seat::where("airplane_id","=", $airplane->id)->where("class", "=", "Ejecutiva")->get());
        $primera = count(Seat::where("airplane_id","=", $airplane->id)->where("class", "=", "Primera")->get());

        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('admin-airline.airplanes_edit', compact('airplane', 'airline', 'economicos', 'ejecutivos', 'primera', 'sidebar' , 'header', 'footer', 'airline'));
    }

    public function airplanes_update(Airline $airline, Request $request)
    {
        if (!Gate::allows('manage-airline-'.$airline->id)){
            abort(401);
        }

        $request->validate([
            'modelo' => 'required|string|max:150',
            'tipo' => 'required|max:150',
            'fabricante' => 'required|string|max:255',
            'economica' => 'integer|min:0',
            'ejecutiva' => 'integer|min:0',
            'primera' => 'integer|min:0'
        ]);

        $airplane =  Airplane::findOrFail($request->input('id'));

        //Obteniendo cantidades de asientos
        $economicos = count(Seat::where("airplane_id","=", $airplane->id)->where("class", "=", "Economica")->get());
        $ejecutivos = count(Seat::where("airplane_id","=", $airplane->id)->where("class", "=", "Ejecutiva")->get());
        $primera = count(Seat::where("airplane_id","=", $airplane->id)->where("class", "=", "Primera")->get());

        //Comprobando si exite un cambio en el número de asientos de actual y el nuevo valor
        //dd($economicos, $request->economica);
        if($economicos != $request->economica){
            //dd('primer if', $economicos,  $request->economica);
            if($economicos < $request->economica){
                //dd('2do if', $economicos,  $request->economica);

                //Nuevo valor es mayor
                //Hay que agregar asientos
                for($i = 0; $i < ($request->economica - $economicos); $i++){
                    //dd('for ite 0');
                    $asiento = new Seat;
                    $id = $economicos + $i +1;
                    $asiento->code =  strtoupper(substr($airplane->model, 0, 3)) .($airplane->id) .'-' .'ECO' .$id;
                    $asiento->class = 'Economica';
                    $asiento->status = True; // True = Disponible
                    $asiento->airplane_id = $airplane->id;
                    $asiento->save();
                }

            }else{
                //Nuevo valor es menor
                //Hay que quitar asientos
                for($i = 0; $i < ($economicos - $request->economica); $i++){
                    //dd('for ite 0');
                    $asiento = Seat::where("airplane_id","=", $airplane->id)->where("class", "=", "Economica")->get()->last();
                    //dd($asiento);
                    $asiento->delete();
                }

            }
        }

        if($ejecutivos != $request->ejecutiva){
            //dd('primer if', $ejecutivos,  $request->ejecutiva);
            if($ejecutivos < $request->ejecutiva){
                //dd('2do if', $ejecutivos,  $request->ejecutiva);

                //Nuevo valor es mayor
                //Hay que agregar asientos
                for($i = 0; $i < ($request->ejecutiva - $ejecutivos); $i++){
                    //dd('for ite 0');
                    $asiento = new Seat;
                    $id = $ejecutivos + $i +1;
                    $asiento->code =  strtoupper(substr($airplane->model, 0, 3)) .($airplane->id) .'-' .'EXE' .$id;
                    $asiento->class = 'Ejecutiva';
                    $asiento->status = True; // True = Disponible
                    $asiento->airplane_id = $airplane->id;
                    $asiento->save();
                }

            }else{
                //Nuevo valor es menor
                //Hay que quitar asientos
                for($i = 0; $i < ($ejecutivos - $request->ejecutiva); $i++){
                    //dd('for ite 0');
                    $asiento = Seat::where("airplane_id","=", $airplane->id)->where("class", "=", "Ejecutiva")->get()->last();
                    //dd($asiento);
                    $asiento->delete();
                }

            }
        }

        if($primera != $request->primera){
            //dd('primer if', $ejecutivos,  $request->ejecutiva);
            if($primera < $request->primera){
                //dd('2do if', $ejecutivos,  $request->ejecutiva);

                //Nuevo valor es mayor
                //Hay que agregar asientos
                for($i = 0; $i < ($request->primera - $primera); $i++){
                    //dd('for ite 0');
                    $asiento = new Seat;
                    $id = $primera + $i +1;
                    $asiento->code =  strtoupper(substr($airplane->model, 0, 3)) .($airplane->id) .'-' .'FIR' .$id;
                    $asiento->class = 'Primera';
                    $asiento->status = True; // True = Disponible
                    $asiento->airplane_id = $airplane->id;
                    $asiento->save();
                }

            }else{
                //Nuevo valor es menor
                //Hay que quitar asientos
                for($i = 0; $i < ($primera - $request->primera); $i++){
                    //dd('for ite 0');
                    $asiento = Seat::where("airplane_id","=", $airplane->id)->where("class", "=", "Primera")->orderBy("id", "asc")->get()->last();
                    //dd($asiento);
                    $asiento->delete();
                }

            }
        }


        $airplane->model = $request->modelo;
        $airplane->type = $request->tipo;
        $airplane->seat_capacity = $request->economica + $request->ejecutiva + $request->primera;
        $airplane->manufacturer = $request->fabricante;
        $airplane->save();

        return redirect()->route('admin-airline.airplanes_index', $airline)->with('datos', '¡Avión' .' ' .'"'.$airplane->model .' '
            .$airplane->type .'"' .' editado correctamente!');
    }

    public function airplanes_destroy(Airline $airline, Airplane $airplane)
    {
        if (!Gate::allows('manage-airline-'.$airline->id)){
            abort(401);
        }

        $asientos = Seat::where("airplane_id","=", $airplane->id)->get();
        //dd($asientos);
        foreach ($asientos as $asiento){
            $asiento->delete();
        }
        $avion = $airplane->model .' ' .$airplane->type;
        $airplane->delete();
        return redirect()->route('admin-airline.airplanes_index', $airline)->with('datos', '¡Avión' .' ' .'"'.$avion .'"' .' eliminado correctamente!');

    }

    public function airplanes_mass_destroy(Airline $airline)
    {
        if (!Gate::allows('manage-airline-'.$airline->id)){
            abort(401);
        }

        Airplane::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }

    public function edit_airline(Airline $airline){
        if (!Gate::allows('manage-airline-'.$airline->id)){
            abort(401);
        }

        $user = Auth::user();
        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('admin-airline.edit', compact('airline', 'sidebar', 'header', 'footer'));
    }

    public function update_airline(Airline $airline, Request $request){
        if (!Gate::allows('manage-airline-'.$airline->id)){
            abort(401);
        }
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

        return redirect()->route('dashboard')->with('datos', '¡La aerolinea se editó correctamente!');
    }
}
