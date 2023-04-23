<x-main>

    <x-slot:content>
        <h3>Edit User - {{ $user->username }}</h3>

        <x-alerts :message="Session::get('message')" :errorBag="$errors" />

        <form action="{{ route('admin.updateUser') }}" method="post">

            @method('put')

            @csrf

            <div class="form-group mt-2">
                <label for="username">Username</label>
                <input name="username" value="{{ $user->username }}" type="text" class="form-control" id="username" placeholder="Username" required>
            </div>

            <div class="form-group mt-2">
                <label for="email">Email</label>
                <input name="email" value="{{ $user->email }}" type="email" class="form-control" id="email" placeholder="Email" required>
            </div>

            <div class="form-group mt-2">
                <label for="discord_id">Discord ID</label>
                <input name="discord_id" value="{{ $user->discord_id }}" type="text" class="form-control" id="discord_id" placeholder="Discord ID">
            </div>

            <div class="form-group mt-2">
                <fieldset>
                    <label class="form-label" for="roleSelect">Role</label>

                    <input type="hidden" name="id" value="{{ $user->id }}">

                    <select name="role" class="form-control" id="roleSelect"
                        required> 
                        @foreach(\App\Enum\RoleEnum::values() as $key => $value)
                            <option value="{{ $key }}" {{$user->role == $key ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                </fieldset>
            </div>

            <button type="submit" class="btn btn-primary my-3">Save</button>

        </form>

    </x-slot:content>

</x-main>