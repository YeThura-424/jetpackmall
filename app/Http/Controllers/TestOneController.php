<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestOneController extends Controller
{
	public function index()
	{
		return view('hello');
	}
	public function user($name,$position,$city) //name of the parameter doesn't matter the most but the number does.
	{
		// var_dump($name,$position,$city);die();
		//dd($name,$position,$city) -> the combination of var_dump and die <-

		$data = array(
			'name' => $name,
			'position' => $position,
			'city' => $city);
		// dd($data);

		return view('usertest',$data);
	}		
}
