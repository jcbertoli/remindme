<?php

namespace App\Repositories;

use App\Models\Reminder;
use Carbon\Carbon;

class ReminderRepository
{
    public function create(array $data)
    {
        return Reminder::create($data);
    }

    public function deleteById(int $id)
    {
        return Reminder::find($id)->delete();
    }

    public function getExpiredReminders()
    {
        return Reminder::whereDate('date', '<', Carbon::now()->toDateTimeString());
    }
}
