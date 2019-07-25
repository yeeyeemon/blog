<?php
use App\User;
use App\Notifications\TaskCompleted;
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
// Route::get('/',function(){
//     User::find(1)->notify(new TaskCompleted);
//     return view('welcome');
// });
Route::get('markasRead', function(){
    auth()->user()->unreadNotifications->markAsRead();
    
})->name('markAsRead');

Route::get('/admin', 'AdminController@index');

Route::get('/superadmin', 'SuperAdminController@index');

Route::group(['middleware'=>['web']], function(){
    Route::get('/','PagesController@getIndex');
    Route::get('/about','PagesController@getAbout');
    Route::get('/contact','PagesController@getContact');
    Route::post('contact','PagesController@postContact');
    Route::resource('/posts','PostController');
});
Auth::routes(['verify' => true]);
Route::get('/products','ProductController@index');
Route::get('/products/create-step1', 'ProductController@createStep1');
Route::post('/products/create-step1', 'ProductController@postCreateStep1');
Route::get('/products/return-step1','ProductController@returnStep1');

Route::get('/products/create-step2', 'ProductController@createStep2');
Route::post('/products/create-step2', 'ProductController@postCreateStep2');
Route::post('/products/remove-image', 'ProductController@removeImage');

Route::get('/products/create-step3', 'ProductController@createStep3');
Route::post('/products/store', 'ProductController@store');
Route::get('/home', 'HomeController@index')->name('home');

//blog
Route::get('blog/{slug}',['uses'=>'BlogController@getSingle','as'=>'blog.single']);

Route::resource('/tags','TagController',['except'=>['create']]);

//comments

Route::post('comments/{post_id}',['uses'=>'CommentsController@store','as'=>'comments.store']);

//events
Route::resource('events','EventController');
//invitations
// Route::resource('invitations','InvitationController');
Route::get('invitations/{invitation_id}','InvitationController@send')->name('invitations.mailsend');
Route::get('invitations/{invitation_id}/{action}','AcceptController@accept')->name('invitations.send');

//pages
Route::resource('/pages','PageController');
