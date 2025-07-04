<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CenterController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\MemberController;
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
    return view('dashboard');
})->name('dashboard');

//branches routes
Route::post('/branches/create',  [BranchController::class, 'create_branch'])->name('branches.createbranch');

//centers routes
Route::get('/centers', [CenterController::class, 'getAllActiveCenters'])->name('centers.viewblade');
Route::post('/centers/create',  [CenterController::class, 'createCenter'])->name('centers.createcenter');
Route::get('/centers/{branchId}', [CenterController::class, 'getCentersByBranch']);
Route::get('/centerSummary/{centerId}', [CenterController::class, 'viewCenterSummary'])->name('center.summary');


//group route
Route::get('/groupSummary/{groupId}', [GroupController::class, 'viewGroupSummary'])->name('group.summary');
Route::get('/groups/{centerId}', [GroupController::class, 'getGroupsByCenter']);
Route::post('/group/create', [GroupController::class, 'createGroup'])->name('groups.creategroup');


//members routes
Route::get(
    '/members',
    [MemberController::class, 'viewAllMembers']
)->name('members.viewblade');
Route::post(
    '/members/create',
    [MemberController::class, 'createMember']
)->name('members.create');
Route::get('/unassignmembers/search',  [MemberController::class, 'unAssignMemberSearch']);

//group routes

// After clciking on eye icon in centers table - view summury of center and group table
// After clciking on eye icon in Group table - view summury of Group and memebers table
Route::get('/groupSummary', function () {
    return view('branches/groupSummary');
});


Route::get('/memberSummery', function () {
    return view('branches/memberSummery');
});
Route::get('/recentlyAdded', function () {
    return view('branches/recentlyAdded');
});

/*Branches/Recently*/
Route::get('/recentCenters', function () {
    return view('branches/recentlyAdded/centers');
});
Route::get('/recentGroups', function () {
    return view('branches/recentlyAdded/groups');
});
Route::get('/recentLoans', function () {
    return view('branches/recentlyAdded/loans');
});
Route::get('/recentMembers', function () {
    return view('branches/recentlyAdded/members');
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
