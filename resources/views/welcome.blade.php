@extends('layouts.app')

@section('content')

            @if ($message = Session::get('success'))
            <div class="mt-4 p-5 bg-primary text-white rounded m-0 text-success-section" style="margin-0">
            <h1 class="mt-0">Išsprendėte klausimyną</h1>
            <p>{{ $message }}</p>
            </div>
            @endif

        <!-- Header-->
        <header class="masthead d-flex align-items-center">
            <div class="container px-4 px-lg-5 text-center">
                <h1 class="mb-1">Pradėkite atsakynėti į klausimus</h1>
                <h3 class="mb-5"><em>Įveskite klausimyno numerį ir pradėkite!</em></h3>
                <form class="d-flex text-center justify-content-center align-middle form-search-main" method="GET" action="{{route('answer-questioneer','4155')}}">
                    @csrf
                    <div class="shadow-lg d-flex">
                <input name="search_input" type="text" class="py-3 px-3 form-control w-auto input-medium form-control-lg" placeholder="as4das4da3sd" required>
                <button type="submit" class="py-3 px-3 text-uppercase btn btn-primary">Pradėti</button>
                </div>
                </form>
                @if ($message = Session::get('error'))
            <div class="text-danger mt-2">
                {{ $message }}
            </div>
            @endif
            </div>
        </header>
        <!-- About-->
        <section class="content-section bg-light" id="about">
            <div class="container px-4 px-lg-5 text-center">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-10">
                        <h2>Stylish Portfolio is the perfect theme for your next project!</h2>
                        <p class="lead mb-5">
                            This theme features a flexible, UX friendly sidebar menu and stock photos from our friends at
                            <a href="https://unsplash.com/">Unsplash</a>
                            !
                        </p>
                        <a class="btn btn-dark btn-xl" href="#services">What We Offer</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Services-->
        <section class="content-section bg-primary text-white text-center hidden" id="services">
            <div class="container px-4 px-lg-5">
                <div class="content-section-heading">
                    <h3 class="text-secondary mb-0">Services</h3>
                    <h2 class="mb-5">What We Offer</h2>
                </div>
                <div class="row gx-4 gx-lg-5">
                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-screen-smartphone"></i></span>
                        <h4><strong>Responsive</strong></h4>
                        <p class="text-faded mb-0">Looks great on any screen size!</p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-5 mb-lg-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-pencil"></i></span>
                        <h4><strong>Redesigned</strong></h4>
                        <p class="text-faded mb-0">Freshly redesigned for Bootstrap 5.</p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-5 mb-md-0">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-like"></i></span>
                        <h4><strong>Favorited</strong></h4>
                        <p class="text-faded mb-0">
                            Millions of users
                            <i class="fas fa-heart"></i>
                            Start Bootstrap!
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <span class="service-icon rounded-circle mx-auto mb-3"><i class="icon-mustache"></i></span>
                        <h4><strong>Question</strong></h4>
                        <p class="text-faded mb-0">I mustache you a question...</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Callout-->
        <section class="callout">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mx-auto mb-5">
                    Welcome to
                    <em>your</em>
                    next website!
                </h2>
                <a class="btn btn-primary btn-xl" href="https://startbootstrap.com/theme/stylish-portfolio/">Download Now!</a>
            </div>
        </section>
        <!-- Portfolio-->
        <section class="content-section" id="portfolio">
            <div class="container px-4 px-lg-5">
                <div class="content-section-heading text-center">
                    <h3 class="text-secondary mb-0">Portfolio</h3>
                    <h2 class="mb-5">Recent Projects</h2>
                </div>
                <div class="row gx-0">
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Stationary</div>
                                    <p class="mb-0">A yellow pencil with envelopes on a clean, blue backdrop!</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="{{ asset('img/portfolio-1.jpg')}}" alt="..." />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Ice Cream</div>
                                    <p class="mb-0">A dark blue background with a colored pencil, a clip, and a tiny ice cream cone!</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="{{ asset('img/portfolio-2.jpg')}}" alt="..." />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Strawberries</div>
                                    <p class="mb-0">Strawberries are such a tasty snack, especially with a little sugar on top!</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="{{ asset('img/portfolio-3.jpg')}}" alt="..." />
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">Workspace</div>
                                    <p class="mb-0">A yellow workspace with some scissors, pencils, and other objects.</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="{{ asset('img/portfolio-4.jpg')}}" alt="..." />
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- Call to Action-->
        <section class="content-section bg-primary text-white">
            <div class="container px-4 px-lg-5 text-center">
                <h2 class="mb-4">The buttons below are impossible to resist...</h2>
                <a class="btn btn-xl btn-light me-4" href="#!">Click Me!</a>
                <a class="btn btn-xl btn-dark" href="#!">Look at Me!</a>
            </div>
        </section>

@endsection