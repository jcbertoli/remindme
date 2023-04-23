<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/dashboard">Remindinho</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ Route::current()->getName() == 'dashboard' ? 'active' : '' }}"
                        href="{{ route('dashboard') }}">Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ Route::current()->getName() == 'webhook.index' ? 'active' : '' }}"
                        href="{{ route('webhook.index') }}">Webhooks
                    </a>
                </li>

                @if (Auth::user()->role == \App\Enum\RoleEnum::Admin)
                <li class="nav-item">
                    <a class="nav-link {{ Route::current()->getName() == 'admin.index' ? 'active' : '' }}"
                        href="{{ route('admin.index') }}">Admin</a>
                </li>
                @endif

            </ul>

            @isset($navContent)
            {{ $navContent }}
            @endisset

            <a href="{{ route('logout') }}" class="nav-link text-white ms-3">
                Logout
            </a>

        </div>
    </div>
</nav>