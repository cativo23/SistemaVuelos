<?php

namespace App\Http\Controllers;

use App\Airport;
use App\Helper\VoyargeHelper;
use App\Terminal;
use App\User;
use Exception;
use DateTime;
Use Gate;
use App\Flight;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class AirportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $Airports = Airport::all();

        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('airport.index', compact('Airports', 'sidebar', 'header', 'footer'));
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

        return view('airport.create', compact('sidebar', 'header', 'footer'));
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
            'codigo' => 'required|string|max:150',
            'nombre' => 'required|string|max:150',
            'representante' => 'required|string|max:255',
            'telefono' => 'required|string|min:15|max:15',
            'pais' => 'required',
            'ciudad' => 'required',
            'terminales' => 'required|integer|min:1'
        ]);

        $airport =  new  Airport();
        $airport->code = $request->codigo;
        $airport->name = $request->nombre;
        $airport->representative = $request->representante;
        $airport->telephone = $request->telefono;
        $airport->num_gateways = $request->terminales;
        $airport->city = $request->ciudad;
        $airport->country = $request->pais;
        $airport->save();

        //dd($airport->num_gateways);
        for ($i = 0; $i < $airport->num_gateways; $i++){
            $terminal = new Terminal;
            $id = $i +1;
            $terminal->code = $airport->id .'-' .$id;  //Aqui va el codigo que dice cat
            $terminal->airport_id = $airport->id;
            $terminal->save();
        }
        return redirect()->route('airports.index')->with('datos', '¡Aeropuerto' .' ' .'"'. $airport->name .'"' .' guardado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param Airport $airport
     * @return void
     */
    public function show(Airport $airport)
    {
        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);
        return view('airport.show', compact('airport', 'sidebar', 'header', 'footer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
/*
        if (! Gate::allows('manage-airports')) {
            return abort(401);
        }
*/
        $Airport = Airport::findOrFail($id);

        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('airport.edit', compact('Airport', 'sidebar', 'header', 'footer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Airport $airport
     * @return RedirectResponse
     */

    public function update(Request $request, $id)
    {
        $request->validate([
            'codigo' => 'required|string|max:150',
            'nombre' => 'required|string|max:150',
            'representante' => 'required|string|max:255',
            'telefono' => 'required|string|min:15|max:15',
            'pais' => 'required',
            'ciudad' => 'required',
            'terminales' => 'required|integer|min:1'
        ]);


        $airport =  Airport::findOrFail($id);

        $n_terminales = count(Terminal::where("airport_id","=", $airport->id)->get());
        //dd($n_terminales);
        if($airport->num_gateways != $request->terminales){
            //dd('es diferente');
            if($airport->num_gateways < $request->terminales){
                //Hay que agregar terminales
                //dd('2do if');
                //dd($request->terminales, $airport->num_gateways, $n_terminales);
                for($i = 0; $i < ($request->terminales - $airport->num_gateways); $i++){
                    //dd('for');
                    $terminal = new Terminal;
                    $id = $n_terminales + $i + 1;
                    $terminal->code = $airport->id .'-' .$id;
                    $terminal->airport_id = $airport->id;
                    $terminal->save();
                }
            }else{
                //Hay que quitar termianles
                //dd($request->terminales, $airport->num_gateways, $n_terminales);
                for($i = 0; $i < ($airport->num_gateways - $request->terminales); $i++){
                    //dd('for ite 0');
                    $terminal = Terminal::where("airport_id","=", $airport->id)->orderBy("id", "asc")->get()->last();
                    //dd($terminal);
                    $terminal->delete();
                }
            }
        }


        $airport->name = $request->nombre;
        $airport->telephone = $request->telefono;
        $airport->code = $request->codigo;
        $airport->num_gateways = $request->terminales;
        $airport->representative = $request->representante;
        $airport->city = $request->ciudad;
        $airport->country = $request->pais;
        $airport->save();
        return redirect()->route('airports.index')->with('datos', '¡Aeropuerto' .' ' .'"'.$airport->name .'"' .' editado correctamente!');
    }

    public function confirm($id)
    {
        $airport = Airport::findOrFail($id);
        return view('airport.confirm', compact('airport'));
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
        //
        $airport = Airport::findOrFail($id);
        $terminales = Terminal::where("airport_id","=", $airport->id)->get();
        //dd($asientos);
        foreach ($terminales as $terminal){
            $terminal->delete();
        }

        $nombre = $airport->name;
        $airport->delete();

        return redirect()->route('airports.index')->with('datos', '¡Aeropuerto' .' ' .'"' .$nombre .'"' .' eliminado correctamente!');
    }

    public function index_user(Airport $airport, User $user){

        if (!Gate::allows('manage-airport-'.$airport->id)){
            abort(401);
        }

        $gateways = $airport->gateways;

        $auth_user = Auth::user();
        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($auth_user);

        return view('airport.index_user', compact('gateways', 'airport','sidebar', 'header', 'footer'));
    }

    public function user_terminals(Airport $airport, User $user){

        if (!Gate::allows('manage-airport-'.$airport->id)){
            abort(401);
        }
        $gateways = Terminal::where('airport_id',$airport->id)->get();

        $flights = Flight::where('status','=', 'unready')->whereIn('landing_terminal_id', $gateways->pluck('id'))->get();
//        dd(count($flights));
        $auth_user = Auth::user();
        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($auth_user);
        $type = "Departure";
        return view('airport.user_terminal', compact('gateways', 'airport','sidebar', 'header', 'footer','flights','user','type'));
    }
    public function arrival_user_terminals(Airport $airport, User $user){

        if (!Gate::allows('manage-airport-'.$airport->id)){
            abort(401);
        }
        $gateways = Terminal::where('airport_id',$airport->id)->get();

        $flights = Flight::where('status','=','unready')->whereIn('boarding_terminal_id',$gateways->pluck('id'))->get();
//dd(count($flights));
        $auth_user = Auth::user();
        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($auth_user);
        $type = "Arrival";

        return view('airport.user_terminal', compact('gateways', 'airport','sidebar', 'header', 'footer','flights','user','type'));
    }
    public function user_terminals_edit(Airport $airport, User $user,Flight $flight){

        if (!Gate::allows('manage-airport-'.$airport->id)){
            abort(401);
        }

        $gateways = $airport->gateways;

//        $fli = Flight::where('id',$flight->id)->get();
        $fli = $flight;
        $type = "Departure";
        $auth_user = Auth::user();
        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($auth_user);

        return view('airport.edit_user_terminal', compact('gateways', 'airport','sidebar', 'header', 'footer','fli', 'user','type'));
    }
    public function arrival_user_terminals_edit(Airport $airport, User $user,Flight $flight){

        if (!Gate::allows('manage-airport-'.$airport->id)){
            abort(401);
        }

        $gateways = $airport->gateways;

//        $fli = Flight::where('id',$flight->id)->get();
        $fli = $flight;
        $type = "Arrival";
        $auth_user = Auth::user();
        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($auth_user);

        return view('airport.edit_user_terminal', compact('gateways', 'airport','sidebar', 'header', 'footer','fli', 'user','type'));
    }
    public function edit_user(Airport $airport){
        if (!Gate::allows('manage-airport-'.$airport->id)){
            abort(401);
        }
        dd('editar aeropuerto '.$airport->name);
    }

    public function update_date_terminal(Request $request){
        $fli = $request->flight;
        $new_time = $request->hour;
        $gateway = $request->terminal;
        $gateway_object = Terminal::where('id',$gateway);
        $flight = Flight::findOrFail($fli);
        $gateway_use = Flight::where('landing_terminal_id',$gateway)->where('status','unready')->get();
        $not_possible = 0 ;
        $counter = 0;
        foreach ($gateway_use as $gate){
            if(abs(strtotime($gate->departure_time) - strtotime($new_time)) <= 1800){
                $not_possible = $not_possible + 1;

            }
            $counter = $counter  + 1;
        }
            if($not_possible == 0){
                $datenueva = new DateTime($new_time);
                $flight->departure_time = $datenueva;
                $flight->landing_terminal_id = $gateway;
                $flight->save();
            }else{
                $message = "Ya existe un vuelo con una hora cercana a la elegida, cambie la hora";
                return redirect()->back()->with('datos', 'La terminal se encuentra ocupada a esa hora!');
            }


//        dd("Hora ".$new_time."Y terminal ".$gateway." Id vuelo".$flight->id,$flight->arrival_time,$flight->departure_time."Este es el nuevo time".$not_possible."Counter".$counter);
        return redirect()->back()->with('datos2', 'Vuelo actualizado!');
    }
}
