<?php

namespace App\Jobs;

use App\Mail\ContactMessage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class ContactEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $email;
    protected array $attributes;

    /**
     * Create a new job instance.
     */
    public function __construct(string $email, array $attributes)
    {
        $this->email = $email;
        $this->attributes = $attributes;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new ContactMessage($this->attributes));
    }
}
