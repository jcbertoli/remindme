<x-main>

    <x-slot:navContent>
        <form method="GET" class="d-flex">
            <input name="search" class="form-control me-sm-2" value="{{ request()->input('search') }}" type="search"
                placeholder="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
        </x-slot>

        <x-slot:content>

            <x-alerts :message="Session::get('message')"/>

            <button class="btn btn-primary shadow" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#createReminderModal" aria-controls="createReminderModal">
                Create reminder
            </button>

            <button class="btn btn-primary shadow" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#createWebhookModal" aria-controls="createWebhookModal">
                Create webhook
            </button>

            <x-modals.createReminder>
                <x-slot:webhookOptions>
                    @foreach($userWebhooks as $webhook)
                    <option value="{{ $webhook->id }}">{{ $webhook->identifier }}</option>
                    @endforeach
                </x-slot:webhookOptions>
            </x-modals.createReminder>

            <x-modals.createWebhook />

            <div class="row gap-3 mt-3 d-flex justify-content-center align-items-center">

                <h1 class="text-center">Your Reminders</h1>

                @if(!count($userReminders))
                <p class="text-center"><b>No reminders were found</b></p>
                @endif

                @foreach ($userReminders as $reminder)
                <div class="card shadow-lg bg-primary text-white mb-3 rounded-4"
                    style="max-width: 20rem; min-height: 12rem; padding: 0;">
                    <div class="card-header">{{ $reminder->title }} </div>
                    <div class="card-body">
                        <p class="card-text">{{ $reminder->description }}</p>
                        <p class="card-text">Webhook: {{ $reminder->webhook->identifier }}</p>
                        <p class="card-title">{{ $reminder->date }}</p>
                    </div>
                </div>
                @endforeach

                {{ $userReminders->links() }}

            </div>

        </x-slot:content>
</x-main>