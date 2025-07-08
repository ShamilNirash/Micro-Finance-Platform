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
Route::delete('/centers/delete/{centerId}', [CenterController::class, 'deleteCenter']);
Route::post('/centers/update/{centerId}', [CenterController::class, 'updateCenter'])->name('centers.updateCenter');


//group route
Route::get('/groupSummary/{groupId}', [GroupController::class, 'viewGroupSummary'])->name('group.summary');
Route::get('/groups/{centerId}', [GroupController::class, 'getGroupsByCenter']);
Route::post('/group/create', [GroupController::class, 'createGroup'])->name('groups.creategroup');
Route::post('/groups/update/{groupId}', [GroupController::class, 'updateGroup'])->name('groups.updateGroup');
Route::delete('/groups/delete/{centerId}', [GroupController::class, 'deleteGroup']);



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
Route::get('/memberSummery/{memberId}', [MemberController::class, 'viewMemberSummary'])->name('member.summary');
Route::post('/members/update/{memberId}', [memberController::class, 'updateMember'])->name('members.updateMember');
Route::delete('/members/delete/{memberId}', [MemberController::class, 'deleteMember']);



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

/*Profile View*/
Route::get('/profile', function () {
    return view('profile/profile');
});

/*Reports*/
Route::get('/loneIssue', function () {
    return view('reports/loneIssue');
});
Route::get('/incomeReports', function () {
    return view('reports/incomeReports');
});
Route::get('/pendingPaymentsReport', function () {
    return view('reports/pendingPaymentsReport');
});
Route::get('/membersReport', function () {
    return view('reports/membersReport');
});
