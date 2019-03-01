<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Config;

class EnforceTenancy
{
  /**
   * Esto ayuda a que los paquetes de terceros sean 
   * conscientes del tenant.
   */
  public function handle($request, Closure $next)
  {
    Config::set('database.default', 'tenant');

    return $next($request);
  }
}