<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {   
        $admin=User::find(Session::get('admin')['id']);
        $category=Category::where('name',$name)->first();
        $subcategory=Subcategory::where('category_id',$category->id)->get();
        
        return view('admin/subcategory/subcategory',compact("category","subcategory","admin"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$name)
    {
        $category=Category::where('name',$name)->first();
        $data= new Subcategory;
        $data->name=$request->name;
        $data->category_id=$category->id;
        $data->save();
        Session::put('success','Sub-Category has been added successfully');
        return redirect()->back();
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
    public function edit(Request $request)
    {
        $admin=User::find(Session::get('admin')['id']);
        $id=$request->id;
        $subcategory= Subcategory::find($id);
        return view('admin/subcategory/subcategory-edit',compact("subcategory","admin"));
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
        $data= Subcategory::find($id);
        $category=Category::find($data->category_id);
        $data->name=$request->name;
        $data->update();
        Session::put('success','Sub-Category has been updated successfully');
        return redirect('9851240938/'.$category['name'].'/subcategory/details');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id=$request->id;
        $data=Subcategory::find($id);
        $category=Category::find($data->category_id);
        $data->delete();
        Session::put('success','Sub-Category has been removed successfully');
        return redirect()->back();
    }
}
