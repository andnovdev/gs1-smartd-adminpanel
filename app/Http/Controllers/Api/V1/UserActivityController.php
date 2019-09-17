<?php

namespace App\Http\Controllers\Api\V1;

use App\UserActivity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_activity = DB::table('user_activity_statuses')->get();
        return view('index',['user_activity_statuses'=> $user_activity]);
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
          'status' => 'required|max:200',
          'last_active' => 'required|date_format:l, d-M-Y H:i:s T'
        ]);

        return UserActivity::create([
          'user_id' => $request->user_id,
          'status' => $request->status,
          'last_active' => $request->last_active
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
        return UserActivity::with('user_activity_statuses')->findOrFail($id);
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
        $user_activity_statuses = UserActivity::findOrFail($id);

        if ($request->has('users_id')){
            $request->validate([
              'users_id' => 'required|integer'
            ]);
            $user_activity_statuses->users_id = $request->users_id;
        }

        if ($request->has('status')){
            $request->validate([
              'status' => 'required|max:200'
            ]);
            $user_activity_statuses->status = $request->status;
        }

        if ($request->has('last_active')){
            $request->validate([
              'last_active' => 'required|date_format:l, d-M-Y H:i:s T'
            ]);
            $user_activity_statuses->last_active = $request->last_active;
        }

        $user_activity_statuses->save();

        return $user_activity_statuses;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
