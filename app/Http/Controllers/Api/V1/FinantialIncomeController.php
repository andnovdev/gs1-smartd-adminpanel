<?php

namespace App\Http\Controllers\Api\V1;

use App\FinantialIncome;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FinantialIncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $finantial_income = DB::table('finantial_incomes')->get();
     return view('index',['finantial_incomes'=> $finantial_income]);
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
         'sources' => 'required|max:50',
         'datetime_trx' => 'required|date_format:l, d-M-Y H:i:s T'
       ]);

       return FinantialIncome::create([
         'wallet_id' => $request->wallet_id,
         'value' => $request->value,
         'category_id' => $request->category_id,
         'purpose' => $request->purpose,
         'sources' => $request->sources,
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
         return FinantialIncome::findOrFail($id);
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
       $finantial_income = FinantialIncome::findOrFail($id);

       if ($request->has('wallet_id')) {
           $request->validate([
             'wallet_id'=> 'required|integer'
           ]);
           $finantial_income->wallet_id = $request->wallet_id;
       }

       if ($request->has('value')) {
           $request->validate([
             'value' => 'required|integer'
           ]);
           $finantial_income->value = $request->value;
       }

       if ($request->has('category_id')) {
           $request->validate([
             'category_id' => 'required|integer'
           ]);
           $finantial_income->category_id = $request->category_id;
       }

       if ($request->has('purpose')) {
           $request->validate([
             'purpose' => 'required|max:50'
           ]);
           $finantial_income->purpose = $request->purpose;
       }

       if ($request->has('sources')) {
           $request->validate([
             'sources' => 'required|max:50'
           ]);
           $finantial_income->sources = $request->sources;
       }

       if ($request->has('datetime_trx')) {
           $request->validate([
             'datetime_trx' => 'required|date_format:l, d-M-Y H:i:s T'
           ]);
           $finantial_income->datetime_trx = $request->datetime_trx;
       }

       $finantial_income->save();
       return $finantial_income;
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
       FinantialIncome::destroy($id);

       return response()->json([
         'message' => 'success delete finantial income'
       ], 200);
     }
}
