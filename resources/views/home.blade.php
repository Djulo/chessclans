
@extends('layouts.app')
<script type="text/javascript" src="{{ URL::asset('js\setData.js') }}"></script>
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
<<<<<<< HEAD
                    <form method="POST" action="{{ route('game') }}">
                        @csrf
                        <div id=startGame>
                            <button type="submit" class="btn btn-primary">Start game</button>
                            <a type="button" href="/analyse" class="btn btn-primary">Analyse game</a>
                        </div>
                    <form>

=======
                    <div id=startGame>
                    <a type="button" href="/game" class="btn btn-primary">Start game</a>
                    <a type="button" href="/analyse" class="btn btn-primary">Analyse game</a>
                    <input type="text" placeholder="Search users..">    
                    </div>
                    
>>>>>>> 4bab1c0700b622f66c93ec2d414ac984a11adb7b
                <!-- <div id="board" class="container board" style="width: 400px"></div> -->
              
                <br>
            
                </div>
                
            </div>
        </div>
    </div>
    <section id="showcase">
       
       <div class="showcase-content">
           <div class="left-content">
               <h1>ChessClans</h1>
               <h2 class="alert-info" >#users:</h2>
               <table class="table table-sm table-hover table-striped">
                @foreach ($users as $user)
               
                    <tr>
                        <td>
                            @if(auth()->user()->id!=$user->id)
                             <a href="profile/{{ $user->id }}" style="text-decoration:none; color:black"><?php echo $user->name;?></a>
                            @endif
                             <td>
                    </tr>
                
                @endforeach
                </table>
           </div>
           <div class="main-area-container">
               <div class="main-area">
                   <div class="game-mode-container">
                       <div class="game-mode">
                           <a href="/game" onclick="proba(1,5)">
                               <h1>1 + 0</h1>
                               <h4>Bullet</h4>
                             
                           </a>
                       </div>
                   </div>
                   <div class="game-mode-container">
                       <div class="game-mode">
                           <a href="game.html">
                               <h1>2 + 1</h1>
                               <h4>Bullet</h4>
                           </a>
                       </div>
                   </div>
                   <div class="game-mode-container">
                       <div class="game-mode">
                           <a href="game.html">
                               <h1>3 + 0</h1>
                               <h4>Blitz</h4>
                           </a>    
                       </div>
                   </div>
                   <div class="game-mode-container">
                       <div class="game-mode">
                           <a href="game.html">
                               <h1>3 + 2</h1>
                               <h4>Blitz</h4>
                           </a>
                       </div>
                   </div>
                   <div class="game-mode-container">
                       <div class="game-mode">
                           <a href="game.html">
                               <h1>5 + 0</h1>
                               <h4>Blitz</h4>
                           </a>
                       </div>
                   </div>
                   <div class="game-mode-container">
                       <div class="game-mode">
                           <a href="game.html">
                               <h1>5 + 3</h1>
                               <h4>Blitz</h4>
                           </a>
                       </div>
                   </div>
                   <div class="game-mode-container">
                       <div class="game-mode">
                           <a href="game.html">
                               <h1>10 + 0</h1>
                               <h4>Rapid</h4>
                           </a>
                       </div>
                   </div>
                   <div class="game-mode-container">
                       <div class="game-mode">
                           <a href="game.html">
                               <h1>15 + 15</h1>
                               <h4>Classical</h4>
                           </a>
                       </div>
                   </div>
                   <div class="game-mode-container">
                       <div class="game-mode">
                           <a href="game.html"><h4>Custom</h4></a>
                       </div>
                   </div>  
               </div>
           </div>
           <div class="right-container">
               <div class="right-content">
                   <a href="game.html">dugme 1</a>
                   <a href="game.html">dugme 2</a>
                   <a href="game.html">dugme 3</a>
               </div>
           </div>
       </div>
  
</section>
</div>

@endsection
