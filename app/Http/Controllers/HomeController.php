<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->status==0){
            session(['message'=>'Your account has been banned!']);
            //dd(session('message'));
            return redirect('/user/logout');
        }else
        session()->forget(['message']);
        $users = DB::table('users')->get();
        //foreach ($users as $user) {
       //     echo $user->name;
        //}
        return view('home',['users'=>$users]);
    }
    public function reportbug(Request $request){
        //dd('a');
        //$user = DB::table('users')->where('id',$request->userid)->get();
        //dd($user->name);
        return view('auth.report',['user'=>null,'bug'=>'yes']);

    }
    public function reported(Request $request){
        //$user = DB::table('users')->where('name',$request->name)->get();
        //dd($user->name)
        //dd($request->reason);
        DB::table('report')->insert([
            ['message' => $request->bug, 'idReporter' => auth()->user()->id,'idReported' => auth()->user()->id],
        ]);
        //////////// code za return
        return $this->index();

    }
    public function tutorials(){

        return view('tutorials');
    }
}
