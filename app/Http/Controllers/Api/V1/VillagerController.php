<?php

namespace App\Http\Controllers\Api\V1;

use App\Villager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VillagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $villager = DB::table('villagers')->get();
      return view('index',['villagers'=> $villager]);
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
          'mother_name' => 'required|max:50',
          'relationship_status' => 'required|max:50',
          'average_income' => 'required|integer'
        ]);

        return Villager::create([
          'user_id' => $request->user_id,
          'identity_number' => $request->identity_number,
          'mother_name' => $request->mother_name,
          'relationship_status' => $request->relationship_status,
          'average_income' => $request->average_income
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
        return Villager::findOrFail($id);
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
        $villager = Villager::findOrFail($id);

        if ($request->has('user_id')) {
            $request->validate([
              'user_id'=> 'required|integer'
            ]);
            $villager->user_id = $request->user_id;
        }

        if ($request->has('identity_number')) {
            $request->validate([
              'identity_number' => 'required|max:50'
            ]);
            $villager->identity_number = $request->identity_number;
        }

        if ($request->has('mother_name')) {
            $request->validate([
              'mother_name' => 'required|max:50'
            ]);
            $villager->mother_name = $request->mother_name;
        }

        if ($request->has('relationship_status')) {
            $request->validate([
              'relationship_status' => 'required|max:50'
            ]);
            $villager->relationship_status = $request->relationship_status;
        }


        if ($request->has('average_income')) {
            $request->validate([
              'average_income' => 'required|integer'
            ]);
            $villager->average_income = $request->average_income;
        }

        $villager->save();
        return $villager;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Villager::destroy($id);

        return response()->json([
          'message' => 'success delete Villager'
        ], 200);
    }
}
