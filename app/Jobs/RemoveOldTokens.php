<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Regtoken;

class RemoveOldTokens implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected $regtoken;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Regtoken $regtoken)
    {
        $this->regtoken = $regtoken;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->regtoken->delete();
    }
}
