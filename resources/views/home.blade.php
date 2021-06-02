@extends('layout.default')
@section('content')
    @include('layouts.slider')
    <!-- End Of Hero Section -->
    <!-- Start Of Category Section -->
    <section class="pink-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 wow fadeInUp">
                    <div class="category-box">
                        <i class="fa fa-wifi" aria-hidden="true"></i>
                        <h5>Home Internet</h5>
                    </div>
                </div>
                <div class="col-sm-4 wow fadeInUp">
                    <div class="category-box">
                        <i class="fa fa-television" aria-hidden="true"></i>
                        <h5>TV</h5>
                    </div>
                </div>
                <div class="col-sm-4 wow fadeInUp">
                    <div class="category-box">
                        <i class="fa fa-mobile" aria-hidden="true"></i>
                        <h5>Sim only deals</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Of Category Section -->
    <!-- Start Of Reviews Section -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 wow fadeInUp">
                    <div class="reviews-box">
                        <img src="./assets/images/reviews-image.jpg" alt="" title="">
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Of Reviews Section -->
    <!-- Start Of Enjoy our best deals Section -->
    <section class="empty-space-bottom">
        <div class="">
            <div class="row">
                <div class="col-md-4 col-sm-6 wow fadeInLeft">
                    <div class="best-deals-info">
                        <h1 class="title-text">{{ getOption('section1_title', 'Enjoy our best deals') }}</h1>
                        <p>{{ getOption('section1_description', '') }}</p>
                        <a href="{{ getOption('section1_url', '#') }}" class="button pink-bg">See Internet deals</a>
                    </div>
                </div>
                <div class="col-md-8 col-sm-6 wow fadeInRight">
                    <div class="plans-slider">
                        @if(isset($best_deals))
                            @foreach($best_deals as $deal)
                                <div class="plans-col">
                                    <div class="plans-box best-deals-plans-box" id="plansmoreinfo01">
                                        <div class="plans-icon">
                                            <i class="fa fa-wifi" aria-hidden="true"></i>
                                            <i class="fa fa-mobile" aria-hidden="true"></i>
                                        </div>
                                        <div class="plans-info match">
                                            <h5>{{ $deal['title'] }}</h5>
                                            <h2>£{{$deal['product_price']}}</h2>
                                            <h6>11Mb*</h6>
                                            <h6>Including line rental</h6>
                                            <hr>
                                            <ul>
                                                @foreach($deal['attributes'] as $attribute)
                                                    <li>{{ $attribute['value'] }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="plans-button">
                                            <a href="#" class="button button-border pink-color">BUY now</a>
                                            <a href="#plansmoreinfo{{ $deal['id'] }}" data-toggle="collapse"
                                               class="button button-border blue-color">More info</a>
                                        </div>
                                        <div class="plans-more-info" id="plansmoreinfo{{ $deal['id'] }}">
                                            <h3>Further details</h3>
                                            {!! $deal['product_description'] !!}
                                            <a href="#" class="button pink-bg">BUY NOW</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <h5>No deals found!</h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Of Enjoy our best deals Section -->
    <!-- Start Of We help you find your best connection Section -->
    <section class="empty-space light-green-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 wow fadeInUp">
                    <div class="find-connection">
                        <h2><img src="./assets/images/postcode-icon.png" alt="" title="">{{ getOption('section2_title', 'We help you find your best
                            connection.') }}</h2>
                        <h5>{{ getOption('section2_label', 'Check my postcode') }}</h5>
                        <form action="/" method="POST">
                            @csrf
                            <input type="" name="" placeholder="Enter your Landline">
                            <input type="" name="" placeholder="Enter your Postcode">
                            <button type="submit">Go</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Of We help you find your best connection Section -->
    <!-- Start Of Upgrade to Pop TV Section -->
    <section class="empty-space-top upgrade-pop-tv-bg">
        <div class="container">
            <div class="row">

                <div class="col-sm-6 wow fadeInLeft">
                    <div class="pop-tv-image">
                        <img src="./assets/images/pop-tv-image.png">
                    </div>
                </div>
                <div class="col-sm-6 wow fadeInRight">
                    <div class="pop-tv-info">
                        <h1 class="title-text white-color">{{ getOption('section3_title', 'Upgrade to Pop TV') }}</h1>
                        <h6>{{ getOption('section3_description', 'Choose a package, free installation, watch away!') }}</h6>
                        <ul>
                            <li>Rolling contract</li>
                            <li>{{ getOption('section3_contract', '12 months free amazon Prime') }}</li>
                        </ul>
                        <h4>From</h4>
                        <h2 class="title-text white-color">£{{ getOption('section3_price', '15') }}</h2>
                        <h5>per month</h5>
                        <a href="{{ getOption('section3_url', '') }}" class="button pink-bg">Check availability</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End Of Upgrade to Pop TV Section -->
    <!-- Start Of Turbo charge to POP TV Section -->
    <section class="empty-space">
        <div class="row row-height no-gutters">

            <div class="col-sm-5 col-height col-middle wow fadeInLeft">
                <div class="turbo-charge-pop-tv-info">
                    <h1 class="title-text">{{ getOption('section4_title', '') }}Upgrade to Pop TV</h1>
                    <a href="{{ getOption('section4_url', '') }}" class="button pink-bg">Shop deal</a>
                </div>
            </div>
            <div class="col-sm-7 col-height col-middle wow fadeInRight">
                <div class="turbo-charge-pop-tv-image">
                    <img src="./assets/images/turbo-charge-pop-tv-image.png">
                </div>
            </div>
        </div>
    </section>
    <!-- End Of Turbo charge to POP TV Section -->

    <!-- Start Of Fastest 5G unlimited Section -->
    <section class="empty-space fastest-unlimited-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 fastest-unlimited-box wow fadeInRight">
                    <div class="fastest-unlimited-info">
                        <h1 class="title-text white-color">{{ getOption('section5_title', 'Fastest 5G <br>unlimited') }}</h1>
                        <a href="{{ getOption('section5_url', '') }}" class="button pink-bg">Shop deal</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Of Fastest 5G unlimited Section -->

    <!-- Start Of Plans Section -->
    <section class="empty-space">
        <div class="container">
            <div class="row">
                @if(isset($shop_deals))
                    @foreach($shop_deals as $deal)
                        <div class="col-md-3 col-sm-6 wow fadeInLeft">
                            <div class="plans-box" id="plans{{ $deal['id'] }}">
                                <div class="plans-top-info">
                                    <h5>{{ $deal['title'] }}</h5>
                                </div>
                                <div class="plans-info match">
                                    <h3>£{{ $deal['product_price'] }} <br>Per month</h3>
                                    <ul>
                                        @foreach($deal['attributes'] as $attribute)
                                            <li>{{ $attribute['value'] }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="plans-icon">
                                    @if($deal['brand_logo'] !== null)
                                        <figure><img src="{{ asset($deal['brand_logo']) }}" alt="" title=""></figure>
                                    @else
                                    <figure><br><br><br></figure>
                                    @endif
                                </div>
                                <div class="plans-button">
                                    <a href="#" class="button button-border pink-color">BUY now</a>
                                    <a href="#plans{{ $deal['id'] }}" data-toggle="collapse"
                                       class="button button-border blue-color">More
                                        info</a>
                                </div>
                                <div class="plans-more-info">
                                    <h3>Further details</h3>
                                    {!! $deal['product_description'] !!}
                                    <a href="#" class="button pink-bg">BUY NOW</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h5 class="text-center">No deals found!</h5>
                @endif
            </div>
        </div>
    </section>
    <!-- End Of Plans Section -->
    <!-- Start Of Love superfast wifi? Section -->
    <section class="empty-space love-superfast-wifi-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-5 love-superfast-wifi-box wow fadeInRight">
                    <div class="love-superfast-wifi-info">
                        <img src="./assets/images/Icon-weather-lightning.png">
                        <h1 class="title-text white-color">{{ getOption('section7_title', 'Love superfast wifi?') }}</h1>
                        <p>{{ getOption('section7_description', 'Need to stream TV whilst the kids are gaming, your family is browsing the internet and order
                            your next food shop…we have the best high speed routers for you!') }}</p>
                        <a href="{{ getOption('section7_url', '') }}" class="button pink-bg">Shop deal</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Of Love superfast wifi? Section -->
    <!-- Start Of Switching Section -->
    <section class="Switching-bg empty-space">
        <div class="container">
            <div class="row Switching-row">
                <div class="col-sm-12">
                    <div class="swich-img-box">
                        <img src="./assets/images/swich.png">
                    </div>
                </div>
                <div class="col-sm-3 wow fadeInLeft">
                    <div class="switching-box">
                        <h4 class="title-text">{{ getOption('section8_title', 'Switching is simple') }}</h4>
                        <p class="small-size blue-color">{{ getOption('section8_description', 'Switch your provider over to us') }}</p>
                    </div>
                </div>
                <div class="col-sm-3 wow fadeInUp">
                    <div class="switching-box number-box">
                        <div class="number-col">
                            <h1 class="title-big-text pink-color">1</h1>
                        </div>
                        <div class="number-icon-box">
                            <img src="./assets/images/number-icon-01.png">
                            <h3 class="large-size">Shop</h3>
                            <p class="blue-color">Find the deal or bundle that suits your household.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 wow fadeInUp">
                    <div class="switching-box number-box">
                        <div class="number-col">
                            <h1 class="title-big-text pink-color">2</h1>
                        </div>
                        <div class="number-icon-box">
                            <img src="./assets/images/number-icon-02.png">
                            <h3 class="large-size">Sit back relax</h3>
                            <p class="blue-color">We will notify your provider you are switching and take care of every
                                step.</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 wow fadeInRight">
                    <div class="switching-box number-box">
                        <div class="number-col">
                            <h1 class="title-big-text pink-color">3</h1>
                        </div>
                        <div class="number-icon-box">
                            <img src="./assets/images/number-icon-03.png">
                            <h3 class="large-size">Plug in</h3>
                            <p class="blue-color">Plug in the router on the day of transfer and enjoy great broadband at
                                a great price.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Of Switching Section -->
    <!-- Start Of working from home Section -->
    <section class="working-from-home-bg empty-space">
        <div class="container">
            <div class="sub-container">
                <div class="row">
                    <div class="col-sm-12 wow fadeInUp">
                        <div class="working-from-home-box text-center">
                            <h6 class="small-size white-color">{{ getOption('section9_title', 'WORKING FROM HOME?') }}</h6>
                            <h1 class="title-big-text white-color">{{ getOption('section9_big_text', 'Our digital systems are built to help businesses from
                                1 to 1000+') }}</h1>
                            <p class="small-size white-color">{{ getOption('section9_description', 'For more Information or custom packages please get in
                                touch') }}</p>
                            <a href="{{ getOption('section9_url', '') }}" class="button pink-bg">LEARN MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Of working from home Section -->
@endsection
