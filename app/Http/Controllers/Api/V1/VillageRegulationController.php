<?php

namespace App\Http\Controllers\Api\V1;

use App\VillageRegulation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VillageRegulationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $village_regulation = DB::table('village_regulations')->get();
         return view('index',['village_regulations' => $village_regulation]);
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
           'desc' => 'required|min:3|max:1000'
         ]);

         return VillageRegulation::create([
           'title' => $request->title,
           'desc' => $request ->desc
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
         return VillageRegulation::findOrFail($id);
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
         $village_regulation = VillageRegulation::findOrFail($id);

         if ($request->has('title')) {
             $request->validate([
               'title' => 'required|max:50'
             ]);
             $village_regulation->title = $request->title;
         }

         if ($request->has('desc')) {
             $request->validate([
               'desc' => 'required|min:3|max:1000'
             ]);
             $village_vission->desc = $request->desc;
         }

         $village_regulation->save();

         return $village_regulation
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         VillageRegulation::destroy($id);

         return response()->json([
           'message' => 'success delete village regulation'
         ], 200);
     }
}
