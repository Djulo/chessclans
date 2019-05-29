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

                    @endcomponent
                    <div id=startGame>
                    <a type="button" href="/game" class="btn btn-primary">Start game</a>
                    <a type="button" href="/analyse" class="btn btn-primary">Analyse game</a>
                    </div>

                <!-- <div id="board" class="container board" style="width: 400px"></div> -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
