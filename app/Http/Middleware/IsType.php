<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Session;

abstract class IsType {

	private $auth;

	function __construct(Guard $auth) {
		$this->auth = $auth;
	}

	abstract public function getType();

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ( ! $this->auth->user()->is($this->getType()))
		{
			// agregar un mensaje con Session::flash para indicarle que se le ha sacado del sistema por que quiso entrar al admin
			// Session::flash('users', 'No tienes acceso a esa dirección.');
			
			// $this->auth->logout();

			if ($request->ajax()) 
			{
				return response('Unauthorized.', 401);
			}
			else
			{
				return redirect()->to('home');
			}

		}
		return $next($request);
	}

}
