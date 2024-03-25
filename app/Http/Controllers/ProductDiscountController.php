<?php

namespace App\Http\Controllers;

use App\ProductDiscount;
use App\Http\Requests\StoreProductDiscountRequest;
use App\Http\Requests\UpdateProductDiscountRequest;
use App\Item;

class ProductDiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts = ProductDiscount::all();
        return view('backend.discount.list',compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Item::all();
        return view('backend.discount.new',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductDiscountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductDiscountRequest $request)
    {
        $product_id = $request->product_id;
        $type = $request->type;
        $amount = $request->amount;
        $valid_date = $request->valid_date;

        $product_discount = new ProductDiscount;
        $product_discount->product_id = $product_id;
        $product_discount->type = $type;
        $product_discount->amount = $amount;
        $product_discount->validtill = $valid_date;
        $product_discount->save();

        return redirect()->route('backside.discount.index')->with("successMsg",'New Discount is ADDED in your data'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductDiscount  $productDiscount
     * @return \Illuminate\Http\Response
     */
    public function show(ProductDiscount $productDiscount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductDiscount  $productDiscount
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductDiscount $productDiscount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductDiscountRequest  $request
     * @param  \App\ProductDiscount  $productDiscount
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductDiscountRequest $request, ProductDiscount $productDiscount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductDiscount  $productDiscount
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductDiscount $productDiscount)
    {
        //
    }
}
