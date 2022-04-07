@extends('frontend.layouts.master')

@section('css')
@endsection

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

            <div class="carousel-inner" role="listbox">

                @foreach ($banners as $banner)
                    <div class="carousel-item {{ $banner['id'] == 1 ? 'active':'' }}" style="background-image: url({{ asset('/storage/banners/'.$banner['image']) }})">
                        <div class="carousel-container">
                            <div class="container">
                                <h2 class="animate__animated animate__fadeInDown">{{ $banner['image_name'] }}</h2>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>

            <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>
        </div>
  </section><!-- End Hero -->

@endsection

@section('script')
@endsection
