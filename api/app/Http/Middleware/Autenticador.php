<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;

class Autenticador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            if (!$request->hasHeader('Authorization')) {
                throw new Exception();
            }
            $authorization = $request->header('Authorization');
            $token = str_replace("Bearer ", "", $authorization);
            $data = JWT::decode($token, new Key(env('JWT_KEY'), 'HS256'));
            $user = User::where('email', $data->email)->first();
            if (is_null($user)) {
                throw new Exception();
            }
            return $next($request);
        } catch (Exception $e) {
            return response()->json('Não autorizado', 401);
        }
    }
}
