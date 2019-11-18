<?php

namespace App\Http\Controllers\Api\V1;

use App\Attachment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AttachmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
         $attachment = DB::table('letter_attachments')->get();
         return view('index',['letter_attachments' => $attachment]);
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
           'letter_id' => 'required|integer',
           'identity_card' => 'required|max:50',
           'family_card' => 'required|max:50'
         ]);

         return Attachment::create([
           'letter_id' => $request->letter_id,
           'identity_card' => $request->identity_card,
           'family_card' => $request->family_card
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
         return Attachment::findOrFail($id);
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
         $attachment = Attachment::findOrFail($id);

         if ($request->has('letter_id')) {
             $request->validate([
               'letter_id' => 'required|integer'
             ]);
             $attachment->letter_id = $request->letter_id;
         }

         if ($request->has('identity_card')) {
             $request->validate([
               'identity_card' => 'required|max:50'
             ]);
             $attachment->identity_card = $request->identity_card;
         }

         if ($request->has('family_card')) {
             $request->validate([
               'family_card' => 'required|max:50'
             ]);
             $attachment->family_card = $request->family_card;
         }

         $attachment->save();

         return $attachment;
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
