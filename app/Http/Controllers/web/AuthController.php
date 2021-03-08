<?php

namespace App\Http\Controllers\web;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function formSignIn()
    {
        return view('auth.login');
    }

    public function formSignUp()
    {
        return view('auth.signin');
    }
    
    public function register(Request $request)
    {

        $validatedData = $request->validate([
            'username' => 'required|max:25|unique:users',
            'email' => 'email|required|unique:users',
            'password' => 'required'
        ]);

        $validatedData['password'] = bcrypt($request->password);

        $user = User::create($validatedData);
        auth()->attempt($request->only('email','password'));
        $request->session()->regenerate();
        
        return redirect('/');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $loginData = $request->all();


        if (auth()->attempt($request->except('_token'))) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return redirect()->back()->withInput($request->only('email'))->with('msg', 'Les informations d\'identification fournies ne correspondent pas à nos enregistrements.');
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }

    public function getUser()
    {
        return auth()->user();
    }

    public function profil()
    {
        $courses = new CoursesController();
        $exams = new ExamsController();
        // dd($courses->userCourses($this->getUser()->id));
        return view('profil',['user' => $this->getUser(), 'courses' => $courses->userCourses($this->getUser()->id), 'exams' => $exams->userExams($this->getUser()->id)]);
    }
}
