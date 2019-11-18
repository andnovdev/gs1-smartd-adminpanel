<?php

namespace App\Http\Controllers\Api\V1;

use App\Budget;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BudgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $budget = DB::table('finantial_budgets')->get();
         return view('index',['finantial_budgets' => $budget]);
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
           'category_id' => 'required|integer',
           'goal_value' => 'required|integer',
           'frecuency' => 'required|max:100',
           'purpose' => 'required|max:50',
         ]);

         return Budget::create([
           'category_id' => $request->category_id,
           'goal_value' => $request->goal_value,
           'frecuency' => $request->frecuency,
           'purpose' => $request->purpose
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
         return Budget::findOrFail($id);
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
         $budget = Budget::findOrFail($id);

         if ($request->has('category_id')) {
             $request->validate([
                'category_id' => 'required|integer'
             ]);
             $budget->category_id = $request->category_id;
         }

         if ($request->has('goal_value')) {
             $request->validate([
               'goal_value' => 'required|integer'
             ]);
             $budget->goal_value = $request->goal_value;
         }

         if ($request->has('frecuency')) {
             $request->validate([
               'frecuency' => 'required|max100'
             ]);
             $budget->frecuency = $request->frecuency;
         }

         if ($request->has('purpose')) {
             $request->validate([
               'purpose' => 'required|max:50'
             ]);
             $budget->purpose = $request->purpose;
         }

         $budget->save();

         return $budget;
     }

     /**
      * Remove the specified resource from storage.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function destroy($id)
     {
       Budget::destroy($id);

       return response()->json([
         'message' => 'success delete finantial budget'
       ], 200);
     }
}
