<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use DB;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Category::all();
       // $category=DB::table('categories')->get();
        return response()->json($category);
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
         'category_name' => 'required|unique:categories|max:255',
        ]);

           $category = new Category;
           $category->category_name = $request->category_name;
           $category->save();

           //query builder
           // $data=array();
           // $data['category_name']=$request->category_name;
           // DB::table('categories')->insert($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //query builder
        //$categoru=DB::table('categories')->where('id',$id)->first();
        $category=Category::findorfail($id);
         return response()->json($category);
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
        $data=array();
        $data['category_name']=$request->category_name;
        DB::table('categories')->where('id',$id)->update($data);
        // $category=Category::findorfail($id);
        // $category->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('categories')->where('id',$id)->delete();
        // $category=Category::findorfail($id);
        // $category->delete();
    }
}
