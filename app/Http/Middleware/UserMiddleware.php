<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserMiddleware {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		// if (Auth::check()) {
		// 	return $next($request);
		// } else {
		// 	return redirect('admin/dangnhap');
		// }

		// if (Auth::user()->quyen == 1) {
		// 	return $next($request);
		// } else {
		// 	return redirect()->back();
		// }

		if (Auth::check()) {
			$user = Auth::user();
			if ($user->position == 1) {
				return $next($request);
			} else {
				return redirect('admin/dangnhap');
			}

		} else {
			return redirect('admin/dangnhap');
		}
	}
}
