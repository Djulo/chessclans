<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

/*echo"SVETA";
if (isset($_POST['moveIs'])) {
   // echo "Sveta";
}*/

class GameController extends Controller
{
    //
    public function index(){
        //$this->insertMove();
        return view("game");
       
    }
    public function insertMove(Request $request){
        $move=$request->moveIs;
      /*  DB::table('games')->insert(
            [ 'move' => $move]*/
            DB::table('moves')->insert(
                ['fen'=>$move, 'game_id'=>"1"]
            
        );
    }
    public function next(Request $request){
        //echo("AJDEEEEEEEEE");
        $games = DB::table('games')->get('move');
        //die (var_dump($games));
        //echo "<script> next(); </script>";
        $iter=$request->next;
    
       // dd($games[$iter]);
   
        return (string)$games[$iter]->move;
        return "debil";
    }



   
}
