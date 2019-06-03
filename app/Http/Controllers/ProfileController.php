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

        $requests = DB::table('requests')->where('to_id',$user[0]->id)->get();
        $frequests=array((object)$user[0]);
        
        foreach($requests as $req){
            $freq=DB::table('users')->where('id',$req->from_id)->get();
            array_push($frequests,(object)$freq[0]);
            //$frequests=$freq;
            //$i=$i+1;
        }
        //dd($user->name);
        $user2 = DB::table('users')->where('id',auth()->user()->id)->get();
        $af1=DB::table('friends')->where('id_friend1',auth()->user()->id)->where('id_friend2',$user[0]->id)->get();
        $af2=DB::table('friends')->where('id_friend2',auth()->user()->id)->where('id_friend1',$user[0]->id)->get();
        
        $numfriends = DB::table('friends')->where('id_friend1',$user[0]->id)->orWhere('id_friend2',$user[0]->id)->count();
        if(count($af1)==0&&count($af2)==0){
            return view('auth.profile',['user'=>$user,'requests'=>$requests,'frequests'=>$frequests,'are_friends'=>'no','numfriends'=>$numfriends]);
        }
    return view('auth.profile',['user'=>$user,'requests'=>$requests,'frequests'=>$frequests,'are_friends'=>'yes','numfriends'=>$numfriends]);

    }
    public function show(Request $request)
    {
        $id = $request->route()->parameters();
        //dd($id);
        $user = DB::table('users')->where('id',$id)->get();
        $requests = DB::table('requests')->where('to_id',$request->id)->get();
        
        $frequests=$user;
        foreach($requests as $req){
            $freq=DB::table('users')->where('id',$req->from_id)->get();
            $frequests+=$freq;
        }
        //dd($user->name);
        //$user1 = DB::table('users')->where('id',$id)->get();
        $user2 = DB::table('users')->where('id',auth()->user()->id)->get();
        $af1=DB::table('friends')->where('id_friend1',auth()->user()->id)->where('id_friend2',$user[0]->id)->get();
        $af2=DB::table('friends')->where('id_friend2',auth()->user()->id)->where('id_friend1',$user[0]->id)->get();
        $numfriends = DB::table('friends')->where('id_friend1',$user[0]->id)->orWhere('id_friend2',$user[0]->id)->count();
        if(count($af1)==0&&count($af2)==0){
            return view('auth.profile',['user'=>$user,'requests'=>$requests,'frequests'=>$frequests,'are_friends'=>'no','numfriends'=>$numfriends]);
        }
    return view('auth.profile',['user'=>$user,'requests'=>$requests,'frequests'=>$frequests,'are_friends'=>'yes','numfriends'=>$numfriends]);

    }
    public function add(Request $request){
       // dd('d');
        $user1 = DB::table('users')->where('id',$request->userid)->get();
        $user2 = DB::table('users')->where('id',auth()->user()->id)->get();
        $requestt = DB::table('requests')->where('to_id',$request->userid)->where('from_id',auth()->user()->id)->get();
        
        if (count($requestt)==0){
        DB::table('requests')->insert([
            ['to_id' => $request->userid, 'from_id' => auth()->user()->id],
        ]);
        }
        //////////// code za return
        $user=$user1;
        $requests = DB::table('requests')->where('to_id',$request->id)->get();
        $frequests[]=$user[0];
        foreach($requests as $req){
            $freq=DB::table('users')->where('id',$req->from_id)->get();
            array_push($frequests,(object)$freq[0]);

        }
        $user2 = DB::table('users')->where('id',auth()->user()->id)->get();
        $af1=DB::table('friends')->where('id_friend1',auth()->user()->id)->where('id_friend2',$user[0]->id)->get();
        $af2=DB::table('friends')->where('id_friend2',auth()->user()->id)->where('id_friend1',$user[0]->id)->get();
        $numfriends = DB::table('friends')->where('id_friend1',$user[0]->id)->orWhere('id_friend2',$user[0]->id)->count();
        if(count($af1)==0&&count($af2)==0){
            return view('auth.profile',['user'=>$user,'requests'=>$requests,'frequests'=>$frequests,'are_friends'=>'no','numfriends'=>$numfriends]);
        }
    return view('auth.profile',['user'=>$user,'requests'=>$requests,'frequests'=>$frequests,'are_friends'=>'yes','numfriends'=>$numfriends]);

    }
    public function report(Request $request){
        $user = DB::table('users')->where('id',$request->userid)->get();
        //dd($user->name);
        return view('auth.report',['user'=>$user]);
        
    }
    
    public function reported(Request $request){
        $user = DB::table('users')->where('name',$request->name)->get();
        //dd($user->name)
        //dd($request->reason);
        DB::table('report')->insert([
            ['message' => $request->reason, 'idReporter' => auth()->user()->id,'idReported' => $user[0]->id],
        ]);
        //////////// code za return
        $requests = DB::table('requests')->where('to_id',$request->id)->get();
        $frequests[]=$user[0];
        foreach($requests as $req){
            $freq=DB::table('users')->where('id',$req->from_id)->get();
            array_push($frequests,(object)$freq[0]);
        }
        $user2 = DB::table('users')->where('id',auth()->user()->id)->get();
        $af1=DB::table('friends')->where('id_friend1',auth()->user()->id)->where('id_friend2',$user[0]->id)->get();
        $af2=DB::table('friends')->where('id_friend2',auth()->user()->id)->where('id_friend1',$user[0]->id)->get();
        $numfriends = DB::table('friends')->where('id_friend1',$user[0]->id)->orWhere('id_friend2',$user[0]->id)->count();
        if(count($af1)==0&&count($af2)==0){
            return view('auth.profile',['user'=>$user,'requests'=>$requests,'frequests'=>$frequests,'are_friends'=>'no','numfriends'=>$numfriends]);
        }
    return view('auth.profile',['user'=>$user,'requests'=>$requests,'frequests'=>$frequests,'are_friends'=>'yes','numfriends'=>$numfriends]);


    }

    public function unfriend(Request $request){
        //dd('unfriend');
    }
    public function accept(Request $request){
        $userid= Auth::user()->id;
        

        $id = $request->route()->parameters();
        $user1 = DB::table('users')->where('id',$id)->get();
        $user2 = DB::table('users')->where('id',auth()->user()->id)->get();
        //dd($user2[0]->name);
         DB::table('friends')->insert([
             ['id_friend1' => $user1[0]->id, 'id_friend2' => auth()->user()->id],
         ]);
         
         (DB::table('requests')->where('to_id',auth()->user()->id)->where('from_id',$user1[0]->id))->delete();
        (DB::table('requests')->where('from_id',auth()->user()->id)->where('to_id',$user1[0]->id))->delete();

                 //////////// code za return
        $requests = DB::table('requests')->where('to_id',auth()->user()->id)->get();
        $user = $user2;
        $frequests[]=$user[0];
        foreach($requests as $req){
            $freq=DB::table('users')->where('id',$req->from_id)->get();
            array_push($frequests,(object)$freq[0]);
        }
 
        $af1=DB::table('friends')->where('id_friend1',auth()->user()->id)->where('id_friend2',$user1[0]->id)->get();
        $af2=DB::table('friends')->where('id_friend2',auth()->user()->id)->where('id_friend1',$user1[0]->id)->get();

        $numfriends = DB::table('friends')->where('id_friend1',$user[0]->id)->orWhere('id_friend2',$user[0]->id)->count();
        if(count($af1)==0&&count($af2)==0){
            return redirect()->route('profile',['user'=>$user,'requests'=>$requests,'frequests'=>$frequests,'are_friends'=>'no','numfriends'=>$numfriends]);
        }
    return redirect()->route('profile',['user'=>$user,'requests'=>$requests,'frequests'=>$frequests,'are_friends'=>'yes','numfriends'=>$numfriends]);



    }
    public function decline (Request $request){

        $id = $request->route()->parameters();
        $user1 = DB::table('users')->where('id',$id)->get();
        $user2 = DB::table('users')->where('id',auth()->user()->id)->get();

         DB::table('requests')->where('to_id',auth()->user()->id)->where('from_id',$user1[0]->id)->delete();

         $requests = DB::table('requests')->where('to_id',$request->id)->get();
         $user=$user2;
        $frequests=$user;
        foreach($requests as $req){
            $freq=DB::table('users')->where('id',$req->from_id)->get();
            array_push($frequests,(object)$freq[0]);
        }
        $user2 = DB::table('users')->where('id',auth()->user()->id)->get();
        $af1=DB::table('friends')->where('id_friend1',auth()->user()->id)->where('id_friend2',$user[0]->id)->get();
        $af2=DB::table('friends')->where('id_friend2',auth()->user()->id)->where('id_friend1',$user[0]->id)->get();
        $numfriends = DB::table('friends')->where('id_friend1',$user[0]->id)->orWhere('id_friend2',$user[0]->id)->count();
        if(count($af1)==0&&count($af2)==0){
            return view('auth.profile',['user'=>$user,'requests'=>$requests,'frequests'=>$frequests,'are_friends'=>'no','numfriends'=>$numfriends]);
        }
    return view('auth.profile',['user'=>$user,'requests'=>$requests,'frequests'=>$frequests,'are_friends'=>'yes','numfriends'=>$numfriends]);
        


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
