<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
	use SoftDeletes;
	protected $fillable = [
		'orderdate','voucherno','total','note','status','user_id'
	];

	// public function orderdetails()
	// {
	// 	return $this->hasMany('App\Orderdetail');
	// }
	public function user()
	{
		return $this->belongsTo('App\User');
	}
	public function items()
	{
		return $this->belongsToMany('App\Item','orderdetails','order_id','item_id')
		->withPivot('qty')
		->withTimestamps();;
	}
}