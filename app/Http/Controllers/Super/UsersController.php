<?php

namespace App\Http\Controllers\Super;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\User;
use Exception;
use Hash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Gate;
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

        $user = Auth::user();

        if (! $user->can('manage-users')) {
            return abort(401);
        }

        $users = User::with('roles')->get();

        list($sidebar, $header, $footer) = Helper::instance()->GetDashboard($user);

        return view('super.users.index', compact('users', 'sidebar', 'header', 'footer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|void
     */
    public function create()
    {
        $user = Auth::user();

        if (!$user->can('manage-users'))  {
            return abort(401);
        }
        $roles = Role::get()->pluck('name', 'name');

        $user = Auth::user();

        list($sidebar, $header, $footer) = Helper::instance()->GetDashboard($user);

        return view('super.users.create', compact('roles', 'sidebar', 'header', 'footer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|void
     */
    public function store(Request $request)
    {
        $user = Auth::user();
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
     * @param User $user
     * @return Application|Factory|View|void
     */
    public function show(User $user)
    {
        if (! Gate::allows('manage-users')) {
            return abort(401);
        }

        $user->load('roles');

        $user1 = Auth::user();

        list($sidebar, $header, $footer) = Helper::instance()->GetDashboard($user1);

        return view('super.users.show', compact('user', 'sidebar', 'header', 'footer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View|void
     */
    public function edit($id)
    {
        if (! Gate::allows('manage-users')) {
            return abort(401);
        }
        $roles = Role::get()->pluck('name', 'name');

        $user = User::findOrFail($id);

        return view('super.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse|Response|void
     */
    public function update(Request $request, $id)
    {
        if (! Gate::allows('manage-users')) {
            return abort(401);
        }
        $user = User::findOrFail($id);

        if ($request->input('password'))
            $password = Hash::make($request->input('password'));
        else
            $password = $user->getAuthPassword();

        $request->password = $password;

        $user->NAME = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = $password;

        $user->save();

        foreach ($user->roles as $role) {
            $user->retract($role);
        }
        foreach ($request->input('roles') as $role) {
            $user->assign($role);
        }
        return redirect()->route('super.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse|Response|void
     * @throws Exception
     */
    public function destroy($id)
    {
        if (! Gate::allows('manage-users')) {
            return abort(401);
        }
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('super.users.index');
    }

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     * @return Response|void
     */
    public function mass(Request $request)
    {
        if (! Gate::allows('manage-users')) {
            return abort(401);
        }
        User::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }

    public function ban($request, $id){
        if (! Gate::allows('manage-users') && !Gate::allows('ban-user')) {
            return abort(401);
        }

        $user = User::where('id', '=',$id);

        $user->ban([
            'expired_at' => '+1 month',
            'comment'=> 'Prueba de ban'
        ]);

        return response()->redirectToRoute(route('super.users.index'));
    }
}
