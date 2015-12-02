<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User as User;
use DB;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $data = DB::select(
                    DB::raw('select 
                            recommended_songs.song_id as song_id,
                            recommended_songs.recommender_id as user_id,
                            users.username as username,
                            tracks.name as track_name, tracks.id as track_id,
                            artists.name as artist_name, artists.id as artist_id,
                            albums.name as album_name, albums.id as album_id,
                            tracks.created_at as created_at,
                            recommended_songs.created_at as recommended_date
                            from recommended_songs 
                            left join tracks on recommended_songs.song_id = tracks.id
                            left join users on recommended_songs.recommender_id = users.id
                            left join artist_has_songs on tracks.id = artist_has_songs.track_id 
                            left join artists on artist_has_songs.artist_id = artists.id
                            left join album_has_songs on tracks.id = album_has_songs.track_id
                            left join albums on albums.id = album_has_songs.album_id'));
    
        //dd($data);

        return view('user.index', ['data' => $data]);
    }

    public function showProfile()
    {
        $path_entry = DB::select(DB::raw('select profile_picture_path 
                                         from users where id='.\Auth::user()->id));
        
        $path = explode("/", $path_entry[0]->profile_picture_path)  //split by '/'
                [sizeof(explode("/", $path_entry[0]->profile_picture_path))-1]; //get value at last element

        //dd($path);

        return view('user.profile')->with(['path'=>$path]);
    }


    public function editProfile()
    {
        $path_entry = DB::select(DB::raw('select profile_picture_path 
                                         from users where id='.\Auth::user()->id));
        
        $path = explode("/", $path_entry[0]->profile_picture_path)  //split by '/'
                [sizeof(explode("/", $path_entry[0]->profile_picture_path))-1]; //get value at last element

        //dd($path);

        return view('user.editProfile')->with(['path'=>$path]);
    }


    public function editPassword()
    {
        return view('user.editPassword');
    }

    public function showPending()
    {
        if(\Auth::user()->role==="admin"){
            $users = DB::table('users')
                        ->where('status', 'pending')
                        ->get();

            return view('user.pending',['users' => $users]);
        }
        else return view('errors.403');
    }

    public function showApproved(){
        
        if(\Auth::user()->role==="admin"){
            $users = DB::table('users')
                        ->where('status', 'approved')
                        ->get();
                
            $picks = DB::table('users')
                        ->select('date_approved')
                        ->where('status','approved')
                        ->groupBy('date_approved')
                        ->get();

            return view('user.approved',
                        ['users' => $users,'dates'=>$picks]);        
        }
        else return view('errors.403');
    }


    public function showApprovedOn(Request $request){
        if(\Auth::user()->role==="admin"){    

            if( $request->get('date') === "" ){
                return back()->withInput();
            }

            $users = DB::table('users')
                        ->where('status', 'approved')
                        ->where('date_approved',$request->get('date'))
                        ->get();

            return view('user.approvedByDate',
                        ['users' => $users, 'date'=>$request->get('date')]);
        }
        else return view('errors.403');

    }   

   public function approveUser($id){
        if(\Auth::user()->role==="admin"){        
            /*i-uupdate na user*/
            $user = DB::table('users')
                        ->where('id', $id)
                        ->update([  'status' => 'approved',
                                    'date_approved'=> date('Y-m-d'),
                                    'approver_id' => \Auth::user()->id]);
            /* list of all the users that are pending */
            $users = DB::table('users')->where('status', 'pending')->get();

            flash()->overlay('User approved!','Success!');
            return redirect()->back();
            //return view('user.pending',['users'=>$users]);
        }
        else return view('errors.403');
    }


    public function deactivateUser($id){
        if(\Auth::user()->role==="admin"){        
            $user = DB::table('users')
                        ->where('id', $id)
                        ->update(['status' => 'pending',
                                  'approver_id' => DB::raw('null')]);
            //dd($user);
            $users = DB::table('users')
                        ->where('status', 'approved')
            //->where('date_approved',$date)
                        ->whereNull('date_approved')
                        ->get();
          
            //return back()->withInput();
            flash()->overlay('User deactivated!','Success!');
            return redirect()->back();
            //return view('user.deactivated');
        }
        else return view('errors.403');
    }


    public function updateProfile(Request $request){
        
        //id ni nakalogin na user
        $user = \Auth::user()->id;

        $user = DB::table('users')
                    ->where('id', $user)
                    ->update([  'first_name' => $request->get('first_name'),
                                'last_name' => $request->get('last_name'),
                                'email' => $request->get('email'),
                                'username' => $request->get('username'),
                                'password' => bcrypt($request->get('password'))]);

        flash()->overlay('Profile updated!','Success!');
        return back()->withInput();
        //return view('user.profile');
        
    }

    public function updatePassword(Requests\UpdatePasswordRequest $request){
        
        //id ni nakalogin na user
        $userID = \Auth::user()->id;

        $hashed_old_password = DB::table('users')
                    ->where('id', $userID)
                    ->value('password');

        //valid na yung ipampapalit na password, 
        //checheck nalang kung yung old password nya ay tama
        if( \Hash::check($request->get('old_password'), $hashed_old_password)){
            //old password exists!
            $user = DB::table('users')
                    ->where('id', $userID)
                    ->update([ 'password' => bcrypt($request->get('password'))]);

            flash()->overlay('Password changed!','Success!');
            return redirect()->back();
            //return view('user.profile');
        }else{
            return back()->withInput();
        }       
    }

    public function updateProfilePicture(Requests\UpdateProfilePictureRequest $request){

        flash()->overlay('Profile picture updated.','Success!');

        //id ni nakalogin na user
        $userID = \Auth::user()->id;
        
        DB::table('users')
            ->where('id', $userID);

        //https://www.codetutorial.io/laravel-5-file-upload-storage-download/
            $fileName = $userID.'.'.
                        $request->file('image')->getClientOriginalExtension();
            $path = base_path().'/public/profile_pictures/'.$fileName;

            $request->file('image')
                    ->move(base_path().'/public/profile_pictures/',$fileName); 

        //dd($path);

        $path = '/public/profile_pictures/'.explode("/", $path)  //split by '/'
                [sizeof(explode("/", $path))-1]; //get value at last element

        //dd($path);

        DB::table('users')
            ->where('id', $userID)
            ->update(['profile_picture_path' =>  $path]);

        return redirect()->back()->withInput();

    }
}
