    @extends('client_layout.client')

    @section('title')
        Home
    @endsection

    @section('content')
        <!-- start content -->
        <section id="home-section" class="hero">
            @foreach ($sliders as $slider)
                <div class="home-slider owl-carousel">
                    <div class="slider-item"
                        style="background-image: url(storage/slider_images/{{ $slider->slider_image }});">
                        <div class="overlay"></div>
                        <div class="container">
                            <div class="row slider-text justify-content-center align-items-center"
                                data-scrollax-parent="true">

                                <div class="col-md-12 ftco-animate text-center">
                                    <h1 class="mb-2">{{ $slider->description1 }}</h1>
                                    <h2 class="subheading mb-4">{{ $slider->description2 }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach

        </section>

        <section class="ftco-section">
            <div class="container">
                <div class="row no-gutters ftco-services">
                    <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services mb-md-0 mb-4">
                            <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                                <span class="flaticon-shipped"></span>
                            </div>
                            <div class="media-body">
                                <h3 class="heading">{{ __('free delivery') }}</h3>
                                <span>{{ __('An order over $100') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services mb-md-0 mb-4">
                            <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
                                <span class="flaticon-diet"></span>
                            </div>
                            <div class="media-body">
                                <h3 class="heading">{{ __('Always fresh') }}</h3>
                                <span>{{ __('Product well package') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services mb-md-0 mb-4">
                            <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                                <span class="flaticon-award"></span>
                            </div>
                            <div class="media-body">
                                <h3 class="heading">{{ __('Superior quality') }}</h3>
                                <span>{{ __('Quality products') }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services mb-md-0 mb-4">
                            <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
                                <span class="flaticon-customer-service"></span>
                            </div>
                            <div class="media-body">
                                <h3 class="heading">{{ __('Support') }}</h3>
                                <span>{{ __('24/7 Support') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="ftco-section ftco-category ftco-no-pt">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 order-md-last align-items-stretch d-flex">

                            </div>
                            <div class="col-md-6">
                                <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
                                    style="background-image: url(storage/product_images/téléchargement_1643982764.jfif);">
                                    <div class="text px-3 py-1 bg-warning">
                                        <h2 class="mb-0"><a href="#">{{ __('Router') }}</a></h2>
                                    </div>
                                </div>
                                <div class="category-wrap ftco-animate img d-flex align-items-end"
                                    style="background-image: url(storage/product_images/16947297_1643981596.jpg);">
                                    <div class="text px-3 py-1 bg-warning">
                                        <h2 class="mb-0"><a href="#">{{ __('Desktop Computer') }}</a></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
                            style="background-image: url(storage/product_images/laptop4_1643955493.jpg);">
                            <div class="text px-3 py-1 bg-warning">
                                <h2 class="mb-0"><a href="#">{{ __('Laptop') }}</a></h2>
                            </div>
                        </div>
                        <div class="category-wrap ftco-animate img d-flex align-items-end"
                            style="background-image: url(storage/product_images/images_1643962768.jfif);">
                            <div class="text px-3 py-1 bg-warning">
                                <h2 class="mb-0"><a href="#">{{ __('Phone') }}</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center mb-3 pb-3">
                    <div class="col-md-12 heading-section text-center ftco-animate">
                        <span class="subheading text-success">{{ __('All products') }}</span>
                        <h2 class="mb-4">{{ __('Our current products') }}</h2>
                        <p>{{ __('The products we have available we have here are currently available') }}</p>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-6 col-lg-3 ftco-animate">
                            <div class="product">
                                <a href="#" class="img-prod"><img class="img-fluid"
                                        src="storage/product_images/{{ $product->product_image }}"
                                        alt="Colorlib Template">
                                    <div class="overlay"></div>
                                </a>
                                <div class="text py-3 pb-4 px-3 text-center">
                                    <h3><a href="#">{{ $product->product_name }}</a></h3>
                                    <div class="d-flex">
                                        <div class="pricing">
                                            <p class="price"><span class="mr-2 price-dc">$120.00</span><span
                                                    class="price-sale">$ {{ $product->product_price }}</span></p>
                                        </div>
                                    </div>
                                    <div class="bottom-area d-flex px-3">
                                        <div class="m-auto d-flex">
                                            <a href="#"
                                                class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                                <span><i class="ion-ios-menu"></i></span>
                                            </a>
                                            <a href="{{ url('/addtocart/' . $product->id) }}"
                                                class="buy-now d-flex justify-content-center align-items-center mx-1">
                                                <span><i class="ion-ios-cart"></i></span>
                                            </a>
                                            <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                                <span><i class="ion-ios-heart"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
        </section>

        {{-- section class="ftco-section img" style="background-image: url(storage/product_images/944215289_1643372264.jpg);">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
                        <span class="subheading ">Meilleur Prix Pour Vous</span>
                        <h2 class="mb-4 text-purple">Affaire du jour</h2>
                        <h3><a href="#">Spinach</a></h3>
                        <span class="price">$10 <a href="#">now $5 only</a></span>
                        <div id="timer" class="d-flex mt-5">
                            <div class="time" id="days"></div>
                            <div class="time pl-3" id="hours"></div>
                            <div class="time pl-3" id="minutes"></div>
                            <div class="time pl-3" id="seconds"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
        < <section class="ftco-section testimony-section">
            <div class="container">
                <div class="row justify-content-center mb-5 pb-3">
                    <div class="col-md-7 heading-section ftco-animate text-center">
                        <span class="subheading">Témoignage</span>
                        <h2 class="mb-4">Notre client satisfait dit</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                            live the blind texts. Separated they live in</p>
                    </div>
                </div>
                <div class="row ftco-animate">
                    <div class="col-md-12">
                        <div class="carousel-testimony owl-carousel">
                            <div class="item">
                                <div class="testimony-wrap p-4 pb-5">
                                    <div class="user-img mb-5" style="background-image: url(frontend/images/person_1.jpg)">
                                        <span class="quote d-flex align-items-center justify-content-center">
                                            <i class="icon-quote-left"></i>
                                        </span>
                                    </div>
                                    <div class="text text-center">
                                        <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the
                                            countries Vokalia and Consonantia, there live the blind texts.</p>
                                        <p class="name">Garreth Smith</p>
                                        <span class="position">Marketing Manager</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-wrap p-4 pb-5">
                                    <div class="user-img mb-5"
                                        style="background-image: url(frontend/images/person_2.jpg)">
                                        <span class="quote d-flex align-items-center justify-content-center">
                                            <i class="icon-quote-left"></i>
                                        </span>
                                    </div>
                                    <div class="text text-center">
                                        <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the
                                            countries Vokalia and Consonantia, there live the blind texts.</p>
                                        <p class="name">Garreth Smith</p>
                                        <span class="position">Interface Designer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-wrap p-4 pb-5">
                                    <div class="user-img mb-5"
                                        style="background-image: url(frontend/images/person_3.jpg)">
                                        <span class="quote d-flex align-items-center justify-content-center">
                                            <i class="icon-quote-left"></i>
                                        </span>
                                    </div>
                                    <div class="text text-center">
                                        <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the
                                            countries Vokalia and Consonantia, there live the blind texts.</p>
                                        <p class="name">Garreth Smith</p>
                                        <span class="position">UI Designer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-wrap p-4 pb-5">
                                    <div class="user-img mb-5"
                                        style="background-image: url(frontend/images/person_1.jpg)">
                                        <span class="quote d-flex align-items-center justify-content-center">
                                            <i class="icon-quote-left"></i>
                                        </span>
                                    </div>
                                    <div class="text text-center">
                                        <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the
                                            countries Vokalia and Consonantia, there live the blind texts.</p>
                                        <p class="name">Garreth Smith</p>
                                        <span class="position">Web Developer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="testimony-wrap p-4 pb-5">
                                    <div class="user-img mb-5"
                                        style="background-image: url(frontend/images/person_1.jpg)">
                                        <span class="quote d-flex align-items-center justify-content-center">
                                            <i class="icon-quote-left"></i>
                                        </span>
                                    </div>
                                    <div class="text text-center">
                                        <p class="mb-5 pl-4 line">Far far away, behind the word mountains, far from the
                                            countries Vokalia and Consonantia, there live the blind texts.</p>
                                        <p class="name">Garreth Smith</p>
                                        <span class="position">System Analyst</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </section>

            <hr>

            <section class="ftco-section ftco-partner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm ftco-animate">
                            <a href="#" class="partner"><img src="frontend/images/partner-1.png"
                                    class="img-fluid" alt="Colorlib Template"></a>
                        </div>
                        <div class="col-sm ftco-animate">
                            <a href="#" class="partner"><img src="frontend/images/partner-2.png"
                                    class="img-fluid" alt="Colorlib Template"></a>
                        </div>
                        <div class="col-sm ftco-animate">
                            <a href="#" class="partner"><img src="frontend/images/partner-3.png"
                                    class="img-fluid" alt="Colorlib Template"></a>
                        </div>
                        <div class="col-sm ftco-animate">
                            <a href="#" class="partner"><img src="frontend/images/partner-4.png"
                                    class="img-fluid" alt="Colorlib Template"></a>
                        </div>
                        <div class="col-sm ftco-animate">
                            <a href="#" class="partner"><img src="frontend/images/partner-5.png"
                                    class="img-fluid" alt="Colorlib Template"></a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- end content -->

        @endsection
