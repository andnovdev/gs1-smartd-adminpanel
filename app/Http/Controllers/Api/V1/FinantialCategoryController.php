<?php

namespace App\Http\Controllers\Api\V1;

use App\FinantialCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FinantialCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $finantial_category = DB::table('finantial_categories')->get();
     return view('index',['finantial_categories'=> $finantial_category]);
     }

     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function store(Request $request)
     {
       $request->validate([
         'name' => 'required|max:50',
         'parent_id' => 'required|integer'
       ]);

       return FinantialCategory::create([
         'name' => $request->name,
         'parent_id' => $request->parent_id
       ]);
     }

     /**
      * Display the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function show($id)
     {
         return FinantialCategory::findOrFail($id);
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
       $finantial_category = FinantialCategory::findOrFail($id);

       if ($request->has('name')) {
           $request->validate([
             'name'=> 'required|max:50'
           ]);
           $finantial_category->name = $request->name;
       }

       if ($request->has('parent_id')) {
           $request->validate([
             'parent_id' => 'required|integer'
           ]);
           $finantial_category->parent_id = $request->parent_id;
       }

       $finantial_category->save();
       return $finantial_category;
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
       FinantialCategory::destroy($id);

       return response()->json([
         'message' => 'success delete finantial category'
       ], 200);
     }
}
