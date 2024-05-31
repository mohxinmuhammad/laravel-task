<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Post;
use App\Notifications\DailyDigest;

class SendDailyDigest extends Command
{
    // Set the command signature and description
    protected $signature = 'digest:send';
    protected $description = 'Send daily email digest';

    // Implement the handle method
    public function handle()
    {
        $users = User::all();
        foreach ($users as $user) {
            $posts = Post::orderBy('created_at', 'desc')->take(5)->get();
            $user->notify(new DailyDigest($posts));
        }

        $this->info('Daily email digest has been sent to all users.');
    }
}
