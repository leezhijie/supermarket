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
});

Route::get('excel', 'manager\IndexController@export');
Route::get('/insert_sell', 'TestController@sell');
Route::get('/fuck/{id}', 'manager\IndexController@sold');
Route::get('/manager/login', function (){
    return view('manager/login');
});
Route::post('/manager/login', 'LogController@manager');

Route::group(['prefix'=>'manager', 'middleware'=>'manager'], function (){

    Route::get('count/excel', function (){
        return view('manager/excel');
    });
    Route::post('export', 'manager\IndexController@export');
    Route::get('count/{page}', 'manager\IndexController@count');
    Route::get('count/search/{page}', 'manager\IndexController@count_search');
    Route::get('out/{tid}/{page}/{id}', 'manager\IndexController@sold_out');
    Route::post('sold_out/{tid}/{page}/{id}', 'manager\IndexController@addReason');
    Route::get('/set_message/{tid}/{id}/{page}', 'manager\IndexController@setMessage');//发送消息
    Route::get('{id}/{page}', 'manager\IndexController@index');
    Route::get('delete/{page}/{id}/{tid}', 'manager\IndexController@sold_out');
    Route::get('{tid}/search/{page}', 'manager\IndexController@search');
});

Route::group(['prefix' => 'procurement'], function(){
    Route::get('insert/{tid}/{goods_id}', 'procurement\IndexController@insert');
    Route::get('/message', 'procurement\IndexController@message');
    Route::get('index/{page}', 'procurement\IndexController@index');
});

Route::group(['prefix' => 'management'], function(){

});

