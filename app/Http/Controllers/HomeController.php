<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;
    /**
     *  autor Ognjen Bogicevic 0571/2016
    *   autor Stefan Pusica 0088/2016
    *   klasa koja prikazuje pocetnu stranicu aplikacije 
     */
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
     * Prikaz pocetne strane aplikacije.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()!=null)
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
    /**
     * Funkcija se poziva pri zahtevu za prijavom baga u aplikaciji, otvara se nova stranica sa formom za prijavu
     *
     * @param Request $request
     * @return void
     */
    public function reportbug(Request $request){
        //dd('a');
        //$user = DB::table('users')->where('id',$request->userid)->get();
        //dd($user->name);
        return view('auth.report',['user'=>null,'bug'=>'yes']);

    }
    /**
     * Funkcija koja se poziva pri potvrdi forme za prijavu
     *
     * @param Request $request
     * @return void
     */
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
    /**
     * Funkcija poziva stranicu sa tutorijalima i otvaranjima šaha
     *
     * @return void
     */
    public function tutorials(){

        return view('tutorials');
    }
}
