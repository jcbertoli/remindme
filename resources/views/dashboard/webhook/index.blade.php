<x-main>

    <x-slot:content>

        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#createWebhookModal"
            aria-controls="createWebhookModal">
            Create webhook
        </button>

        <x-modals.createWebhook />

        <table class="table table-striped my-3">
            <thead class="thead">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Identifier</th>
                    <th scope="col">ID</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($userWebhooks as $webhook)
                <tr>
                    <th scope="row">{{ $webhook->id }}</th>
                    <td>{{ $webhook->identifier }}</td>
                    <td>{{ $webhook->webhook_id }}</td>
                    <td>
                        <button class="btn btn-primary btn-sm">
                            Edit
                        </button>
                        <button class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $userWebhooks->links() }}

    </x-slot:content>

</x-main>