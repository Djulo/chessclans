@extends('layouts.app')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="public\js\game.js"></script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">USER Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @component('components.who')
        <h1>SVETAA</h1>
                    @endcomponent
                    <div id=startGame>
                    <?php
                   
                    ?>
                    <!-- <button type="button" class="btn btn-primary">Start game</button> -->
                    </div>
                    <?php
                    
                       $games = DB::table('games')->get('move');
                        //die (var_dump($games));
                        //echo "<script> next(); </script>";

                        
                    $iter=0;
                    
                  //  $nulta="rnbqkbnr/3ppppp/2p5/pp6/PP2P3/2P5/3P1PPP/RNBQKBNR b KQkq e3 0 4";
                  //  var_dump($games[$iter]->move);

                 /*  function onaIzPHP(){
                    die (var_dump($games));
                  }*/
                    //ae da dohvatim sve poteze, da mogu nekako kroz njih. A znam kako ahhahahahah
                    ?>
                 <div id="board" class="container board" style="width: 400px"></div> 
                   <button type="button" class="btn btn-primary" onclick=prev()>Prev</button> 
                   <button type="button" class="btn btn-primary" onclick=next()>Next</button> 
                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
