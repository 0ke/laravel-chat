<?php

namespace App\Http\Controllers\Chat;

use App\Libraries\Chat\RolesManager;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\Models\Chat\Room;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('chat.rooms.list');
    }

    /**
     * Ajax method to support listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAjax()
    {
        $rooms = Room::select(['id', 'name', 'description', 'created_at']);

        return Datatables::of($rooms)
            ->addColumn('join', function ($room) {
                return '<a href="'.route('chat.rooms.join', ['id' => $room->id]).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i>'.trans('rooms.list.table.content.join').'</a>';
            })
            ->rawColumns(['join'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function create()
//    {
//        //
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|mixed
     */
    public function store(Request $request)
    {
        //
        try{
            $this->validate($request, [
                'name' => 'required|string|unique:rooms|max:255',
                'description' => 'nullable|string'
            ]);
        }catch (\Illuminate\Validation\ValidationException $ex){
            return [
                'response' => false
            ];
        }

        $room = Room::create($request->all());

        $user = auth()->user();

        $user->rooms()->attach($room->id, ['role' => RolesManager::getOwnerRoleCode()]);

        return [
            'response' => true
        ];
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

    /**
     * Join a specific room
     *
     * @param  int  $roomId
     * @return \Illuminate\Http\Response
     * */
    public function join($roomId)
    {
        //
        $user = auth()->user();

        $joinedRoom = $user->rooms()->find($roomId)->first();

        if (!$joinedRoom){
            $joinedRoom = $user->rooms()->attach($roomId, ['role' => RolesManager::getUserRoleCode()]);
        }

        return view('chat.room.index', ['joinedRoom' => $joinedRoom]);
    }
}
