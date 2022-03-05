<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        if(Session::has('admin')){
            $admin=User::find(Session::get('admin')['id']);
        }
        elseif(Session::has('buyer_department')){
            $admin=User::find(Session::get('buyer_department')['id']);
        }
        else{
            $admin=User::find(Session::get('seller_department')['id']);
        }
        $category=Category::all();
        return view('admin/category/category',compact("category","admin"));
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
    public function store(Request $request)
    {
        $data= new Category;
        $data->name=$request->name;
        $data->save();
        Session::put('success','Category has been added successfully');
        return redirect()->route('category');
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
        if(Session::has('admin')){
            $admin=User::find(Session::get('admin')['id']);
        }
        elseif(Session::has('buyer_department')){
            $admin=User::find(Session::get('buyer_department')['id']);
        }
        else{
            $admin=User::find(Session::get('seller_department')['id']);
        }
        $id=$request->id;
        $category= Category::find($id);
        return view('admin/category/category-edit',compact("category","admin"));
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
        $data= Category::find($id);
        $data->name=$request->name;
        $data->update();
        Session::put('success','Category has been updated successfully');
        return redirect()->route('category');
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
        $data=Category::find($id);
        $data->delete();
        Session::put('success','Category has been removed successfully');
        return redirect()->route('category');
    }
}
