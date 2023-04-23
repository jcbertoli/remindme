<x-main>

    <x-slot:content>
        <h3>To continue, you need to change your password:</h3>

        <x-alerts :errorBag="$errors"/>

        <form action="{{ route('user.changePassword') }}" method="post">

            @method('put')

            @csrf

            <div class="form-group">
                <label for="password">Password</label>
                <input name="password" type="password" class="form-control" id="password"
                    placeholder="Password">
            </div>

            <div class="form-group mt-2">
                <label for="password_confirmation">Password</label>
                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" placeholder="Confirm password">
            </div>

            <button type="submit" class="btn btn-primary my-3">Save</button>

        </form>
    </x-slot:content>

</x-main>