<?php

namespace App\Jobs;

use App\Mail\TestSendMails;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class TestEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var
     */
    public $email;

    /**
     * @var
     */
    public $text;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email,$text)
    {
        $this->email=$email;
        $this->text=$text;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->email)->send(new TestSendMails($this->text));
    }
}
