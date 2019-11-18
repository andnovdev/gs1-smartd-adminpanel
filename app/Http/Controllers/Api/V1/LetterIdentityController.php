<?php

namespace App\Http\Controllers\Api\V1;

use App\LetterIdentity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LetterIdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $letter_identity = DB::table('letter_identities')->get();
         return view('index',['letter_identities'=> $letter_identity]);
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
           'letter_id' => 'required|integer',
           'identity_number' => 'required|max:50',
           'name' => 'required|max:100',
           'gender' => 'required|max:20',
           'birthplace' => 'required|max:50',
           'birthday' = 'required|date_format:l, d-M-Y H:i:s T',
           'job' => 'required|max:100',
           'relationship_status' => 'required|max:50',
           'religion' => 'required|max:20',
           'address' => 'required|min:3|max:1000'
         ]);

         return LetterIdentity::create([
           'user_id' => $request->user_id,
           'letter_id' => $request->letter_id,
           'identity_number' => $request->identity_number,
           'name' => $request->name,
           'gender' => $requets->gender,
           'birthplace' => $request->birthplace,
           'birthday' => $request->birthday,
           'job' => $request->job,
           'relationship_status' => $request->relationship_status,
           'religion' => $request->religion,
           'address' => $request->address
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
         return LetterIdentity::with('letter_identities')->findOrFail($id);
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
         $letter_identity = LetterIdentity::findOrFail($id);

         if ($request->has('user_id')){
             $request->validate([
               'user_id' => 'required|integer'
             ]);
             $letter_identity->user_id = $request->user_id;
         }

         if ($request->has('letter_id')){
             $request->validate([
               'letter_id' => 'required|integer'
             ]);
             $letter_identity->letter_id = $request->letter_id;
         }

         if ($request->has('identity_number')){
             $request->validate([
               'identity_number' => 'required|max:50'
             ]);
             $letter_identity->identity_number = $request->identity_number;
         }

         if ($request->has('name')){
             $request->validate([
               'name' => 'required|max:100'
             ]);
             $letter_identity->name = $request->name;
         }

         if ($request->has('gender')){
             $request->validate([
               'gender' => 'required|max:20'
             ]);
             $letter_identity->gender = $request->gender;
         }

         if ($request->has('birthplace')){
             $request->validate([
               'birthplace' => 'required|max:50'
             ]);
             $letter_identity->birthplace = $request->birthplace;
         }

         if ($request->has('birthday')){
             $request->validate([
               'birthday' => 'required|date_format:l, d-M-Y H:i:s T'
             ]);
             $letter_identity->birthday = $request->birthday;
         }

         if ($request->has('job')){
             $request->validate([
                'job' => 'required|max:50'
             ]);
             $letter_identity->job = $request->job;
         }

         if ($request->has('relationship_status')){
             $request->validate([
               'relationship_status' => 'required|max:50'
             ]);
             $letter_identity->relationship_status = $request->relationship_status;
         }

         if ($request->has('religion')){
             $request->validate([
               'religion' => 'required|max:20'
             ]);
             $letter_identity->religion = $request->religion;
         }

         if ($request->has('address')){
             $request->validate([
               'address' => 'required|min:3|max:1000'
             ]);
             $letter_identity->adress = $request->address;
         }

         $letter_identity->save();

         return $letter_identity;
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
