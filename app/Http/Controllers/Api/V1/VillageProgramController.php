<?php

namespace App\Http\Controllers\Api\V1;

use App\UserProgram;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VillageProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $village_program = DB::table('village_programs')->get();
         return view('index',['village_programs'=> $village_program]);
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
           'title' => 'required|max:100',
           'desc' =>  'required|min:3|max:1000',
           'date_start' => 'required|date_format:d-M-y',
           'date_finish' => 'required|date_format:d-M-y'
         ]);

         return VillageProgram::create([
           'title' => $request->title,
           'desc' => $request->desc,
           'date_start' => $request->date_start,
           'date_finish' => $request->date_finish
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
         return VillageProgram::with('village_programs')->findOrFail($id);
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
         $village_program = VillageProgram::findOrFail($id);

         if ($request->has('title')){
             $request->validate([
               'title' => 'required|max:100'
             ]);
             $village_program->title = $request->title;
         }

         if ($request->has('desc')){
             $request->validate([
               'desc' => 'required|min:3|max:1000'
             ]);
             $village_program->desc = $request->desc;
         }

         if ($request->has('date_start')){
             $request->validate([
               'date_start' => 'required|date_format:d-M-y'
             ]);
             $village_program->date_start = $request->date_start;
         }

         if ($request->has('date_finish')){
             $request->validate([
               'date_finish' => 'required|date_format:d-M-y'
             ]);
             $village_program->date_finish = $request->date_finish;
         }

         $village_program->save();

         return $village_program;
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         VillageProgram::destroy($id);

         return response()->json([
           'message' => 'success delete village program'
         ], 200);
     }
}
