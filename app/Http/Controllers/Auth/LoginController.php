<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

/**
 * autor Ognjen Bogicevic 0571/2016
 * autor Stefan Pusica 0088/2016
 * 
 * 
 * Kontroler klasa koja je odgovorna za proveru podataka za logovanje korisnika i upis u session
 * kao i za logout korisnika
 */
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout','userLogout');
    }
    /**
     * Funkcija se poziva pri odjavi korisnika
     *
     * @return void
     */
    public function userLogout()
    {
        session()->forget(['admin']);
        Auth::guard('web')->logout();
        //dd($request->message);
        return redirect('/');
    }
}
