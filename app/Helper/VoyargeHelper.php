<?php
namespace App\Helper;

use App\User;
use Illuminate\Contracts\Auth\Authenticatable;

class VoyargeHelper
{

    /**
     * @param User|Authenticatable $user
     * @return string[]
     */
    public function GetDashboard($user){

        $sidebar = 'client.sidebar';
        $header = 'client.header';
        $footer = 'layouts.footer';

        if ($user->can('super-admin-dash')){
            $sidebar = 'super.sidebar';
            $header = 'super.header';
            $footer = 'layouts.footer';
        }elseif ($user->can('admin-dash')){
            $sidebar = 'admin.sidebar';
            $header = 'admin.header';
            $footer = 'layouts.footer';
        }elseif ($user->can('admin-airport-dash')){
            $sidebar = 'admin-airport.sidebar';
            $header = 'admin-airport.header';
            $footer = 'layouts.footer';
        }elseif ($user->can('admin-airline-dash')){
            $sidebar = 'admin-airline.sidebar';
            $header = 'admin-airline.header';
            $footer = 'layouts.footer';
        }
        return array($sidebar, $header, $footer);
    }

    public static function instance()
    {
        return new VoyargeHelper();
    }

}
