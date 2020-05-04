<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Silber\Bouncer\Bouncer;

use Illuminate\Support\Facades\Auth;
use Silber\Bouncer\Database\Queries\Roles;

class RolesController extends Controller
{

    public function asign_admin(){
        $super = \Bouncer::role()->firstOrCreate([
            'name' => 'super',
            'title' => 'Super Admin',
        ]);

        $user = \Auth::user();

        \Bouncer::allow('super')->to('manage-users');

        \Bouncer::assign('super')->to($user);

        return redirect('/roles');
    }
}
