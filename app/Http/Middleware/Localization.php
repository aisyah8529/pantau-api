<?php

namespace App\Http\Middleware;

use App\Traits\HasLocale;
use Closure;

class Localization
{
    use HasLocale;
    
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        $this->setLocale($request);

        return $next($request);
    }
}
