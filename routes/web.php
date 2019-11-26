<?php

// use App\Artifact;
use App\Assignment;
// use App\Collection;
// use App\Course;
// use App\Post;
use App\Section;
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

Route::post('/single-file', 'UploadController@UploadSingleFile');
Route::post('/multiple-files', 'UploadController@UploadMultipleFiles');
Route::post('/select-files', 'UploadController@UploadSelectFiles');
Route::post('/file-progress', 'UploadController@UploadSingleFile');
    

Auth::routes();

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
	Route::delete('/artifact/{artifact}', 'ArtifactController@destroy');

	Route::post('/artifact/{artifact}/collection/{collection}', 'ArtifactController@addToCollection');
	Route::post('/artifact/{artifact}/collection/{collection}/remove', 'ArtifactController@removeFromCollection');

	Route::get('/artifact/{artifact}/comment', 'ArtifactController@addComment');

	// Collections 

	Route::get('/collection/create/', 'CollectionController@create');
	Route::post('/collection/create', 'CollectionController@store');
	Route::get('/collection/{collection}/edit', 'CollectionController@edit');
	Route::patch('/collection/{collection}/update', 'CollectionController@update');
	Route::get('/collection/{collection}/delete', 'CollectionController@delete');
	Route::delete('/collection/{collection}', 'CollectionController@destroy');

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

	Route::get('/teacher/section/{section}/sectionProgress', ['middleware' => 'auth', 'uses' => 'SectionController@sectionProgress']);


	// Assignments

	Route::get('/teacher/section/{section}/assignment/create', 'AssignmentController@create');
	Route::post('/teacher/section/{section}/assignment', 'AssignmentController@store');
	Route::get('/teacher/section/{section}/assignment/{assignment}', 'AssignmentController@show');
	Route::get('/teacher/section/{section}/assignment/{assignment}/edit', 'AssignmentController@edit');
	Route::patch('/teacher/section/{section}/assignment/{assignment}/update', 'AssignmentController@update');
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

	// Artifacts
	
	Route::get('/artifact', 'ArtifactController@index');

	});



// STUDENTS

	// Assignments

	Route::get('/student/section/{section}/assignment/{assignment}', 'AssignmentController@showStudent');
	
	// Collections

	Route::get('student/section/{section}/collection/{collection}', 'CollectionController@showStudent');


	

	
