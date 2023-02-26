<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Models\Comentario;
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

Route::get('/', HomeController::class)->name('home');

Route::get('/crear-cuenta', [ RegisterController::class , 'index'])->name('register.create');
Route::post('/crear-cuenta', [ RegisterController::class , 'store'])->name('register.store');
Route::get('login' , [LoginController::class, 'index'])->name('login');
Route::post('login' , [LoginController::class, 'store']);
Route::post('logout' , [LogoutController::class, 'store'])->name('logout');
Route::get('/editar-perfil' , [PerfilController::class, 'index'])->name('perfil.index');
Route::post('/editar-perfil' , [PerfilController::class , 'store'])->name('perfil.store');

Route::get('/post/create', [ PostController::class , 'create'])->name('post.create');
Route::post('/post', [ PostController::class , 'store'])->name('post.store');


Route::delete('post/{post}',[PostController::class , 'destroy'])->name('post.destroy');

Route::post('/imagenes', [ ImagenController::class , 'store'])->name('imagenes.store');

//likes a las imagenes
Route::post('/post/{post}/likes' , [LikeController::class, 'store'])->name('post.like.store');
Route::delete('/post/{post}/likes' , [LikeController::class, 'destroy'])->name('post.like.destroy');

Route::post('/{user:username}/post/{post}', [ ComentarioController::class , 'store'])->name('comentario.store');
Route::get('/{user:username}/post/{post}', [ PostController::class , 'show'])->name('post.show');
Route::get('/{user:username}', [ PostController::class , 'index'])->name('post.index');

Route::post('/{user:username}/follow', [FollowerController::class ,'store'])->name('user.follow');
Route::delete('/{user:username}/unfollow', [FollowerController::class ,'destroy'])->name('user.unfollow');