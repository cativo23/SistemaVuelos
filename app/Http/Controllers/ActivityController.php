<?php

namespace App\Http\Controllers;
use App\Helper\Helper;
use App\Helper\VoyargeHelper;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\Activitylog\Models\Activity;



class ActivityController extends Controller{



    public function index()
    {
        $activities = Activity::all()->sortByDesc('id');
        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('activity.index', compact('activities', 'sidebar' , 'header', 'footer'));
    }

}
