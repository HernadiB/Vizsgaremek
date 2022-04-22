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

Route::get('/country', [\App\Http\Controllers\SiteController::class, 'Country'])->name('site.country');
Route::get('/friends', [\App\Http\Controllers\SiteController::class, 'Friends'])->middleware('auth')->name('site.friends');
Route::get('/index', [\App\Http\Controllers\SiteController::class, 'Index'])->middleware('auth')->name('home');
Route::get('/levels', [\App\Http\Controllers\SiteController::class, 'Levels'])->name('site.levels');
Route::get('/', [\App\Http\Controllers\SiteController::class, 'Login'])->name('site.login');
Route::get('/mytasks', [\App\Http\Controllers\SiteController::class, 'MyTasks'])->middleware('auth', 'can:userIsBelowEighteen')->name('site.mytasks');
Route::get('/signup', [\App\Http\Controllers\SiteController::class, 'Signup'])->name('site.signup');
Route::get('/myteam', [\App\Http\Controllers\SiteController::class, 'MyTeam'])->middleware('auth', 'can:hasTeam')->name('site.myteam');
Route::get('/profile', [\App\Http\Controllers\SiteController::class, 'Profile'])->middleware('auth')->name('site.profile');

Route::post('/users/signup', [\App\Http\Controllers\UserController::class, "SignupUser"])->name("userSignup");
Route::post('/users/login', [\App\Http\Controllers\UserController::class, "LoginUser"])->name("userLogin");;
Route::post('/users/update', [\App\Http\Controllers\UserController::class, "ModifyUser"])->name("userModify");
Route::post('/users/delete', [\App\Http\Controllers\UserController::class, "DeleteUser"])->name("userDelete");
Route::post('/users/logout', [\App\Http\Controllers\UserController::class, "LogoutUser"])->name("userLogout");

Route::post('/friendinvite/accept', [\App\Http\Controllers\UserController::class, "AcceptInvitation"])->name("inviteAccept");
Route::post('/friendinvite/reject', [\App\Http\Controllers\UserController::class, "RejectInvitation"])->name("inviteReject");

Route::post('/task/accept', [\App\Http\Controllers\TaskController::class, "AcceptTask"])->name("taskAccept");
Route::post('/task/finish', [\App\Http\Controllers\TaskController::class, "FinishTask"])->name("taskFinish");
Route::post('/task/view', [\App\Http\Controllers\TaskController::class, "ViewTask"])->name("taskView");

Route::post('/task/confirm', [\App\Http\Controllers\TaskController::class, "ConfirmTask"])->name("taskConfirm");
Route::post('/task/reject', [\App\Http\Controllers\TaskController::class, "RejectTask"])->name("taskReject");

Route::post('/friend/delete', [\App\Http\Controllers\UserController::class, "DeleteFriend"])->name("friendDelete");
Route::post('/friend/invite', [\App\Http\Controllers\UserController::class, "InviteFriend"])->name("friendInvite");

Route::post('/team/create', [\App\Http\Controllers\TeamController::class, "CreateTeam"])->name("teamCreate");
Route::post('/team/addmember', [\App\Http\Controllers\TeamController::class, "AddMember"])->name("memberAdd");

Route::post('/leaderboard/country', [\App\Http\Controllers\UserController::class, "GetCountryLeaderboard"])->name("leaderboardCountry");
Route::post('/leaderboard/friends', [\App\Http\Controllers\UserController::class, "GetFriendsLeaderboard"])->name("leaderboardFriends");