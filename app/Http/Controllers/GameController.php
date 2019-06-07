<?php
/**
 * Kontroler za igru;
 * Autori: Nikola Kovacevic, Svetozar Micanovic
 */
namespace App\Http\Controllers;

use App\Events\JoinedSuccessfully;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Game;
use Illuminate\Support\Facades\Auth;
use App\Move;
use App\Events\GameCreated;
use App\Events\MoveCreated;
use App\Events\StatusUpdated;
use App\Events\GameEnded;

class GameController extends Controller
{

   
    public function index()
    {
        $this->middleware('auth');
        return redirect()->back();
    }
    /**
     * funkcija koja inicijalizuje partiju
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        if(Auth::user() == null) return redirect()->back();
        $vals = $request->route()->parameters()['value'];

        $game = Game::where('black', null)->where('format', $vals)->first();
        //dd($game);
        if ($game == null) {
            $game = new Game;
            $game->white = Auth::user()->id;
            $game->black = null;
            $game->format = $vals;
            $game->save();

            $game = Game::latest()->first();
            $initalMove = new Move;
            $initalMove->game_id = $game->id;
            $initalMove->fen = "rnbqkbnr/pppppppp/8/8/8/8/PPPPPPPP/RNBQKBNR w KQkq - 0 1";
            $initalMove->save();
            broadcast(new GameCreated($game));
        } else {
            if (Auth::user()->id == $game->white) return redirect()->route('game.show', $game->id);
            $game->black = Auth::user()->id;
            $game->save();

            $game = Game::find($game->id);
            // dd($game);
            broadcast(new JoinedSuccessfully($game))->toOthers();
        }

        return redirect()->route('game.show', $game->id);
    }
    /**
     * funkcija koja prikazuje igru
     *
     * @param [type] $id
     * @return void
     */
    public function show($id)
    {
        $game = Game::findOrFail($id);
        return view('game', [
            'game' => $game,
            'vals' => $game->format
        ]);
    }
/**
 * funkcija koja apdejtuje stanje nakon odigranog poteza
 *
 * @param Request $request
 * @return void
 */
    public function turn(Request $request)
    {
        $game = Game::findOrFail($request->id);
        $id = (Auth::user()->id === $game->white) ? 'w' : 'b';

        return response()->json($id);
    }
    
    /**
     * funkcija koja apdejutje stanje table
     *
     * @param Request $request
     * @return void
     */
    public function state(Request $request)
    {
        $fen = Move::where('game_id', $request->id)->latest()->first()->fen;
        return response()->json($fen);
    }

    /**
     * funkcija koja na kraju partije updajtuje podatke o partiji i igracima u bazi
     *
     * @param Request $request prima informaciju o tome ko je pobedio i koji je id igre
     * @return void
     */
    public function gameEnd(Request $request)
    {
        /*
        winner: 0->draw;
                1->white;
                2->black
        */
        // dd($request->gameId);
        $finishedGame = DB::table('games')->where('id', $request->gameId)->get();
        $game = Game::find($request->gameId);
        broadcast(new GameEnded($game))->toOthers();
        $whiteId = $finishedGame[0]->white;
        $blackId = $finishedGame[0]->black;
        $winner = $request->winner;


        // dd($whiteId);
        if ($winner == 1) {
            $winPlayer = DB::table('users')->where('id', $whiteId)->get();
            $lostPlayer = DB::table('users')->where('id', $blackId)->get();
            // dd($winPlayer);
            $winPlayerWins = $winPlayer[0]->wins;
            $winPlayerCC = $winPlayer[0]->CCpoints;
            $winPlayerWins = $winPlayerWins + 1;

            $lostPlayerLost = $lostPlayer[0]->loses;
            $lostPlayerCC = $lostPlayer[0]->CCpoints;
            $lostPlayerLost = $lostPlayerLost + 1;

            //pobede R1=R1+ abs(R2-R1)*0.03+10
            $R1= $winPlayerCC;
            $R2=$lostPlayerCC;

            $winPlayerCC=$R1+($R2-$R1)*0.03 +10;
            $lostPlayerCC=$R2+($R1-$R2)*0.03 -10;
            DB::table('users')->where('id', $winPlayer[0]->id)->
            update(['wins' => $winPlayerWins,'CCpoints'=>$winPlayerCC]);






            DB::table('users')->where('id', $lostPlayer[0]->id)->
            update(['loses' => $lostPlayerLost,'CCpoints'=>$lostPlayerCC]);


            //  dd(  $winPlayerWins);
        } else if ($winner == 2) {
            $winPlayer = DB::table('users')->where('id', $blackId)->get();
            $lostPlayer = DB::table('users')->where('id', $whiteId)->get();
            // dd($winPlayer);
            $winPlayerWins = $winPlayer[0]->wins;
            $winPlayerCC = $winPlayer[0]->CCpoints;
            $winPlayerWins = $winPlayerWins + 1;

            $lostPlayerLost = $lostPlayer[0]->loses;
            $lostPlayerCC = $lostPlayer[0]->CCpoints;
            $lostPlayerLost = $lostPlayerLost + 1;

            //pobede R1=R1+ abs(R2-R1)*0.03+10
            $R1= $winPlayerCC;
            $R2=$lostPlayerCC;

            $winPlayerCC=$R1+($R2-$R1)*0.03 +10;
            $lostPlayerCC=$R2+($R1-$R2)*0.03 -10;
            DB::table('users')->where('id', $winPlayer[0]->id)->
            update(['wins' => $winPlayerWins,'CCpoints'=>$winPlayerCC]);






            DB::table('users')->where('id', $lostPlayer[0]->id)->
            update(['loses' => $lostPlayerLost,'CCpoints'=>$lostPlayerCC]);
        } else if ($winner == 0) {

            $winPlayer = DB::table('users')->where('id', $blackId)->get();
            $lostPlayer = DB::table('users')->where('id', $whiteId)->get();
            // dd($winPlayer);
            $winPlayerWins = $winPlayer[0]->draws;
            $winPlayerCC = $winPlayer[0]->CCpoints;
            $winPlayerWins = $winPlayerWins + 1;

            $lostPlayerLost = $lostPlayer[0]->draws;
            $lostPlayerCC = $lostPlayer[0]->CCpoints;
            $lostPlayerLost = $lostPlayerLost + 1;

            //R1+(R2-R1)*0.03
            $R1= $winPlayerCC;
            $R2=$lostPlayerCC;

            $winPlayerCC=$R1+($R2-$R1)*0.03;
            $lostPlayerCC=$R2+($R1-$R2)*0.03;
            DB::table('users')->where('id', $winPlayer[0]->id)->
            update(['draws' => $winPlayerWins,'CCpoints'=>$winPlayerCC]);






            DB::table('users')->where('id', $lostPlayer[0]->id)->
            update(['draws' => $lostPlayerLost,'CCpoints'=>$lostPlayerCC]);

         }
         //update winner
         if($winner==1){
             $str="1-0";
         }

         if($winner==2){
            $str="0-1";
        }
        if($winner==0){
            $str="1/2-1/2";
        }
         DB::table('games')->where('id',  $request->gameId)->update(['winner' =>  $str]);

        //return redirect()->back();
        return response('ok',200);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function status(Request $request)
    {
        $game = Game::find($request->id);
        broadcast(new StatusUpdated($game, $request->status))->toOthers();

        return response('ok', 200);
    }
}
