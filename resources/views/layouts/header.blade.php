<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item  ms-auto">
                    <a class="nav-link active" aria-current="page"
                        href="{{ route('home.index') }}">{{ __('home.Home') }}</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ app()->getLocale() }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                        @foreach ($availableLanguages as $lang)
                            <li>
                                <a class="dropdown-item {{ app()->getLocale() === $lang->code ? 'active' : '' }}"
                                    href="{{ route('languages.switch', $lang->code) }}">
                                    {{ $lang->code }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>