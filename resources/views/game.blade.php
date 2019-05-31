@extends('layouts.app')
<<<<<<< HEAD
=======

<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.7.0/moment.min.js"></script>
    <!-- <script src="public\js\clock.js"></script> -->
    <script type="text/javascript" src="{{ URL::asset('js\clock.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js\game.js') }}"></script>
    <!-- <script type="text/javascript" src="{{ URL::asset('css\clock.css') }}"></script> -->


    <link rel="stylesheet" href="//cdn.jsdelivr.net/flat-ui/2.0/css/flat-ui.css" />
</head>
>>>>>>> 4bab1c0700b622f66c93ec2d414ac984a11adb7b
@section('content')
<div class="container">
    <div class="card-header">Igramo sah</div>
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    @component('components.who')

    @endcomponent
    <div class="row justify-content-center">
<<<<<<< HEAD
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

                    @endcomponent

                    <div id="board" class="container board" style="width: 400px"></div>
                    <game-component></game-component>
=======
        <div class="col-md-6">






            <div id="board" class="container board" style="width: 400px"></div>



        </div>
        <div class=" col-md-2 flex-container ">
            <div class="time-container" id="left">
                <input id=p1 class="toggle btn btn-lg btn-primary btn-block" type="button" value="Player 1" /><span class="time h1"></span>
            </div>
            <div class="time-container" id="controls">
                <h1>Chess Clock</h1>
                <div class="form-group">
                    <input class="form-control" id="time-input" type="number" placeholder="Minutes" min="1" value="20" />
                    <input class="form-control btn btn-block btn-default" id="pause" type="button" value="Pause" />
                    <input class="btn btn-block btn-danger" id="reset" type="button" value="Reset" />
>>>>>>> 4bab1c0700b622f66c93ec2d414ac984a11adb7b
                </div>
               
            </div>
            <div class="time-container" id="right">
                <input id=p2 class="toggle btn btn-lg btn-primary" type="button" value="Player 2" /><span class="time h1"></span>
            </div>
        </div>
   

    </div>
</div>
@endsection
