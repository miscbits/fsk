<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\RemoveOldTokens;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\EmailInvite;
use App\Regtoken;

class invite extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'invite {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an invite to register to a specified email';

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
        $key = str_random(20);
        $regtoken = Regtoken::create(['token'=>$key]);
        $this->comment($key);

        Mail::to($this->argument('email'))->send(new EmailInvite($regtoken));
    }
}
