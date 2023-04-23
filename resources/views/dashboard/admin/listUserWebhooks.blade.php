<x-main>
    <x-slot:content>
        <button class="btn btn-primary shadow" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#createUserModal" aria-controls="createUserModal">
            Create user
        </button>

        <x-modals.createUser />

        <x-modals.createWebhook />

        <table class="table table-striped my-3">
            <thead class="thead">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Identifier</th>
                    <th scope="col">Webhook ID</th>
                </tr>
            </thead>
            <tbody>
                @foreach($webhooks as $webhook)
                <tr>
                    <th scope="row">{{ $webhook->id }}</th>
                    <td>{{ $webhook->identifier }}</td>
                    <td>{{ $webhook->webhook_id }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $webhooks->links() }}

    </x-slot:content>
</x-main>