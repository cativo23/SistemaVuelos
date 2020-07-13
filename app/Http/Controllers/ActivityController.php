<?php

namespace App\Http\Controllers;
use App\Helper\Helper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\Activitylog\Models\Activity;



class ActivityController extends Controller{
    public function to_string(){
        return 'Aerolinea ' .$this->official_name;
    }


    public function index()
    {
        $activities = Activity::all()->last();
        //dd($activities);


        return view('activity.index', compact('activities'));
    }

    //$activity->subject; El objeto que fue actualizado
    //$activity->causer; El objeto que realizó el cambio
    //$activity->description; la descripción, es decir el mensaje, usualmente dice se actualizo tal cosa,

}
