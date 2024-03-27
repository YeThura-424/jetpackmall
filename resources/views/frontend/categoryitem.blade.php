<x-frontend>
    <section class="breadcrumb-section set-bg subtitle">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2> {{ $category->name }} </h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <style>
                        .owl-carousel .owl-nav button {
                            position: absolute;
                            top: 0;
                            width: 40px;
                            height: 40px;
                        }

                        .owl-carousel .owl-nav button.disabled span {
                            display: none;
                            cursor: none;
                        }

                        .owl-carousel .owl-nav button.owl-prev {
                            left: 0;
                        }

                        .owl-carousel .owl-nav button.owl-next {
                            right: 0;
                        }

                        .owl-carousel .owl-nav button span {
                            font-size: 2rem;
                            position: absolute;
                            top: 50%;
                            transform: translateY(-50%);
                        }
                    </style>
                    <div class="featured__controls">
                        <ul class="owl-carousel owl-theme position-relative">
                            <li class="item active" data-filter="*">All</li>
                            @foreach ($subcategories as $subcategory)
                                <li class="item" data-filter=".{{ $subcategory->name }}">{{ $subcategory->name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach ($items as $item)
                    @php
                        $photos = json_decode($item->photo);
                        $photo = $photos[0];
                    @endphp
                    <div class="col-lg-3 col-md-4 col-sm-6 mix {{ $item->subcategory->name }}">
                        <div class="featured__item">
                            <div class="featured__item__pic set-bg" data-setbg="{{ $photo }}">
                                <ul class="featured__item__pic__hover">
                                    <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                            </div>
                            <div class="featured__item__text">
                                <h6><a href="#">{{ $item->name }}</a></h6>
                                <h5>$30.00</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $().ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: false,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            })
        });
    </script>

</x-frontend>
