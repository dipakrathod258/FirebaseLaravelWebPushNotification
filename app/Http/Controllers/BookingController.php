<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;

class BookingController extends Controller
{
    public function index(Request $request) {
    	return view('booking.index');
    }

    public function  store(Request $request) {
    	$data = new Booking();
    	$data->email =  $request->email;
    	$data->password =  $request->password;
    	$data->save();
    	return redirect()->back();
    }

    public function notify(Request $request) {
        $user = \App\User::find(19);
        $endpoint = $user->endpoint;
        $auth_secret = $user->authSecret;
        $key = $user->key;

        $user->updatePushSubscription($endpoint, $key, $auth_secret);
        $user->notify(new \App\Notifications\GenericNotification("Welcome To WebPush", "You will now get all of our push notifications"));        
        $response["status"] = "success";
        return $response;
    }
}