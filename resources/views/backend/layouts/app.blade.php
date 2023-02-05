<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin Dashboard</title>

    <link rel="stylesheet" href="{{asset('assets/css/main/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main/app-dark.css')}}">
    <link rel="shortcut icon" href="assets/images/logo/favicon.svg" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/logo/favicon.png" type="image/png">

    <link rel="stylesheet" href="{{asset('assets/css/shared/iconly.css')}}">
    @stack('css')

</head>

<body>
<script src="{{asset('assets/js/initTheme.js')}}"></script>
<div id="app">
    @include('backend.partials.sidebar')
    <div id="main" class="layout-navbar">
        @include('backend.partials.navbar')

        <div id="main-content">
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Vertical Layout with Navbar</h3>
                            <p class="text-subtitle text-muted">Navbar will appear on the top of the page.</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                {!! App\Helpers\generateBreadcrumb() !!}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-content">
                @yield('content')
            </div>
        </div>
    </div>
</div>
<script src="{{asset('assets/js/bootstrap.js')}}"></script>
<script src="{{asset('assets/js/app.js')}}"></script>
@stack('js')
</body>

</html>
