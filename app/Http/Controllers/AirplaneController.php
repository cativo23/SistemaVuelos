<?php

namespace App\Http\Controllers;

use App\Airplane;
use App\Airline;
use App\Seat;
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
        $request->validate([
            'modelo' => 'required|string|max:150',
            'tipo' => 'required|max:150',
            'fabricante' => 'required|string|max:255',
            'aerolinea' => 'required',

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
        $airplane->airline_id = $request->aerolinea;
        //dd($airplane->seat_capacity);
        $airplane->save();

/*
        $a = Seat::all();
        foreach($a as $b){
            $b->delete();
        }
        dd($airplane);
        $resultado = substr($numero, 2, 7);
        dd($airplane);

      */

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

        return redirect()->route('airplanes.index')->with('datos', '¡Avión' .' ' .'"'. $airplane->model .' '
            .$airplane->type .'"' .' guardado correctamente!');
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

        $economicos = count(Seat::where("airplane_id","=", $airplane->id)->where("class", "=", "Economica")->get());
        $ejecutivos = count(Seat::where("airplane_id","=", $airplane->id)->where("class", "=", "Ejecutiva")->get());
        $primera = count(Seat::where("airplane_id","=", $airplane->id)->where("class", "=", "Primera")->get());


        return view('airplane.edit', compact('airplane', 'airlines', 'economicos', 'ejecutivos', 'primera'));
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
        $request->validate([
            'modelo' => 'required|string|max:150',
            'tipo' => 'required|max:150',
            'fabricante' => 'required|string|max:255',
            'aerolinea' => 'required',

            'economica' => 'integer|min:0',
            'ejecutiva' => 'integer|min:0',
            'primera' => 'integer|min:0'
        ]);

        $airplane = Airplane::findOrFail($id);

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
        $airplane->airline_id = $request->aerolinea;
        $airplane->save();

        return redirect()->route('airplanes.index')->with('datos', '¡Avión' .' ' .'"'.$airplane->model .' '
            .$airplane->type .'"' .' editado correctamente!');
        //with('datos', '¡Avión editado correctamente!');

    }


    public function confirm($id)
    {
        $airplane = Airplane::findOrFail($id);
        $economicos = count(Seat::where("airplane_id","=", $airplane->id)->where("class", "=", "Economica")->get());
        $ejecutivos = count(Seat::where("airplane_id","=", $airplane->id)->where("class", "=", "Ejecutiva")->get());
        $primera = count(Seat::where("airplane_id","=", $airplane->id)->where("class", "=", "Primera")->get());

        //dd($economicos, $ejecutivos);
        $user = Auth::user();

        list($sidebar, $header, $footer) = Helper::instance()->GetDashboard($user);

        return view('airplane.confirm', compact('airplane', 'sidebar', 'header', 'footer', 'economicos', 'ejecutivos', 'primera'));
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
        $asientos = Seat::where("airplane_id","=", $airplane->id)->get();
        //dd($asientos);
        foreach ($asientos as $asiento){
            $asiento->delete();
        }
        $avion = $airplane->model .' ' .$airplane->type;
        $airplane->delete();
        return redirect()->route('airplanes.index')->with('datos', '¡Avión' .' ' .'"'.$avion .'"' .' eliminado correctamente!');

    }
}
