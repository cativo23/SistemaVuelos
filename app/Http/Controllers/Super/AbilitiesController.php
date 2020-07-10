<?php

namespace App\Http\Controllers\Super;

use App\Helper\VoyargeHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Super\StoreAbilitiesRequest;
use App\Http\Requests\Super\UpdateAbilitiesRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Silber\Bouncer\Database\Ability;

class AbilitiesController extends Controller
{
    /**
     * Display a listing of Abilities.
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

        $abilities = Ability::all();

        return view('super.abilities.index', compact('abilities', 'sidebar', 'header', 'footer'));
    }

    /**
     * Show the form for creating new Ability.
     *
     * @return Application|Factory|View|void
     */
    public function create()
    {
        if (! Gate::allows('manage-users')) {
            return abort(401);
        }

        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('super.abilities.create', compact('sidebar', 'header', 'footer'));
    }

    /**
     * Store a newly created Ability in storage.
     *
     * @param StoreAbilitiesRequest $request
     * @return RedirectResponse|void
     */
    public function store(StoreAbilitiesRequest $request)
    {
        if (! Gate::allows('manage-users')) {
            return abort(401);
        }
        Ability::create($request->all());

        return redirect()->route('super.abilities.index');
    }


    /**
     * Show the form for editing Ability.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        if (! Gate::allows('manage-users')) {
            return abort(401);
        }

        $ability = Ability::findOrFail($id);

        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('super.abilities.edit', compact('ability', 'sidebar', 'header', 'footer'));
    }

    /**
     * Update Ability in storage.
     *
     * @param UpdateAbilitiesRequest $request
     * @param int $id
     * @return RedirectResponse|void
     */
    public function update(UpdateAbilitiesRequest $request, $id)
    {
        if (! Gate::allows('manage-users')) {
            return abort(401);
        }
        $ability = Ability::findOrFail($id);

        $ability->update($request->all());

        $ability->save();

        return redirect()->route('super.abilities.index');
    }

    public function show(Ability $ability)
    {
        if (! Gate::allows('manage-users')) {
            return abort(401);
        }

        $user = Auth::user();

        list($sidebar, $header, $footer) = VoyargeHelper::instance()->GetDashboard($user);

        return view('super.abilities.show', compact('ability', 'sidebar', 'header', 'footer'));
    }

    /**
     * Remove Ability from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        if (! Gate::allows('manage-users')) {
            return abort(401);
        }

        $ability = Ability::findOrFail($id);
        $ability->delete();

        return redirect()->route('super.abilities.index');
    }

    /**
     * Delete all selected Ability at once.
     *
     * @param Request $request
     * @return Response|void
     */
    public function mass(Request $request)
    {

        if (! Gate::allows('manage-users')) {
            return abort(401);
        }

        Ability::whereIn('id', request('ids'))->delete();

        return response()->noContent();
    }

}
