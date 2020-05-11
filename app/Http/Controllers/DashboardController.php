<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function index(){

        $user = Auth::user();
        $view = 'client.dashboard';

        if (Gate::allows('super-admin-dash')){
            Log::info('This is a super user');
            $view = 'super.dashboard';
        }

        if ($user->can('admin-dash')){
            Log::info('This is a admin user');
            $view = 'admin.dashboard';
        }

        if ($user->can('admin-airport-dash')){
            Log::info('This is a airport admin user');
            $view = 'admin-airport.dashboard';
        }

        if ($user->can('admin-airline-dash')){
            Log::info('This is a airline admin user');
            $view = 'admin-airline.dashboard';
        }


        list($sidebar, $header, $footer) = Helper::instance()->GetDashboard($user);

        return view( $view , ['user'=>$user, 'sidebar'=>$sidebar, 'footer'=>$footer, 'header'=>$header]);
    }
}
