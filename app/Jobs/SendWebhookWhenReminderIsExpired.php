<?php

namespace App\Jobs;

use App\Services\DiscordWebhookService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendWebhookWhenReminderIsExpired implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private array $reminder, private array $webhook)
    {
        $this->reminder = $reminder;
        $this->webhook = $webhook;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $discordWebhookService = new DiscordWebhookService();

        $discordWebhookService->sendWebhookMessage($this->webhook, $this->buildMessage());
    }

    protected function buildMessage()
    {
        $message = "Reminder expired!\nTitle: {$this->reminder['title']}\nDescription: {$this->reminder['description']}\nDate: {$this->reminder['date']}";
    
        if(isset($this->reminder['user_id']))
            $message .= "\n<@" . $this->reminder['user_id'] . ">";
        
        return $message;
    }
}
