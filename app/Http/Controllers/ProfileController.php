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

        return view('auth.profile',['user'=>$user]);

    }
   
    public function updatePicture(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        //dd('radi');
        if ($request->has('country')&&$request->country!=""){
            //dd($user);
            
            $user->country=$request->country;
        }
        if ($request->has('bio')&&$request->bio!=""){
            //dd($user);
            
            $user->bio=$request->bio;
        }
        
        // if ($request->has('email')&&$request->country!=""){
        //     //dd($user);
        //     if(DB::table('users')->select('name')->where('email',$request->email)==null){
        //     $request->validate([
        //         'email'     =>  'email|max:255'
        //     ]);
        //     $user->email=$request->email;
        
        // }
        
        
        // Get current user
        

         // Check if a profile image has been uploaded
         if ($request->has('profile_image')) {
            // Get image file
            $request->validate([
                'profile_image'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
    
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
