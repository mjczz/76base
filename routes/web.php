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
    $user = \App\User::find(2);
    $user->name = 'czz';
    $user->save();
    dispatch(new \App\Jobs\SayHello($user));
    dispatch(new \App\Jobs\TestJob());

    $res = \App\User::with("posts")->get();
    return \App\Http\Resources\UserResource::collection($res);
});
