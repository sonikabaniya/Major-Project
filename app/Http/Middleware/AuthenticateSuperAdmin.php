<?php namespace App\Http\Middleware;
use App\Http\Controllers\SuperAdmin\OrganizationController;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use App\MCN\Model\Users;
class AuthenticateSuperAdmin
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;
    /**
     * Create a new filter instance.
     *
     * @param  Guard $auth
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()) {
            if($request->user()->role === 1){
                return $next($request);
            }
        }
        $response = ['type' => 'warning', 'code' => ['message', ['message' => "You don't have correct privilege"]]];
        return redirect('login')->withResponse($response);
    }
}