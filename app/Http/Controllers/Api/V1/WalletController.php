<?php

namespace App\Http\Controllers\Api\V1;

use App\Wallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WalletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       $finantial_wallet = DB::table('finantial_wallets')->get();
     return view('index',['finantial_wallets'=> $finantial_wallet]);
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
         'value' => 'required|integer',
         'desc' => 'required|min:3|max:1000'
       ]);

       return FinantialWallet::create([
         'name' => $request->name,
         'value' => $request->value,
         'desc' => $request->desc
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
         return FinantialWallet::findOrFail($id);
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
       $finantial_wallet = FinantialWallet::findOrFail($id);

       if ($request->has('name')) {
           $request->validate([
             'name'=> 'required|max:50'
           ]);
           $finantial_wallet->name = $request->name;
       }

       if ($request->has('value')) {
           $request->validate([
             'value' => 'required|integer'
           ]);
           $finantial_wallet->value = $request->value;
       }

       if ($request->has('desc')) {
           $request->validate([
             'desc' => 'required|min:3|max:1000'
           ]);
           $finantial_wallet->desc = $request->desc;
       }

       $finantial_wallet->save();
       return $finantial_wallet;
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
       FinantialWallet::destroy($id);

       return response()->json([
         'message' => 'success delete finantial wallet'
       ], 200);
     }
}
