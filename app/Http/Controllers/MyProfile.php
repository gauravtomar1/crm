<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use App\SendTemplate;
use App\User;
use Crypt;
use App\UserAdd;
use DataTables;
use Session;

class MyProfile extends Controller
{
    public function index(Request $request){
		$user= User::where("id",$request->session()->get('user_id'))->first();
		$contact= Contact::all();
		
		return view('dashboard.profile', ["contact"=>$contact,"user"=>$user]);
	}
	
	public function peopleUser(Request $request){
	  $user = User::all();
	 // dd($user);die;
	  return view('dashboard.people-user', ["user"=>$user]);   
	}
	
	public function send(Request $request){
	
    $details = [
        'title' => 'WBE CRMS',
        'body' => 	$request->htmltext,
    ];
    
   
    \Mail::to($request->toEmail)->send(new \App\Mail\MyMail($details));
	$mail_det = new SendTemplate;
      $mail_det->send_to = implode(",",$request->toEmail);
      $mail_det->temp = $request->htmltext;
      $mail_det->user_id = $request->session()->get('user_id');
      $mail_det->save();
    return back()->with('success','send successfully!');
	}
	
	public function sendEmail(Request $request){
	   // dd($request->campaign);die;
	    $details = [
	         'title' => 'WBE CRMS',
	         'body' => implode(",",$request->campaign),
	        ];
	        
	      $campaign = $request->assgn;  
	      $campaignId = \App\Contact::fetchCampaignId($campaign);
	      $cID = $campaignId[0]->id;
	      $campaignList = \App\Contact::fetchCampaignList($cID);
	      foreach($campaignList as $val){
	          $listname = $val->campaign_list;
	          $lName[] = \App\Contact::fetchCampaignListEmailAdd($listname);
	      }
	      foreach($lName as $key => $emailto){
	          $email_to = $emailto[$key]->contact_email;
	     
	      
	      
	     
	     \Mail::to($email_to)->send(new \App\Mail\MyMail($details));
	     $mail_det = new SendTemplate;
	     $mail_det->send_to = $email_to;
	     $mail_det->temp = implode(",",$request->campaign);
	     $mail_det->user_id = $request->session()->get('user_id');
	    // dd($mail_det);die;
         $mail_det->save();
	   }
         return back()->with('success','send successfully!');
	    
	}
	 
	 public function sendScheduleCampaignEmails($data){
	   // print_r("Sending Scheduled Mails Now");
	    //print_r($details);
	    foreach($data as $val){
	       // $kavi[] = $val['email_to'];
	       $sendmail = $val['email_to'];
	       $mailto = explode(",",$sendmail);
	       $temp = $val['body'];
	       
	         foreach($mailto as $mail_to){
	        $details = [
	         'title' => $val['title'],
	         'body' => $val['body'],
	         /*'send_to' => $mail_to,
    	     'temp' =>  $temp,*/
	        ];
	         }
	        \Mail::to($mail_to)->send(new \App\Mail\MyMail($details));
	        
    	     $mail_det = new SendTemplate;
    	     $mail_det->send_to = $sendmail;
    	     $mail_det->temp =  $temp;
    	     $mail_det->user_id = "0";
    	    // dd($mail_det);die;
             $mail_det->save();
	        
	    }//print_r($details);
	 }
	
	public function userUpdate(Request $request){
		$user = User::find($request->session()->get('user_id'));
		$user->name = $request->name;
        $user->email = $request->email;
		$user->contact = $request->contact;
        $user->save();
			return back()->with('success','update successfully!');
	}
	
		public function passUpdate(Request $request){
			if($request->password==$request->confirm_pass){
			$user = User::find($request->session()->get('user_id'));
		    $user->password = Crypt::encrypt($request->password);
            $user->save();	
			return back()->with('success',' password update successfully!');
			}else{
				return back()->with('error','something wrong!');
			}
		
			
	}
	
