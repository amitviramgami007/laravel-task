<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Frontend</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            /* Make the image fully responsive */
            .carousel-inner img
            {
                width: 100%;
                height: 100%;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark justify-content-between">
            <!-- Brand -->
            <a class="navbar-brand" href="{{ route('frontend') }}">Logo</a>

            <!-- Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('frontend') }}">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('frontend') }}">Products</a>
                </li>

                <!-- Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href = "{{ route('logout') }}" onclick = "event.preventDefault();document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>

        <div class="container">
            <div id="demo" class="carousel slide" data-ride="carousel">
                <ul class="carousel-indicators">
                  <li data-target="#demo" data-slide-to="0" class="active"></li>
                  <li data-target="#demo" data-slide-to="1"></li>
                  <li data-target="#demo" data-slide-to="2"></li>
                </ul>
                <div class="carousel-inner">
                    @foreach ($banners as $banner)
                        <div class="carousel-item {{ $banner['id']==1 ? 'active':'' }}">
                            <img src="{{ asset('/storage/banners/'.$banner['image']) }}" alt="Slider Image" width="1100" height="500">
                            <div class="carousel-caption">
                                <h3>{{ $banner['image_name'] }}</h3>
                            </div>
                        </div>
                    @endforeach
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
              </div>
        </div>
    </body>
</html>
