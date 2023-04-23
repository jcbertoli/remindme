<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class DiscordWebhookService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'verify' => false,
            'timeout' => 5.0,
            'base_uri' => 'https://discord.com/api/webhooks/'
        ]);
    }

    public function sendWebhookMessage(array $webhookData, string $message): void
    {
        try {
            $this->client->post(
                $webhookData['id'] . '/' . $webhookData['token'],
                [
                    'form_params' => [
                        'content' => $message
                    ],
                ]
            );
        } catch (RequestException $e) {
            if ($response = $e->getResponse()) {
                dd($response->getStatusCode());
            }
        }
    }
}
