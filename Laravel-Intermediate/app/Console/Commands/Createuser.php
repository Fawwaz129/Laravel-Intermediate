<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class Createuser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'laravel:adduser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'creat default user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle():void
    {
        $name = $this->ask('input name');
        $email = $this->ask('input email');
        $password = $this->ask('input password');

        $this->line("user : {$name} <{$email}>");
        if($this->confirm('do you wish to continue')){
            $user = new User();

            $user ->name = $name;
            $user ->email = $email;
            $user ->password = $password;

            $user->save();
            $this->info('User sudah di buat');

        }else{
            $this->error('batal');

        }
        $this->line('done');
    }
}
