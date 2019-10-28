<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Public Route
Route::get('/', function () {
	return view('home');
});

Route::get('/home', function (){
	return view('home');
});

Route::get('/elections', function (){
	return view('elections');
});

Route::post('/avatart.upload/{user}', 'HomeController@uploadImage')->name('upload.image');

// Authentication Default routes
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['sudo']], function () {
	Route::get('/sudo', 'HomeController@sudo')->name('sudo');
	//Route::get('/users', 'UserController@index' )->name('users');
	Route::resource('users', 'UserController');
});

//Routes only accessed by System Admins and Super Admins
Route::group(['middleware' => ['admins']], function () {
	Route::get('/admin', 'HomeController@admins')->name('admin');
	Route::resource('allowed_voters', 'AllowedController');
	Route::resource('registered_voters', 'RegisteredController');
	Route::resource('positions', 'PositionController');
	Route::resource('candidates', 'CandidateController');
	Route::post('/candidates_check', 'CandidateController@check')->name('candidates_check');
	Route::get('/candidates.add', 'CandidateController@add')->name('candidates.add');
	Route::get('/candidates.creation/{registered_voter}', 'CandidateController@creation')->name('candidates.creation');
});

// Routes only accessed by voters and Super Admins
Route::group(['middleware' => ['voters']], function() {
	Route::get('/voter', 'RegisteredController@home')->name('voter');
});

// Routes only accessed by candidates and Super Admins
Route::group(['middleware' => ['candidates']], function() {
	Route::get('/candidate', 'CandidateController@home')->name('candidate');
	Route::get('/candidate/profile/{id}', 'CandidateController@edit_profile')->name('candidate_profile');
	Route::put('/candidate/profile/update/{candidate}', 'CandidateController@update_profile')->name('candidate_profile.update');
	// Route::get('/candidate/{candidate}', 'CandidateController@show')->name('profile.show');
});

// Routes only accesses by guests and Super Admins
Route::group(['middleware' => ['guests']], function() {
	Route::get('/guest', 'HomeController@guest')->name('guest');
	Route::post('/voter_registration', 'RegisteredController@store')->name('voter_registration');

});

// Routes only accesses by registered voters
Route::group(['middleware' => ['elections']], function() {
	Route::get('/elections', 'HomeController@elections')->name('elections');
	Route::get('/elections/candidate/{candidate}', 'HomeController@showCandidate')->name('elections/candidate');
	Route::get('vote', 'HomeController@vote')->name('vote');
	Route::post('vote/submission/{user}', 'VoteController@store')->name('vote/submission');
	Route::get('live_status', 'HomeController@live')->name('live_status');
	Route::get('/elections/positions', 'HomeController@positions')->name('elections/positions');
	Route::get('terms', 'HomeController@terms')->name('terms');
	Route::get('results', 'HomeController@results')->name('results');
});