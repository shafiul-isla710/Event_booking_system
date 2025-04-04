<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    
    /**
     * get all events
     */
    public function getEvents(Request $request){

         try{

             $events = Event::all();
             return response()->json(['status'=>'success','data'=>$events],200);
         }
         catch(\Exception $e){
             return response()->json(['status'=>'error','message'=>$e->getMessage()],500);
         }
    }


    /**
     * get single event
     */

     public function getEvent(Request $request){

           try{
               $event = Event::with('Booking')->findOrFail($request->id);
               return response()->json(['status'=>'success','data'=>$event],200);
           }
           catch(\Exception $e){
               return response()->json(['status'=>'error','message'=>$e->getMessage()],500);
           }
     }

     /**
     * create event
     */
    public function createEvent(Request $request){
        
        try{

            $validation = $request->validate([
                'title'=>'required|string',
                'description'=>'required',
                'start_date'=>'required|date',
                'end_date'=>'required|date|after:start_date',
            ]);

            $event = Event::create($request->all());
            return response()->json(['status'=>'success','data'=>$event],200);
        }
        catch(\Exception $e){
            return response()->json(['status'=>'error','message'=>$e->getMessage()],500);
        }
    }

    /**
     * update event
     */
    public function updateEvent(Request $request){

        try{
            $validation = $request->validate([
                'title'=>'required|string',
                'description'=>'required',
                'start_date'=>'required|date',
                'ticket_price'=>'required',
                'end_date'=>'required|date|after:start_date',
            ]);

            $event = Event::findOrFail($request->id)->update([
                'title'=>$request->title,
                'ticket_price'=>$request->ticket_price,
                'description'=>$request->description,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date
            ]);
            return response()->json(['status'=>'success','message'=>'Event updated successfully','data'=>$event],200);
        }
        catch(\Exception $e){
            return response()->json(['status'=>'error','message'=>$e->getMessage()],500);
        }
    }

    /**
     * delete event
     */
    public function destroyEvent(Request $request){

        try{
            Event::findOrFail($request->id)->delete();
            return response()->json(['status'=>'success','message'=>'Event deleted successfully'],200);
        }
        catch(\Exception $e){
            return response()->json(['status'=>'error','message'=>$e->getMessage()],500);
        }
    }
}
