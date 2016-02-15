
<?php


/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/verify/{id}', array('as'=>'verifyAccount', 'uses'=>'UserController@verifyAccount'));
Route::get('/{name}/{code}', 'UserController@show');
Route::get('/edit/{id}/{passcode}', array('as'=>'editPage', 'uses'=>'UserController@edit'));

Route::get('/', function () {
	
    return view('welcome');
	
});

Route::post('/{name}/{code}', 'UserController@RequestMail');
Route::post('/', "UserController@create");
Route::post('/edit/{id}/{passcode}', 'UserController@store');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
