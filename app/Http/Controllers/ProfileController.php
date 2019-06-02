<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use App\User;
use DB;
use Auth;

class ProfileController extends Controller
{
    use UploadTrait;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //dd(Auth::user()->name);
        $userid= Auth::user()->id;
        $user = DB::table('users')->where('id',$userid)->get();

        return view('auth.profile',['user'=> $user]);
    }
    public function show(Request $request)
    {
        $id = $request->route()->parameters();
        //dd($id);
        $user = DB::table('users')->where('id',$id)->get();
        //dd($user->name);
        return view('auth.profile',['user'=>$user]);

    }

    public function report(Request $request){
        $user = DB::table('users')->where('id',$request->userid)->get();
        //dd($user->name);
        return view('auth.report',['user'=>$user]);
    }

    public function reported(Request $request){
        $user = DB::table('users')->where('name',$request->name)->get();
        //dd($user->name);
        //dd($request->reason);
        DB::table('report')->insert([
            ['message' => $request->reason, 'idReporter' => auth()->user()->id,'idReported' => $user[0]->id],
        ]);

        return view('auth.profile',['user'=>$user]);
    }


    public function add(){

        dd('radi');
        //nece
        //treba li return?
        return redirect('/home');

    }
    public function accept(){




    }

    public function updatePicture(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);



        //dd('radi');


        // Get current user
        if($request->has('country')){
            $user->country=$request->country;
        }
        $user->save();
        if($request->has('bio')){
            $user->bio=$request->bio;
            //dd($request->bio);
        }
        $user->save();

         // Check if a profile image has been uploaded

         if ($request->has('profile_image')&&$request->profile_image!=null) {
            $request->validate([
                'profile_image'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            // Get image file
            $image = $request->file('profile_image');
            // Make a image name based on user name and current timestamp
            $name = str_slug($request->input('name')).'_'.time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $user->profile_image = $filePath;
        }
        // Persist user record to database
        $user->save();

        // Return user back and show a flash message
        return redirect()->back()->with(['status' => 'Profile updated successfully.']);
    }
}
