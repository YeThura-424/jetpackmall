<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategory::all();
        return view('backend.subcategory.list', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.subcategory.new', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => ['required', 'string', 'unique:subcategories'],
            'categoryid' => 'required|numeric|min:0|not_in:0'
        ]);

        if ($validator) {
            $name = $request->name;
            $categoryid = $request->categoryid;
            // dd($categoryid);

            //Data Insert
            $subcategory = new Subcategory();
            $subcategory->name = $name;
            $subcategory->category_id = $categoryid;
            $subcategory->save();

            return redirect()->route('backside.subcategory.index')->with('successMsg', 'New Subcategory is ADDED in your data');
        } else {
            return redirect::back()->withErrors($validator);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($id);

        $subcategory = Subcategory::find($id);
        $categories = Category::all();
        return view('backend.subcategory.edit', compact('subcategory', 'categories'));
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


        $name = $request->name;
        $categoryid = $request->categoryid;

        $subcategory = Subcategory::find($id);
        $subcategory->name = $name;
        $subcategory->category_id = $categoryid;
        $subcategory->save();
        return redirect()->route('backside.subcategory.index')->with('successMsg', 'Existing Subcategory is UPDATED in your data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $subcategory = Subcategory::find($id);
        // dd($subcategory);
        $subcategory->delete();

        return redirect()->route('backside.subcategory.index')->with('successMsg', 'New Subcategory is DELETED in your data');
    }
}
