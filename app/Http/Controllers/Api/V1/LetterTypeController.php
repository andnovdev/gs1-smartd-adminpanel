<?php

namespace App\Http\Controllers\Api\V1;

use App\LetterType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LetterTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $letter_type = DB::table('letter_types')->get();
         return view('index',['letter_types' => $letter_type]);
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
           'name' => 'required|max:50'
         ]);

         return LetterType::create([
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
         return LetterType::findOrFail($id);
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
         $letter_type = LetterType::findOrFail($id);

         if ($request->has('name')) {
             $request->validate([
               'name' => 'required|max:50'
             ]);
             $letter_type->name = $request->name;
         }

         $letter_type->save();

         return $letter_type
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {

     }
}
