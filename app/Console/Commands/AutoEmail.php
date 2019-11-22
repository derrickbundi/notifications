<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class AutoEmail extends Command
{

    protected $signature = 'emails:users';

    protected $description = 'Send an automated Email to Users';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $userOnExp = \DB::table('users')
                //   ->whereRaw('Date(created_at) = CURDATE()')
                  ->where('exp', '=', 11)
                  ->get();
        foreach($userOnExp as $exp){
            if($exp->exp == 11){
                Mail::to($exp->email)->send(new SendMail($userOnExp));
            }
        }
        // Mail::to('derrick.bundi27@gmail.com')->send(new SendMail($userOnExp));
    }
}
