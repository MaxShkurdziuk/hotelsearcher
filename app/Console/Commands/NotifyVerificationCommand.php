<?php

namespace App\Console\Commands;

use App\Mail\EmailConfirm;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class NotifyVerificationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:notify-verification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify for verification remembering';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::all();
        foreach ($users as $user) {
            if ($user->email_verified_at === null)
                Mail::to($user->email)->send(new EmailConfirm($user));
        }

        return self::SUCCESS;
    }
}
