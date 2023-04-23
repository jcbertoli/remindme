<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWebhookRequest;
use App\Repositories\WebhookRepository;

class WebhookController extends Controller
{

    public function __construct(private WebhookRepository $repository)
    {
    }

    public function index() {
        $userWebhooks = Auth()->user()->webhooks()->paginate(10);

        return view('dashboard.webhook.index', compact('userWebhooks'));
    }

    public function create(CreateWebhookRequest $request)
    {
        $data = $request->validated();

        $webhookUrl = explode('/', $request->url);

        $data['webhook_id'] = $webhookUrl[5];

        $data['token'] = $webhookUrl[6];
        
        $data['user_id'] = Auth()->user()->id;

        $webhook = $this->repository->create($data);

        if(!$webhook)
            return redirect()->back()->with('showWebhookModal', true)->with('errors', 'Could not create webhook.')->withInput();

        return redirect()->back()->with('showWebhookModal', true)->with('createWebhookMessage', 'Webhook successfully created.');
    }

    public function edit($id)
    {
        //
    }

    public function delete($id)
    {
        //
    }
}
