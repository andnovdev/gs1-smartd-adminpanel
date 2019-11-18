<?php

namespace App\Http\Controllers\Api\V1;

use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $employee = DB::table('employees')->get();
         return view('index',['employees'=> $employee]);
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
           'identity_number' => 'required|max:50',
           'position' => 'required|max:50',
           'tenure_start' => 'required|date_format:Y',
           'tenure_finish' => 'required|date_format:Y'
         ]);

         return Employee::create([
           'user_id' => $request->user_id,
           'identity_number' => $request->identity_number,
           'position' => $request->position,
           'tenure_start' => $request->tenure_start,
           'tenure_finish' => $request->tenure_finish
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
         return Employee::with('employees')->findOrFail($id);
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
         $employee = Employee::findOrFail($id);

         if ($request->has('user_id')){
             $request->validate([
               'user_id' => 'required|integer'
             ]);
             $employeers->user_id = $request->user_id;
         }

         if ($request->has('identity_number')){
             $request->validate([
               'identity_number' => 'required|max:50'
             ]);
             $employee->identity_number = $request->identity_number;
         }

         if ($request->has('position')){
             $request->validate([
               'position' => 'required|max:50'
             ]);
             $employee->position = $request->position;
         }

         if ($request->has('tenure_start')) {
             $request->validate([
               'tenure_start' => 'required|date_format:Y'
             ]);
             $employee->tenure_start = $request->tenure_start;
         }

         if ($request->has('tenure_finish')) {
             $request->validate([
               'tenure_finish' => 'required|date_format:Y'
             ]);
             $employee->tenure_finish = $request->tenure_finish;
         }

         $employee->save();

         return $employee;
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
         Employee::destroy($id);

         return response()->json([
           'message' => 'success delete employees'
         ], 200);
     }
}
