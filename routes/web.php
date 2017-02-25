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

Route::get('/', 'HomeController@index' );

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('clients', 'ClientController');
Route::resource('books', 'BookController');
Route::resource('posts', 'PostController');
Route::resource('profile', 'ProfileController');
Route::resource('categories', 'CategoryController');
Route::resource('tags', 'TagController');
Route::resource('courses', 'CourseController');

Route::get('settings/account', 'SettingsController@account')->name('settings.account');
Route::put('settings/account/{update}', 'SettingsController@accountUpdate')->name('settings.account.update');
Route::get('settings/password', 'SettingsController@password')->name('settings.password');
Route::post('settings/password/{update}', 'SettingsController@passwordUpdate')->name('settings.password.update');
Route::post('admin', 'AdminResetController@sendReset')->name('admin.reset');
Route::get('about', 'PagesController@about')->name('about');
Route::get('support', 'PagesController@support')->name('support');
Route::get('disabled', 'PagesController@disabled')->name('disabled');



// QueryController
Route::group(['middleware' => 'admin'], function () {
Route::get('clientID', 'QueryController@sortclientID')->name('sortclient.id');
Route::get('clientIDdesc', 'QueryController@sortclientIDdesc')->name('sortclient.iddesc');
Route::get('clientFirst', 'QueryController@sortclientFirst')->name('sortclient.first');
Route::get('clientFirstdesc', 'QueryController@sortclientFirstdesc')->name('sortclient.firstdesc');
Route::get('clientLast', 'QueryController@sortclientLast')->name('sortclient.last');
Route::get('clientLastdesc', 'QueryController@sortclientLastdesc')->name('sortclient.lastdesc');
Route::get('clientPhone', 'QueryController@sortclientPhone')->name('sortclient.phone');
Route::get('clientPhonedesc', 'QueryController@sortclientPhonedesc')->name('sortclient.phonedesc');
Route::get('clientEmail', 'QueryController@sortclientEmail')->name('sortclient.email');
Route::get('clientEmaildesc', 'QueryController@sortclientEmaildesc')->name('sortclient.emaildesc');
Route::get('clientRole', 'QueryController@sortclientRole')->name('sortclient.role');
Route::get('clientRoledesc', 'QueryController@sortclientRoledesc')->name('sortclient.roledesc');

  //course
  Route::get('courseID', 'QueryController@sortcourseID')->name('sortcourse.id');
  Route::get('courseIDdesc', 'QueryController@sortcourseIDdesc')->name('sortcourse.iddesc');
  Route::get('courseCourse', 'QueryController@sortcourseCourse')->name('sortcourse.course');
  Route::get('courseCoursedesc', 'QueryController@sortcourseCoursedesc')->name('sortcourse.coursedesc');
  Route::get('courseCode', 'QueryController@sortcourseCode')->name('sortcourse.code');
  Route::get('courseCodedesc', 'QueryController@sortcourseCodedesc')->name('sortcourse.codedesc');
    });
// end of admin
Route::group(['middleware' => 'librarian'], function () {
Route::get('clientSerial', 'QueryController@sortbooksSerial')->name('sortbooks.serial');
Route::get('clientSerialdesc', 'QueryController@sortbooksSerialdesc')->name('sortbooks.serialdesc');
Route::get('clientTitle', 'QueryController@sortbooksTitle')->name('sortbooks.title');
Route::get('clientTitledesc', 'QueryController@sortbooksTitledesc')->name('sortbooks.titledesc');
Route::get('clientAuthor', 'QueryController@sortbooksAuthor')->name('sortbooks.author');
Route::get('clientAuthordesc', 'QueryController@sortbooksAuthordesc')->name('sortbooks.authordesc');

  //categories
  Route::get('categoriesID', 'QueryController@sortcategoriesID')->name('sortcategories.id');
  Route::get('categoriesIDdesc', 'QueryController@sortcategoriesIDdesc')->name('sortcategories.iddesc');
  Route::get('categoriesName', 'QueryController@sortcategoriesName')->name('sortcategories.name');
  Route::get('categoriesNamedesc', 'QueryController@sortcategoriesNamedesc')->name('sortcategories.namedesc');
  //tags
  Route::get('tagsID', 'QueryController@sorttagsID')->name('sorttags.id');
  Route::get('tagsIDdesc', 'QueryController@sorttagsIDdesc')->name('sorttags.iddesc');
  Route::get('tagsName', 'QueryController@sorttagsName')->name('sorttags.name');
  Route::get('tagsNamedesc', 'QueryController@sorttagsNamedesc')->name('sorttags.namedesc');

    });
// end of librarian
