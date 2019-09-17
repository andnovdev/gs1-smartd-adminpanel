<?php

namespace App\Http\Controllers\Api\V1;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VillageMissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $village_mission = DB::table('village_missions')->get();
        return view('index',['village_missions' => $village_mission]);
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

        return VillageMission::create([
          'content' => $request->content,
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
        return VillageMission::findOrFail($id);
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
        $village_mission = VillageMission::findOrFail($id);

        if ($request->has('content')) {
            $request->validate([
              'content' => 'required|min:3|max:1000'
            ]);
            $village_mission->content = $request->content;
        }

        if ($request->has('desc')) {
            $request->validate([
              'desc' => 'required|min:3|max:1000'
            ]);
            $village_vission->desc = $request->desc;
        }

        $village_mission->save();

        return $village_mission
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        VillageMission::destroy($id);

        return response()->json([
          'message' => 'success delete village mission'
        ], 200);
    }
}
