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
use Illuminate\Support\Facades\Mail;

Route::get('/info', 'HomeController@index');

Auth::routes();

Route::get('/', 'HomeController@index');

/*Route::get('project/email', function(){

    $creates['gf']=' $user = Auth::user();';

    Mail::send('email.test', $creates, function ($message){

        $message->to('madstrat@ru', 'vlad')->subject('ghghghgh');
    });

})->name('project.email');
*/
Route::group(['middleware'=>'user'],function(){

    Route::resource('/conection','ConectionController');

    Route::post('conection/calculation','ConectionController@calculation')->name('conection.calculation');

    Route::post('conection/destroyone','ConectionController@destroyone')->name('conection.destroyone');

    Route::resource('/project','ProjectController');

    Route::post('project/children','ProjectController@children')->name('project.children');

    Route::post('project/calculate','ProjectController@calculate')->name('project.calculate');

    Route::post('project/start','ProjectController@start')->name('project.start');

});




