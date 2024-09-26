<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class GenerateUserLinks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:generate-links {count : The number of recent users to include}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a text file with links containing user information for the most recent users';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $count = $this->argument('count');

        $users = User::latest()->take($count)->get();

        $links = $users->map(function ($user) {
            return url('access/' . $user->email . '/' . $user->phone);
        });

        $content = $links->implode("\n");

        $filename = 'user_links_' . now()->format('Y-m-d_His') . '.txt';

        Storage::disk('local')->put($filename, $content);

        $this->info("File '{$filename}' has been created with {$count} user links.");
    }
}
