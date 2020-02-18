<?php

// use App\Artifact;
use App\Assignment;
use App\Artifact;
use App\Collection;
//use App\Course;
//use App\Post;
use App\Section;
use App\Site;
use App\User;

use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/imagediv', function () {
    return view('imagediv');
});
Route::get('/modal', function () {
    return view('modaltest');
});

Route::get('/dropdown', function () {
    return view('dropdown');
});

// Index

// Route::get('/site', 'SiteController@index');
// Route::get('/user', 'UserController@index');
// Route::get('/section', 'SectionController@index');
// Route::get('/collection', 'CollectionController@index');
// Route::get('/assignment', 'AssignmentController@index');
// Route::get('/component', 'ComponentController@index');
// Route::get('/artifact', 'ArtifactController@index');

// AXIOS UPLOAD

Route::post('/single-file', 'UploadController@UploadSingleFile');
Route::post('/multiple-files', 'UploadController@UploadMultipleFiles');
Route::post('/select-files', 'UploadController@UploadSelectFiles');
Route::post('/file-progress', 'UploadController@UploadSingleFile');
    

Auth::routes();

// Enroll student in a new Section

Route::get('/enroll', ['middleware' => 'auth', 'uses' => 'EnrollmentController@show']);
Route::post('/enroll', ['middleware' => 'auth', 'uses' => 'EnrollmentController@store'])->name('addClass');

// ALL 

	// Home
	Route::get('/home/{currentSection?}', 'HomeController@index')->name('home');

	// User
	Route::get('/user/{user}', 'UserController@show');
	Route::get('/user/{user}/edit', 'UserController@edit');

	// Artifacts 

	Route::get('/artifact/create/{section?}/{assignment?}/{component?}', 'ArtifactController@create');
	Route::post('/artifact/create', 'ArtifactController@store');
	Route::post('/artifact/createFromURL', 'ArtifactController@storeFromURL');
	Route::get('/artifact/{artifact}', 'ArtifactController@show');
	Route::get('/artifact/{artifact}/edit', 'ArtifactController@edit');
	Route::patch('/artifact/{artifact}/update', 'ArtifactController@update');
	Route::get('/artifact/{artifact}/delete', 'ArtifactController@delete');
	Route::delete('/artifact/{artifact}', 'ArtifactController@destroy');
	Route::get('/artifact/{artifact}/rotate/{degrees}', 'ArtifactController@rotate');
	Route::get('/artifact/{artifact}/addToCollection', 'ArtifactController@addToCollection');
	//Route::get('/artifact/{artifact}/removeFromCollection', 'ArtifactController@removeFromCollection');

		//Route::post('/artifact/{artifact}/collection/{collection}', 'ArtifactController@addToCollection');
		// Route::post('/artifact/{artifact}/collection/{collection}/remove', 'ArtifactController@removeFromCollection');

	Route::get('/artifact/{artifact}/comment', 'CommentController@create');
	Route::post('/artifact/{artifact}/comment', 'CommentController@store');
	
	Route::get('/artifact/{artifact}/comment/{comment}/edit', 'CommentController@edit');
	Route::post('/artifact/{artifact}/comment/{comment}/edit', 'CommentController@update');
	Route::delete('/artifact/{artifact}/comment/{comment}', 'CommentController@destroy');


	// Collections 

	Route::get('/collection/create/{artifact?}', 'CollectionController@create');
	Route::post('/collection/create', 'CollectionController@store');
	Route::get('/collection/{collection}', 'CollectionController@show');
	Route::get('/collection/{collection}/edit', 'CollectionController@edit');
	Route::patch('/collection/{collection}/update', 'CollectionController@update');
	Route::get('/collection/{collection}/delete', 'CollectionController@delete');
	Route::delete('/collection/{collection}', 'CollectionController@destroy');
	Route::post('/collection/addArtifact/{artifact}', 'CollectionController@addArtifact');
	Route::get('/collection/{collection}/artifact/{artifact}/addLabel', 'CollectionController@addLabel');
	Route::post('/collection/{collection}/artifact/{artifact}/saveLabel', 'CollectionController@saveLabel');
	Route::get('/collection/{collection}/artifact/{artifact}/editLabel', 'CollectionController@editLabel');
	Route::patch('/collection/{collection}/artifact/{artifact}/updateLabel', 'CollectionController@updateLabel');


	Route::delete('/collection/deleteArtifact/{artifact}', 'CollectionController@removeArtifact');
	
	Route::get('collection/{collection}/slideshow', 'CollectionController@slideshow');



