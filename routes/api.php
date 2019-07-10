<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('siswi','SiswiController');
Route::resource('sekolah','SekolahController');
// Route::get('sekolah','SekolahController@index');


Route::get('/', function (Router $router) {
    return collect($router->getRoutes()->getRoutesByMethod()["GET"])->map(function ($value, $key) {
        return url($key);
    })->values();
});

Route::resource('categories', 'CategoryAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);

Route::resource('articles', 'ArticleAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);

Route::resource('users', 'UserAPIController', [
    'only' => ['index', 'show', 'store', 'update', 'destroy']
]);

// Frontend
Route::resource('front', 'FrontendAPIController');


Route::get('contoh', 'ContohController@index');
Route::get('contoh2', 'ContohController@index2');


Route::resource('siswa', 'SiswaController');


Route::group(
    ['middleware' => 'cors'],function (){
    // Isi Route Disini
    Route::resource('siswi','SiswiController');
    Route::resource('sekolah','SekolahController');
    Route::resource('siswa2','Siswa2Controller');
    
});

