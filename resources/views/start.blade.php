<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HotelSearcher - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>
<header class="p-3 bg-success text-white d-flex justify-content-between mb-5">
    <div>
        <a href="{{ route('main') }}" class="text-white text-decoration-none fs-4">HotelSearcher</a>
    </div>
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                @if (auth()->check())
                    <li class="nav-item"><a href="{{ route('hotels.list') }}"
                                            class="nav-link px-2 text-white">Hotels</a>
                    </li>
                    <li class="nav-item"><a href="{{ route('reviews.list') }}"
                                            class="nav-link px-2 text-white">Hotel reviews</a>
                    </li>
                    @can('create', \App\Models\Hotel::class)
                        <li class="nav-item"><a href="{{ route('hotels.add.hotel') }}" class="nav-link px-2 text-white">Add
                                Hotel</a></li>
                    @endcan
                    <li class="nav-item"><a href="{{ route('services.list') }}" class="nav-link px-2 text-white">Hotel
                            Services</a></li>
                    @can('create', \App\Models\Service::class)
                        <li class="nav-item"><a href="{{ route('services.add.service') }}"
                                                class="nav-link px-2 text-white">Add Hotel Service</a></li>
                    @endcan
                @endif
                <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link px-2 text-white">Contact</a></li>
                <li class="nav-item"><a href="{{ route('about') }}" class="nav-link px-2 text-white">About</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" action="{{ route('main') }}">
                <input type="text" class="form-control form-control-dark" placeholder="Search..." aria-label="Search"
                       value="{{ request()->get('name') }}">
            </form>

            <div class="text-end">
                @if (!auth()->check())
                    <button type="button" class="btn btn-outline-dark me-2"><a href="{{ route('login') }}"
                                                                               class="text-decoration-none text-white">Login</a>
                    </button>
                    <button type="button" class="btn btn-warning"><a href="{{ route('sign-up.form') }}"
                                                                     class="nav-link">Sign-up</a></button>
                @endif
                @if (auth()->check())
                    <form action="{{ route('logout') }}" method="post" class="form-inline">
                        @csrf
                        <button class="btn btn-danger">Logout</button>
                    </form>
                @endif
            </div>
        </div>
    </div>
</header>
<div class="container">
    @include('flash-messages')
    @yield('content')
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
        crossorigin="anonymous"></script>
</body>
<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
        <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
            <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
        </a>
        <span class="mb-3 mb-md-0 text-muted">© 2022 HotelSearcher, Inc</span>
    </div>
</footer>
</html>
