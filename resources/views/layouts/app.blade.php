<!DOCTYPE html>
<html lang="{{ App::getLocale() }}"  class="{{ App::getLocale() == 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <title>Raito Task - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" crossorigin="anonymous">

    <link href="{{ asset('select2/css/select2.min.css') }}" rel="stylesheet" />

    <link href="{{ asset('datatables/datatables.min.css') }}" rel="stylesheet">
    @stack('CSRFtoken')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS  datepicker-->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" />


    <link href="{{ asset('main.css') }}" rel="stylesheet" />

</head>

<body>
     @include('layouts.header')


    <main role="main" class="container">
        @yield('content')
    </main>

    @include('layouts.footer')
</body>

</html>