	public function addressStore(Request $request){
		$address = new UserAdd;
		  $address->note = $request->noteadd;
		  $address->address = $request->paddress;
		  $address->units = $request->punits;
		  $address->vacent = $request->pvacent;
		  $address->date_available = $request->pdates;
		  $address->user_id = $request->session()->get('user_id');
		  $address->save();
		  if($address->id)
		return back()->with('success',' address update successfully!');
			else
				return back()->with('error','something wrong!');
			
	}
	public function addressList(Request $request){
		
		 if ($request->ajax()) {

            $data = UserAdd::get();
			
            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('action', function($row){


                            $btn = '<a href="javascript:void(0)" class="btn btn-primary btn-sm">View</a>';
						

                            return $btn;

                    })

                    ->rawColumns(['action'])

                    ->make(true);

        }
	
        return view('dashboard.profile');
	}
	public function contactList(Request $request){
		
		 if ($request->ajax()) {

            $data = Contact::all();
		
            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('action', function($row){


                           
						$btn = '<button class="btn btn-xs btn-danger btn-delete" data-remote="/profile/contact/' . $row->id . '"><i class="glyphicon glyphicon-trash"></i>Delete</button>';

                            return $btn;

                    })

                    ->rawColumns(['action'])

                    ->make(true);

        }
	
        return view('dashboard.profile');
	}
	
	public function destroyContact(Request $request,$id){
		
		$data= Contact::where("id",$id)->delete();
		return true;
	}
	
	 public function incoming(){
	     $user = User::all();
	     $userinfo = \DB::table('user_information')->select('userinfoname')->where('status', "ACTIVE")->get();
	     return view('dashboard.incoming',["user"=>$user,"userinfo"=>$userinfo]);
	 }
	 
	 public function saveUserInformation(Request $request){
	     $data = array(
	          'userinfoname' => $request->uname,
	          'mission_statement' => $request->mstatement,
	          'slogan' => $request->uslogan,
	          'status' => $request->status,
	          'created_by' => $request->session()->get('user_id')
	         );
	         
	   $res = \App\Contact::insertUserInfo($data);
	    // dd($res);die;
	    if($res){
	          return back()->with('success','user information saved successfully!');
	     }else{
	          return back()->with('error','something wrong!');
	     } 
	 }
	 
	public function userinfotwilio(Request $request){
	      $data = array(
	          'account_sid' => $request->account_sid,
	          'auth_token' => $request->auth_token,
	          'twilio_phone' => $request->twilio_phone,
	          'created_by' => $request->session()->get('user_id')
	         );
	         $res = \App\Contact::saveUserTwilioInfo($data);
    	    // dd($res);die;
    	    if($res){
    	          return back()->with('success','user twilio token information saved successfully!');
    	     }else{
    	          return back()->with('error','something wrong!');
    	     }
	  }
	  
	  public function userinfosendgrid(Request $request){
	      $data = array(
	          'sendgrid_username' => $request->sendgridname,
	          'sendgrid_pass' => $request->sendgridpass,
	          'sendgrid_email' => $request->sendgridemail,
	          'created_by' => $request->session()->get('user_id')
	         );
	         $res = \App\Contact::insertUserSendgridInfo($data);
    	    // dd($res);die;
    	    if($res){
    	          return back()->with('success','user token information saved successfully!');
    	     }else{
    	          return back()->with('error','something wrong!');
    	     }
	  }
	  
	  	//function to load user information view page.
    	//Vikash Rai
	 	public function displayuserinfo(Request $request)	{
	    
			 if ($request->ajax()) {

            $data = \App\Contact::fetchUserInformation();
		
            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('action', function($row){


                           
						$btn = '<button class="btn btn-xs btn-danger btn-delete" data-remote="/userinfo/destroy/' . $row->id . '"><i class="glyphicon glyphicon-trash"></i>Delete</button>';
				// 		$btn .= '<a href="/contact/'.$row->id.'/edit" class="btn btn-primary btn-sm">Edit</a>';
                            return $btn;

                    })

                    ->rawColumns(['action'])

                    ->make(true);

        }
	
        return view('dashboard.user-information');
	}
	
	public function deleteUserInfo(Request $request,$id){
	    $data = \App\Contact::updateUserInfoStatus($id);
		 if($data){
		   return true;
		 }else{
		     return false;
		 }  
	}
}
