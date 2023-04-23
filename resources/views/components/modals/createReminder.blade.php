<div class="offcanvas offcanvas-start {{ $errors->createReminder->first() || Session::get('showReminderModal') ? 'show' : '' }}"
    tabindex="-1" id="createReminderModal" aria-labelledby="createReminderTitle">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="createReminderTitle">New reminder</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <form action="{{ route('createReminder') }}" method='POST'>

            <x-alerts :errorBag="$errors->createReminder" :message="Session::get('createReminderMessage')" />

            @csrf

            <div class="form-group">
                <fieldset>
                    <label class="form-label" for="nameInput">Name</label>
                    <input name="title" class="form-control" id="nameInput" type="text"
                        placeholder="Go outside" required>
                </fieldset>
            </div>

            <div class="form-group mt-3">
                <fieldset>
                    <label class="form-label" for="descriptionInput">Description</label>
                    <input name="description" class="form-control" id="descriptionInput" type="text"
                        placeholder="It feels good">
                </fieldset>
            </div>

            <div class="form-group mt-3">
                <fieldset>
                    <label class="form-label" for="dateInput">Date</label>
                    <input name="date" type="datetime-local" id="dateInput" min="{{ today() }}"
                        class="form-control" required>
                </fieldset>
            </div>

            <div class="form-group mt-3">
                <fieldset>
                    <label class="form-label" for="webhook">Webhook</label>
                    <select name="webhook_id" type="select" id="webhook"
                        class="form-control" required>

                        {{ $webhookOptions }}

                    </select>
                </fieldset>
            </div>

            <div class="form-group mt-3 d-flex justify-content-end">
                <button class="btn btn-outline-primary">Create reminder</button>
            </div>
        </form>
    </div>
</div>
