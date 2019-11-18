<?php

namespace App\Http\Controllers\Api\V1;

use App\LetterDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LetterDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $letter_detail = DB::table('letter_details')->get();
         return view('index',['letter_details'=> $letter_detail]);
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
           'type_id' => 'required|integer',
           'purpose' => 'required|max:100',
           'message' => 'required|min:3|max:1000'
         ]);

         return LetterDetail::create([
           'type_id' => $request->type_id,
           'purpose' => $request->purpose,
           'message' => $requets->message
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
         return LetterDetail::with('letter_details')->findOrFail($id);
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
         $letter_detail = LetterDetail::findOrFail($id);

         if ($request->has('type_id')){
             $request->validate([
               'type_id' => 'required|integer'
             ]);
             $letter_detail->type_id = $request->type_id;
         }

         if ($request->has('purpose')){
             $request->validate([
               'purpose' => 'required|max:100'
             ]);
             $letter_detail->purpose = $request->purpose;
         }

         if ($request->has('message')){
             $request->validate([
               'message' => 'required|min:3|max:1000t'
             ]);
             $letter_detail->message = $request->message;
         }

         $letter_detail->save();

         return $letter_detail;
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
