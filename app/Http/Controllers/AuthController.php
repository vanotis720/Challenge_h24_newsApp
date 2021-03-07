<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\ApiController;

class AuthController extends Controller
{
     public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|max:25|unique:users',
            'email' => 'email|required|unique:users',
            'password' => 'required|confirmed'
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->messages(), 422);
        }
        $validatedData = $request->all();

        // $identicon = new \Identicon\Identicon();
        // $avatar =  $identicon->getImageData($validatedData['email'],250);
        // $name = 'avatars/'. $validatedData['username'] .'_'. time();
        // Storage::disk('public')->put($name, $avatar);

        // $validatedData['url'] = $name; 
        $validatedData['password'] = bcrypt($request->password);

        $user = User::create($validatedData);

        $accessToken = $user->createToken('authToken')->accessToken;
        $user['access_token'] = $accessToken;
        
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

        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        
        if (auth()->attempt([$fieldType])) {
            return $this->errorResponse('Les informations d\'identification invalides', 422);
        }

        $accessToken = auth()->user()->createToken('authToken')->accessToken;

        $user = auth()->user();
        $user['access_token'] = $accessToken;

        return $this->successResponse($user);
    }

    public function getUser()
    {
        return $this->successResponse(auth()->user());
    }
}
