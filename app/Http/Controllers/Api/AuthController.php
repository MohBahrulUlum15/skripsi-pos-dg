<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // function for login
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'email|required',
            'password' => 'required',
        ]);

        $user = User::where('email', $data['email'])->first();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'user not found!'
            ], 401);
        }

        if (!Hash::check($data['password'], $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'invalid credentials!'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        if ($user->roles === 'admin') {
            return response()->json([
                'success' => true,
                'message' => 'Login success',
                'data' => $user,
                'token' => $token
            ]);
        }

        // Menentukan data tambahan berdasarkan role
        if ($user->roles == "nakes") {
            $additionalData = [
                'kode_nik_nip' => $user->bidan->nip,
                'tanggal_lahir' => $user->bidan->tanggal_lahir,
                'alamat' => $user->bidan->alamat,
            ];
        } else {
            $additionalData = [
                'kode_nik_nip' => $user->orangtua->nik,
                'tanggal_lahir' => $user->orangtua->tanggal_lahir,
                'alamat' => $user->orangtua->alamat,
            ];
        }

        return response()->json([
            'success' => true,
            'message' => 'Login success',
            'data' => new UserResource($user, $additionalData),
            'token' => $token
        ]);
    }

    //logout
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logout successfully'
        ]);
    }
}
