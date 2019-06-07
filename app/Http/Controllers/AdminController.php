<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;

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
