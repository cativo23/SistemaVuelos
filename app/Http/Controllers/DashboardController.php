<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){

        $user = Auth::user();

        $view = 'client.dashboard';
        $sidebar = 'client.sidebar';
        $header = 'client.header';
        $footer = 'layouts.footer';

        if ($user->can('see-super-admin-dash')){
            \Log::info('This is a super user');
            $sidebar = 'super.sidebar';
            $header = 'super.header';
            $footer = 'layouts.footer';
            $view = 'super.dashboard';
        }

        if ($user->can('see-admin-dash')){
            \Log::info('This is a admin user');
            $sidebar = 'admin.sidebar';
            $header = 'admin.header';
            $footer = 'layouts.footer';
            $view = 'admin.dashboard';
        }

        if ($user->can('see-admin-airport-dash')){
            \Log::info('This is a airport admin user');
            $sidebar = 'admin-airport.sidebar';
            $header = 'admin-airport.header';
            $footer = 'layouts.footer';
            $view = 'admin-airport.dashboard';
        }

        if ($user->can('see-admin-airline-dash')){
            \Log::info('This is a airline admin user');
            $sidebar = 'admin-airline.sidebar';
            $header = 'admin-airline.header';
            $footer = 'layouts.footer';
            $view = 'admin-airline.dashboard';
        }

        \Log::info($view);

        return view( $view , ['user'=>$user, 'sidebar'=>$sidebar, 'footer'=>$footer, 'header'=>$header]);
    }
}
