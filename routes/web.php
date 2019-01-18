
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
use App\Department;
use App\Category;

// Route::get('/', function () {
//     $result = array();
//         $result[0] = Department::select('*')->get();
//         $result[1] = Category::select('*')->where('parent_id','0')->get();
//         // dd($result);
//          return view('addupcomming',['post_data' => $result]);
// })->middleware('is_user');

// Auth::routes();
//localhost:8000

Route::get('/', 'WeekpointsController@userlogin')->name('loginuser');

//Registration
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');
Route::any('/register/response','Auth\RegisterController@register')->name('register.request');

//cron
Route::get('/status_cron', 'WeekpointsController@status_cron')->name('status_cron');
Route::get('/title_cron', 'WeekpointsController@title_cron')->name('title_cron');


 
    Route::any('/login/response', 'Auth\LoginController@login')->name('login.request');
	


Route::group(['prefix'=>'admin','as'=>'admin.'], function(){ 

	//Login process
	Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
   Route::any('/logout', 'Auth\LoginController@logout')->name('logout');


	//Dashbord
	Route::any('/adminindex', 'AdminHomeController@adminindex')->name('adminindex');

	//Profile
	Route::get('/profile', 'DepartmentController@profile')->name('profile');
	Route::any('/editprofile', 'DepartmentController@editprofile')->name('editprofile');

	//Change password
	Route::any('/changepassword', 'DepartmentController@changepassword')->middleware('is_admin')->name('changepassword');
	Route::any('/changedpassword', 'DepartmentController@changedpassword')->name('changedpassword');

	// Department Admin
	Route::get('/department', 'DepartmentController@index')->middleware('is_admin')->name('department');
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
	//title
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
});



// user 
//user login process
Route::any('/login','WeekpointsController@userlogin')->name('userlogin');

//Home
Route::any('/home', 'HomeController@index')->name('home');
 
// question update
Route::get('/updatequestioninput','QuestionController@updatequestioninput')->name('updatequestioninput');
Route::post('/updatequestion','QuestionController@updatequestion')->name('updatequestion');
Route::get('/attendquiz','QuestionController@attendquiz')->name('attendquiz');

//muthu

Route::get('/test', function () {
    return view('sample');
});

Route::get('/quiz','QuestionController@index')->name('quiz');

Route::post('/answersubmit', 'ResultController@index')->name('result');
Route::get('/result', 'ResultController@indexx')->name('resultview');
Route::get('/resulthistory','ResultController@show')->name('history');
Route::get('/result/{date}','ResultController@view');
Route::get('/highscore','ResultController@highscore')->name('rank');
Route::get('/userprofile','QuestionController@userprofile')->name('userprofile');
Route::any('/usereditprofile', 'QuestionController@usereditprofile')->name('usereditprofile');
Route::get('/userprofileview','QuestionController@userprofileview')->name('userprofileview');
Route::any('/userchangepassword', 'QuestionController@userchangepassword')->name('userchangepassword');
Route::any('/userchangedpassword', 'QuestionController@userchangedpassword')->name('userchangedpassword');