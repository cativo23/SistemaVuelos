<?php

namespace App\Http\Controllers\Super;

use App\Helper\VoyargeHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Super\StoreRolesRequest;
use App\Http\Requests\Super\UpdateRolesRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Silber\Bouncer\Database\Ability;
use Silber\Bouncer\Database\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of Role.
     *
     * @return Application|Factory|View|void
     */
    public function index()
    {
        if (! Gate::allows('manage-users')) {
            return abort(401);
        }

        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        $roles = Role::all();

        \Log::info($sidebar);
        return view('super.roles.index', compact('roles', 'sidebar', 'header', 'footer'));
    }

    /**
     * Show the form for creating new Role.
     *
     * @return Application|Factory|View|void
     */
    public function create()
    {
        if (! Gate::allows('manage-users')) {
            return abort(401);
        }
        $abilities = Ability::get()->pluck('name', 'name');

        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('super.roles.create', compact('abilities', 'sidebar', 'header', 'footer'));
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param StoreRolesRequest $request
     * @return RedirectResponse|void
     */
    public function store(StoreRolesRequest $request)
    {
        if (! Gate::allows('manage-users')) {
            return abort(401);
        }
        $role = Role::create($request->all());
        $role->allow($request->input('abilities'));

        return redirect()->route('super.roles.index');
    }


    /**
     * Show the form for editing Role.
     *
     * @param  int  $id
     * @return Application|Factory|Response|View|void
     */
    public function edit($id)
    {
        if (! Gate::allows('manage-users')) {
            return abort(401);
        }
        $abilities = Ability::get()->pluck('name', 'name');

        $role = Role::findOrFail($id);

        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('super.roles.edit', compact('role', 'abilities', 'sidebar', 'header', 'footer'));
    }

    /**
     * Update Role in storage.
     *
     * @param UpdateRolesRequest $request
     * @param int $id
     * @return RedirectResponse|void
     */
    public function update(UpdateRolesRequest $request, $id)
    {
        if (! Gate::allows('manage-users')) {
            return abort(401);
        }

        $role = Role::findOrFail($id);

        $role->update($request->all());

        foreach ($role->getAbilities() as $ability) {
            $role->disallow($ability->name);
        }
        $role->allow($request->input('abilities'));

        return redirect()->route('super.roles.index');
    }

    public function show(Role $role)
    {
        if (! Gate::allows('manage-users')) {
            return abort(401);
        }

        $role->load('abilities');

        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);;

        return view('super.roles.show', compact('role', 'sidebar', 'header', 'footer'));
    }

    /**
     * Remove Role from storage.
     *
     * @param  int  $id
     * @return RedirectResponse|Response|void
     */
    public function destroy($id)
    {
        if (! Gate::allows('manage-users')) {
            return abort(401);
        }
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect()->route('super.roles.index');
    }

    /**
     * Delete all selected Role at once.
     *
     * @param Request $request
     * @return Response|void
     */
    public function mass(Request $request)
    {
        if (! Gate::allows('manage-users')) {
            return abort(401);
        }

        Role::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }

}
