<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\UploadTrait;
use App\User;
use App\Admin;
use DB;
use App\Game;
use Auth;
use App\Friend;
/**autor Ognjen Bogicevic 0571/2016
 * autor Stefan Pusica 0088/2016
 * ProfileController je klasa koja nasledjuje Controller klasu laravela
 * odgovorna je za sve funkcije koje se mogu izvrsavati na profilu korisnika kao sto su add friend, report user, 
 * accept request, decline request i slanje parametara stranici koje ona treba da sadrzi
 */
class ProfileController extends Controller
{
    use UploadTrait;

    public function __construct()
    {
        $this->middleware('auth:web,admin');
    }
    
    /**
     * indeks funkcija se poziva svaki put kada je neophodan poziv profila korisnika
     * Request $request je laravelov ragument preko kojeg se obracamo parametrima forme ili parametrima rute
     * @param Request $request
     * @return void
     */
    public function index(Request $request)
    {
        //dd($userid= $request->session()->get('profileID'));
        //$userid= Auth::user()->id;
        $userid= $request->session()->get('profileID');
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
        //$games[]=null;
       // array_push($games,DB::table('games')->where('black',$user[0]->id)->orWhere('white',$user[0]->id)->get());
        $games = (DB::table('games')->where('black',$user[0]->id)->orWhere('white',$user[0]->id))->where('white','<>',null)->where('black','<>',null)->get();
        $whiteUsers=[];
        $blackUsers=[];
        // $indexes=[];
        // $i=0;
        foreach($games as $game){
            //dd($u->name);
            $u=User::find(Game::find($game->id)->white);
            //dd($u->name);
           //    array_push($indexes,$i);
            array_push($whiteUsers,(object)$u);
            $u=User::find(Game::find($game->id)->black);
            array_push($blackUsers,(object)$u);
        }
        //dd($games);
        if(count($af1)==0&&count($af2)==0){
            return view('auth.profile',['whiteUsers'=>$whiteUsers ,'blackUsers'=>$blackUsers,'user'=>$user,'requests'=>$requests,'frequests'=>$frequests,'are_friends'=>'no','numfriends'=>$numfriends,'games'=>$games]);
        }
        return view('auth.profile',['whiteUsers'=>$whiteUsers ,'blackUsers'=>$blackUsers,'user'=>$user,'requests'=>$requests,'frequests'=>$frequests,'are_friends'=>'yes','numfriends'=>$numfriends,'games'=>$games]);

    }
    
    /**
     * funkcija koja zove indeks funkciju i salje mu id trenutno ulogovanog usera
     *
     * @param Request $request
     * @return void
     */
    public function showIndex(Request $request){
       $request->session()->put('profileID',auth()->user()->id);
       return redirect()->route('profile');

    }
   
