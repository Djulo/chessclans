@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">

    </div>
    <div class=row>
    <div class="col-sm-8">
    <section id="showcase">
        <div class="showcase-content">
            @if(auth()->user() != null)
            <div class=" col-sm-3 left-content">
                <h2 class="">Online users:</h2>
                <table class="table table-sm table-hover table-striped">
                    @foreach ($users as $user)
                    @if(auth()->user() != null && auth()->user()->id!=$user->id)
                    <tr>
                        <td>
                            <a href="profile/{{ $user->id }}"
                                style="text-decoration:none; color:black"><?php echo $user->name;?></a>
                        <td>
                    </tr>
                    @endif
                    @endforeach
                </table>
            </div>
            @endif
            <div class="container col-sm-9 main-area-container">
                <div class="main-area">
                    <div class="game-mode-container">
                        <div class="game-mode">
                            <a href="game/home/{{ '1+0' }}">
                                <h1>1 + 0</h1>
                                <h4>Bullet</h4>
                            </a>
                    </div>
                </div>
                <div class="game-mode-container">
                    <div class="game-mode">
                        <a href="game/home/{{ '2+1' }}">
                            <h1>2 + 1</h1>
                            <h4>Bullet</h4>
                        </a>
                    </div>
                </div>
                <div class="game-mode-container">
                    <div class="game-mode">
                        <a href="game/home/{{ '3+0' }}">
                            <h1>3 + 0</h1>
                            <h4>Blitz</h4>
                        </a>
                    </div>
                </div>
                <div class="game-mode-container">
                    <div class="game-mode">
                        <a href="game/home/{{ '3+2' }}">
                            <h1>3 + 2</h1>
                            <h4>Blitz</h4>
                        </a>
                    </div>
                </div>
                <div class="game-mode-container">
                    <div class="game-mode">
                        <a href="game/home/{{ '5+0' }}">
                            <h1>5 + 0</h1>
                            <h4>Blitz</h4>
                        </a>
                    </div>
                </div>
                <div class="game-mode-container">
                    <div class="game-mode">
                        <a href="game/home/{{ '5+3' }}">
                            <h1>5 + 3</h1>
                            <h4>Blitz</h4>
                        </a>
                    </div>
                </div>
                <div class="game-mode-container">
                    <div class="game-mode">
                        <a href="game/home/{{ '10+0' }}">
                            <h1>10 + 0</h1>
                            <h4>Rapid</h4>
                        </a>
                    </div>
                </div>
                <div class="game-mode-container">
                    <div class="game-mode">
                        <a href="game/home/{{ '10+5' }}">
                            <h1>10 + 5</h1>
                            <h4>Classical</h4>
                        </a>
                    </div>
                </div>
                <div class="game-mode-container">
                    <div class="game-mode">
                        <a href="game/home/{{ '15+15' }}">
                            <h1>15 + 15</h1>
                            <h4>Classical</h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>
    </div>
</div>
</div>

@endsection
