<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


use App\Models\User;

class AuthController extends Controller
{
    public function unauthorized() {
        return response()->json([
            'error' => 'Não autorizado'
        ], 401);
    }

    public function register(Request $request) {
        $array = ['error' => ''];

        return $array;
    }
}
