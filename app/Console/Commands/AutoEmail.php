<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class AutoEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an automated Email to Users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $totalUsers = \DB::table('users')
                  ->whereRaw('Date(created_at) = CURDATE()')
                  ->count();
        Mail::to('derrick.bundi27@gmail.com')->send(new SendMail($totalUsers));   
    }
}
