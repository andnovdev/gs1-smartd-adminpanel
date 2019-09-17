<?php

namespace App\Http\Controllers\Api\V1;

use App\VillageReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VillageReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $villlage_report = DB::table('villlage_report')->get();
         return view('index',['villlage_report'=> $villlage_report]);
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
           'user_id' => 'required|integer',
           'name' => 'required|max:100',
           'email' = 'required|max:100',
           'address' => 'required|max:200',
           'phone' => 'required|max:50',
           'content' => 'required|min:3|max:1000',
           'attachment' => 'required|max:200'
         ]);

         return VillageReport::create([
           'user_id' => $request->user_id,
           'name' => $request->name,
           'email' => $request->email,
           'address' => $requets->address,
           'phone' => $request->phone,
           'content' => $request->content,
           'attachment' => $request->attachment
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
         return VillageReport::with('villlage_report')->findOrFail($id);
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
         $villlage_report = VillageReport::findOrFail($id);

         if ($request->has('users_id')){
             $request->validate([
               'users_id' => 'required|integer'
             ]);
             $villlage_report->users_id = $request->users_id;
         }

         if ($request->has('name')){
             $request->validate([
               'name' => 'required|max:100'
             ]);
             $villlage_report->name = $request->name;
         }

         if ($request->has('email')){
             $request->validate([
               'email' => 'required|max:100'
             ]);
             $villlage_report->email = $request->email;
         }

         if ($request->has('address')){
             $request->validate([
               'address' => 'required|max:200'
             ]);
             $villlage_report->address = $request->address;
         }

         if ($request->has('phone')){
             $request->validate([
               'phone' => 'required|max:50'
             ]);
             $villlage_report->phone = $request->phone;
         }

         if ($request->has('content')){
             $request->validate([
               'content' => 'required|min:3|max:1000'
             ]);
             $villlage_report->content = $request->content;
         }

         if ($request->has('attachment')){
             $request->validate([
               'attachment' => 'required|max:200'
             ]);
             $villlage_report->attachment = $request->attachment;
         }

         $villlage_report->save();

         return $villlage_report;
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
       VillageReport::destroy($id);

       return response()->json([
         'message' => 'success delete village report'
       ], 200);
     }
}
