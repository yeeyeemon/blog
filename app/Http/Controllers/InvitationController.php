<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Invitation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvitationSend;
class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invitations=Invitation::all();

        return view('invitation.index',compact('invitations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $events = Event::pluck('name', 'id');
        return view('invitation.create',compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $invitation=new Invitation();
        $invitation->email=$request->email;
        $invitation->sent_at=Carbon::now();
        $invitation->event_id=$request->event_title;
        $invitation->save();
        return redirect('invitations');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function send($invitation_id){
        $invitation=Invitation::findOrFail($invitation_id);
        Mail::to($invitation->email)->send(new InvitationSend($invitation));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
