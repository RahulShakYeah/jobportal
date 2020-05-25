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

Route::get('/','JobController@index')->name('job.home');
Route::get('/jobs/create','JobController@create')->name('job.create');
Route::post('jobs/create','JobController@store')->name('job.store');
Route::get('/jobs/{id}/edit','JobController@edit')->name('job.edit');
Route::post('/jobs/{id}/edit','JobController@update')->name('job.update');
Route::get('/jobs/applicant/','JobController@applicant')->name('job.applicant');
Route::post('/applications/{id}','JobController@apply')->name('job.apply');
Route::get('/jobs/myjobs','JobController@myJob')->name('jobs.myjob');
Auth::routes(['verify' => true]);
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/jobs/{id}/{job}','JobController@show')->name('show.jobs');
Route::get('/jobs/alljobs','JobController@allJobs')->name('all.jobs');
Route::get('/company/{id}/{company}','CompanyController@index')->name('company.index');
Route::get('/user/profile','UserProfileController@index')->name('profile.index');
Route::post('/user/profile/create','UserProfileController@store')->name('profile.store');
Route::post('/user/coverletter','UserProfileController@coverLetter')->name('cover.letter');
Route::post('/user/resume','UserProfileController@resume')->name('user.resume');
Route::post('/user/avatar','UserProfileController@avatar')->name('user.avatar');
Route::view('/employer/register','auth.emp-register')->name('emp.register');
Route::post('/employer/register','EmployerRegistrationController@employerRegister')->name('emp.register');
Route::get('/company/create','CompanyController@create')->name('company.create');
Route::post('/company/create','CompanyController@store')->name('company.store');
Route::post('/company/logo','CompanyController@logo')->name('company.logo');
Route::post('/company/coverphoto','CompanyController@coverphoto')->name('company.coverphoto');
Route::get('/download/coverletter',function(){
    $fileName = Auth::user()->profile->cover_letter;
    $username = Auth::user()->name;
    $file = public_path()."/coverletter/".$fileName;
    $headers = array(
        'Content-Type: application/docx',
    );
    return Response::download($file,"CoverLetter".$username.".docx",$headers);
})->name('download.coverletter');
Route::get('/download/resume',function(){
    $fileName = Auth::user()->profile->resume;
    $username = Auth::user()->name;
    $file = public_path()."/resume/".$fileName;
    $headers = array(
        'Content-Type: application/docx',
    );
    return Response::download($file,"Resume".$username.".docx",$headers);
})->name('download.resume');
Route::get('/user/get/coverletter/{id}','JobController@downloadCoverLetter')->name('download.covercom');
Route::get('/user/get/resume/{id}','JobController@downloadResume')->name('download.resumecom');

Route::get('/category/{id}','CategoryController@index')->name('category.index');
Route::get('/company/allcompanies','CompanyController@company')->name('company.all');

