<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Item;
use App\Brand;
use App\Subcategory;
use App\Order;
use Carbon\Carbon;

class FrontendController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $topitems = Item::all()->random(3);
        $latestitems = Item::latest()->take(3)->get();
        $discountitems = Item::with('item_discount')->inRandomOrder()->limit(3)->get();
        return view('frontend.index', compact('categories', 'topitems', 'latestitems', 'discountitems'));
    }
    public function cateitem($id)
    {
        $category = $this->itemWithCategory($id);
        $subcategories = [];
        $items = [];
        foreach ($category->subcategories as $subcategory) {
            $subcategories[] = $subcategory;
            foreach ($subcategory->items as $item) {
                $items[] = $item;
            }
        }
        return view('frontend.categoryitem', compact('category', 'items', 'subcategories'));
    }
    public function brand($id)
    {
        $branditems = Item::where('brand_id', $id)->get();
        $brand = Brand::find($id);

        return view('frontend.brand', compact('branditems', 'brand'));
    }
    public function itemWithCategory($id)
    {
        return Category::with(['subcategories' => function ($query) {
            $query->has('items');
        }])->find($id);
    }
    public function promotion()
    {
        $date = Carbon::now()->format('Y-m-d');
        $percent_promotions = Item::whereHas('item_discount', function ($query) use ($date) {
            $query->where('type', 'percent')->whereDate('validtill', '>=', $date);
        })->get();
        $fixed_promotions = Item::whereHas('item_discount', function ($query) {
            $query->where('type', 'fixed');
        })->get();
        $latestitems = Item::latest()->take(3)->get();
        $categories = Category::inRandomOrder()->limit(11)->get();
        return view('frontend.promotion', compact('percent_promotions', 'fixed_promotions', 'latestitems', 'categories'));
    }

    public function cart()
    {
        return view('frontend.cart');
    }

    public function subcategory($id)
    {
        $subcategories = Item::where('subcategory_id', $id)->get();
        $subcategory = Subcategory::find($id);
        $latestitems = Item::latest()->take(3)->get();

        return view('frontend.subcategory', compact('subcategories', 'subcategory', 'latestitems'));
    }

    public function order(Request $request)
    {
        $cart = json_decode($request->data);
        $note = $request->note;
        $orderdate = Carbon::now();
        $voucherno = uniqid();
        $total = 0;
        foreach ($cart as $row) {
            $unitprice = $row->unitprice;
            $discount = $row->discount;

            if ($discount) {
                $price = $unitprice - $discount;
            } else {
                $price = $unitprice;
            }
            $total += $price * $row->qty;
        }
        $status = 'Order';

        $auth = Auth::user();
        $userid = $auth->id;

        $order = new Order;
        $order->orderdate = $orderdate;
        $order->voucherno = $voucherno;
        $order->total = $total;
        $order->note = $note;
        $order->status = $status;
        $order->user_id = $userid;
        $order->save();

        foreach ($cart as $value) {
            $itemid = $value->id;
            $qty = $value->qty;
            $price = $value->unitprice;
            $discount = $value->discount;
            if ($discount) {
                $subtotal = ($price - $discount) * $qty;
            } else {
                $subtotal = $price * $qty;
            }

            $order->items()->attach($itemid, [
                'qty' => $qty,
                'price' => $price,
                'discount' => $discount,
                'subtotal' => $subtotal
            ]);
        }

        return response()->json([
            'status' => 'Order Successfully created'
        ]);
    }

    public function ordersuccess()
    {
        return view('frontend.ordersuccess');
    }

    public function detail($id)
    {
        $items = Item::find($id);
        return view('frontend.detail', compact('items'));
    }
}
