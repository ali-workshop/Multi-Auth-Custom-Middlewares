<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {

        // the accessor is specifically designed
        //  to transform the attribute value when it is accessed, not when it is set.
        // below we accessed the role attibute for the current authen user.
        
        if (auth()->user()->role==$role)
        {return $next($request);
    
    
        }
            else {
                  return response()->json(['you do not have pemissnon man this is the response.....:(']);  
                // return redirect()->route('home')->with('message','you dont have permisson fo this page');
            }


    }}
