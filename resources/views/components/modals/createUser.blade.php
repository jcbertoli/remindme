<div class="offcanvas offcanvas-start {{ $errors->createUser->first() || Session::get('showCreateUserModal') ? 'show' : '' }}"
    tabindex="-1" id="createUserModal" aria-labelledby="createUserTitle">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="createUserTitle">New user</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <form action="{{ route('admin.createUser') }}" method='POST'>

            <x-alerts :errorBag="$errors->createUser" :message="Session::get('createUserMessage')" />

            @csrf

            <div class="form-group">
                <fieldset>
                    <label class="form-label" for="usernameInput">Username</label>
                    <input name="username" class="form-control" id="usernameInput" type="text"
                        value="{{ old('username') }}" placeholder="johndoe" required>
                </fieldset>
            </div>

            <div class="form-group mt-3">
                <fieldset>
                    <label class="form-label" for="emailInput">Email</label>
                    <input name="email" class="form-control" id="emailInput" type="text" value="{{ old('email') }}"
                    placeholder="john@doe.com" required>
                </fieldset>
            </div>

            <div class="form-group mt-3">
                <fieldset>
                    <label class="form-label" for="discrd_idInput">Discord ID</label>
                    <input name="discord_id" class="form-control" id="discord_idInput" type="text" value="{{ old('discord_id') }}"
                    placeholder="275407931728461824">
                </fieldset>
            </div>

            <div class="form-group mt-3">
                <fieldset>
                    <label class="form-label" for="roleSelect">Role</label>
                    <select name="role" class="form-control" id="roleSelect" value="{{ old('role') }}"
                        required> 
                        @foreach(\App\Enum\RoleEnum::values() as $key => $value)
                            <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </fieldset>
            </div>

            <div class="form-group mt-3 d-flex justify-content-end">
                <button class="btn btn-outline-primary">Create user</button>
            </div>
        </form>
    </div>
</div>