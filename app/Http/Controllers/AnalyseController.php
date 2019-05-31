<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AnalyseController extends Controller
{
    //
    public function index(){
        //$this->insertMove();
      
        //hocu ovde da napravim novi game id;
        
        DB::table('games')->insert(
            ['white' => 1, 'black' => 2]
        );
        return view("analyse");
       
    }
}
