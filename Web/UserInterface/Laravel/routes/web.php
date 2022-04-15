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
Route::get('/friends', [\App\Http\Controllers\SiteController::class, 'Friends'])->name('site.friends');
Route::get('/', [\App\Http\Controllers\SiteController::class, 'Index'])->name('home');
Route::get('/levels', [\App\Http\Controllers\SiteController::class, 'Levels'])->name('site.levels');
Route::get('/login', [\App\Http\Controllers\SiteController::class, 'Login'])->name('site.login');
Route::get('/mytasks', [\App\Http\Controllers\SiteController::class, 'MyTasks'])->name('site.mytasks');
Route::get('/signup', [\App\Http\Controllers\SiteController::class, 'Signup'])->name('site.signup');
Route::get('/myteam', [\App\Http\Controllers\SiteController::class, 'MyTeam'])->name('site.myteam');
Route::get('/profile', [\App\Http\Controllers\SiteController::class, 'Profile'])->name('site.profile');
Route::get('/teammake', [\App\Http\Controllers\SiteController::class, 'TeamMake'])->name('site.teammake');

Route::get('/admin', [\App\Http\Controllers\SiteController::class, 'Admin'])->name('site.admin');
Route::get('/admin/team', [\App\Http\Controllers\SiteController::class, 'AdminTeam'])->name('site.adminteam');
Route::get('/admin/teammate', [\App\Http\Controllers\SiteController::class, 'AdminTeammate'])->name('site.adminteammate');

Route::post('/users/signup', [\App\Http\Controllers\UserController::class, "SignupUser"])->name("userSignup");
Route::post('/users/login', [\App\Http\Controllers\UserController::class, "LoginUser"])->name("userLogin");;
Route::post('/users/update', [\App\Http\Controllers\UserController::class, "ModifyUser"])->name("userModify");
Route::post('/users/delete', [\App\Http\Controllers\UserController::class, "DeleteUser"])->name("userDelete");
Route::post('/users/logout', [\App\Http\Controllers\UserController::class, "LogoutUser"])->name("userLogout");

Route::post('/friendinvite/accept', [\App\Http\Controllers\UserController::class, "AcceptInvitation"])->name("inviteAccept");
Route::post('/friendinvite/reject', [\App\Http\Controllers\UserController::class, "RejectInvitation"])->name("inviteReject");

Route::post('/task/accept', [\App\Http\Controllers\UserController::class, "AcceptTask"])->name("taskAccept");
Route::post('/task/view', [\App\Http\Controllers\UserController::class, "ViewTask"])->name("taskView");

Route::post('/friend/delete', [\App\Http\Controllers\UserController::class, "DeleteFriend"])->name("friendDelete");

Route::post('/leaderboard/country', [\App\Http\Controllers\UserController::class, "GetCountryLeaderboard"])->name("leaderboardCountry");
Route::post('/leaderboard/friends', [\App\Http\Controllers\UserController::class, "GetFriendsLeaderboard"])->name("leaderboardFriends");