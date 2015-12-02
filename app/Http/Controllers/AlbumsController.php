<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

use App\Album as Album;
use App\ArtistHasSong as ArtistHasSong;
use App\AlbumsHasArtist as AlbumsHasArtist;
use App\AlbumHasSong as AlbumHasSong;

use Illuminate\Support\Str as Str;

class AlbumsController extends Controller
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

        $album_data = DB::select(
            DB::raw('select artists.name as artist_name, artists.id as artist_id,
                            albums.name as album_name, albums.id as album_id,
                            albums.created_at as created_at,
                            recording_company                            
                            from albums
                            left join albums_has_artist on albums_has_artist.album_id = albums.id
                            left join artists on albums_has_artist.artist_id = artists.id'));
         
        //dd($album_data);
        return view('album.index',
                    ['album_data' => $album_data]);         
    }


    public function editList()
    {

        $album_data = DB::select(
            DB::raw('select artists.name as artist_name, artists.id as artist_id,
                            albums.name as album_name, albums.id as album_id,
                            albums.created_at as created_at,
                            recording_company                            
                            from albums
                            left join albums_has_artist on albums_has_artist.album_id = albums.id
                            left join artists on albums_has_artist.artist_id = artists.id'));
         
        //dd($album_data);
        return view('album.list',
                    ['album_data' => $album_data]);         
    }


    public function removeList()
    {

        $album_data = DB::select(
            DB::raw('select artists.name as artist_name, artists.id as artist_id,
                            albums.name as album_name, albums.id as album_id,
                            albums.created_at as created_at,
                            recording_company                            
                            from albums
                            left join albums_has_artist on albums_has_artist.album_id = albums.id
                            left join artists on albums_has_artist.artist_id = artists.id'));
         
        //dd($album_data);
        return view('album.remove',
                    ['album_data' => $album_data]);         
    }



    public function show()
    {

        $album_data = DB::select(
            DB::raw('select artists.name as artist_name, artists.id as artist_id,
                            albums.name as album_name, albums.id as album_id,
                            albums.created_at as created_at,
                            recording_company                            
                            from albums
                            left join albums_has_artist on albums_has_artist.album_id = albums.id
                            left join artists on albums_has_artist.artist_id = artists.id'));
         
        //dd($album_data);
        return view('album.index',
                    ['album_data' => $album_data]);

    }

    public function add()
    {
        return view('album.create');                
    }

    public function remove()
    {
        $albums = DB::table('albums')
                    ->get();

        return view('album.delete',
                    ['albums' => $albums]);                
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('album.create', 
                    ['artist_name' => NULL,
                     'artist_id' => NULL,
                     'track_id' => NULL,
                     'album_name' => NULL]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\AddAlbumRequest $request)
    {
        //check album has artist

        $artist_id = (int)$request->get('artist_id');
        //dd($artist_id);

        $album_name = $request->get('name');
        //dd($album_name);

        $album = DB::select(DB::raw("select albums_has_artist.album_id as album_id,
                                            albums_has_artist.artist_id as artist_id
                                            from albums_has_artist
                                            inner join albums on albums_has_artist.album_id = albums.id
                                            
                                            where albums_has_artist.artist_id = $artist_id and
                                                  albums.name = '$album_name'"));

        /*$album = DB::table('albums_has_artist')
                            ->join('albums', 'albums_has_artist.album_id', '=', 'albums.id')
                            ->select('albums_has_artist.*')
                            ->where('albums_has_artist.artist_id', '=', $request->get('artist_id'))
                            ->where('albums.name', '=', $request->get('album_name'))
                            ->first();    */

        //dd(!$album);

        if( !$album ){  //bagong album
            $album = new Album(array(
                        'name' => $request->get('name'),
                        'recording_company' => $request->get('recording_company'),
                        'year_released' => $request->get('year_released')));
                    
            $album->save();
            //may album na
            flash()->overlay('Album added!','Success!');
        }
    
/*        if ( $request->get('artist_id')===NULL && 
             $request->get('artist_name')===NULL && 
             $request->get('album_name')===NULL && 
             $request->get('track_id')==="" ) {

            return view('album.create',
                        ['message'=>"Album Created", 
                         'artist_name' => NULL,
                         'artist_id' => NULL,
                         'track_id' => NULL,
                         'album_name' => NULL]);
        }
*/
        if( $request->get('artist_id') ){ //existing artist, bagong album
            $albumsHasArtist = new AlbumsHasArtist(array(
                                'album_id' => $album->id,
                                'artist_id' => (int)$request->get('artist_id')));
            
            $albumsHasArtist->save();
        }
        else{ //bagong artist, existing album

            $artist = DB::table('artists')
                        ->where('name',$request->get('artist_name'))
                        ->first(); 

            //dd($artist);
            if($artist){
                $albumsHasArtist = new AlbumsHasArtist(array(
                                'album_id' => $album->id,
                                'artist_id' => $artist->id));
                $albumsHasArtist->save();
            }

            
        }
        
        if( $request->get('track_id') ){
            //mag-on na si album at song
            $albumHasSong = new AlbumHasSong(array(
                            'album_id'=>$album->id,
                            'track_id'=>(int)$request->get('track_id')));
            $albumHasSong->save();

            //return redirect('track/create');

            return view('track.create');//,
            //             ['message'=>"Album Created"]);
        }

        return redirect('/album/create')
                ->with(['track_id' => NULL, 'artist_id' => NULL,
                         'artist_name' => NULL, 'album_name' => NULL]);
        // return view('album.create',
        //             ['track_id' => NULL,
        //              'artist_id' => NULL,
        //              'artist_name' => NULL,
        //              'album_name' => NULL]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = DB::table('albums')
                    ->where('id', $id)
                    ->first();

        return view('album.edit',
                    ['album' => $album]);
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
        DB::table('albums')
                ->where('id',$id)
                ->update([  'name' =>  $request->get('name'),
                            'year_released' => $request->get('year_released'),
                            'recording_company' => $request->get('recording_company')]);
    
        $album = DB::table('albums')
                    ->where('id', $id)
                    ->first();

        //put flash message //
            flash()->overlay('Album updated!','Success!');
            return redirect()->back();

            // return view('album.edit',
            //         ['album' => $album]);

    }


    public function details($id)
    {

        $album_data = DB::select(
            DB::raw('select artists.name as artist_name, artists.id as artist_id,
                            albums.name as album_name, albums.id as album_id,
                            albums.created_at as created_at,
                            recording_company, 
                            tracks.name as track_name, tracks.id as track_id                        
                            from albums
                            inner join albums_has_artist on albums_has_artist.album_id = albums.id
                            inner join artists on albums_has_artist.artist_id = artists.id
                            inner join album_has_songs on album_has_songs.album_id = albums.id
                            inner join tracks on album_has_songs.track_id = tracks.id
                            where albums.id='.$id));
         
        //dd($album_data[0]->track_name);

        if($album_data){
            return view('album.details',
                        ['album_data' => $album_data[0], 'tracks' => $album_data]);
        }
        else{
            return redirect()->back();
        }
    }

    public function search(){
        return view('album.search', ['track_data' => NULL]);

    }

    public function searcher(Request $request){

        $query=$request->get('query');

        $track_data = DB::select(
                        DB::raw("select artists.name as artist_name, artists.id as artist_id,
                            albums.name as album_name, albums.id as album_id,
                            albums.created_at as created_at,
                            recording_company                            
                            from albums
                            left join albums_has_artist on albums_has_artist.album_id = albums.id
                            left join artists on albums_has_artist.artist_id = artists.id
                            where  LOWER(albums.name) like LOWER('%$query%')"));

        return view('album.search', ['track_data' => $track_data]);

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

            DB::select(DB::raw("delete from albums where id = $id"));

            flash()->overlay('Album deleted','Success!');
            
            return redirect()->back();
        }
    }
}
