<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use Mail;

class WordOfTheDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'word:day';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a Daily email to all users with a word and its meaning';

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
        $words = [
            'News' => 'I dont blame anyone, I blame myself.',
            'News' => 'How can you assume?.',
            'News' => 'Casual Friday!',
            'News' => 'I dont blame anyone, I blame myself.',
            'News' => 'Casual Friday!.',
            'News' => 'Take me to the church. ****',
            'News' => 'Take me to the church. ****',
            'News' => 'Take me to the church. ****',
            'News' => 'Take me to the church. ****',
            'News' => 'Take me to the church. ****',
        ];

        // Finding a random word
        $key = array_rand($words);
        $value = $words[$key];
         
        $users = User::all();
        foreach($users as $user) {
            Mail::raw("{$key} -> {$value}", function ($mail) use ($user) {
                $mail->from('dipakrathod258@gmail.com');
                $mail->to($user->email)
                    ->subject('Word of the Day');
            });
        }    
        $this->info('Word of the Day sent to All Users');
    }
}