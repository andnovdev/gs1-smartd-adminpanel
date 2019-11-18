<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class postCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $postComment = DB::table('post_comments')->get();
     return view('index',['post_comments'=> $postComment]);
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
         'post_id' => 'required|max:50',
         'user_id' => 'required|max:50',
         'name' => 'required|max:20',
         'email' => 'required'
       ]);

       return PostComment::create([
         'post_id' => $request->post_id,
         'user_id' => $request->user_id,
         'name' => $request->name,
         'email' => $request->email,
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
         return postComment::findOrFail($id);
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
       $postComment = PostComment::findOrFail($id);

       if ($request->has('post_id')) {
           $request->validate([
             'post_id'=> 'required|integer'
           ]);
           $postComment->post_id = $request->post_id;
       }

       if ($request->has('user_id')) {
           $request->validate([
             'user_id' => 'required|integer'
           ]);
           $postComment->user_id = $request->user_id;
       }

       if ($request->has('name')) {
           $request->validate([
             'name' => 'required|max:50'
           ]);
           $postComment->name = $request->name;
       }

       if ($request->has('email')) {
           $request->validate([
             'email' => 'required|max:50'
           ]);
           $postComment->email = $request->email;
       }

       $postCommentComment->save();
       return $postCommentComment;
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
       postCommentComment::destroy($id);

       return response()->json([
         'message' => 'success delete postComment'
       ], 200);
     }
}
