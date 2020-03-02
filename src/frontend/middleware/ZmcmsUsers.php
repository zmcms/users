<?php
namespace Zmcms\Users\Frontend\Middleware;
use Closure;use Session;use URL;class ZmcmsUsers
{
	public function handle($request, Closure $next){
		return $next($request);
	}
}
