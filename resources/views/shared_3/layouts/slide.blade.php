<div class="slider-area">
    <div class="slider-active owl-dot-style owl-carousel">
        @foreach ($slide as $sl)
        <div class="single-slider pt-175 pb-258 bg-img" style="background-image:url(shared_asset/upload/images/slide/{{ $sl->image }});">
            <div class="container">
                <div class="slider-content slider-animated-1">
                    <h3 class="animated">New Arrivals</h3>
                    <h1 class="animated">For Mother’s Day!</h1>
                    <h5 class="animated">Exclusive Offer -10% Off This Week</h5>
                    <div class="slider-btn mt-45">
                        <a class="animated" href="product-details.html">shop Now</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
</div>