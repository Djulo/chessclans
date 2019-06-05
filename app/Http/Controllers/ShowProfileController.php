<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use App\User;
use App\Admin;
use DB;
use App\Game;
use App\Auth;
use App\Friend;

class ShowProfileController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth:admin');
        $this->middleware('auth');

    }

    public function index(Request $request)
    {
        $id = $request->session->get('profileID');
        dd($id);

        $user = DB::table('users')->where('id',$id)->get();
        $requests = DB::table('requests')->where('to_id',$request->id)->get();

        $frequests=$user;
        foreach($requests as $req){
            $freq=DB::table('users')->where('id',$req->from_id)->get();
            $frequests+=$freq;
        }
        //dd($user->name);
        //$user1 = DB::table('users')->where('id',$id)->get();
        $user2 = DB::table('users')->where('id',auth()->user()->id)->get();
        $af1=DB::table('friends')->where('id_friend1',auth()->user()->id)->where('id_friend2',$user[0]->id)->get();
        $af2=DB::table('friends')->where('id_friend2',auth()->user()->id)->where('id_friend1',$user[0]->id)->get();
        $numfriends = DB::table('friends')->where('id_friend1',$user[0]->id)->orWhere('id_friend2',$user[0]->id)->count();
        $game=null;
        $games = DB::table('games')->where('black',$user[0]->id)->orWhere('white',$user[0]->id)->get();
        $whiteUsers=[];
        $blackUsers=[];
        foreach($games as $game){
            $u=User::find(Game::find($game->id)->white);
            array_push($whiteUsers,(object)$u);
            $u=User::find(Game::find($game->id)->black);
            array_push($blackUsers,(object)$u);
        }
        if(count($af1)==0&&count($af2)==0){
            return view('auth.profile',['whiteUsers'=>$whiteUsers ,'blackUsers'=>$blackUsers,'user'=>$user,'requests'=>$requests,'frequests'=>$frequests,'are_friends'=>'no','numfriends'=>$numfriends,'games'=>$games]);
        }
        return view('auth.profile',['whiteUsers'=>$whiteUsers ,'blackUsers'=>$blackUsers,'user'=>$user,'requests'=>$requests,'frequests'=>$frequests,'are_friends'=>'yes','numfriends'=>$numfriends,'games'=>$games]);

    }
}
    
