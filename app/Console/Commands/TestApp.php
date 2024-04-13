<?php

namespace App\Console\Commands;

use App\Events\UserRegistered;
use App\Models\User;
use Illuminate\Console\Command;

class TestApp extends Command
{
    protected $signature = 'app:test';

    protected $description = 'Elastic add index product';

    public function handle()
    {
        $this->info('Start...');
        $user = User::first();
        UserRegistered::dispatch($user);
        $this->info('Done!');
        return self::SUCCESS;
    }
}
