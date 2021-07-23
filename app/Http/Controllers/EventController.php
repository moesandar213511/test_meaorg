<?php

namespace App\Http\Controllers;

use App\CustomClass\Path;
use App\CustomClass\EventData;
use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.site_admin.admin.event')->with([
            'url'=>'event'
        ]);
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
        $photo = $request->file('photo');
        $photo_name = uniqid().'_'.$photo->getClientOriginalName();
        $photo->move(public_path('upload/event/'),$photo_name);
        Event::create([
            'photo' => $photo_name,
            'title' => $request->get('title'),
            'date' => $request->get('date'),
            'location' => $request->get('location'),
            'timing' => $request->get('timing'),
            'category' => $request->get('category'),
            'detail' => $request->get('detail')
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $event = Event::orderBy('id','desc')->get();
        $arr = [];
        foreach($event as $event_each){
            $obj = new EventData($event_each->id);
            array_push($arr,$obj->getEventData());
        }
        return json_encode($arr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $obj = new EventData($id);
        $edit_event = $obj->getEventData();
        return json_encode($edit_event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->get('id');
       if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $photo_name = uniqid().'_'.$photo->getClientOriginalName();
            $photo->move(public_path('/upload/event/'),$photo_name);
            $event = Event::findOrFail($id);
            $image_path = public_path('/upload/event/').$event->photo;
            if(file_exists($image_path)){
                unlink($image_path);
            }
            // return ok;
            Event::findOrFail($id)->update([
                'photo' => $photo_name,
                'title' => $request->get('title'),
                'date' => $request->get('date'),
                'location' => $request->get('location'),
                'timing' => $request->get('timing'),
                'category' => $request->get('category'),
                'detail' => $request->get('detail')
            ]);
       }else{
            Event::findOrFail($id)->update([
                'title' => $request->get('title'),
                'date' => $request->get('date'),
                'location' => $request->get('location'),
                'timing' => $request->get('timing'),
                'category' => $request->get('category'),
                'detail' => $request->get('detail')
            ]);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $image_path = public_path('/upload/event/').$event->photo;
        if($image_path){
            unlink($image_path);
        }
        $event->delete();
    }

    public function event_detail($id){
        $obj = new EventData($id);
        $event_detail = $obj->getEventData();

        return view('admin.site_admin.admin.event_detail')->with([
            'url'=>'event',
            'event_detail'=>$event_detail
        ]);

    }
}