    /**
     * funkcija koja poziva index i salje mu id usera ciji profil zelimo da vidimo
     *
     * @param Request $request
     * @return void
     */
    public function show(Request $request)
    {
        $id = $request->route()->parameters();
        //dd($id);
        $some='myprofile';
        if($id==["user" => "myprofile" ]){return $this->showIndex($request);}
        //dd(["user" => "myprofile" ]);
        // $request->session()->put('profileID',auth()->user()->id);
        $request->session()->put('profileID',$id);
        return redirect()->route('profile');


    }

   
    /**
     * funkcija koja salje zahtev za prijateljstvo
     * korisniku sa odabranim id-jem
     * @param Request $request
     * @return void
     */
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
        
  
        return redirect()->back();

    }
   
   /**
    * Funkcija koja pociva stranicu report.blade.php koja ima formu za reportovanje
    *
    * @param Request $request
    * @return void
    */
    public function report(Request $request){
        $user = DB::table('users')->where('id',$request->userid)->get();
        //dd($user->name);
        return view('auth.report',['user'=>$user,'bug'=>'no']);

    }
    /**
     * report funkcija se poziva kada se potvrdi report forma, funkcija obradi podatke, 
     * ubaci odgovarajuce redove u bazu i te redove ce kasnije admin izlistati
     * 
     */

     /**
    * report funkcija se poziva kada se potvrdi report forma, funkcija obradi podatke, 
     * ubaci odgovarajuce redove u bazu i te redove ce kasnije admin izlistati
     *       *
      * @param Request $request
      * @return void
      */
    public function reported(Request $request){
        $user = DB::table('users')->where('name',$request->name)->get();

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
        $games = DB::table('games')->where('black',$user[0]->id)->orWhere('white',$user[0]->id)->get();
        $whiteUsers=[];
        $blackUsers=[];
        foreach($games as $game){
            $u=User::find(Game::find($game->id)->white);
            array_push($whiteUsers,(object)$u);
            $u=User::find(Game::find($game->id)->black);
            array_push($blackUsers,(object)$u);
        }

        if(count($af1)==0&&count($af2)==0){
            return redirect()->route('profile',['whiteUsers'=>$whiteUsers ,'blackUsers'=>$blackUsers,'user'=>$user,'requests'=>$requests,'frequests'=>$frequests,'are_friends'=>'no','numfriends'=>$numfriends,'games'=>$games]);
        }
        return redirect()->route('profile',['whiteUsers'=>$whiteUsers ,'blackUsers'=>$blackUsers,'user'=>$user,'requests'=>$requests,'frequests'=>$frequests,'are_friends'=>'yes','numfriends'=>$numfriends,'games'=>$games]);


    }
    
    /**
     * funkcija brise iz baze prijate
     *
     * @param Request $request
     * @return void
     */
    public function unfriend(Request $request){
        $userid= Auth::user()->id;
        $id = $request->userid;
        $user1 = DB::table('users')->where('id',$id)->get();
        $user2 = DB::table('users')->where('id',auth()->user()->id)->get();
        //dd($user2[0]->name);
         (DB::table('friends')->where('id_friend1',auth()->user()->id)->where('id_friend2',$user1[0]->id))->delete();
         (DB::table('friends')->where('id_friend2',auth()->user()->id)->where('id_friend1',$user1[0]->id))->delete();

        return redirect()->back();

    }
    
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     * 
     * funkcija koja prihvata zahtev za prijateljstvo i to prijateljstvo dodaje u bazu podataka
     */
    public function accept(Request $request){
        $userid= Auth::user()->id;


        $id = $request->route()->parameters();
        $user1 = DB::table('users')->where('id',$id)->get();
        $user2 = DB::table('users')->where('id',auth()->user()->id)->get();
        //dd($user2[0]->name);
         $check=DB::table('friends')->where('id_friend1',$id)->where('id_friend2',auth()->user()->id)->first();
         $check1=DB::table('friends')->where('id_friend2',$id)->where('id_friend1',auth()->user()->id)->first();
         if($check==null&&$check1==null)
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
        $games = DB::table('games')->where('black',$user[0]->id)->orWhere('white',$user[0]->id)->get();
        $whiteUsers=[];
        $blackUsers=[];
        foreach($games as $game){
            $u=User::find(Game::find($game->id)->white);
            array_push($whiteUsers,(object)$u);
            $u=User::find(Game::find($game->id)->black);
            array_push($blackUsers,(object)$u);
        }

        if(count($af1)==0&&count($af2)==0){
            return redirect()->back()->with(['whiteUsers'=>$whiteUsers ,'blackUsers'=>$blackUsers,'user'=>$user,'requests'=>$requests,'frequests'=>$frequests,'are_friends'=>'no','numfriends'=>$numfriends,'games'=>$games]);
        }
        return redirect()->back()->with(['whiteUsers'=>$whiteUsers ,'blackUsers'=>$blackUsers,'user'=>$user,'requests'=>$requests,'frequests'=>$frequests,'are_friends'=>'yes','numfriends'=>$numfriends,'games'=>$games]);



    }
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     * funkcija odbija zahtev za prijateljstvo
     */
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
        $games = DB::table('games')->where('black',$user[0]->id)->orWhere('white',$user[0]->id)->get();
        $whiteUsers=[];
        $blackUsers=[];
        foreach($games as $game){
            $u=User::find(Game::find($game->id)->white);
            array_push($whiteUsers,(object)$u);
            $u=User::find(Game::find($game->id)->black);
            array_push($blackUsers,(object)$u);
        }

        if(count($af1)==0&&count($af2)==0){
            return redirect()->back()->with('profile',['whiteUsers'=>$whiteUsers ,'blackUsers'=>$blackUsers,'user'=>$user,'requests'=>$requests,'frequests'=>$frequests,'are_friends'=>'no','numfriends'=>$numfriends,'games'=>$games]);
        }
        return redirect()->back()->with('profile',['whiteUsers'=>$whiteUsers ,'blackUsers'=>$blackUsers,'user'=>$user,'requests'=>$requests,'frequests'=>$frequests,'are_friends'=>'yes','numfriends'=>$numfriends,'games'=>$games]);


    }
    /**
     * Funkcija apdejtuje odabranu profilnu fotografiju
     *
     * @param Request $request
     * @return void
     */
    public function updatePicture(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);



        //dd('radi');


        // Get current user
        if($request->has('country')&&$request->country!='Choose'){
            $user->country=$request->country;
        }
        $user->save();
        if($request->has('bio')&&$request->bio!=""){
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
