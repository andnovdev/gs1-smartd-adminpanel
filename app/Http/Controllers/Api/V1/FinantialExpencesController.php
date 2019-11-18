<?php

namespace App\Http\Controllers\Api\V1;

use App\FinantialExpence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FinantialExpencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $finantial_expence = DB::table('finantial_expences')->get();
     return view('index',['finantial_expences'=> $finantial_expence]);
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
         'wallet_id' => 'required|ineteger',
         'value' => 'required|integer',
         'category_id' => 'required|integer',
         'purpose' => 'required|max:50',
         'receiver' => 'required|max:50',
         'datetime_trx' => 'required|date_format:l, d-M-Y H:i:s T'
       ]);

       return FinantialExpence::create([
         'wallet_id' => $request->wallet_id,
         'value' => $request->value,
         'category_id' => $request->category_id,
         'purpose' => $request->purpose,
         'receiver' => $request->receiver,
         'datetime_trx' => $request->datetime_trx
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
         return FinantialExpence::findOrFail($id);
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
       $finantial_expence = FinantialExpence::findOrFail($id);

       if ($request->has('wallet_id')) {
           $request->validate([
             'wallet_id'=> 'required|integer'
           ]);
           $finantial_expence->wallet_id = $request->wallet_id;
       }

       if ($request->has('value')) {
           $request->validate([
             'value' => 'required|integer'
           ]);
           $finantial_expence->value = $request->value;
       }

       if ($request->has('category_id')) {
           $request->validate([
             'category_id' => 'required|integer'
           ]);
           $finantial_expence->category_id = $request->category_id;
       }

       if ($request->has('purpose')) {
           $request->validate([
             'purpose' => 'required|max:50'
           ]);
           $finantial_expence->purpose = $request->purpose;
       }

       if ($request->has('receiver')) {
           $request->validate([
             'receiver' => 'required|max:50'
           ]);
           $finantial_expence->receiver = $request->receiver;
       }

       if ($request->has('datetime_trx')) {
           $request->validate([
             'datetime_trx' => 'required|date_format:l, d-M-Y H:i:s T'
           ]);
           $finantial_expence->datetime_trx = $request->datetime_trx;
       }

       $finantial_expence->save();
       return $finantial_expence;
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
       FinantialExpence::destroy($id);

       return response()->json([
         'message' => 'success delete finantial expence'
       ], 200);
     }
}
