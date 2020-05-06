<?php
/**
 * Created by czz.
 * User: czz
 * Date: 2020/5/6
 * Time: 17:20
 */

Route::get('/job', function () {
    $user = \App\User::find(2);
    $user->name = 'czz';
    $user->save();

    // 调度任务
    dispatch(new \App\Jobs\SayHello($user));
    dispatch(new \App\Jobs\TestJob());

    return \App\Http\Resources\UserResource::collection(\App\User::with("posts")->get());
});
