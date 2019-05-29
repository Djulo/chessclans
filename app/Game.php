<?php

namespace App;
//mozda je ovako

use Illuminate\Database\Eloquent\Model;
use DB;
class Game extends Model
{
    //za sigurnost
    protected $fillable= [
        'move'
    ];

    function test($data){
        return $data+1;
    }

   
    public function index(){

        if(isset($_GET['function'])) {
            if($_GET['function'] == 'one') {
                insertMove(); // call function one
            } 
            else if($_GET['function'] == 'two') {
                 two();// call function two
            }
        }
    }

}
