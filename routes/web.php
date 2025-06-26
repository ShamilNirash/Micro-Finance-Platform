<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\Controller;
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

//branches routes
Route::post('/branches/create', action: [BranchController::class, 'create_branch'])->name('branches.createbranch');

//centers routes
Route::get('/centers', [CenterController::class, 'getAllActiveCenters'])->name('centers.viewblade');
Route::post('/centers/create',  [CenterController::class, 'createCenter'])->name('centers.createcenter');

// After clciking on eye icon in centers table - view summury of center and group table
Route::get('/centerSummary', function () {
    return view('branches/centerSummary');
});
// After clciking on eye icon in Group table - view summury of Group and memebers table
Route::get('/groupSummary', function () {
    return view('branches/groupSummary');
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

/*Payments*/
Route::get('/payments', function () {
    return view('payments/payments');
});
Route::get('/pending', function () {
    return view('payments/pending');
});
Route::get('/nopaid', function () {
    return view('payments/nopaid');
});
Route::get('/paymentsSummery', function () {
    return view('payments/paymentsSummery');
});