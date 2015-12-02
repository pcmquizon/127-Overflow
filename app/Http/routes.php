<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//guest + registered users
Route::get('/', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/contact', 'HomeController@contact');
//may privacy at terms page kapa!


//registered users
	//dashboard aka music feed
	Route::get('/user/dashboard/', 'UserController@index');
//profile
	//view
	Route::get('/user/profile/', 'UserController@showProfile');
	Route::post('/user/profile/','UserController@updateProfile');
	//update
	Route::get('/user/profile/edit/', 'UserController@editProfile');
	Route::post('/user/profile/edit/', 'UserController@editProfile');
	//password - update
	Route::get('/user/profile/edit/password', 'UserController@editPassword');
	Route::post('/user/profile/edit/password', 'UserController@updatePassword');
	//dp - update
	Route::post('/user/profile/edit/dp', 'UserController@updateProfilePicture');
	
	//special for admin
		//pending users
			//view
			Route::get('/user/pending', 'UserController@showPending');
			//activate
			Route::get('/user/approve/{id}', 'UserController@approveUser');
		//approved users
			//view
			Route::get('/user/show/approved','UserController@showApproved');
			Route::post('/user/show/approved/on','UserController@showApprovedOn');
			//deactivate
			Route::get('/user/deactivate/{id}', 'UserController@deactivateUser');

//search by
	//artist
	Route::get('/artist/search', 'ArtistsController@search');
	Route::post('/artist/search', 'ArtistsController@searcher');
	Route::get('/artist/search/{artist}', 'ArtistsController@searchAllSongs');

	//album
	Route::get('/album/search', 'AlbumsController@search');
	Route::post('/album/search', 'AlbumsController@searcher');
	
	//track
	Route::get('/track/search', 'TracksController@search');
	Route::post('/track/search', 'TracksController@searcher');

//playlist
	Route::get('/playlist/edit', 'PlaylistsController@editList');
	Route::get('/playlist/remove', 'PlaylistsController@removeList');
	Route::get('/playlist/{playlist}/delete','PlaylistsController@destroy');
	Route::get('/playlist/{playlist}/remove', 'PlaylistsController@remove');
	Route::get('/playlist/{playlist}/add/', 'PlaylistsController@add');
	Route::get('/playlist/{playlist}/add/{track}', 'PlaylistsController@addMelodyTo');
	Route::get('/playlist/{playlist}/details/', 'PlaylistsController@details');
	Route::delete('playlist/{playlist}/remove/{track}', 'PlaylistsController@removeMelodyFrom');

//track
	Route::get('/track/edit', 'TracksController@editList');
	Route::get('/track/remove', 'TracksController@removeList');
	Route::get('/track/recommend', 'TracksController@suggest');
	Route::post('/track/recommend', 'TracksController@recommend');
	Route::get('/track/trending', 'TracksController@trending');
	Route::get('/track/{track}/details/', 'TracksController@details');
	Route::post('/track/addplay','TracksController@addPlayTime');

//artist
	Route::get('/artist/edit', 'ArtistsController@editList');
	Route::get('/artist/remove', 'ArtistsController@removeList');
	Route::get('/artist/{artist}/details/', 'ArtistsController@details');

//album
	Route::get('/album/edit', 'AlbumsController@editList');
	Route::get('/album/remove', 'AlbumsController@removeList');
	Route::get('/album/{album}/details/', 'AlbumsController@details');


//resources
	Route::resource('playlist', 'PlaylistsController');
	Route::resource('track', 'TracksController');
	Route::resource('artist','ArtistsController');
	Route::resource('album', 'AlbumsController');

//authentication
	Route::controllers([
		'auth' => 'Auth\AuthController',
		'password'=> 'Auth\PasswordController'
	]);
