<div class="offcanvas offcanvas-start {{ $errors->createWebhook->first() || Session::get('showWebhookModal') ? 'show' : '' }}"
    tabindex="-1" id="createWebhookModal" aria-labelledby="createWebhookTitle">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="createWebhookTitle">New webhook</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

        <form action="{{ route('createWebhook') }}" method='POST'>

            <x-alerts :errorBag="$errors->createWebhook" :message="Session::get('createWebhookMessage')" />

            @csrf

            <div class="form-group">
                <fieldset>
                    <label class="form-label" for="identifierInput">Identifier</label>
                    <input name="identifier" class="form-control" id="identifierInput" type="text" value="{{ old('identifier') }}"
                        placeholder="Dinho's server" required>
                </fieldset>
            </div>

            <div class="form-group mt-3">
                <fieldset>
                    <label class="form-label" for="urlInput">Webhook URL</label>
                    <input name="url" class="form-control" id="urlInput" type="text" value="{{ old('url') }}"
                        placeholder="https://discord.com/api/webhooks/102615420/-EkMPc3sskc" required>
                </fieldset>
            </div>

            <div class="form-group mt-3 d-flex justify-content-end">
                <button class="btn btn-outline-primary">Create webhook</button>
            </div>
        </form>
    </div>
</div>