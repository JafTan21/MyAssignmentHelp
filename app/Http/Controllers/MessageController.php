<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.message.index', [
            'old_messages' => $this->getOldMessages($request->room),
            'room' => $request->room ?? 'admin',
        ]);
    }

    public function getOldMessages($room)
    {
        return Message::where('room', $room)
            ->with([
                'user_from',
                'user_to',
            ])
            ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function inbox($room)
    {
        Message::where('room', $room)
            ->whereNull('viewed_at')
            ->where('user_to_id', 'admin')
            ->update([
                'viewed_at' => now(),
            ]);
        return view('Admin.message.inbox', [
            'room' => $room,
            'old_messages' => $this->getOldMessages($room),
            'user' => User::where('id', $room)->firstOrFail(),
        ]);
    }
}
