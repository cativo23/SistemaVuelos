<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $user = Auth::user();

        $view = 'client.dashboard';

        if ($user->can('see-super-admin-dash')){
            \Log::info('This is a super user');
            $view = 'super.dashboard';
        }

        if ($user->can('see-admin-dash')){
            \Log::info('This is a admin user');
            $view = 'admin.dashboard';
        }

        if ($user->can('see-admin-airport-dash')){
            \Log::info('This is a super user');
            $view = 'admin.airport.dashboard';
        }

        if ($user->can('see-admin-airline-dash')){
            \Log::info('This is a super user');
            $view = 'admin.airline.dashboard';
        }


        return view( $view , ['user'=>$user]);
    }
}
