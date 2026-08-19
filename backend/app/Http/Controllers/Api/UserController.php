<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function update(Request $request)
    {
        $user = $request->user(); 
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => [
                'sometimes', 
                'required', 
                'string', 
                'email', 
                'max:255', 
                Rule::unique('users')->ignore($user->id)
            ],
            'password' => 'sometimes|required|string|min:6',
        ]);

        if ($request->has('name')) {
            $user->name = $request->name;
        }
        if ($request->has('email')) {
            $user->email = $request->email;
        }
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return response()->json([
            'message' => 'Profil bilgileri başarıyla güncellendi.',
            'user' => $user
        ]);
    }
}