<?php

namespace App\Http\Middleware;

use Closure;

class Middleware1
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $texto=[];
        $analise=[];
        $analise=$request->all();
        foreach($analise as $chave=>$valor)
        {
            $texto[$chave]=strip_tags($valor);
        }
        $request->merge($texto);
        return $next($request);
    }
}
