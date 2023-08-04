<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(Request $request)
    {

        $request->validate(
            [
                'email' => 'required|string|email',
                'password' => 'required|string'
            ],
            [
                'email.required' => 'Informe o email',
                'email.string' => 'Email deve ser caracteres',
                'email.email' => 'Formato de email incorreto',
                'password.required' => 'Informe a senha',
                'password.string' => 'A senha deve ser de caracteres válidos'
            ]
        );

        if (!$token = auth()->attempt($request->only(['email', 'password']))) {
            return response()->json([
                'status' => 'error',
                'message' => 'Não autorizado'
            ], 401);
        }

        return response()->json([
            'status' => 'success',
            'authorization' => [
                'token' => $token,
                'type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60,
            ]
        ]);
    }

    public function logout()
    {
        auth('api')->logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Deslogado com sucesso!'
        ]);
    }

    public function refresh()
    {
        return response()->json([
            'status' => 'success',
            'user' => auth()->user(),
            'authorisation' => [
                'token' => auth('api')->refresh(),
                'type' => 'bearer',
            ]
        ]);
    }
}
