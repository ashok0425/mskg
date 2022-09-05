<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use Illuminate\Http\Request;
use File;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Order_detail;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rooms=Room::orderBy('id','desc')->get();
        return view('admin.table_room.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.table_room.create');
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
            'name'=>'required',
            'type'=>'required',

        ]);
        try {
            //code...
        
  
        $room=new Room;
        $room->name=$request->name;
        $room->type=$request->type;
        $room->save();
        $notification=array(
            'alert-type'=>'success',
            'messege'=>'Created succesfully',
           
         );
        } catch (\Throwable $th) {
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to create  ',
               
             );
        }
         return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Room $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        return view('admin.table_room.edit',compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $request->validate([
            'name'=>'required',
            'type'=>'required',
        ]);

        try {
        //code...
      
        $room=Room::find($room->id);
        $room->name=$request->name;
        $room->type=$request->type;
        $room->save();

        $notification=array(
            'alert-type'=>'success',
            'messege'=>'updated succesfully', 
         );

        } catch (\Throwable $th) {
            $notification=array(
                'alert-type'=>'error',
                'messege'=>'Failed to update    ',
               
             );
        }
         return redirect()->back()->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room,$id)
    {
        $order=Order::where('table_id',$id)->first();
        if($order){
            $notification=array(
                'alert-type'=>'info',
                'messege'=>'You can\'t delete this item.
                As this order exists in sell list',
               
             );
             return redirect()->back()->with($notification);
        }
        $room=Room::find($id);
        $room->delete();
        $notification=array(
            'alert-type'=>'success',
            'messege'=>'Deleted succesfully',
           
         );
         return redirect()->back()->with($notification);

    }
}
