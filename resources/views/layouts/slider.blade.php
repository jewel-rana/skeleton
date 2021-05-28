<!-- Start Of Hero Section -->
<section>
    @php
    $slide = $slide = collect($slider_items)->where('slider_id', getOption('main_slider', 1))->shuffle()->first();
    @endphp
    <div class="hero-box">
        <div class="hero-image">
            <img src="{{ $slide['attachment'] }}" alt="" title="{{ $slide['title'] }}">
        </div>
        <div class="hero-info wow fadeInRight">
            <h1 class="title-text white-color">{{ $slide['title'] }}</h1>
            <p>{{ $slide['description'] }}</p>
            @if($slide['btn_text'] && $slide['btn_link'] !== '#')
            <a href="{{ $slide['btn_link'] }}" class="button pink-bg">{{ strtoupper($slide['btn_text']) }}</a>
            @endif
        </div>
    </div>
</section>
