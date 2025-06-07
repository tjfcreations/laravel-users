<?php

namespace Tjall\Users\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUser extends Command
{
    protected $signature = 'user:create {email} {password} {--name=}';
    protected $description = 'Create a new user with a email, password, and optional name';

    public function handle()
    {
        $email = $this->argument('email');
        $password = $this->argument('password');
        $name = $this->option('name') ?? $email;

        // Check if user already exists
        if (User::where('email', $email)->exists()) {
            $this->error("User with email '{$email}' already exists.");
            return 1;
        }

        $user = User::create([
            'name' => $name,
            'email' => $email, // adjust as needed
            'password' => Hash::make($password),
        ]);

        $this->info("User '{$user->email}' created successfully with name '{$user->name}'.");
        return 0;
    }
}
