<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Silber\Bouncer\Database\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|void
     */
    public function index(){

        $user = \Auth::user();

        if (! $user->can('manage-users')) {
            return abort(401);
        }

        $users = User::with('roles')->get();

        $sidebar = 'super.sidebar';
        $header = 'super.header';
        $footer = 'layouts.footer';

        return view('super.users.index', compact('users', 'sidebar', 'header', 'footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $user = \Auth::user();

        if (!$user->can('manage-users'))  {
            return abort(401);
        }
        $roles = Role::get()->pluck('name', 'name');

        return view('super.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $user = \Auth::user();
        if (!$user->can('manage-users')) {
            return abort(401);
        }
        $user = User::create($request->all());

        foreach ($request->input('roles') as $role) {
            $user->assign($role);
        }

        return redirect()->route('super.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show(User $user)
    {
        $user_read = \Auth::user();
        if (! Gate::allows('manage-users')) {
            return abort(401);
        }

        $user->load('roles');
        $sidebar = 'super.sidebar';
        $header = 'super.header';
        $footer = 'layouts.footer';

        return view('super.users.show', compact('user', 'sidebar', 'header', 'footer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
