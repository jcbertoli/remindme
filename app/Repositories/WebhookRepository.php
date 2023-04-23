<?php

namespace App\Repositories;

use App\Models\Webhook;

class WebhookRepository
{
    public function create(array $data): Webhook|null
    {
        return Webhook::create($data);
    }

    public function deleteById(int $id)
    {
        return Webhook::find($id)->delete();
    }
}
