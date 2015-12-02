<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Fileentry;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

use DB;

use App\Track as Track;
use App\Artist as Artist;
use App\ArtistHasSong as ArtistHasSong;
use App\AlbumsHasArtist as AlbumsHasArtist;
use App\AlbumHasSong as AlbumHasSong;
use App\RecommendedSong as RecommendedSong;
use App\Played as Played;

class TracksController extends Controller
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
    public function show()
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
         

        return view('track.index',
                    ['track_data' => $track_data]);

    }

    public function index()
    {

/*        $data = DB::select(
                    DB::raw("select 
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
                            left join albums on albums.id = album_has_songs.album_id"));
                            //order by recommended_songs.created_at desc)) //<-- hindi gumagana sa app, pero sa phpPgAdmin oo
    
        //dd($data);

        return view('user.index', ['data' => $data]);
*/

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
         

        return view('track.index',
                    ['track_data' => $track_data]);
    }


    public function editList()
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
         

        return view('track.list',
                    ['track_data' => $track_data]);
    }    


    public function removeList()
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
         

        return view('track.remove',
                    ['track_data' => $track_data]);
    }    


    public function create()
    {
        return view('track.create');                
    }

    public function remove()
    {
        $tracks = DB::table('tracks')
                    ->get();

        return view('track.delete',
                    ['tracks' => $tracks]);                
    }

    public function suggest()
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
         

        return view('track.recommend',
                    ['track_data' => $track_data]);

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\AddSongRequest $request)
    {

        /*
            cases:
            add track
                walang artist, walang album /
                may artist, walang album
                add lang talaga
        */

        //Start of Inserting a music 
        //Start here. 

            
            //dd($request->get('name'));

            
            //else{

                //dd(\Auth::user()->id);

                $track = new Track(array(
                            'name' => $request->get('name'),
                            'creator_id' => \Auth::user()->id));
                $track->save();
                flash()->overlay('Track uploaded.','Success!');

                //https://www.codetutorial.io/laravel-5-file-upload-storage-download/
                    $fileName = $track->id.'.'.
                                $request->file('image')->getClientOriginalExtension();
                    $path = base_path().'/public/tracks/'.$fileName;
                    $request->file('image')
                            ->move(base_path().'/public/tracks/',$fileName); 

                //dd($path);
                $path = '/public/tracks/'.explode("/", $path)  //split by '/'
                [sizeof(explode("/", $path))-1]; //get value at last element
                //dd($path);

                DB::table('tracks')
                    ->where('id', $track->id)
                    ->update(['path' =>  $path]);
                //song is now uploaded and has filePath


                //dd($request->get('artist_name'));
                //getting an artist
                $artist = DB::table('artists')
                            ->where('name',$request->get('artist_name'))
                            ->first();

                //dd($artist);

            //}
            
            if($artist){ //artist exists

                $artistHasSong = new ArtistHasSong(array(
                                    'artist_id' => $artist->id,
                                    'track_id' => $track->id));
                
                $artistHasSong->save();

                $album = DB::table('albums')
                            ->join('albums_has_artist', 'albums_has_artist.album_id', '=', 'albums.id')
                            ->select('albums_has_artist.*')
                            ->where('albums_has_artist.artist_id', '=', $artist->id)
                            ->where('albums.name', '=', $request->get('album_name'))
                            ->first();    

                /*
                    select * from albums_has_artist a 
                    inner join 
                        albums b on a.albumId = b.albumId 
                    where 
                        a.artist_id = $artist->id and 
                        b.name= $request->get('album_name')
                */

                //dd($album);

                if($album){ //track and album exist and artist exist
                    

                    $albumHasSong = new AlbumHasSong(array(
                                        'album_id'=>$album->id,
                                        'track_id'=>$track->id));
                    $albumHasSong->save();
                    
                    return redirect()->back();
                    // return view('track.create',
                    //             ['message'=>'Track Created']);
                }

                else{ //album does not exist but artist and track exists

                    // return redirect('/album/create')
                    //         ->with(['track_id' => $track->id, 'artist_name' => NULL,
                    //              'artist_id' => $artist->id, 'album_name' => $request->get('album_name')]);
                    
                    return view('album.create',
                                ['track_id' => $track->id,
                                 'artist_name' => NULL,
                                 'artist_id' => $artist->id,
                                 'album_name' => $request->get('album_name')]);
                }
            }
            else{ 
                //track exist now(); artist does not exist 
                //to do on artist store artists has song:
                //to do on album store album has artist and album has song

                //dd($request->get('artist_name'));

                if( $request->get('artist_name')!=NULL ){
                    // return redirect('/artist/create')
                    //         ->with(['artist_name' => $request->get('artist_name'), 'track_id' => $track->id,
                    //          'track_name' => $track->name, 'album_name' => $request->get('album_name')]);

                    return view('artist.create',
                            ['artist_name' => $request->get('artist_name'),
                             'track_id' => $track->id,
                             'track_name' => $track->name,
                             'album_name' => $request->get('album_name')]);
                }
                else{

                    // return redirect('/album/create')
                    //         ->with(['artist_name' => $request->get('artist_name'), 'artist_id' => NULL,
                    //          'track_id' => $track->id, 'album_name' => $request->get('album_name')]);

                    return view('album.create',
                            ['artist_name' => $request->get('artist_name'),
                             'artist_id' => NULL,
                             'track_id' => $track->id,
                             'album_name' => $request->get('album_name')]);
                }
                         
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $track = DB::select(
                        DB::raw('select tracks.name as track_name, tracks.id as track_id,
                                        artists.name as artist_name, artists.id as artist_id,
                                        albums.name as album_name, albums.id as album_id,
                                        tracks.created_at as created_at 
                                        from tracks 
                                        left join artist_has_songs on tracks.id = artist_has_songs.track_id 
                                        left join artists on artist_has_songs.artist_id = artists.id
                                        left join album_has_songs on tracks.id = album_has_songs.track_id
                                        left join albums on albums.id = album_has_songs.album_id
                                        where tracks.id='.$id));

        //dd($track[0]->track_name);

        return view('track.edit',
                    ['track' => $track[0]]);
    }

    public function addPlayTime(Request $request){
        //dd(
        
        echo $request->song_id;

        $song_id = $request->song_id;

        //$song = DB::select(DB::raw('select * from tracks where tracks.id = $song_id'));
        //dd($song);

        //working
        $play = new Played(array('song_id'=> $song_id));
        $play->save();

        

        
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        DB::table('tracks')
                ->where('id', $id)
                ->update(['name' => $request->get('name')]);



        //OKAY SANA PERO PUTANGINA, pero mukhang okay na.
        //IF EXISTING NA YUNG ARTIST AT ALBUM

/*
        $album_name = DB::select(
                        DB::raw('select albums.id from tracks 
                                        inner join album_has_songs on album_has_songs.track_id = tracks.id 
                                        inner join albums on albums.id = album_has_songs.album_id 
                                        where tracks.id='.$id));

        DB::table('albums')
                ->where('id', $album_name[0]->id)
                ->update(['name' => $request->get('album_name')]);

        $artist_name = DB::select(
                        DB::raw('select artists.id from tracks 
                                        inner join artist_has_songs on artist_has_songs.track_id = tracks.id 
                                        inner join artists on artists.id = artist_has_songs.artist_id 
                                        where tracks.id='.$id));

        DB::table('artists')
                ->where('id', $artist_name[0]->id)
                ->update(['name' => $request->get('artist_name')]);
*/
        $track = DB::select(
                    DB::raw('select tracks.name as track_name, tracks.id as track_id,
                                    artists.name as artist_name, artists.id as artist_id,
                                    albums.name as album_name, albums.id as album_id,
                                    tracks.created_at as created_at 
                                    from tracks 
                                    left join artist_has_songs on tracks.id = artist_has_songs.track_id 
                                    left join artists on artist_has_songs.artist_id = artists.id
                                    left join album_has_songs on tracks.id = album_has_songs.track_id
                                    left join albums on albums.id = album_has_songs.album_id
                                    where tracks.id='.$id));


        //put flash message //
            flash()->overlay('Melody updated!','Success!');
            return redirect()->back()->withInput();
            // return view('track.edit',
            //             ['track' => $track[0]]);
    }


    public function trending()
    {            

        //played songs
        $played_song_ids = DB::select(DB::raw('select distinct played.song_id from played'));

        foreach($played_song_ids as $id){

            //how many times a song is played
            $hit_count = DB::select(
                        DB::raw('select count(played.id) 
                                    from played
                                    inner join tracks on tracks.id = played.song_id
                                    where   played.song_id = tracks.id and 
                                            played.song_id ='.$id->song_id)); 
            

            //updating            
             DB::table('tracks')
                      ->where('id', $id->song_id)
                      ->update(['times_played_total' => $hit_count[0]->count]);
        }

        //$song = DB::select(DB::raw('select * from tracks where tracks.id = $song_id'));
        //dd($song);



        $track_data = DB::select(
                    DB::raw('select tracks.name as track_name, tracks.id as track_id,
                                    artists.name as artist_name, artists.id as artist_id,
                                    albums.name as album_name, albums.id as album_id,
                                    tracks.times_played_total as times_played_total 
                                    from tracks 
                                    left join artist_has_songs on tracks.id = artist_has_songs.track_id 
                                    left join artists on artist_has_songs.artist_id = artists.id
                                    left join album_has_songs on tracks.id = album_has_songs.track_id
                                    left join albums on albums.id = album_has_songs.album_id
                                    where times_played_total > 0
                                    order by tracks.times_played_total desc'));
        


        //dd($track_data);

        return view('track.trending',
                    ['track_data' => $track_data]); 
    }


    public function listTrending()
    {
        $track_data = DB::select(
                        DB::raw('select tracks.name as track_name, tracks.id as track_id,
                                        artists.name as artist_name, artists.id as artist_id,
                                        albums.name as album_name, albums.id as album_id,
                                        tracks.times_played_total as times_played_total 
                                        from tracks 
                                        left join artist_has_songs on tracks.id = artist_has_songs.track_id 
                                        left join artists on artist_has_songs.artist_id = artists.id
                                        left join album_has_songs on tracks.id = album_has_songs.track_id
                                        left join albums on albums.id = album_has_songs.album_id'));
         

        return view('track.trending',
                    ['track_data' => $track_data]);
    }


    public function details($id)
    {
        //player: http://devblog.lastrose.com/html5-audio-video-playlist/

        $track = DB::select(
                        DB::raw('select tracks.name as track_name, tracks.id as track_id,
                                        artists.name as artist_name, artists.id as artist_id,
                                        albums.name as album_name, albums.id as album_id,
                                        tracks.times_played_total as times_played_total 
                                        from tracks 
                                        left join artist_has_songs on tracks.id = artist_has_songs.track_id 
                                        left join artists on artist_has_songs.artist_id = artists.id
                                        left join album_has_songs on tracks.id = album_has_songs.track_id
                                        left join albums on albums.id = album_has_songs.album_id
                                        where tracks.id='.$id));

        //dd($track);


        if($track){
            return view('track.details',
                         ['track' => $track[0]]);
        }
        else{
            return redirect()->back();
        }
    }

    public function search(){
        return view('track.search', ['track_data' => NULL]);

    }

    public function searcher(Request $request){

        $query=$request->get('query');

        $track_data = DB::select(
                        DB::raw("select tracks.name as track_name, tracks.id as track_id,
                                        artists.name as artist_name, artists.id as artist_id,
                                        albums.name as album_name, albums.id as album_id,
                                        tracks.created_at as created_at 
                                        from tracks 
                                        left join artist_has_songs on tracks.id = artist_has_songs.track_id 
                                        left join artists on artist_has_songs.artist_id = artists.id
                                        left join album_has_songs on tracks.id = album_has_songs.track_id
                                        left join albums on albums.id = album_has_songs.album_id
                                        where  LOWER(tracks.name) like LOWER('%$query%')"));

        return view('track.search', ['track_data' => $track_data]);

    }

    public function recommend(Request $request){
        $id = $request->get('id');

        $recommended_song = new RecommendedSong(array(
                            'song_id' => $id,
                            'recommender_id' => \Auth::user()->id));

        $recommended_song->save();

        flash()->overlay("Song recommended! Check your dashboard now for proof. ",'Success!');
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd((int)$id);
        if(\Auth::user()->role==='admin'){

            DB::select(DB::raw("delete from tracks where id = $id"));

            flash()->overlay('Melody deleted','Success!');
            
            return redirect()->back();
        }
    }
}
