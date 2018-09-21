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
//Langauges route
// app/Http/routes.php

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
//Route home page
 Route::get('/', 'PagesController@Home');

//Route about-us page
Route::get('/about', 'PagesController@About');

//Route contact-us page
Route::get('/contact', 'PagesController@Contact');

//Route contact-us send mail 
//Route::post('/Send', 'PagesController@Send');

//Route to Articles
Route::resource('/articles', 'ArticleController');
//Route to Stories
Route::resource('/stories', 'StoryController');
//Route to Vedio
Route::resource('/videos', 'VideoController');
//Route to Notes
Route::resource('/notes', 'NoteController');
//auth route
Auth::routes();
// Route to Home
Route::get('/home', 'HomeController@index')->name('home');
// Route to Profile
Route::get('/profile', 'AvatarController@index')->name('profile');
//Route to photos profile
Route::resource('/avatar', 'AvatarController');
	
});

