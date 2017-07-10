<?php

namespace App\Http\Controllers\Backend\Room;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Room\ManageRoomRequest;
use App\Http\Requests\Backend\Room\StoreRoomRequest;
use App\Models\Room\Room;
use App\Repositories\Backend\Room\RoomRepository;

class RoomController extends Controller
{
    /**
     * @var RoomRepository
     */
    protected $rooms;

    /**
     * @param UserRepository $users
     * @param RoleRepository $roles
     */
    public function __construct(RoomRepository $rooms)
    {
        $this->rooms = $rooms;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ManageRoomRequest $request)
    {
        return view('backend.room.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('backend.room.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomRequest $request)
    {
        $room = Room::create($request->all());

        return redirect()->route('admin.institutes.show', $room->institute_id)->withFlashSuccess(trans('alerts.backend.rooms.created'));
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
}