<!DOCTYPE html>
<html>
<head>
	<title>User Test</title>
</head>
<body>
	<h1>Detail</h1>
	<label>Name:<?=$name ?></label><br><!--  simple php output format -->
	<label>Position: {{$position}}</label><br> <!-- laravel php output format -->
	<label>City:{!! $city !!}</label><br>  <!-- to convert html tag value in output -->
</body>
</html>