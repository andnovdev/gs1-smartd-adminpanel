<?php

namespace App\Http\Controllers\Api\V1;

use App\LetterSummary;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LetterSummaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $letter_summary = DB::table('letter_summaries')->get();
         return view('index',['letter_summaries' => $letter_summary]);
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
           'letter_id' => 'required|integer',
           'fulfillment' => 'required|max:100'
         ]);

         return LetterSummary::create([
           'letter_id' => $request->name,
           'fulfillment' => $request->fulfillment
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
         return LetterSummary::findOrFail($id);
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
         $letter_summary = LetterSummary::findOrFail($id);

         if ($request->has('letter_id')) {
             $request->validate([
               'letter_id' => 'required|integer'
             ]);
             $letter_summary->letter_id = $request->letter_id;
         }

         if ($request->has('fulfillment')) {
             $request->validate([
               'fulfillment' => 'required|max:100'
             ]);
             $letter_summary->fulfillment = $request->fulfillment;
         }

         $letter_summary->save();

         return $letter_summary
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
