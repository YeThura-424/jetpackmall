<x-frontend>


    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach($categories as $category)
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg=" {{$category->photo}} ">
                            <h5><a href="{{route('cateitem',$category->id)}}"> {{$category->name}} </a></h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Banner Begin -->
    <div class="banner mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="frontend/img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="frontend/img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row mb-4">
                {{-- latest items --}}
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach($latestitems as $latestitem)
                                @php
                                $photos = json_decode($latestitem->photo);
                                $photo=$photos[0];
                                $latest_unitprice = $latestitem->price;
                                $latest_discount = $latestitem->discount;
                                @endphp
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src=" {{asset($photo)}}" style="width: 100px; height: 100px; object-fit: cover;">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6> {{Str::limit($latestitem->name,20)}} </h6>
                                        @if($latest_discount)
                                        <span> {{$latest_discount}} MMK</span>
                                        <del class="text-muted"> {{$latest_unitprice}} MMK</del>
                                        @else
                                        <span> {{$latest_unitprice}} MMK</span>
                                        @endif
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                {{-- top rated items --}}
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text ">
                        <h4>Top Rated Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach($topitems as $topitem)
                                @php
                                $photos = json_decode($topitem->photo);
                                $photo=$photos[0];
                                $topunitprice = $topitem->price;
                                $topdiscount = $topitem->discount;
                                @endphp
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src=" {{asset($photo)}}" style="width: 100px; height: 100px; object-fit: cover;">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6> {{Str::limit($topitem->name)}} </h6>
                                        @if($topdiscount)
                                        <span> {{$topdiscount}} MMK</span>
                                        <del class="text-muted"> {{$topunitprice}} MMK</del>
                                        @else
                                        <span> {{$topunitprice}} MMK</span>
                                        @endif
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                {{-- review product --}}
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Review Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach($discountitems as $discountitem)
                                @php
                                $photos = json_decode($discountitem->photo);
                                $photo=$photos[0];
                                $name = $discountitem->name;
                                $reviewunitprice = $discountitem->price;
                                $reviewdiscount = $discountitem->discount;
                                @endphp
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src=" {{asset($photo)}} " style="width: 100px; height: 100px; object-fit: cover;">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6> {{$name}} </h6>
                                        @if($reviewdiscount)
                                        <span> {{$reviewdiscount}} MMK</span>
                                        <del class="text-muted"> {{$reviewunitprice}} MMK</del>
                                        @else
                                        <span> {{$reviewunitprice}} MMK</span>
                                        @endif
                                    </div>
                                    @endforeach
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->
</x-frontend>