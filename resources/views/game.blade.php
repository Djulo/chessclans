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

                    <div id="board" class="container board" style="width: 400px"></div>
                    <game-component></game-component>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
