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
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Discord ID</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ \App\Enum\RoleEnum::values()[$user->role] }}</td>
                    <td>{{ $user->discord_id ?? 'None' }}</td>
                    <td>
                        <a class="text-decoration-none" href="{{ route('admin.listUserWebhooks', $user->id) }}">
                            <button class="btn btn-secondary btn-sm">
                                Webhooks
                            </button>
                        </a>
                        <a class="text-decoration-none" href="{{ route('admin.editUser', $user->id) }}">
                            <button class="btn btn-primary btn-sm">
                                Edit
                            </button>
                        </a>
                        <form class="d-inline" action="{{ route('admin.deleteUser', $user->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{ $users->links() }}

    </x-slot:content>
</x-main>