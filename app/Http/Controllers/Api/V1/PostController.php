<?php

namespace App\Http\Controllers\Api\V1;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $post = DB::table('posts')->get();
    return view('index',['posts'=> $post]);
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
        'title' => 'required|max:50',
        'subtitle' => 'required|max:50',
        'category_id' => 'required|max:20',
        'desc' => 'required|min:3|max:1000',
        'content' => 'required|min:3|max:1000',
        'status' => 'required|max:50',
        'uri' => 'required|max:50'
      ]);

      return Post::create([
        'title' => $request->title,
        'subtitle' => $request->subtitle,
        'category_id' => $request->category_id.
        'desc' => $request->desc,
        'content' => $request->content,
        'status' => $request->status,
        'uri' => $request->uri
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
        return Post::findOrFail($id);
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
      $post = Post::findOrFail($id);

      if ($request->has('title')) {
          $request->validate([
            'title'=> 'required|max:50'
          ]);
          $post->title = $request->title;
      }

      if ($request->has('subtitle')) {
          $request->validate([
            'subtitle' => 'required|max:50'
          ]);
          $post->subtitle = $request->subtitle;
      }

      if ($request->has('category_id')) {
          $request->validate([
            'category_id' => 'required|max:20'
          ]);
          $post->category_id = $request->category_id;
      }

      if ($request->has('desc')) {
          $request->validate([
            'desc' => 'required|min:3|max:1000'
          ]);
          $post->desc = $request->desc;
      }

      if ($request->has('content')) {
          $request->validate([
            'content' => 'required|min:3|max:1000'
          ]);
          $post->content = $request->content;
      }

      if ($request->has('status')) {
          $request->validate([
            'status' => 'required|max:50'
          ]);
          $post->status = $request->status;
      }

      if ($request->has('uri')) {
          $request->validate([
            'uri' => 'required|max:50'
          ]);
          $post->uri = $request->uri;
      }

      $post->save();
      return $post;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Post::destroy($id);

      return response()->json([
        'message' => 'success delete Post'
      ], 200);
    }
}
