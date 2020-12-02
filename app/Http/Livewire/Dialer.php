<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Twilio\Exceptions\ConfigurationException;
use Twilio\Rest\Client;

class Dialer extends Component
{
	public $phone_number = '';
	public $call_button_message = 'Call';
    public function render()
    {
        return view('livewire.dialer');
    }

    public function addNumber($number)
    {
        if(strlen($this->phone_number) <= 10){
            $this->phone_number .= $number;
        }
    }

    public function makePhoneCall()
    {
        
        try {
               $account_sid = "AC6ed52a7dea6cbc5455a131d781ea2895";
                $auth_token =  "1fb5a0e4728967a1ef6e5e1737654cc4";
            $client = new Client($account_sid,$auth_token);
          // A Twilio number you own with Voice capabilities
         $twilio_number = "+12562977376";  
         // Where to make a voice call (your cell phone?)
           $to_number = "+1".$this->phone_number;
            try{
            	$this->call_button_message = 'Dialing ...';
                $client->calls->create(
                    $to_number,
                    $twilio_number,
                    array(
                        "url" => "http://demo.twilio.com/docs/voice.xml")
                );
                $this->call_button_message = 'Call Connected!';
            }catch(\Exception $e){
                $this->call_button_message = $e->getMessage();
            }
        } catch (ConfigurationException $e) {
            $this->call_button_message = $e->getMessage();
        }
    }

    public function resetDialer()
    {
        $this->phone_number = '';
    }

    public function delete()
    {
        if(strlen($this->phone_number) > 0){
            $this->phone_number = substr($this->phone_number, 0, -1);
        }
    }

}
