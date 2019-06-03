@extends('layouts.app')
<link rel="stylesheet" href="//cdn.jsdelivr.net/flat-ui/2.0/css/flat-ui.css" />
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@section('content')
<div class="container">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    @component('components.who')

    @endcomponent
    <?php 
   
   // list($mins, $sec) = preg_split('[/.-]', $vals);
   $minuti = explode("+", $vals['value']);
    
//    dd($minuti);
    ?>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <!-- random kom -->
            <div id="board" class="container board" style="width: 400px"></div>
        </div>
        <div class=" col-md-2 flex-container ">
        <h3>time:</h3>
            <div class="time-container" id="left">
                <input style="display:none" id=p1 class="toggle btn btn-lg btn-primary btn-block" type="button" value="Player 1" /><span
                    class="time h1"></span>
            </div>
           
            <div class="time-container" id="controls">
              
   
                <div class="form-group">
                    <input style="display:none"class="form-control" id="time-input" type="number"  min="1"
                        value="<?php echo($minuti[0]) ?>" />
                        <br><br><br><br><br><br><br><br>
                        <input style="display:none" class="form-control" id="increment-input" type="number"  min="1"
                        value="<?php echo($minuti[1]) ?>" />
                    <input style="display:none" class="form-control btn btn-block btn-default" id="pause" type="button" value="Pause" />
                    <input style="display:none" class="btn btn-block btn-danger" id="reset" type="button" value="Reset" />
                </div>
                
            </div>
            <h3>time:</h3>
            <div class="time-container" id="right">
                <input style="display:none" id=p2 class="toggle btn btn-lg btn-primary" type="button" value="Player 2" /><span
                    class="time h1"></span>
            </div>
        </div>


    </div>
</div>
@endsection