// TEACHERS

Route::group(['middleware' => ['role:teacher']], function () {

	// Sections
	
	Route::get('/teacher/section/create', ['middleware' => 'auth', 'uses' => 'SectionController@create']);
	Route::get('/teacher/section/{section}', 'SectionController@show');
	Route::post('/teacher/section', ['middleware' => 'auth', 'uses' => 'SectionController@store']);
	Route::get('/teacher/section/{section}/edit', ['middleware' => 'auth', 'uses' => 'SectionController@edit']);
	Route::patch('/teacher/section/{section}/update', ['middleware' => 'auth', 'uses' => 'SectionController@update']);
	Route::delete('/teacher/section/{section}/delete', 'SectionController@destroy');

	// Section Progress

	Route::get('/teacher/section/{section}/student/{user}', ['middleware' => 'auth', 'uses' => 'SectionController@studentProgress']);

	// Single Student - All Progress

	Route::get('/teacher/section/{section}/sectionProgress', ['middleware' => 'auth', 'uses' => 'SectionController@sectionProgress']);

	// Single Student  - Assignment Progress

		Route::get('/section/{section}/assignment/{assignment}/user/{user}', ['middleware' => 'auth', 'uses' => 'SectionController@StudentAssignmentView']);

		// // detail view
		// Route::get('/section/{section}/{assignment}/{user}/detail', ['middleware' => 'auth', 'uses' => 'SectionController@StudentAssignmentDetailView']);


	// Assignments

		Route::get('/teacher/section/{section}/assignment/create', 'AssignmentController@create');
		Route::post('/teacher/section/{section}/assignment', 'AssignmentController@store');
		Route::get('/teacher/section/{section}/assignment/{assignment}', 'AssignmentController@show');
		Route::get('/teacher/section/{section}/assignment/{assignment}/edit', 'AssignmentController@edit');
		Route::patch('/teacher/section/{section}/assignment/{assignment}/update', 'AssignmentController@update');
		Route::get('/teacher/section/{section}/assignment/{assignment}/delete', 'AssignmentController@delete');
		Route::delete('/teacher/section/{section}/assignment/{assignment}', 'AssignmentController@destroy');
		Route::get('/teacher/section/{section}/assignment/{assignment}/gallery', 'AssignmentController@gallery');

	// Components

		Route::get('/teacher/section/{section}/assignment/{assignment}/component/create', 'ComponentController@create');
		Route::post('/teacher/section/{section}/assignment/{assignment}/component', 'ComponentController@store');
		Route::get('/teacher/section/{section}/assignment/{assignment}/component/{component}/edit', 'ComponentController@edit');

		//Route::get('/teacher/section/{section}/assignment/{assignment}/component/{component}', 'ComponentController@show');
		Route::get('/teacher/section/{section}/assignment/{assignment}/component/{component}', 'ComponentController@gallery');

		Route::patch('/teacher/section/{section}/assignment/{assignment}/component/{component}/update', 'ComponentController@update');
		Route::get('/teacher/section/{section}/assignment/{assignment}/component/{component}/delete', 'ComponentController@delete');
		Route::delete('/teacher/section/{section}/assignment/{assignment}/component/{component}/delete', 'ComponentController@destroy');

	});



// STUDENTS

	// Assignments

	Route::get('/student/section/{section}/assignment/{assignment}', 'AssignmentController@showStudent');
	
	

	
