<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AuthController extends Controller
{

    public function register(RegisterRequest $request)
    {

        try {
            //Iniciando la transaccion
            DB::beginTransaction();
            $user = User::create([
                "name" => $request->name,
                "username" => Str::slug($request->username),
                "email" => $request->email,
                "birthdate" => $request->birthdate,
                "password" => bcrypt($request->password),
            ]);
            $user->save();
            $token = $user->createToken('token')->plainTextToken;
            DB::commit();
            return response()->json([
                'message' => 'Datos registrados correctamente',
                'token' => $token,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al crear el usuario',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function login(LoginRequest $request)
    {
        try {
            if (!Auth::attempt($request->only('email', 'password'))) {
                return response()->json([
                    'errors' => ['invalid' => ['Credenciales inválidas.']]
                ], 422);
            }
            //Buscamos al usuario
            $user = User::where('email', $request->email)->firstOrFail();
            //Generamos el token
            $token = $user->createToken('token')->plainTextToken;
            return response()->json([
                'message' => 'Hola, ' . $user->username,
                "token" => $token,
                "user" => $user
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error al iniciar sesión',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'message' => 'Se han cerrado todas las sesiones del usuario.'
        ], 200);
    }
}
