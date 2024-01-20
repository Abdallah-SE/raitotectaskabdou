<!DOCTYPE html>
<html lang="en">

<head>
    <title>Raito Task - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link href="{{ asset('select2/css/select2.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('datatables/datatables.min.css') }}" rel="stylesheet">
    @stack('CSRFtoken')
    <!-- CSS  datepicker-->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('home.index') }}">Home</a>
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


    <main role="main" class="container">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-body-tertiary text-muted mt-5 m-5">


        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2024 Copyright:
            <a class="text-reset fw-bold" href="/">Abdallah</a>
        </div>
        <!-- Copyright -->
    </footer>

    <!-- Bootstrap JS -->
    <!-- jQuery -->
    <script src="{{ asset('jquery-3.7.1.js') }}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <!-- Select2 -->
    <script src="{{ asset('select2/js/select2.min.js') }}"></script>

    <script src="{{ asset('datatables/datatables.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <!-- Other JS -->
    @stack('js')
</body>

</html>
