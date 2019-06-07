@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @guest
                <div class="card-header">GUEST Dashboard</div>
                @else
                <div class="card-header">USER Dashboard</div>
                @endguest

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{-- @component('components.who')
                    @endcomponent --}}

                    @guest
                    <h2> No games found</h2>
                    <h2> Register and challange yourself!</h2>
                    @endguest

                    @if($games->count() == 0)
                    <h2> No games found</h2>
                    @endif


                    <table class="table table-sm table-hover table-striped text-center">
                        <tbody>
                            @foreach($games as $game)
                        <tr onclick="event.preventDefault();
                            document.getElementById('game_id').value={{ $game['game']->id }};
                            document.getElementById('analyse-form').submit();">
                                <td>
                                    <a href="profile/{{ $game['white']->id }}"
                                        style=" font-size: 1.1rem; text-decoration:none; color:black;"><?= $game['white']->name; ?>
                                    </a>
                                    <span style="color: lightgrey; font-size: 1.1rem;">
                                        <i class="fas fa-chess" color="Mediumslateblue"></i>
                                    </span>
                                    <span style="display:inline-block; width: 20px;"></span>
                                    <a style="font-size: 1.1rem;"> {{ $game['game']->winner }}</a>
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
