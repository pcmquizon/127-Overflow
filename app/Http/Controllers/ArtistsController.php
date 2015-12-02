<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

use App\Artist as Artist;
use App\ArtistHasSong as ArtistHasSong;
use App\AlbumsHasArtist as AlbumsHasArtist;
use App\AlbumHasSong as AlbumHasSong;

use Illuminate\Support\Str as Str;

class ArtistsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct (Artist $artist)
    {
        $this->middleware('auth');
        $this->artist = $artist;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artist_data = DB::select(
                            DB::raw('select artists.name as artist_name, artists.id as artist_id,
                                            artists.created_at as created_at,
                                            biography 
                                            from artists 
                                            '));

        return view('artist.index',
                    ['artist_data' => $artist_data]);
    }
    
    public function editList()
    {
        $artist_data = DB::select(
                            DB::raw('select artists.name as artist_name, artists.id as artist_id,
                                            artists.created_at as created_at,
                                            biography 
                                            from artists 
                                            '));

        return view('artist.list',
                    ['artist_data' => $artist_data]);
    }
    
    public function removeList()
    {
        $artist_data = DB::select(
                            DB::raw('select artists.name as artist_name, artists.id as artist_id,
                                            artists.created_at as created_at,
                                            biography 
                                            from artists 
                                            '));

        return view('artist.remove',
                    ['artist_data' => $artist_data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $artist_data = DB::select(
                            DB::raw('select artists.name as artist_name, artists.id as artist_id,
                                            artists.created_at as created_at,
                                            biography 
                                            from artists 
                                            '));

        return view('artist.index',
                    ['artist_data' => $artist_data]);

    }

    /**
     * Store a newly created resource in storage.
     *
    * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Requests\AddArtistRequest $request)
    {
        
        $artist = new Artist(array(
                    'name'=>$request->get('name'),
                    'biography'=>$request->get('biography')));

        $artist->save();
        //bagong artist
        flash()->overlay('Artist added!','Success!');
       
       if( $request->get('track_id') ){
            $artistHasSong = new ArtistHasSong(array(
                                'artist_id' => $artist->id,
                                'track_id' => (int)$request->get('track_id')));
            $artistHasSong->save();
            
            // go to albums params track-id,artist id,album name,artist name create album for//

            // return redirect('/album/create')
            //         ->with(['artist_id' => $artist->id, 'artist_name' => $artist->name,
            //                 'track_id' => $request->get('track_id'), 
            //                 'album_name' => $request->get('album_name')]);
            
            return view('album.create',
                        ['artist_id' => $artist->id,
                         'artist_name' => $artist->name,
                         'track_id' => $request->get('track_id'),
                         'album_name' => $request->get('album_name')]);
         }

        else{
            // go to albums params artist id,album name,artist name create album for//
        
            // return redirect('/album/create')
            //         ->with(['artist_id' => $artist->id, 'artist_name' => $artist->name,
            //              'track_id' => NULL, 'album_name' => $request->get('album_name')]);
            
            //bagong artist, walang album
            return view('album.create',
                        ['artist_id' => $artist->id,
                         'artist_name' => $artist->name,
                         'track_id' => NULL,
                         'album_name' => $request->get('album_name')]);
        
        }     




        /*if ($request->get('artist_id')===NULL && 
             $request->get('artist_name')===NULL && 
             $request->get('track_id')===NULL ) {

            return view('artist.create',
                        ['message'=>"Artist Created"]);
        }
        */

        
        //getting an album
        
        /*
        $album = DB::table('albums')
                ->where('name',$request->get('album_name'))
                ->first();          
        */
        

    }   


    public function create()
    {
        return view('artist.create', 
                    ['artist_name' => NULL,
                     'artist_id' => NULL,
                     'track_id' => NULL,
                     'album_name' => NULL]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artist = DB::table('artists')
                    ->where('id', $id)
                    ->first();

        return view('artist.edit',
                    ['artist' => $artist]);
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
        DB::table('artists')
                ->where('id',$id)
                ->update([  'name' =>  $request->get('name'),
                            'biography'=> $request->get('biography')]);
    
        $artist = DB::table('artists')
                    ->where('id', $id)
                    ->first();

        //put flash message //
            flash()->overlay('Artist updated!','Success!');
            return redirect()->back();
            
            // return view('artist.edit',
            //         ['artist' => $artist]);
    }


    public function details($id)
    {

        $artist_data = DB::select(
                DB::raw('select tracks.name as track_name, tracks.id as track_id,
                                artists.name as artist_name, artists.id as artist_id,
                                albums.name as album_name, albums.id as album_id,
                                tracks.created_at as created_at,
                                artists.biography as biography 
                                from tracks 
                                left join artist_has_songs on tracks.id = artist_has_songs.track_id 
                                left join artists on artist_has_songs.artist_id = artists.id
                                left join album_has_songs on tracks.id = album_has_songs.track_id
                                left join albums on albums.id = album_has_songs.album_id
                                where artists.id='.$id));

        //dd($artist_data[0]->)

        if($artist_data){
            return view('artist.details',
                        ['artist_data' => $artist_data[0], 'tracks' => $artist_data]);
        }
        else{
            return redirect()->back();
        }

    }

    public function search(){
        return view('artist.search', ['track_data' => NULL, 'all_songs' => FALSE]);

    }

    public function searcher(Request $request){

        $query=$request->get('query');

        $track_data = DB::select(
                        DB::raw("select artists.name as artist_name, artists.id as artist_id,
                                        albums.name as album_name, albums.id as album_id
                                        from artists
                                        inner join albums_has_artist on albums_has_artist.artist_id = artists.id
                                        inner join albums on albums_has_artist.album_id = albums.id
                                        where  LOWER(artists.name) like LOWER('%$query%')"));
        return view('artist.search', ['track_data' => $track_data, 'all_songs' => FALSE]);

    }

    public function searchAllSongs($artist_name){

        $track_data = DB::select(
                DB::raw("select tracks.name as track_name, tracks.id as track_id,
                                artists.name as artist_name, artists.id as artist_id,
                                albums.name as album_name, albums.id as album_id,
                                tracks.created_at as created_at,
                                from tracks 
                                left join artist_has_songs on tracks.id = artist_has_songs.track_id 
                                left join artists on artist_has_songs.artist_id = artists.id
                                left join album_has_songs on tracks.id = album_has_songs.track_id
                                left join albums on albums.id = album_has_songs.album_id
                                where  LOWER(artists.name) like LOWER('%$artist_name%')"));

        return view('artist.search', ['track_data' => $track_data, 'all_songs' => TRUE]);

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

            DB::select(DB::raw("delete from artists where id = $id"));

            flash()->overlay('Artist deleted','Success!');
            
            return redirect()->back();
        }
    }
}
