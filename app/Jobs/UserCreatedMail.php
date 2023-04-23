<?php

namespace App\Jobs;

use App\Mail\UserCreated;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;

class UserCreatedMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private array $data)
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {        
        Mail::to($this->data['email'])->send(new UserCreated([
            'username' => $this->data['username'],
            'password' => $this->data['password']
        ]));
    }
}
