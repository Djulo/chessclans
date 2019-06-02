@extends('layouts.app')
@section('content')
<div class="container">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    @component('components.who')

    @endcomponent
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div id="board" class="container board" style="width: 400px"></div>
        </div>
        <div class=" col-md-2 flex-container ">
            <div class="time-container" id="left">
                <input id=p1 class="toggle btn btn-lg btn-primary btn-block" type="button" value="Player 1" /><span
                    class="time h1"></span>
            </div>
            <div class="time-container" id="controls">
                <h1>Chess Clock</h1>
                <div class="form-group">
                    <input class="form-control" id="time-input" type="number" placeholder="Minutes" min="1"
                        value="20" />
                    <input class="form-control btn btn-block btn-default" id="pause" type="button" value="Pause" />
                    <input class="btn btn-block btn-danger" id="reset" type="button" value="Reset" />
                </div>

            </div>
            <div class="time-container" id="right">
                <input id=p2 class="toggle btn btn-lg btn-primary" type="button" value="Player 2" /><span
                    class="time h1"></span>
            </div>
        </div>


    </div>
</div>
@endsection
