<?php

phonespace App\Http\Controllers\Api\V1;

use App\UserProfile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $user_profile = DB::table('user_profiles')->get();
         return view('index',['user_profiles'=> $user_profile]);
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
           'birthplace' => 'required|max:50',
           'birthday' = 'required|max:50',
           'gender' => 'required|max:20',
           'religion' => 'required|max:20',
           'address' => 'required|min:3|max:1000',
           'job' => 'required|max:100',
           'company' => 'required|max:50',
           'phone' => 'required|max:100',
           'desc' => 'required|min:3|max:1000',
           'avatar' => 'required|max:250'
         ]);

         return UserProfile::create([
           'user_id' => $request->user_id,
           'birthplace' => $request->birthplace,
           'birthday' => $request->birthday,
           'gender' => $requets->gender,
           'religion' => $request->religion,
           'address' => $request->address,
           'job' => $request->job,
           'company' => $request->company,
           'phone' => $request->phone,
           'desc' => $request->desc,
           'avatar' => $request->avatar
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
         return UserProfile::with('user_profiles')->findOrFail($id);
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
         $user_profile = UserProfile::findOrFail($id);

         if ($request->has('user_id')){
             $request->validate([
               'user_id' => 'required|integer'
             ]);
             $user_profile->user_id = $request->user_id;
         }

         if ($request->has('birthplace')){
             $request->validate([
               'birthplace' => 'required|max:50'
             ]);
             $user_profile->birthplace = $request->birthplace;
         }

         if ($request->has('birthday')){
             $request->validate([
               'birthday' => 'required|max:50'
             ]);
             $user_profile->birthday = $request->birthday;
         }

         if ($request->has('gender')){
             $request->validate([
               'gender' => 'required|max:20'
             ]);
             $user_profile->gender = $request->gender;
         }

         if ($request->has('religion')){
             $request->validate([
               'religion' => 'required|max:20'
             ]);
             $user_profile->religion = $request->religion;
         }

         if ($request->has('address')){
             $request->validate([
               'address' => 'required|min:3|max:1000'
             ]);
             $user_profile->adress = $request->address;
         }

         if ($request->has('job')){
             $request->validate([
               'job' => 'required|max:50'
             ]);
             $user_profile->job = $request->job;
         }

         if ($request->has('company')){
             $request->validate([
               'company' => 'required|max:100'
             ]);
             $user_profile->company = $request->company;
         }

         if ($request->has('phone')){
             $request->validate([
               'phone' => 'required|max:100'
             ]);
             $user_profile->phone = $request->phone;
         }

         if ($request->has('desc')){
             $request->validate([
               'desc' => 'required|min:3|max:1000'
             ]);
             $user_profile->desc = $request->desc;
         }

         if ($request->has('avatar')){
             $request->validate([
               'avatar' => 'required|max:250'
             ]);
             $user_profile->avatar = $request->avatar;
         }

         $user_profile->save();

         return $user_profile;
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
