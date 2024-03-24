<x-backend>
	@php
	$name = $item->name;
	$codeno = $item->codeno;
	$subcategoryname = $item->subcategory->name;
	$brandname = $item->brand->name;
	$description = $item->description;
	$unitprice = $item->price;
	$discount = $item->discount;
	$photos = json_decode($item->photo);
	$photo = $photos[0];
	@endphp
	<main class="app-content">
		<div class="app-title">
			<div>
				<h1> <i class="icofont-list"></i> Item Detail</h1>
			</div>
			<ul class="app-breadcrumb breadcrumb side">
				<a href="{{ route('backside.list.index') }}" class="btn btn-outline-primary">
					<i class="icofont-double-left icofont-1x"></i>
				</a>
			</ul>
		</div>
		<div>
			<div class="card mb-3 container-fluid h-100">
				<h5 class="pt-4"> {{$codeno}} </h5>
				<p class="text-muted"> {{$name}} </p>
				<div class="row no-gutters">
					<div class="col-md-4">
						<img src=" {{asset($photo)}} " class="card-img" height="350px;">    
					</div>
					<div class="col-md-8">

						<div class="card-body">
							
							<p>Subcategory : {{$subcategoryname}} </p>
							<p>Brand : {{$brandname}} </p>
							
							<p>Price: @if($discount)
								<span> {{ $discount }} Ks  </span>
								<del class="text-muted" style="font-size: 18px;">
									{{ $unitprice }} Ks
								</del>
								@else
								<span>{{ $unitprice }} Ks</span>
							@endif</p>
							<p>Description : <span>{!! $description !!}</span> </p>

						</div>
					</div>
				</div>
			</div>
		</div>
	</main>


</x-backend>