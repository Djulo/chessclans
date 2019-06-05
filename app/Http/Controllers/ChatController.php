<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }

    public function index()
    {
        return view('chat');
    }

    public function pusherAuth(Request $request){
        $key = '88f65651dff9fc1630aa';
        $secret = '9b62db46bf2756e3b6a8';
        $channel_name = $request->channel_name;
        $socket_id = $request->socket_id;
        $string_to_sign = $socket_id.':'.$channel_name;
        $signature = hash_hmac('sha256', $string_to_sign, $secret);
        return response()->json(['auth' => $key.':'.$signature]);
    }
}
