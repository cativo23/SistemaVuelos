<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Session;
use Cog\Contracts\Ban\Bannable as BannableContract;

class ForbidBannedUserCustom
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;


    /**
     * @param Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }


    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $this->auth->user();


        if ($user && $user instanceof BannableContract && $user->isBanned()) {
            Session::flush();
            return redirect('banned');
        }


        return $next($request);
    }
}
