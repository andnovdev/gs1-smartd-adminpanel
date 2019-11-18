<?php
namespace App\Http\Controllers\Api\V1;

use App\PostCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class postCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $postCategory = DB::table('post_categories')->get();
     return view('index',['post_categories'=> $postCategory]);
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
         'parent_id' => 'required|ineteger',
         'name' => 'required|max:50'
       ]);

       return PostCategory::create([
         'parent_id' => $request->parent_id,
         'name' => $request->name
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
         return PostCategory::findOrFail($id);
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
       $postCategory = PostCategory::findOrFail($id);

       if ($request->has('parent_id')) {
           $request->validate([
             'parent_id'=> 'required|integer'
           ]);
           $postCategory->parent_id = $request->parent_id;
       }

       if ($request->has('name')) {
           $request->validate([
             'name' => 'required|max:50'
           ]);
           $postCategory->name = $request->name;
       }

       $postCategory->save();
       return $postCategory;
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
       PostCategory::destroy($id);

       return response()->json([
         'message' => 'success delete postCategory'
       ], 200);
     }
}
