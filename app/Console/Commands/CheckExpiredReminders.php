<?php

namespace App\Console\Commands;

use App\Jobs\SendWebhookWhenReminderIsExpired;
use App\Repositories\ReminderRepository;
use Illuminate\Console\Command;

class CheckExpiredReminders extends Command
{
    protected $repository;

    public function __construct(ReminderRepository $repository)
    {
        parent::__construct();

        $this->repository = $repository;
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check the expired reminders';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $expiredReminders = $this->repository->getExpiredReminders()->with(['webhook'])->get();

        foreach ($expiredReminders as $reminder) {
            SendWebhookWhenReminderIsExpired::dispatch(
                [
                    'title' => $reminder->title,
                    'description' => $reminder->description,
                    'date' => $reminder->date,
                    'user_id' => $reminder->user->discord_id
                ],
                [
                    'id' => $reminder->webhook->webhook_id,
                    'token' => $reminder->webhook->token
                ]
            );

            $this->repository->deleteById($reminder->id);
        }
    }
}
