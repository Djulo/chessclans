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
                    <form id="analyse-from" action="{{ route('analyse.show') }}" method="POST">
                            @csrf
                            <ul class="list-group">
                            @foreach ($games as $game)
                                    <input type="hidden" name="id" value="{{ $game->id }}">
                                    <button type="submit" class="list-group-item">White: <?= $game->white;?> Black:
                                        <?= $game->black; ?></button>
                            @endforeach
                            </ul>
                        </form>

                        <form id="analyse-from" action="{{ route('analyse.show') }}" method="POST"
                            style="display: none;">
                            @csrf
                        </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
