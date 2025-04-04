<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    
    /**
     * get all bookings
     */
    public function getBookings(Request $request){

        try{
           $bookings = Booking::with(['Event','User'])->get();
           return response()->json(['status'=>true,'message'=>'All bookings','data'=>$bookings]);
        }catch(\Exception $e){
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
    }
    /**
     * get single booking by id
     */

     public function getBooking(Request $request){

        try{
            $booking = Booking::with(['Event','User'])->findOrFail($request->id);
            return response()->json(['status'=>true,'data'=>$booking],200);
        }
        catch(\Exception $e){
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
     }

     /**
      * get booking by user id
      */

      public function getBookingsByUserId(Request $request){
         
        try{
            $bookings = Booking::with(['Event','User'])->where('user_id',$request->id)->get();
            return response()->json(['status'=>true,'data'=>$bookings],200);
        }
        catch(\Exception $e){
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
      }
     /**
     * create booking
     */
    public function createBooking(Request $request){
       
        try{
            $validation = $request->validate([
                'user_id'=>'required',
                'event_id'=>'required',
                'ticket_qty'=>'required',
                'total_price'=>'required',
                'ticket_price'=>'required',
            ]);
           $booking = Booking::create([
                'user_id'=>$request->user_id,
                'event_id'=>$request->event_id,
                'ticket_qty'=>$request->ticket_qty,
                'total_price'=>$request->total_price,
                'ticket_price'=>$request->ticket_price,
                'status'=>'pending'
           ]);
            return response()->json(['status'=>true,'message'=>'Booking created successfully','data'=>$booking],200);
        }

        catch(\Exception $e){
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
    }

    /**
     * update booking
     */
    
     public function updateBooking(Request $request){
        try{

            $validation = $request->validate([
                'user_id'=>'required',
                'event_id'=>'required',
                'ticket_qty'=>'required',
                'ticket_price'=>'required',
                'status'=>'required'
            ]);
           
            $booking = Booking::findOrFail($request->id)->update($request->all());
            return response()->json(['status'=>true,'message'=>'Booking updated successfully','data'=>$booking],200);
        }
        catch(\Exception $e){
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
     }

     /****
      * delete booking by id
      */

      public function destroyBooking(Request $request){
        try{
            $booking = Booking::findOrFail($request->id)->delete();
            return response()->json(['status'=>true,'message'=>'Booking deleted successfully'],200);
        }
        catch(\Exception $e){
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
      }
}
