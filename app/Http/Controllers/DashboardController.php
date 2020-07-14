<?php

namespace App\Http\Controllers;

use App\Helper\VoyargeHelper;
use App\Terminal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use App\Airport;
use App\Flight;
use App\Airline;
use App\User;


use phpDocumentor\Reflection\Types\False_;
use Silber\Bouncer\Database\Ability;
use Silber\Bouncer\Database\Queries\Abilities;
use Silber\Bouncer\Database\Role;
use Spatie\Activitylog\Models\Activity;

class DashboardController extends Controller
{
    public function index(){;

        $user = Auth::user();
        $view = 'client.dashboard';

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        if (Gate::allows('super-admin-dash')){
            Log::info('This is a super user');

            //Obtener el usuario super admin
            $usuario = $user;

            $total_usuarios = count(User::all());
            $role = count(Role::all());
            $permisos = count(Ability::all());
            $log = count(Activity::all());

            $activos = count(User::withoutBanned()->get());

            $baneados = count(User::onlyBanned()->get());

            $admin_airline = count(User::whereIs('admin-airline')->get());
            $admin_airport = count(User::whereIs('admin-airport')->get());

            //los ultimos 5 registrados
            $users = User::latest()->take(5)->get();

            $view = 'super.dashboard';

            return view( $view, compact('user','users' , 'sidebar', 'header', 'footer', 'usuario', 'total_usuarios', 'role', 'permisos', 'log', 'activos', 'baneados', 'admin_airline', 'admin_airport'));

        }

        if ($user->can('admin-dash')){
            Log::info('This is a admin user');
            $view = 'admin.dashboard';
        }

        if ($user->can('admin-airport-dash')){
            Log::info('This is a airport admin user');//Conseguir aeropuerto del usuario

            $abilidades = $user->getAbilities();

            $airline_id = null;

            foreach ($abilidades as $a){
                if (strpos($a->name, 'manage-airport-') !== false) {
                    $airport_id = str_replace( 'manage-airport-', '', $a->name);
                }
            }

            $aeropuerto = Airport::findOrFail($airport_id);

            // Los últimos 5 vuelos
            $terminal = Terminal::where('airport_id', '=', $aeropuerto->id)->select('id')->get(); //Conseguir el terminal del aeropuerto

            $ids = $terminal->pluck('id')->toArray();

            //NO PUDE HACER UN whereIn porque me dice que no es un array:c
            $vuelos_salientes = Flight::whereIn('boarding_terminal_id',  $terminal)->get();

            $vuelos_entrantes = Flight::whereIn('landing_terminal_id',  $terminal)->get();

             $vuelos = $vuelos_salientes->merge($vuelos_entrantes);

             $vuelos_ultimos = $vuelos->take(5);

            //Contador de vuelos segun estado
            $vuelos_ready = count($vuelos->where("status","=", 'ready'));

            $vuelos_flying = count($vuelos->where("status","=", 'flying'));

            $vuelos_boarding = count($vuelos->where("status","=", 'boarding'));

            //Contar cuantos vuelos se han asignados
            $n_vuelos = count($vuelos);

            //Total vuelos hechos
            $vuelos_done = count($vuelos->where("status","=", 'done'));


            //Total de vuelos por gestionar
            $vuelos_gestionar = count($vuelos->where("status","=", 'unready'));

            //Vuelos cancelados
            $vuelos_cancelled = count($vuelos->where("status","=", 'cancelled'));


            //Vuelos por año,mes,semana, y promedio

            //AÑO
            /*$año_actual = date('Y');

            $porcentaje_anual_bool = False; //Indica si se el año anterior no hubo vuelos
            $vuelos_del_año = count($vuelos->whereYear("arrival_date","=",$año_actual)->get());

            $vuelos_del_año_anteior = count(Flight::where('boarding_terminal_id', '=', $terminal[0]->id)
                ->whereYear("arrival_date","=", date('Y', strtotime('-1 year')))->get());
            //dd($vuelos_del_año_anteior);
            //Calculando porcentaje de crecimiento/decrecimiento de vuelos anualmente
            if($vuelos_del_año_anteior > 0){
                $porcentaje_anual = round((($vuelos_del_año - $vuelos_del_año_anteior) / $vuelos_del_año_anteior) * 100,2);

            }else{
                // Asignamos -1 para indicar que el año anterior no hubieron vuelos
                $porcentaje_anual_bool = True;
                $porcentaje_anual = 0;
            }


            //MES
            $mes_actual = date('m');

            $vuelos_del_mes = count(Flight::where('boarding_terminal_id', '=', $terminal[0]->id)
                ->whereMonth("arrival_date","=",$mes_actual)->get());

            $vuelos_del_mes_anterior = count(Flight::where('boarding_terminal_id', '=', $terminal[0]->id)
                ->whereMonth("arrival_date","=", date('m', strtotime('-1 month')))->get());

            $porcentaje_mensual_bool = False;

            //dd($vuelos_del_mes_anterior);
            //Calculando porcentaje de crecimiento/decrecimiento de vuelos mensualmente
            if($vuelos_del_mes_anterior > 0){
                $porcentaje_mensual = round((($vuelos_del_mes - $vuelos_del_mes_anterior) / $vuelos_del_mes_anterior) * 100,2);

            }else{
                // Asignamos -1 para indicar que el año anterior no hubieron vuelos
                $porcentaje_mensual_bool = True;
                $porcentaje_mensual = 0;
            }


            //PROMEDIOS
            $promedio_mensual = round($vuelos_del_año /12,2);
            $promedio_semanal = round($vuelos_del_año /52,2);*/

            $view = 'admin-airport.dashboard';
            return view( $view , ['airport'=>$aeropuerto , 'user'=>$user, 'sidebar'=>$sidebar, 'footer'=>$footer, 'header'=>$header,
                'aeropuerto'=>$aeropuerto, 'vuelos'=>$vuelos, 'vuelos_ready'=>$vuelos_ready,
                'vuelos_flying'=>$vuelos_flying, 'vuelos_cancelled'=>$vuelos_cancelled,
                'vuelos_boarding'=>$vuelos_boarding,'terminal'=>$terminal,'vuelos_done'=>$vuelos_done,
                'vuelos_gestionar'=>$vuelos_gestionar, 'vuelos_ultimos'=>$vuelos_ultimos, 'salientes'=>$vuelos_salientes, 'entrantes'=>$vuelos_entrantes]);

        }

        if ($user->can('admin-airline-dash')){
            Log::info('This is a airline admin user');
            //Obtener aerolinea de admin

            $abilidades = $user->getAbilities();

            $airline_id = null;

            foreach ($abilidades as $a){
                if (strpos($a->name, 'manage-airline-') !== false) {
                   $airline_id = str_replace( 'manage-airline-', '', $a->name);
                }
            }

            $airline = Airline::findOrFail($airline_id);
            //dd($airline);

            // Los últimos 5 vuelos de la aerolinea
            $vuelos = Flight::where('airline_id', '=', $airline->id)->latest()->take(5)->get();
            //dd($vuelos);


            //Contador de vuelos segun estado
            $vuelos_ready = count(Flight::where('airline_id', '=', $airline->id)
                ->where("status","=", 'ready')->get());

            $vuelos_flying = count(Flight::where('airline_id', '=', $airline->id)
                ->where("status","=", 'flying')->get());

            $vuelos_boarding = count(Flight::where('airline_id', '=', $airline->id)
                ->where("status","=", 'boarding')->get());

            //Contar cuantos vuelos se han asignados por la aerolinea
            $n_vuelos = count(Flight::where('airline_id', '=', $airline->id)->get());

            //Total vuelos hechos por la aerolinea
            $vuelos_done = count(Flight::where('airline_id', '=', $airline->id)
                ->where("status","=", 'done')->get());


            //Total de vuelos por gestionar
            $vuelos_gestionar = count(Flight::where('airline_id', '=', $airline->id)
                ->where("status","=", 'unready')->get());

            //Vuelos cancelados
            $vuelos_cancelled = count(Flight::where('airline_id', '=',$airline->id)
                ->where("status","=", 'cancelled')->get());

            //Vuelos por año,mes,semana, y promedio

            //AÑO
            $año_actual = date('Y');

            $porcentaje_anual_bool = False; //Indica si se el año anterior no hubo vuelos
            $vuelos_del_año = count(Flight::where('airline_id', '=', $airline->id)
                ->whereYear("arrival_date","=",$año_actual)->get());

            $vuelos_del_año_anteior = count(Flight::where('airline_id', '=', $airline->id)
                ->whereYear("arrival_date","=", date('Y', strtotime('-1 year')))->get());
            //dd($vuelos_del_año_anteior);
            //Calculando porcentaje de crecimiento/decrecimiento de vuelos anualmente
            if($vuelos_del_año_anteior > 0){
                $porcentaje_anual = round((($vuelos_del_año - $vuelos_del_año_anteior) / $vuelos_del_año_anteior) * 100,2);

            }else{
                // Asignamos -1 para indicar que el año anterior no hubieron vuelos
                $porcentaje_anual_bool = True;
                $porcentaje_anual = 0;
            }


            //MES
            $mes_actual = date('m');

            $vuelos_del_mes = count(Flight::where('airline_id', '=', $airline->id)
                ->whereMonth("arrival_date","=",$mes_actual)->get());

            $vuelos_del_mes_anterior = count(Flight::where('airline_id', '=', $airline->id)
                ->whereMonth("arrival_date","=", date('m', strtotime('-1 month')))->get());

            $porcentaje_mensual_bool = False;

            //dd($vuelos_del_mes_anterior);
            //Calculando porcentaje de crecimiento/decrecimiento de vuelos mensualmente
            if($vuelos_del_mes_anterior > 0){
                $porcentaje_mensual = round((($vuelos_del_mes - $vuelos_del_mes_anterior) / $vuelos_del_mes_anterior) * 100,2);

            }else{
                // Asignamos -1 para indicar que el año anterior no hubieron vuelos
                $porcentaje_mensual_bool = True;
                $porcentaje_mensual = 0;
            }


            //PROMEDIOS
            $promedio_mensual = round($vuelos_del_año /12,2);
            $promedio_semanal = round($vuelos_del_año /52,2);


            $view = 'admin-airline.dashboard';

            return view( $view , ['user'=>$user, 'sidebar'=>$sidebar, 'footer'=>$footer, 'header'=>$header,
                'airline'=>$airline, 'vuelos'=>$vuelos, 'vuelos_ready'=>$vuelos_ready, 'vuelos_flying'=>$vuelos_flying,
                'vuelos_boarding'=>$vuelos_boarding, 'n_vuelos'=>$n_vuelos, 'vuelos_done'=>$vuelos_done,
                'vuelos_gestionar'=>$vuelos_gestionar, 'vuelos_cancelled'=>$vuelos_cancelled, 'airline'=>$airline]);        }

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view( $view , ['user'=>$user, 'sidebar'=>$sidebar, 'footer'=>$footer, 'header'=>$header]);
    }
}
