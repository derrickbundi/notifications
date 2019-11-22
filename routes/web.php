<?php
use App\Notifications\EmailNotification;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

Route::get('/', function () {
    $when = Carbon::now()->addSeconds(10);
    $user = User::find(1);
    User::find(1)->notify((new EmailNotification($user))->delay($when));
    return view('welcome');
});

//Render emails in browser
Route::get('/email', function () {
    return new App\Mail\SendMail();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
