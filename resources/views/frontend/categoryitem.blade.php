<x-frontend>
    <section class="breadcrumb-section set-bg subtitle">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="breadcrumb__text">
						<h2> {{$category->name}} </h2>
					</div>
				</div>
			</div>
		</div>
	</section>
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            @foreach($subcategories as $subcategory)
                            <li data-filter=".{{$subcategory->name}}">{{$subcategory->name}}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach($items as $item)
                    @php
                        $photos = json_decode($item->photo);
                        $photo=$photos[0];
                    @endphp
                <div class="col-lg-3 col-md-4 col-sm-6 mix {{$item->subcategory->name}}">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="{{$photo}}">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#">{{$item->name}}</a></h6>
                            <h5>$30.00</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</x-frontend>