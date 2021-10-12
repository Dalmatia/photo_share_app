<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\FrontendController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// プロフィール画面
Route::get('/profile', [FollowController::class, 'profile'])->name('profile')->middleware('auth');
// ユーザーアバター
Route::get('/user/{id}', [FollowController::class, 'profilePic'])->middleware('auth');
Route::post('profile-pic', [FollowController::class, 'updateProfilePic'])->middleware('auth');
Route::get('/user/bg/{id}', [FollowController::class, 'userbgPic'])->middleware('auth');
Route::post('bg-pic', [FollowController::class, 'updatebgPic'])->name('bg.pic')->middleware('auth');
// ホーム画面
Route::get('/', [FrontendController::class, 'index'])->name('index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
// フォロー機能
Route::post('/follow', [FollowController::class, 'followUnfollow'])->middleware('auth');
// プロフィール画面
Route::get('/user/profile/{id}', [FrontendController::class, 'userAlbum'])->name('user.album');
// アルバム閲覧
Route::get('/albums/{slug}/{id}', [GalleryController::class, 'viewAlbum'])->name('view.album');
// アルバム取得
Route::get('/getAlbums', [AlbumController::class, 'getAlbums'])->middleware('auth');
// 写真取得
Route::get('/getImages', [GalleryController::class, 'images'])->middleware('auth');
// 写真の削除
Route::delete('/image/{id}', [GalleryController::class, 'destroy'])->middleware('auth');
// アルバム作成
Route::get('/albums/create', [AlbumController::class, 'create'])->name('album.create')->middleware('auth');
//アルバム一覧表示
Route::get('/albums', [AlbumController::class, 'index'])->middleware('auth');
// 
Route::post('/albums/store', [AlbumController::class, 'store'])->middleware('auth');
// アルバム更新
Route::put('albums/{id}/edit', [AlbumController::class, 'update'])->middleware('auth');
// アルバム削除
Route::delete('/albums/{id}/delete', [AlbumController::class, 'destroy'])->middleware('auth');
// 画像アップロード
Route::get('upload/images/{id}', [GalleryController::class, 'create'])->middleware('auth');
Route::post('uploadImage', [GalleryController::class, 'upload'])->middleware('auth');