<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Twilio\TwiML\VoiceResponse;
use Session;
require_once './vendor/autoload.php';
class VoiceController extends Controller
{
    
    public function __construct() {
  
  }

   /**
   * Making an outgoing call
   */
  public function initiateCall(Request $request) {
    // Validate form input
    $this->validate($request, [
      'phone_number' => 'required|string',
    ]);

    try {
     
     
      $account_sid = "AC6ed52a7dea6cbc5455a131d781ea2895";
      $auth_token =  "1fb5a0e4728967a1ef6e5e1737654cc4";
      $client = new Client($account_sid,$auth_token);
          // A Twilio number you own with Voice capabilities
         $twilio_number = "+12562977376"; 
        // Initiate call and record call
         $call = $client->account->calls->create(
           $request->phone_number, // Destination phone number
           $twilio_number, // Valid Twilio phone number
           array(
               "record" => True,
               "url" => "http://demo.twilio.com/docs/voice.xml")
           );

        if($call) {
          echo 'Call initiated successfully';
        } else {
          echo 'Call failed!';
        }
      
    } catch (Exception $e) {
      echo 'Error: ' . $e->getMessage();
    } catch (RestException $rest) {
      echo 'Error: ' . $rest->getMessage();
    }
  }
  
  public function makeCall(){
      return view('call_request');
  }

}
