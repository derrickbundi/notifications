<?php
use App\Notifications\EmailNotification;
use App\User;
use Carbon\Carbon;

Route::get('/', function () {
    $when = Carbon::now()->addSeconds(10);
    $user = User::find(1);
    User::find(1)->notify((new EmailNotification($user))->delay($when));
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
