<?php
namespace App\Http\Middleware;
use Closure;

class Role {
    public function handle($request, Closure $next, ... $roles)
    {
        if(auth()->check()){
            foreach($roles as $role){
                if(auth()->user()->{$role}()){
                    return $next($request);
                }
            }
            //return redirect()->route('login')->with('error', 'Anda tidak mempunyai izin membuka halaman');
            return response()->json([
                'message' => 'You dont have page open permissions',
                'status' =>false,
                'data' => (object)[]
            ]);
        }
        return response()->json([
            'message' => 'please login',
            'status' =>false,
            'data' => (object)[]
        ]);
        //return redirect()->route('login');
    }
}
