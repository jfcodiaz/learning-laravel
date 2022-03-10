<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Contracts\Routing\UrlGenerator;

class SetLocation
{
    private $url;

    public function __construct(UrlGenerator $url)
    {
        $this->url = $url;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {


        $params = $request->route()->parameters();

        $len = $params['len'];

        App::setLocale($len);

        $this->url->defaults(['len' => $len]);

        $request->route()->forgetParameter('len');

        return $next($request);
    }
}
