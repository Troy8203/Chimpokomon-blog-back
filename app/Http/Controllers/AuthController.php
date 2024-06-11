<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    public function register(RegisterRequest $request){

        //Validando el registro
        return response()->json([
            'message' => 'Datos registrador correctamente'
        ]);

    }

    public function login(Request $request){

    }

    public function logut(Request $request){

    }
}
