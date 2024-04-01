<?php

namespace App\Http\Requests;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductDiscountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(Request $request)
    {
        $product = Item::find($request->product_id);
        // dd($product->price);
        return [
            'product_id' => 'required',
            'type' => ['required','string'],
            'amount' => 'required|lt:'.$product->price
        ];
    }
}
