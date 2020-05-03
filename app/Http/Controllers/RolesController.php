<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Silber\Bouncer\Bouncer;
use Silber\Bouncer\Database\Queries\Roles;

class RolesController extends Controller
{
    public function index(){
        return 'UCan see me';
    }

    public function asign_admin(){
        /*$admin = \Bouncer::role()->firstOrCreate([
            'name' => 'admin',
            'title' => 'Administrator',
        ]);*/

        $user = \Auth::user();

        \Bouncer::allow('admin')->to('see-roles');

        \Bouncer::assign('admin')->to($user);

        return 'Hi';
    }
}
