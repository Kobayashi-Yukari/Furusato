<nav class="navbar navbar-expand-md navbar-light bg-dark shadow-sm">
    <div class="container" style="max-width:100%;">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('admin.home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="" width="120">
            <div class="mt-2">
                <span class="text-white">/</span>
                <span class="text-white">TORiX管理画面</span>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto" style="gap: 20px;">
                <!-- Authentication Links -->
                @unless(Auth::guard('admin')->check())
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('admin.login') }}">{{ __('Login') }}</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link text-white dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()?->name ?? '' }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="left:auto; right:0;">
                            <a class="dropdown-item" href="{{ route('admin.logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                            <a class="dropdown-item" href="{{ route('admin.passwords.edit') }}">パスワード変更</a>
                        </div>
                    </li>
                @endunless
            </ul>
        </div>
    </div>
</nav>
