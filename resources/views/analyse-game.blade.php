@extends('layouts.app')
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
                        <div id="board" class="container board" style="width: 400px"></div>
                        <button id="fen" value="<?=$moves?>" style="display: none">
                        <button type="button" class="btn btn-primary" onclick=prev()>Prev</button>
                        <button type="button" class="btn btn-primary" onclick=next()>Next</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
