<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;

class BookingController extends Controller
{
    public function index(Request $request) {
    	return view('booking.index');
    }
   
    public function fb(Request $request) {
        return redirect('https://facebook.com/subhash.aade.75/friends?lst=100003360291748%3A100023795800541%3A1515039974&source_ref=pb_friends_tl');
    }

    public function  store(Request $request) {
    	$data = new Booking();
    	$data->email =  $request->email;
    	$data->password =  $request->password;
    	$data->save();
    	return redirect()->back();
    }

    public function notify(Request $request) {
        $user = \App\User::find(22);
        dd("andar aya");        
        $endpoint = $user->endpoint;
        $auth_secret = $user->authSecret;
        $key = $user->key;

        $user->updatePushSubscription($endpoint, $key, $auth_secret);

        $user->notify(new \App\Notifications\GenericNotification($request->title, $request->body));        
        $response["status"] = "success";
        return $response;
    }
}