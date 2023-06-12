<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function registerPage()
    {
        if (Auth::check()) {
            return redirect()->route('mainPage');
        }
        
        return view('register');
    }

    public function mainPage () {
        return view('main');
    }

    
    public function registerAction(Request $request){
        if (Auth::check()) {
            return redirect()->route('mainPage');
        }

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('mainPage')
        ->withSuccess('You have successfully registered & logged in!');
    }

    
    public function loginPage(){
        if (Auth::check()) {
            return redirect()->route('mainPage');
        }

        return view('login');
    }

    public function loginAction(Request $request){
        if (Auth::check()) {
            return redirect()->route('mainPage');
        }

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('mainPage')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');

    } 
    
    public function protectedPage(){
        if(Auth::check()) {
            return view('protected');
        }
        
        return redirect()->route('login')
            ->withErrors([
            'email' => 'Please login to access the dashboard.',
        ])->onlyInput('email');
    } 
    
    public function logoutAction(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('mainPage')
            ->withSuccess('You have logged out successfully!');;
    }
}
