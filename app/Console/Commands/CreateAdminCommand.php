<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:create-admin {email} {password?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creat Admin User';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->argument('email');
        $password = $this->argument('password');
        if (!$password) {
            $password = Str::random(9);
        }

        if (User::query()->where('email', $email)->exists()) {
            $this->error('User already exists');

            return self::FAILURE;
        }

        $user = new User();
        $user->name = 'Admin User';
        $user->email = $email;
        $user->password = $password;
        $user->role = User::ROLE_ADMIN;
        $user->email_verified_at = new \DateTime();
        $user->save();

        if (!$this->argument('password')) {
            $this->info(sprintf('Admin password: %s', $password));
        }

        return self::SUCCESS;
    }
}
