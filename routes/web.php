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

Route::get('/admin', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'FrontendController@index');
Route::get('contact', 'FrontendController@contact');
Route::get('catagories', 'FrontendController@catagories');
Route::get('about', 'FrontendController@about');
Route::get('single', 'FrontendController@single');

Route::group(['prefix'=>'admin','middleware'=>['auth']],
function() {
    Route::get('/', function(){
        return view('admin.index');
    });
    route::resource('artikel','ArtikelController');
    route::resource('kategori','KategoriController');
    route::resource('tag','TagController');
}
);

Route::get('/', function () {
    return view('welcome');
});


Route::get('category', function () {
    return view('category');
});

Route::get('single', function () {
    return view('single');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
