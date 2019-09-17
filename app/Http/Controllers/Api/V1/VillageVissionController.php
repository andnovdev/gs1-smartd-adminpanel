<?php

namespace App\Http\Controllers\Api\V1;

use App\Villagevission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VillageVissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $village_vission = DB::table('village_vissions')->get();
         return view('index',['village_vissions' => $village_vission]);
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
           'content' => 'required|min:3|max:1000',
           'desc' => 'required|min:3|max:1000'
         ]);

         return VillageVission::create([
           'content' => $request->content,
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
         return VillageVission::findOrFail($id);
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
         $village_vission = VillageVission::findOrFail($id);

         if ($request->has('content')) {
             $request->validate([
               'content' => 'required|min:3|max:1000'
             ]);
             $village_vission->content = $request->content;
         }

         if ($request->has('desc')) {
             $request->validate([
               'desc' => 'required|min:3|max:1000'
             ]);
             $village_vission->desc = $request->desc;
         }

         $village_vission->save();

         return $village_vission
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
       VillageVission::destroy($id);

       return response()->json([
         'message' => 'success delete village vission'
       ], 200);
     }
}
