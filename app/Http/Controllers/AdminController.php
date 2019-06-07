<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
/**
 * autor Ognjen Bogicevic 0571/2016
 *
 * Klasa admina za prikaz informacija njegove pocetne strane i brisanje i mutovanje korisnika
 */
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = DB::table('users')->get();
        $reports = DB::table('report')->get();
        return view('auth.admin',['users'=>$users,'reports'=>$reports]);
    }
    /**
     * Funkcija odgovorna za brisanje profila odnosno blokiranje profila
     * setuje se status integer na vrednost '0' i korisnik nece moci da se uloguje
     *
     * @param Request $request
     * @return void
     */
    public function deleteProfile(Request $request)
    {
        //dd($request->userid);
        $user = User::findOrFail($request->userid);
        //$user=DB::table('users')->where('id',$request->userid)->get();
        $user->status=0;
        $user->save();
        $users = DB::table('users')->get();
        $reports = DB::table('report')->get();
        return redirect()->route('admin.dashboard',['users'=>$users,'reports'=>$reports]);
    }
    /**
     * Funkcija odgovorna za mutovanje profila odnosno zabranu caskanja
     * setuje se status integer na vrednost '2' i korisnik nece moci da salje poruke na grupnom chatu
     * @param Request $request
     * @return void
     */
    public function muteProfile(Request $request)
    {
        $user = User::findOrFail($request->userid);
        //dd($request->userid);
        //$user=DB::table('users')->where('id',$request->userid)->get();
        $user->status=2;
        $user->save();
        $users = DB::table('users')->get();
        $reports = DB::table('report')->get();
        return redirect()->route('admin.dashboard',['users'=>$users,'reports'=>$reports]);
    }
}
