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
    return view('auth.signIn');
});
Route::get('/signup', function () {
    return view('auth.signUp');
});
Route::get('/dashboard', function () {
    return view('test');
});
Route::get('/main', function () {
    return view('layouts/layout');
});

Route::get('/nav', function () {
    return view('shared/navbar');
});
Route::get('/nav', function () {
    return view('shared/sidebar');
});

/*Centers*/
Route::get('/centers', function () {
    return view('branches/centers');
});
Route::get('/centersGroups', function () {
    return view('branches/centersGroups');
});
Route::get('/members', function () {
    return view('branches/members');
});
Route::get('/memberSummery', function () {
    return view('branches/memberSummery');
});
Route::get('/recentlyAdded', function () {
    return view('branches/recentlyAdded');
});

/*income*/
Route::get('/income', function () {
    return view('income/incomeReport');
});
Route::get('/collections', function () {
    return view('income/collections');
});
Route::get('/underPayments', function () {
    return view('income/underPayments');
});