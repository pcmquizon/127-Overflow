<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Playlist as Playlist;
use App\PlaylistHasSong as PlaylistHasSong;
use DB;

class PlaylistsController extends Controller
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


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(\Auth::user()->role==='user'){
            $playlists = DB::table('playlists')
                    ->where('creator_id', \Auth::user()->id)
                    ->get();
         
        }
        else{
            $playlists = DB::table('playlists')
                            ->get();   
        }

        return view('playlist.index',
                    ['playlists' => $playlists]);
        }


    public function editList()
    {

        if(\Auth::user()->role==='user'){
            $playlists = DB::table('playlists')
                    ->where('creator_id', \Auth::user()->id)
                    ->get();         
        }
        else{
            $playlists = DB::table('playlists')
                            ->get();   
        }
            
        return view('playlist.list',
                    ['playlists' => $playlists]);                
    }

    public function removeList()
    {
        if(\Auth::user()->role==='user'){
            $playlists = DB::table('playlists')
                    ->where('creator_id', \Auth::user()->id)
                    ->get();         
        }
        else{
            $playlists = DB::table('playlists')
                            ->get();   
        }

        //dd($playlists);
            
        return view('playlist.remove',
                    ['playlists' => $playlists]);                
    }

    public function add($id)
    {
        $track_data = DB::select(
                        DB::raw('select tracks.name as track_name, tracks.id as track_id,
                                        artists.name as artist_name, artists.id as artist_id,
                                        albums.name as album_name, albums.id as album_id,
                                        tracks.created_at as created_at 
                                        from tracks 
                                        left join artist_has_songs on tracks.id = artist_has_songs.track_id 
                                        left join artists on artist_has_songs.artist_id = artists.id
                                        left join album_has_songs on tracks.id = album_has_songs.track_id
                                        left join albums on albums.id = album_has_songs.album_id'));
         

        if(\Auth::user()->role==='user'){
            $playlists = DB::table('playlists')
                            ->where('creator_id', \Auth::user()->id)
                            ->get();
                 
        }
        else{
            $playlists = DB::table('playlists')
                            ->get();   
        }

        $playlist_to_edit = DB::table('playlists')
                                ->where('id', $id)
                                ->first();

        //dd($playlist_to_edit->id);

        return view('playlist.add',
                    ['track_data' => $track_data, 
                     'playlists' => $playlists,
                     'playlist_to_edit' => $playlist_to_edit]);                
    }

    public function addMelodyTo($playlist_id, $track_id)
    {

        $playlistHasSong = new PlaylistHasSong(array(
                            'playlist_id' => (int)$playlist_id,
                            'track_id' => (int)$track_id));

        $playlistHasSong->save();
        flash()->overlay('Melody added to playlist!','Success!');

        //dd($track_id);
        //dd($playlist_id);
        //dd($playlistHasSong);

        return redirect('/playlist/'.$playlist_id.'/details');
        return redirect()->back();
    }


    public function show()
    {
        if(\Auth::user()->role==='user'){
            $playlists = DB::table('playlists')
                    ->where('creator_id', \Auth::user()->id)
                    ->get();
         
        }
        else{
            $playlists = DB::table('playlists')
                            ->get();   
        }

        return view('playlist.index',
                    ['playlists' => $playlists]);
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('playlist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\AddPlaylistRequest $request)
    {
        //dd(\Auth::user()->id);

        $playlist = new Playlist(array(
                                'name' => $request->get('name'),
                                'creator_id' => \Auth::user()->id));

        $playlist->save();
        flash()->overlay('Playlist added!','Success!');

        $playlists = DB::table('playlists')
                        ->where('creator_id', \Auth::user()->id)
                        ->get();

        return redirect('/playlist/view')->with(['playlists' => $playlists]);

        // return view('playlist.index',
        //             ['playlists' => $playlists]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $playlist = DB::table('playlists')
                    ->where('id', $id)
                    ->first();

        return view('playlist.edit',
                    ['playlist' => $playlist]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdatePlaylistRequest $request, $id)
    {
        DB::table('playlists')
                ->where('id',$id)
                ->update(['name' =>  $request->get('name')]);
    
        $playlist = DB::table('playlists')
                    ->where('id', $id)
                    ->first();

        //put flash message //
            flash()->overlay('Playlist updated!','Success!');
            return redirect()->back()->withInput();

            // return view('playlist.edit',
            //             ['playlist' => $playlist]);
    }

    public function details($id)
    {

        $playlist_data = DB::select(
            DB::raw('select playlists.name as playlist_name,
                            playlists.id as playlist_id,
                            tracks.name as track_name,
                            tracks.id as path                  
                            from playlists
                            left join playlist_has_songs on playlist_has_songs.playlist_id = playlists.id
                            left join tracks on playlist_has_songs.track_id = tracks.id
                            where playlists.id='.$id));
        
        //dd($playlist_data); 
        //dd($playlist_data[0]->path);

        if($playlist_data){
            //return view('playlist.details',
            return view('playlist.details2',
                        ['playlist_data' => $playlist_data[0], 'tracks' => $playlist_data]);
        }
        else{
            return redirect()->back();
        }
    }

    public function remove($id){

        //dd($id);

        $playlist_data = DB::select(
                            DB::raw('select tracks.name as track_name, tracks.id as track_id,
                                            playlists.id as playlist_id
                                            from playlists 
                                            left join playlist_has_songs on playlist_has_songs.playlist_id = playlists.id
                                            left join tracks on tracks.id = playlist_has_songs.track_id
                                            where playlists.id='.(int)$id));
         
        //dd($playlist_data);

        $playlist_to_edit = DB::table('playlists')
                        ->where('id', $id)
                        ->get();

        //dd($playlist_to_edit);

        if($playlist_data){
            return view('playlist.removeMelodies',
                        ['tracks' => $playlist_data,
                         'playlist_to_edit' => $playlist_to_edit[0]]);
        }
        else{
            return redirect()->back();
        }

    }


    public function removeMelodyFrom(Request $request){

        //dd($request->get('track_id'));
        $track_id = (int)$request->get('track_id');

        //dd($request->get('playlist_id'));
        $playlist_id = (int)$request->get('playlist_id');

        $deleted = DB::select(DB::raw('delete from 
                                playlist_has_songs
                                where track_id = '.$track_id.' and
                                      playlist_id = '.$playlist_id.'
                                returning *'));

        if($deleted){
            flash()->overlay('Melody deleted from playlist!','Success!');
            return redirect()->back();
        }
        else{
            flash()->overlay('Melody not deleted from playlist!','Failed!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //$playlist= DB::select(DB::raw("select * from playlists where id = $id"));
        //echo $id;
        //dd($id);
        //dd($request->delete);
        if(\Auth::user()->role==='admin' || $playlist[0]->creator_id === \Auth::user()->id){
           // echo $id;
        
            // DB::select(DB::raw("delete from 
            //                         playlist_has_songs
            //                         where playlist_id = $id"));

            DB::select(DB::raw("delete from playlists where id = $id"));

            flash()->overlay('Playlist deleted','Success!');
            
            return redirect('/playlist/view');
        }
    }
}
