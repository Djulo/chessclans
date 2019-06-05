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


                    <table class="table table-sm table-hover table-striped">
                        <tbody>
                            @foreach($games as $game)
                            <tr>
                                <td>
                                    <a href="profile/{{ $game['white']->id }}"
                                        style=" font-size: 1.1rem; text-decoration:none; color:black;"><?= $game['white']->name; ?>
                                    </a>
                                    <span style="color: lightgrey; font-size: 1.1rem;">
                                        <i class="fas fa-chess" color="Mediumslateblue"></i>
                                    </span>
                                    <span style="display:inline-block; width: 20px;"></span>
                                    <a style="font-size: 1.1rem;"> 1-0 </a>
                                    <span style="display:inline-block; width: 20px;"></span>
                                    <a href="profile/{{ $game['black']->id }}"
                                        style=" font-size: 1.1rem; text-decoration:none; color:black;"><?= $game['black']->name; ?></a>
                                    <span style="color: black; font-size: 1.1rem;">
                                        <i class="fas fa-chess"></i>
                                    </span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <form id="analyse-form" action="{{ route('analyse.show') }}" method="POST" style="display: none">
                        @csrf
                        <input id="game_id" name="id">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
