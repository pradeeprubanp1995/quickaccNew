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

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

// Auth::routes();

//Login process
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::any('/login/response', 'Auth\LoginController@login')->name('login.request');
Route::any('/logout', 'Auth\LoginController@logout')->name('logout');

//Home
Route::any('/home', 'HomeController@index')->name('home');
 
 //Dashbord
Route::any('/adminindex', 'HomeController@adminindex')->name('adminindex');

//Registration
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
Route::any('/register/response','Auth\RegisterController@register')->name('register.request');

//Profile
Route::get('/profile', 'HomeController@profile')->name('profile');
Route::any('/editprofile', 'HomeController@editprofile')->name('editprofile');

//cron
Route::get('/cron', 'HomeController@cron')->name('cron');
//Change password

Route::get('/changepassword', 'HomeController@changepassword')->name('changepassword');
Route::any('/changedpassword', 'HomeController@changedpassword')->name('changedpassword');

// Department Admin
Route::get('/department', 'DepartmentController@index')->name('department');
Route::post('/Newdepartment', 'DepartmentController@add')->name('depart_add');
Route::post('/department/edit/{id}', 'DepartmentController@deptedit')->name('depart_edit');
Route::get('/dept_delete/{id}', 'DepartmentController@deptdel')->name('depart_delete');

// Category Admin
Route::get('/category/add', 'CategoryController@add')->name('addcategory');
Route::post('/Newcategory', 'CategoryController@addcat')->name('category_add');
Route::get('/category', 'CategoryController@index')->name('category');
Route::get('/edit_cat/{id}', 'CategoryController@edit')->name('category_edit');
Route::get('/delete_cat/{id}', 'CategoryController@catdel')->name('category_delete');
Route::post('/update_cat/{id}', 'CategoryController@updatecat')->name('category_update');



// pradeep


Route::get('/title', 'TitleController@index')->name('title');


Route::get('/addtitlepage', 'TitleController@addtitleinput')->name('addtitleinput');
Route::get('/edittitlepage/{id}', 'TitleController@edittitleinput')->name('edittitleinput');
Route::get('/deletetitle/{id}', 'TitleController@deletetitle')->name('deletetitle');

Route::post('/addtitle', 'TitleController@createtitle')->name('addtitle');
Route::post('/getsubcategory', 'TitleController@getsubcategory')->name('getsubcategory');
Route::post('/edittitle', 'TitleController@edittitle')->name('edittitle');

Route::post('/titleauto','TitleController@titleautosearch')->name('titleauto');



// upcoming

Route::get('/addupcommingpage', 'UpcomingTitleController@addupcomminginput')->name('addupcomminginput');

Route::post('/addupcomming', 'UpcomingTitleController@createupcomming')->name('addupcomming');
Route::get('/upcominglist', 'UpcomingTitleController@upcominglist')->name('upcomming');

Route::get('/editupcomingpage/{id}', 'UpcomingTitleController@editupcominginput')->name('edittitleinput');
Route::get('/deleteupcoming/{id}', 'UpcomingTitleController@deleteupcoming')->name('deleteupcoming');

Route::post('/editupcoming', 'UpcomingTitleController@editupcoming')->name('editupcoming');

//muthu

Route::get('/test', function () {
    return view('sample');
});

Route::get('/quiz/{id}','QuestionController@index')->name('quizview');

Route::post('/answersubmit', 'ResultController@index')->name('result');
