<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ApiController;

class AuthController extends ApiController
{
     public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:25|unique:users',
            'email' => 'email|required|unique:users',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 422);
        }
        $validatedData = $request->all();

        $validatedData['password'] = bcrypt($request->password);

        $user = User::create($validatedData);

        $user['access_token'] = $user->createToken('authToken')->accessToken;
        
        return $this->successResponse($user);
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 422);
        }

        $loginData = $request->all();
        

        if (auth()->attempt($loginData)) {
            
            $accessToken = auth()->user()->createToken('authToken')->accessToken;
            $user = auth()->user();
            $user['access_token'] = $accessToken;
    
            return $this->successResponse($user);
        }

        return $this->errorResponse('Les informations d\'identification invalides', 422);

    }

    public function getUser($id)
    {
        return $this->successResponse(auth()->user());
    }
}
