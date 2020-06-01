<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('site','Auth\CustomAuthController@site')->middleware('auth')->name('site');



Route::get('admin/login','Auth\CustomAuthController@adminlogin')->name('admin.login');
Route::post('admin/login','Auth\CustomAuthController@checkadminlogin')->name('save.admin.login');
Route::get('admin/index','AdminController@index')->name('admin.index');

################### Start Ajax Curd #####################
Route::group(['prefix'=>'ajax_offers'],function(){

	Route::get('create','OfferController@create');
	Route::post('store','OfferController@store')->name('ajax.offer.store');

});


Route::get('sample', 'SampleController@index')->name('sample.index');
Route::post('sample', 'SampleController@create')->name('sample.store');

Route::get('sample/{id}/edit', 'SampleController@edit');
Route::post('sample/update', 'SampleController@update')->name('sample.update');

Route::get('sample/destroy/{id}', 'SampleController@destroy');

############################ Sart one to one ###############################################
Route::get('has-one','RelationsController@hasOneRelation');
Route::get('has-one-reverse','RelationsController@hasOneRelationReverse');
Route::get('get-user-has-phone','RelationsController@getuserhasphone');
Route::get('get-user-hasnot-phone','RelationsController@getuserhasnotphone');
############################ End one to one ###############################################

############################ Sart one to many ###############################################
//Route::get('hospital-has-many','RelationsController@getHospitalDoctors');

//Route::get('hospitals','RelationsController@hospitals');

//Route::get('doctors/{hospital_id}','RelationsController@doctors')->name('hospital.doctors');

//Route::get('doctor/delete/{doctor_id}','RelationsController@deleteDoctor')->name('doctor.delete');

//Route::get('hospital/{hospital_id}','RelationsController@deleteHospital')->name('hospital.delete');

//Route::get('hospital_has_doctors','RelationsController@hospitalHasDoctor')->name('hospital.hasDoctors');

//Route::get('hospital_has_male_doctors','RelationsController@hospitalHasMaleDoctors')->name('hospital.maleDoctors');

//Route::get('hospital_not_has_male_doctors','RelationsController@hospitalNotHasDoctors')->name('hospital.notHasDoctors');

############################ End one to many ###############################################

/*
Route::resource('sample', 'SampleController');

Route::post('sample/update', 'SampleController@update')->name('sample.update');

Route::get('sample/destroy/{id}', 'SampleController@destroy');
*/

################### End Ajax Curd #####################


Route::get('dropzone', 'DropzoneController@index');

Route::post('dropzone/upload', 'DropzoneController@upload')->name('dropzone.upload');

Route::get('dropzone/fetch', 'DropzoneController@fetch')->name('dropzone.fetch');

Route::get('dropzone/delete', 'DropzoneController@delete')->name('dropzone.delete');


############################ Start many to many ###############################################

Route::get('doctors-services','RelationsController@getDoctorsServices');
Route::get('services-doctors','RelationsController@getServicesDoctors');

############################ End many to many ###############################################