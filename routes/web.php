
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

// Route::get('/clear-cache', function() {
//     Artisan::call('cache:clear');
//     return "Cache is cleared";
// });


Route::get('/', 'WeekpointsController@userdash')->name('home');



Route::post('/userlogin', 'Auth\LoginController@login')->name('login');
Route::get('/userlogin', 'Auth\LoginController@login')->name('login');


// Route::get('/', 'WeekpointsController@userlogin')->name('loginuser');
Route::get('/userlogin', 'WeekpointsController@userlogin')->name('userlogin');




Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
// Route::post('password/reset', 'Auth\PasswordController@postReset');
Auth::routes();

// payment

Route::any('/payment','WeekpointsController@paymentpage')->name('payment');
Route::any('/getamount','WeekpointsController@getamount')->name('getamount');


// Registration
Route::get('/register/{id}', 'Auth\RegisterController@showRegistrationForm')->name('userregister');
Route::post('/register', 'Auth\RegisterController@register');
Route::any('/register/response','Auth\RegisterController@register')->name('register.request');



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
	Route::get('/department', 'DepartmentController@index')->name('department');
	Route::post('/department/add', 'DepartmentController@adddept')->name('adddepartment');
	Route::get('/Newdepartment', 'DepartmentController@add')->name('depart_add');
	Route::get('/department/edit/{id}', 'DepartmentController@deptedit')->name('depart_edit');
	Route::get('/dept_delete/{id}', 'DepartmentController@deptdelete')->name('depart_delete');
	Route::post('/update_dept/{id}', 'DepartmentController@updatedept')->name('department_update');

	// Category Admin
	Route::get('/category/add', 'CategoryController@add')->name('addcategory');
	Route::post('/Newcategory', 'CategoryController@addcat')->name('category_add');
	Route::get('/category', 'CategoryController@index')->name('category');
	Route::get('/edit_cat/{id}', 'CategoryController@edit')->name('category_edit');
	Route::get('/delete_cat/{id}', 'CategoryController@catdel')->name('category_delete');
	Route::post('/update_cat/{id}', 'CategoryController@updatecat')->name('category_update');


	Route::get('/users', 'AccountController@index')->middleware('is_admin')->name('users');
	Route::get('/user/change/{id}', 'AccountController@deptchange')->name('acc_edit');
	Route::post('/user/add', 'AccountController@adddept')->name('addaccount');
	Route::get('/Newuser', 'AccountController@add')->name('acc_add');
	Route::get('/user/edit/{id}', 'AccountController@deptedit')->name('acc_edit');
	Route::get('/user_delete/{id}', 'AccountController@deptdelete')->name('acc_delete');
	Route::get('/update_user/{id}', 'AccountController@updatedept')->name('account_update');


	Route::get('/generate', 'GenerateController@index')->middleware('is_admin')->name('generates');
	Route::post('/generate/add', 'GenerateController@adddept')->name('addgenerate');
	Route::get('/Newgenerate', 'GenerateController@add')->name('add_generate');
	Route::get('/generate/edit/{id}', 'GenerateController@deptedit')->name('gen_edit');
	Route::get('/gen_delete/{id}', 'GenerateController@deptdelete')->name('gen_delete');
	Route::get('/update_gen/{id}', 'GenerateController@updatedept')->name('generate_update');

	// for paymentlist
	Route::get('/paymentlist', 'AccountController@paymentlist')->name('paymentlist');
	


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


	
	// // upcoming
	// Route::get('/addupcommingpage', 'UpcomingTitleController@addupcomminginput')->name('addupcomminginput');
	// Route::post('/addupcomming', 'UpcomingTitleController@createupcomming')->name('addupcomming');
	// Route::get('/upcominglist', 'UpcomingTitleController@upcominglist')->name('upcomming');
	// Route::get('/editupcomingpage/{id}', 'UpcomingTitleController@editupcominginput')->name('edittitleinput');
	// Route::get('/deleteupcoming/{id}', 'UpcomingTitleController@deleteupcoming')->name('deleteupcoming');
	// Route::post('/editupcoming', 'UpcomingTitleController@editupcoming')->name('editupcoming');
});



// for quickacc
Route::get('/usergenerate', 'Usercontroller@usergenerates')->name('usergenerates');
Route::get('/generatelink/{id}', 'Usercontroller@generatelink')->name('generatelink');




Route::any('/usereditprofile', 'Usercontroller@usereditprofile')->name('usereditprofile');
Route::get('/userprofileview','Usercontroller@userprofileview')->name('userprofileview');
Route::any('/userchangepassword', 'Usercontroller@userchangepassword')->name('userchangepassword');
Route::any('/userchangedpassword', 'Usercontroller@userchangedpassword')->name('userchangedpassword');
Route::get('/userprofile','Usercontroller@userprofile')->name('userprofile');



// payment
Route::any('/pay','Usercontroller@pay')->name('pay');
Route::any('/paypalerror','WeekpointsController@paypalerror')->name('paypalerror');
Route::post('/paypalsuccess','WeekpointsController@paypalsuccess')->name('paypalsuccess');


 
// // question update
// Route::get('/updatequestioninput','QuestionController@updatequestioninput')->name('updatequestioninput');
// Route::post('/updatequestion','QuestionController@updatequestion')->name('updatequestion');
// Route::get('/attendquiz','QuestionController@attendquiz')->name('attendquiz');

// //muthu

// Route::get('/test', function () {
//     return view('sample');
// });

// Route::get('/quiz','QuestionController@index')->name('quiz');

// Route::post('/answersubmit', 'ResultController@index')->name('result');
// Route::get('/result', 'ResultController@indexx')->name('resultview');
// Route::get('/resulthistory','ResultController@show')->name('history');
// Route::get('/result/{id}','ResultController@view');
// Route::get('/highscore','ResultController@highscore')->name('rank');
// Route::get('/userprofile','QuestionController@userprofile')->name('userprofile');


// user 
//user login process
// Route::any('/login','WeekpointsController@userlogin')->name('userlogin');
// Route::get('password/email', 'Auth\PasswordController@getEmail');
// Route::post('password/email', 'Auth\PasswordController@postEmail');

// // Password reset routes...
// Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
// Route::post('password/reset', 'Auth\PasswordController@postReset');





//Home
// Route::any('/home', 'HomeController@index')->name('home');
// Route::any('/home', 'WeekpointsController@userdash')->name('home');
// Route::post('/password/reset', 'Auth\PasswordController@reset');
//localhost:8000


// premium = category
// services = department





// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
