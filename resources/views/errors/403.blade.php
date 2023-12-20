<!DOCTYPE html>
<html>
<head>
	<title>Access Denide</title>
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
	<div class="container py-5">
		<div class="row justify-content-center">
			<div class="col-6">
				<img src="{{asset('403.gif')}}" class="img-fluid">
			</div>
			
		</div>
		<div  class="row justify-content-center">
			<div class="col-2">
				<a href=" {{route('index')}} "><button class="btn btn-outline-secondary">Back To Home</button></a>
				
			</div>
		</div>
	</div>
</body>
</html>