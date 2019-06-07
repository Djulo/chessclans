<?php

/**
 * Message Controller, kontoler koji se koristi pri slanju poruka
 */

namespace App\Http\Controllers;

use App\Events\MessageCreated;
use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{

    /**
     * Prikaz stranice koja sadrzi json objekat svih poslatih poruka
     *
     * @return void
     */
    public function index()
    {
        $messages = Message::with(['user'])->get();

        return response()->json($messages);
    }


    /**
     * Kreiranje nove instance poruke, smestanje u bazu
     * Pozivanje eventa MessageCreated
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $message = $request->user()->messages()->create([
            'body' => $request->body
        ]);

        broadcast(new MessageCreated($message))
                ->toOthers();

        return response()->json($message);
    }
}
