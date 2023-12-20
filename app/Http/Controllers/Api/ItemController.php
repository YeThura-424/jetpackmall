<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\ItemResource;
use App\Item;
use Validator;


class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $items = Item::all();
     $result = ItemResource::collection($items);
     $message = 'Item retrieved successfully.';
     $status = 200;

     $response = [
        'status' => $status,
        'success' => true,
        'message' => $message,
        'data' => $result,
    ];
    return response()->json($response);
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validator = Validator::make($request->all(),[
           'name'  => ['required', 'string', 'max:255', 'unique:items'],
       ]);

       if($validator->fails()) {
        $status = 400;
        $message = 'Validation Error';

        $response = [
            'status' => $status,
            'success' => false,
            'message' => $message,
            'data' => $validator->errors(),
        ];

        return response()->json($response);
    } else {
        $name = $request->name;
        $unitprice = $request->unitprice;
        $discount = $request->discount;
        $description = $request->description;
        $brandid = $request->brandid;
        $subcategoryid = $request->subcategoryid;
        $photos = json_decode($request->hasfile('images'));
        $photo = $photos[0];

            // FILE UPLOAD
        $imageName = time().'.'.$photo->extension();
        $photo->move(public_path('images/category'),$imageName);
        $filepath = 'images/category/'.$imageName;

        // if ($request->hasfile('images')) 
        // {
        //     $i=1;
        //     foreach($request->file('images') as $image)
        //     {
        //         $imagename = time().$i.'.'.$image->extension();
        //         $image->move(public_path('images/item'), $imagename);  
        //         $filepath[] = 'images/item/'.$imagename;
        //         $i++;
        //     }
        // }
            // $photoString = implode(',', $data);

        $codeno = "JPM-".rand(11111,99999);

        $item= new Item;
        $item->codeno = $codeno;
        $item->name = $name;
        $item->photo = json_encode($filepath);
        $item->price = $unitprice;
        $item->discount = $discount;
        $item->description = $description;
        $item->subcategory_id = $subcategoryid;
        $item->brand_id = $brandid;
        $item->save();

        $status = 200;
        $message = 'Item created successfully.';
        $result = new ItemResource($item);

        $response = [
            'success' => true,
            'status' => $status,
            'message' => $message,
            'data' => $result,
        ];

        return response()->json($response);
    }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        if(is_null($item)) {
            $status = 404;
            $message = 'Item not found'; 

            $response = [
                'status' => $status,
                'success' => false,
                'message' => $message,
            ];

            return response()->json($response);

        } else {
            $status = 200;
            $message = 'Item retrieved successfully'; 
            $result = new ItemResource($item);

            $response = [
                'status' => $status,
                'success' => true,
                'message' => $message,
                'data' => $result,
            ];
            
            return response()->json($response);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item= Item::find($id);
        $name = $request->name;
        $unitprice = $request->unitprice;
        $discount = $request->discount;
        $description = $request->description;
        $brandid = $request->brandid;
        $subcategoryid = $request->subcategoryid;
        $codeno = $request->codeno;


            // FILE UPLOAD

        if ($request->hasfile('images')) 
        {

            $i = 1;
            foreach($request->file('images') as $file)
            {
                $name = time().$i.'.'.$file->extension();
                $file->move(public_path('images/item'), $name);  
                $data[] = 'images/item/'.$name;
                $i++;
            }

            foreach (json_decode($request->oldphoto) as $oldphoto){
                if(\File::exists(public_path($oldphoto))){
                    \File::delete(public_path($oldphoto));
                }
            }
        }else{
            $data = json_decode($request->oldphoto);
        }
            // $photoString = implode(',', $data);


        $item->codeno = $codeno;
        $item->name = $name;
        $item->photo = json_encode($data);
        $item->price = $unitprice;
        $item->discount = $discount;
        $item->description = $description;
        $item->subcategory_id = $subcategoryid;
        $item->brand_id = $brandid;
        $item->save();

        $status = 200;
        $message = 'Category update successfully'; 
        $result = new ItemResource($item);

        $response = [
            'status' => $status,
            'success' => true,
            'message' => $message,
            'data' => $result,
        ];

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        if(is_null($item)) {
            $status = 404;
            $message = 'Item not found'; 

            $response = [
                'status' => $status,
                'success' => false,
                'message' => $message,
            ];

            return response()->json($response);
        } else {
            $item->delete();
            $status = 200;
            $message = 'Item deleted successfully'; 


            $response = [
                'success' => true,
                'status' => $status,
                'message' => $message,
            ];

            return response()->json($response);
        }
    }
}
