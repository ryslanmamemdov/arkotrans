<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- CoreUI for Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.1.0/dist/css/coreui.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link href="{{ asset('css/icon.css') }}" rel="stylesheet">
</head>

<body>
    @include('admin.partials.menu')
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        <header class="header header-sticky mb-4">

        </header>
        <div class="body flex-grow-1 px-3">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col">
                        @if (Session::has('error'))
                            <div class="alert alert-danger" role="alert">{!! Session::get('error') !!}</div>
                        @endif
                        @if (Session::has('message'))
                            <div class="alert alert-success" role="alert">{!! Session::get('message') !!}</div>
                        @endif
                        @if ($errors && $errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div><a href="https://coreui.io">CoreUI </a><a href="https://coreui.io">Bootstrap Admin Template</a> © 2021
                creativeLabs.</div>
            <div class="ms-auto">Powered by&nbsp;<a href="https://coreui.io/bootstrap/ui-components/">CoreUI UI
                    Components</a></div>
        </footer>
    </div>

    <!-- Option 1: CoreUI for Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.1.0/dist/js/coreui.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>
