<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    public function login(Request $request)
    {

        $credenciais = $request->all(['email', 'password']);

        Validator::make(
            $credenciais,
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
        )->validate();

        if (!$token = auth('api')->attempt($credenciais)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Não autorizado'
            ], 401);
        }

        return response()->json([
            'status' => 'success',
            'user' => auth()->user(),
            'authorisation' => [
                'token' => $token,
                'type' => 'bearer',
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
