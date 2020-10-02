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

Route::get('/data', function(){
    $ip = $_SERVER['REMOTE_ADDR'];
    $mac = str_replace("Media disconnected", "", exec('getmac'));
    
    $user_data = array(
        'IP_Address'=>$ip,
        'Mac Address'=>$mac,
        'user Agent'=>$_SERVER['HTTP_USER_AGENT'],
        'Server Signature'=>$_SERVER['SERVER_SIGNATURE'],
        'More' => $_SERVER
    );

    return $user_data;
});
