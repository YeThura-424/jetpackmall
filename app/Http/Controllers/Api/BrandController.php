<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\BrandResource;
use App\Brand;
use Validator;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        $result = BrandResource::collection($brands);
        $message = 'Brand retrieved successfully.';
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
            'name' => 'required|string|max:255|unique:categories',
            'logo' => 'required|mimes:jpeg,bmp,png,jpg'
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
            $photo = $request->logo;
                    // var_dump($photo);die();
                    // set image file path
            $imagename = time().'.'.$photo->extension();
            $photo->move(public_path('images/brand'),$imagename);
            $filepath = 'images/brand/'.$imagename;

                    //Data insert
            $brand = new Brand();
            $brand->name = $name;
            $brand->logo = $filepath;
            $brand->save();

            $status = 200;
            $message = 'Brand created successfully.';
            $result = new BrandResource($brand);

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
       $brand = Brand::find($id);
       if(is_null($brand)) {
        $status = 404;
        $message = 'Brand not found'; 

        $response = [
            'status' => $status,
            'success' => false,
            'message' => $message,
        ];

        return response()->json($response);

    } else {
        $status = 200;
        $message = 'Category retrieved successfully'; 
        $result = new BrandResource($category);

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
       $brand = Brand::find($id);

       $name = $request->name;
       $newlogo = $request->logo;
       $oldlogo = $request->oldLogo;

       if ($request->hasFile('logo')) {
        $imageName = time().'.'.$newlogo->extension();
        $newlogo->move(public_path('images/brand'),$imageName);
        $filepath = 'images/brand/'.$imageName;
        if (\File::exists(public_path($oldlogo))) {
            \File::delete(public_path($oldlogo));
        }
    } else {
        $filepath = $oldlogo;
    }

                // data update 


    $brand->name = $name;
    $brand->logo = $filepath;
    $brand->save();

    $status = 200;
    $message = 'Brand update successfully'; 
    $result = new BrandResource($brand);

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
     $brand = Brand::find($id);
     if(is_null($brand)) {
        $status = 404;
        $message = 'Category not found'; 

        $response = [
            'status' => $status,
            'success' => false,
            'message' => $message,
        ];

        return response()->json($response);
    } else {
        $brand->delete();
        $status = 200;
        $message = 'Category deleted successfully'; 


        $response = [
            'success' => true,
            'status' => $status,
            'message' => $message,
        ];

        return response()->json($response);
    }
}
}
