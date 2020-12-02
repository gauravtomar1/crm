<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Carbon\Carbon;
use App\ContactSnapshot;
use App\ContactCategory;
use App\Imports\ContactImport;
//use App\Imports\ListImport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;
use Session;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Twilio\Rest\Client;
use App\SendTemplate;


class ContactController extends Controller
{   

    public function lists(Request $request) {
       // dd($request);die;
		$contact= Contact::all();
		$list= Contact::whereDate('created_at', Carbon::today())->orderBy('id', 'DESC')->get();
		$snap_list= ContactSnapshot::whereDate('created_at', Carbon::today())->orderBy('id', 'DESC')->get();
		$cat_list= ContactCategory::where("status",1)->get();
		$list_data = \DB::table('groups')->select('name')->where('status', 1)->get();
		//dd($list_data);die;
		return view('dashboard.contacts', ["list"=>$list,"contact"=>$contact,"snap_list"=>$snap_list,"cat_list"=>$cat_list,"group_list"=>$list_data]);
	}
	
	  // Fetch lists
	  //function to fetch groups to be displayed in add to list dropdown in contacts.blade.php
	  //created on 24 June 2020 by Vikash Rai
    public function getLists(){

        $list_data['data'] = \DB::table('groups')->select('name')->where("status",1)->get();
  
        echo json_encode($list_data);
        exit;
    }
    
	public function newListData(Request $request){
	    //dd($request);die;
	    $data = array(
	          'name' => $request['name'],
	          'status' => 1
	        );
	    //print_r($data);   
	    $res = \App\Contact::insert($data);
	    if($res){
	        print_r("done");
	    }else{
	        print_r("check_code");
	    }
	}
    public function store(Request $request) { 
	
	 // $list = implode(",",$request->lists);
	 
      $contact = new Contact;
      $contact->first_name = $request->fname;
      $contact->last_name = $request->lname;
      $contact->phone = $request->phone;
      $contact->email = $request->email;
      $contact->details = $request->detail;
	  $contact->category = $request->cat;
	 // $contact->lists = "";
	  $contact->note = $request->note;

      $contact->save();
      
      $list = $request->lists;
      if($contact->id){
	 foreach($list as $val){
	     $data = array(
	         'contact_id' => $contact->id,
	         'list_name' => $val,
	         'contact_email' => $request->email,
	         'status' => "Active"
	         );
	     $res = \App\Contact::insertContactList($data);
	    }
	     //dd($data);die;
	    
	    if($res){
	        return back()->with('success','contact save successfully!');
	    }else{
	        $data= Contact::where("id",$contact->id)->delete();
	        return back()->with('error','something wrong!');
	    }
      }else{
          return back()->with('error','something wrong!');
      }
	 
      	/*if($contact->id)
		{
			return back()->with('success','contact save successfully!');
		}
		else
		{
			return back()->with('error','something wrong!');
		}*/

    }
	
	    public function storeSnapshot(Request $request) { 
	  $con_history = implode(',', $request->contact_history);
      $snapshot = new ContactSnapshot;
      $snapshot->contact = $request->contact;
      $snapshot->contact_investor = $request->investor;
      $snapshot->goal = $request->goal;
      $snapshot->contact_history = $con_history;
      $snapshot->other_notes = $request->other_notes;

      $snapshot->save();
      
      	if($snapshot->id)
		{
			return back()->with('success','contact snapshot save successfully!');
		}
		else
		{
			return back()->with('error','something wrong!');
		}

    }
	
	  public function import() 
    {
        $name = $_FILES['file']['name'];
        $ext = (explode(".", $name));
        
        // dd($ext[1]);die;
         if($ext[1] == "csv"){
        //Excel::import(new ContactImport,request()->file('file'));
         $tmpName = $_FILES['file']['tmp_name'];
         $csvAsArray = array_map('str_getcsv', file($tmpName));
        // dd($csvAsArray);die;
         $res = \App\Contact::uploadContactCsv($csvAsArray);
         // dd($res);die;
          if($res){
              return back()->with('success','csv file uploaded successfully!');
          }else{
              return back()->with('error','something wrong!');
          }
         }else{ 
        return back()->with('error','Only CSV file is allowed to upload!');
         }
    }
	public function index(Request $request){
		
		 if ($request->ajax()) {

            $data = ContactCategory::all();
		foreach($data as $val){
			if($val->status)
				$val->status='Active';
			else
			$val->status='InActive';	
		}
			
            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('action', function($row){


                           $btn = '<a href="/category/'.$row->id.'/edit" class="btn btn-primary btn-sm">Edit</a>';
						$btn .= '<button class="btn btn-xs btn-danger btn-delete" data-remote="/contact/category/' . $row->id . '"><i class="glyphicon glyphicon-trash"></i>Delete</button>';

                            return $btn;

                    })

                    ->rawColumns(['action'])

                    ->make(true);

        }
	
        return view('dashboard.contact_cat');
		
	}
	
	public function storeCategory(Request $request){
	  $category = ContactCategory::firstOrNew(array('id' => $request->custId));
      $category->name = $request->category;
	  $category->status = $request->status;
      $category->save();
      
      	if($category->id)
		{   
	        if($request->custId)return redirect('/contacts-category')->with('success','category update successfully!');
			return back()->with('success','category save successfully!');
		}
		else
		{
			return back()->with('error','something wrong!');
		}	
		
	}
	
	public function editCategory(Request $request,$id){
		$data= ContactCategory::where("id",$id)->first();
	//	dd($data);die;
		return view('dashboard.contact_cat',["data"=>$data]);
	}
	
	public function destroy(Request $request,$id){
		$data= ContactCategory::where("id",$id)->delete();
		return true;
	}
	
	public function contact(Request $request)
	{
	   // dd($request);die;
			 if ($request->ajax()) {

            $data = Contact::all();
		
            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('action', function($row){


                           
						$btn = '<button class="btn btn-xs btn-danger btn-delete" data-remote="/contact/destroy/' . $row->id . '"><i class="glyphicon glyphicon-trash"></i>Delete</button>';
						$btn .= '<a href="/contact/'.$row->id.'/edit" class="btn btn-primary btn-sm">Edit</a>';
                            return $btn;

                    })

                    ->rawColumns(['action'])

                    ->make(true);

        }
	
        return view('dashboard.contact-list');
	}
	
	public function destroyCon(Request $request,$id){
		Contact::where("id",$id)->delete();
		return true;
	}
	 
	//function to convert multi dimensional array in single array...
	//Vikash Rai 
	 public function array_flatten($array) { 
      if (!is_array($array)) { 
        return FALSE; 
      } 
      $result = array(); 
      foreach ($array as $key => $value) { 
        if (is_array($value)) { 
          $result = array_merge($result, array_flatten($value)); 
        } 
        else { 
          $result[$key] = $value; 
        } 
      } 
      return $result; 
    } 
    
    //function to convert stdobj to array...
    //Vikash Rai
     function stdToArray($obj){
      $reaged = (array)$obj;
      foreach($reaged as $key => &$field){
        if(is_object($field))$field = stdToArray($field);
      }
      return $reaged;
    }
    
	//function to load edit page and update contact information.
	//Vikash Rai
	public function action(Request $request,$id){
		if($request->method()=='GET'){
		$contact= Contact::where("id",$id)->first(); 
		$cat_list= ContactCategory::where("status",1)->get();
		$list_data = \DB::table('groups')->select('name')->where('status',1)->get();
		$list = \DB::table('contact_list')->select('list_name')->where('contact_id',$id)->get()->toArray();
		foreach($list as $val){
		    $contact_list[] = $val->list_name;
		}
	//	dd($contact_list);die;
			return view('dashboard.contact-edit',["cat_list"=>$cat_list,"list_data"=>$list_data,"contact"=>$contact,"contact_list"=>$contact_list]);
		}elseif($request->method()=='POST'){
			$contact = Contact::find($id);
		    $list = implode(",",$request->lists);
			$list = \DB::table('contact_list')->select('list_name')->where('contact_id',$id)->get()->toArray();
		   foreach($list as $val){
		    $contact_list[] = $val->list_name;
	     	}
			$contact->first_name = $request->fname;
			$contact->last_name = $request->lname;
			$contact->phone = $request->phone;
			$contact->email = $request->email;
			$contact->details = $request->detail;
			$contact->category = $request->cat;
		//	$contact->lists = $list;
			$contact->note = $request->note;
	  
			$contact->save();
			$lists = $request->lists;
			foreach($lists as $listname){
			    $name[] = $listname;
			}
		    $result = array_merge(array_diff($contact_list, $name), array_diff($name, $contact_list));
		    foreach($result as $res){
		        $listtoadd = $res;
		        $data = array(
		             'contact_id' => $contact->id,
		             'list_name' =>  $listtoadd,
		             'contact_email' => $request->email,
		             'status' => "Active"
		            );
		        $updatedlist = \DB::table('contact_list')->insert($data);
		    }
		//	dd($contact_list);die;
				if($contact->id)
			  {
				  return back()->with('success','contact update successfully!');
			  }
			  else
			  {
				  return back()->with('error','something wrong!');
			  }	
		}
		
	}
	
		//function to load list group view page.
    	//Vikash Rai
	 	public function listGroup(Request $request)	{
	    // $data = \App\Contact::fetch();
		  //  dd($data);die;
	   // dd($request);die;
			 if ($request->ajax()) {

            $data = \App\Contact::fetch();
		
            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('action', function($row){


                           
						$btn = '<button class="btn btn-xs btn-danger btn-delete" data-remote="/listgroup/destroy/' . $row->id . '"><i class="glyphicon glyphicon-trash"></i>Delete</button>';
				// 		$btn .= '<a href="/contact/'.$row->id.'/edit" class="btn btn-primary btn-sm">Edit</a>';
                            return $btn;

                    })

                    ->rawColumns(['action'])

                    ->make(true);

        }
	
        return view('dashboard.list-groups');
	}
	
	//function to soft delete list group.
	//Vikash Rai
	public function deleteListGroup(Request $request,$id){
		 $data = \App\Contact::updateListGroupStatus($id);
		 if($data){
		   return true;
		 }else{
		     return false;
		 } 
	}
	
	//function to import csv file of list.
	//Vikash Rai
	public function importList(){
	    
	     $name = $_FILES['file']['name'];
         $ext = (explode(".", $name));
        
        // dd($ext[1]);die;
         if($ext[1] == "csv"){
	     $tmpName = $_FILES['file']['tmp_name'];
         $csvAsArray = array_map('str_getcsv', file($tmpName));
        
        // dd($csvAsArray);die;
          $res = \App\Contact::uploadListGroupCsv($csvAsArray);
         // dd($res);die;
          if($res){
              return back()->with('success','csv file uploaded successfully!');
          }else{
              return back()->with('error','something wrong!');
          }
         }else{
            return back()->with('error','Only CSV file is allowed to upload!');  
         } 
	}
	
	//function to load view page of create email campaign
	//Vikash Rai
	public function emailCreate(){
	    $contact= Contact::all();
	    $user_id = Session::get('user_id');
	    $list_data = \DB::table('groups')->select('name')->where('status', 1)->get();
	    $campaign_data = \DB::table('email_campaign')->select('campaign_name')->get();
	    $where = array(
	           'created_by' => $user_id,
	           'status' => "Active"
	        );
	    $campaignData = \DB::table('email_campaign')->where($where)->get();
	    $campaignList = \DB::table('email_campaign_list')->select('campaign_list')->where('created_by',$user_id)->get()->toArray();
	    $contactList = \DB::table('email_campaign_auto_respond_list')->select('contact_list')->where('created_by',$user_id)->get()->toArray();
	    $campaignContacts = \DB::table('email_campaign_contacts')->select('contact_name')->where('created_by',$user_id)->get()->toArray();
 	    foreach($campaignList as $cList){
	        $list_campaign[] = $cList->campaign_list;
	    }
	     foreach($contactList as $conList){
	        $contactss[] = $conList->contact_list;
	    }
	    foreach($campaignContacts as $cContacts){
	        $contactName[] = $cContacts->contact_name;
	    }
	    $camapignRespond = \DB::table('email_campaign_auto_respond')->where('created_by',$user_id)->get();
	   // dd($contactName);die;
	   if($campaignList){
	       $list_campaign1 = $list_campaign;
	   }else{
	       $list_campaign1 = "";
	   }
	    if($campaignContacts){
	       $contactName1 = $contactName;
	   }else{
	       $contactName1 = "";
	   }
	    if(!empty($campaignData[0])){
	        return view('dashboard.email_create',["contact"=>$contact,"group_list"=>$list_data,"campaign_data"=>$campaign_data,"campaignData"=>$campaignData,"list_campaign"=>$list_campaign1,"camapignRespond"=>$camapignRespond,"contactss"=>$contactss,"contactName"=>$contactName1]);
	    }else{
	        $campaignData = "";
	        $list_campaign="";
	        $camapignRespond="";
	        $contactss="";
	        $contactName="";
	     return view('dashboard.email_create',["contact"=>$contact,"group_list"=>$list_data,"campaign_data"=>$campaign_data,"campaignData"=>$campaignData,"list_campaign"=>$list_campaign,"camapignRespond"=>$camapignRespond,"contactss"=>$contactss,"contactName"=>$contactName]);
	    }
	}
	
	//function to load text sms create page view
	//Vikash Rai
	public function textSmsCreate(){
	    $contact= Contact::all();
	    $user_id = Session::get('user_id');
	    $list_data = \DB::table('groups')->select('name')->where('status', 1)->get();
	    $twilio = \DB::table('user_twilio_info')->select('twilio_phone')->where('created_by', $user_id)->get()->toArray();
	    if($twilio){
	        foreach($twilio as $val){
	        $twilio_phone = $val;
	        }
	    }else{
	        $twilio_phone = "";
	    }
	    $textCampaignData = \DB::table('text_campaign')->where('created_by', $user_id)->get();
	   // dd($textCampaignData)[0];die;
	    if(!empty($textCampaignData[0])){
	     $textCampaignContact = \DB::table('text_campaign_contacts')->select('contact_name')->where('text_campaign_id',$textCampaignData[0]->id)->get()->toArray();
	     $textCampaignList = \DB::table('text_campaign_list')->select('list_name')->where('text_campaign_id',$textCampaignData[0]->id)->get()->toArray();
	     foreach($textCampaignContact as $val){
		    $contact_name[] = $val->contact_name;
		}
		 foreach($textCampaignList as $value){
		    $list_name[] = $value->list_name;
		}
	   // dd($list_name);die;
	    return view('dashboard.textSms_create',["contact"=>$contact,"group_list"=>$list_data,"twilio_phone"=>$twilio_phone,"textCampaignData"=>$textCampaignData,"contact_name"=>$contact_name,"list_name"=>$list_name]);
	    }else{
	    $textCampaignData = "";
	    $list_name = "";
	    $contact_name = "";
	    return view('dashboard.textSms_create',["contact"=>$contact,"group_list"=>$list_data,"twilio_phone"=>$twilio_phone,"textCampaignData"=>$textCampaignData,"contact_name"=>$contact_name,"list_name"=>$list_name]); 
	    }
	}
	

	
	//function to save email create campaign data
	//Vikash Rai
	public function saveEmailCampaign(Request $request){
	  // dd($request->htmltext);die;
	  /*if($request->htmltext){
	     $stringlenght = strlen($request->htmltext);
	     if($stringlenght <= 500){
	         $text = $request->htmltext;
	     }else{
	          return back()->with('error','characters limit exceeded!');
	     }
	  }else{
	      $text = "";
	  }*/
	 // dd($stringlenght);die;
	 if($request->campaign_id == "0"){
	$content = $request->htmltexts;
//	dd($content);die;
    $fp = fopen(public_path()."/campaign/$request->campaign_name.php","wb");
    fwrite($fp,$content);
   // print_r($fp);die;
    fclose($fp);
/*	  if($request->lists){
	   $list = implode(",",$request->lists);
	  }else{
	      $list = "";
	  }*/
	    
	    $data = array(
	           'campaign_name' => $request->campaign_name,
               'email_from' => $request->email_from, 
               'name' => $request->name, 
               'site' => $request->site,
               'date' => $request->date,
               'hello' => $request->hello,
               'note' => $request->note,
               'status' => $request->status,
               'looping' => $request->is_looping,
               'is_list' =>  $request->is_list,
               //'lists' => $list,
               'options' => $request->options,
               'message_days' => $request->after_days,
               'text' => $request->campaign_name.".txt",
               'created_by' => $request->session()->get('user_id'),
               'created_at' => date('Y-m-d')
	        );
	 //  dd($data);die; 
	     $res = \App\Contact::insertEmailCampaign($data);
	      
	     if($request->lists){
	         foreach($request->lists as $val){
	             $data1 = array(
	                  'email_campaign_id' => $res,
	                  'campaign_list' => $val,
	                  'created_by' => $request->session()->get('user_id')
	                 );
	           $result = \App\Contact::saveCampaignList($data1);      
	         }
	   
	     }
	      if($request->campaign_contact){
	         foreach($request->campaign_contact as $value){
	             $data2 = array(
	                  'email_campaign_id' => $res,
	                  'contact_name' => $value,
	                  'created_by' => $request->session()->get('user_id')
	                 );
	           $result = \App\Contact::saveEmailCampaignContacts($data2);      
	         }
	                foreach($request->campaign_contact as $value){
	        $contact = \App\Contact::fetchContactToSendMail($value);
	    }
	    foreach($contact as $con){
	        $email_address = $con->email;
	        $details = [
                'title' => 'WBE CRMS',
                'body' => 	$request->campaign_name,
            ];
	        \Mail::to($email_address)->send(new \App\Mail\MyMail($details));
        	$mail_det = new SendTemplate;
              $mail_det->send_to = $email_address;
              $mail_det->temp = $request->campaign_name;
              $mail_det->user_id = $request->session()->get('user_id');
              $mail_det->save();
	    }
	     }
	     if($res){
	          return back()->with('success','email campaign created and scheduled successfully!');
	     }else{
	          return back()->with('error','something wrong!');
	     }
	 }else{
	    // dd($request->campaign_contact);die;
	     	$content = $request->htmltexts;
        //	dd($content);die;
            $fp = fopen(public_path()."/campaign/$request->campaign_name.php","wb");
            fwrite($fp,$content);
           // print_r($fp);die;
            fclose($fp);
         $id = $request->campaign_id;
         $data = array(
	           'campaign_name' => $request->campaign_name,
               'email_from' => $request->email_from, 
               'name' => $request->name, 
               'site' => $request->site,
               'date' => $request->date,
               'hello' => $request->hello,
               'note' => $request->note,
               'status' => $request->status,
               'looping' => $request->is_looping,
               'is_list' =>  $request->is_list,
               //'lists' => $list,
               'options' => $request->options,
               'message_days' => $request->after_days,
               'text' => $request->campaign_name.".txt",
               'created_by' => $request->session()->get('user_id'),
               'created_at' => date('Y-m-d')
	        ); 
	      $res = \App\Contact::updateEmailCampaign($data,$id);  
	        if($request->lists){
	            $delList = \App\Contact::deleteCampaignList($id);
	         foreach($request->lists as $val){
	             $data1 = array(
	                  'email_campaign_id' => $id,
	                  'campaign_list' => $val,
	                  'created_by' => $request->session()->get('user_id')
	                 );
	           $result = \App\Contact::saveCampaignList($data1);      
	         }
	     }
	      if($request->campaign_contact){
	            $delContactsss = \App\Contact::deleteEmailCampaignContacts($id);
	         foreach($request->campaign_contact as $value){
	             $data2 = array(
	                  'email_campaign_id' => $id,
	                  'contact_name' => $value,
	                  'created_by' => $request->session()->get('user_id')
	                 );
	           $result = \App\Contact::saveEmailCampaignContacts($data2);      
	         }
	     }
	  
	          return back()->with('success','email campaign updated and scheduled successfully!');
	     
	 }   
	}
	
	 public function saveEmailCampaignRespond(Request $request){
	    // dd($request);die;
	   /*  if($request->test){
    	   $list = implode(",",$request->test);
    	  }else{
    	      $list = "";
    	  }*/
    	  if($request->auto_respond_id == "0"){
    	  if($request->message){
    	     $stringlenght = strlen($request->message);
    	     if($stringlenght <= 500){
    	         $text = $request->message;
    	     }else{
    	          return back()->with('error','characters limit exceeded!');
    	     }
    	  }else{
    	      $text = "";
    	  }
	     $data = array(
	          'user_reply' => $request->unsubscribe,
	          'custom_keywords' => $request->keyword,
	          'subject' => $request->subject,
	          'text_message' => $text,
	          'remove_from_campaign' => $request->remove_from_campaign,
	          'add_to_contact_list' => $request->add_to_contact,
	         // 'contact_list' => $list,
	          'created_by' => $request->session()->get('user_id')
	         );
	      // dd($data);die;
	      $res = \App\Contact::insertEmailCampaignAutoRespond($data);
	      if($request->test){
	      foreach($request->test as $val){
	      $data1 = array(
	            'campaign_auto_respond_id' => $res,
	            'contact_list' => $val,
	            'created_by' => $request->session()->get('user_id')
	          );
	          $res = \App\Contact::insertEmailCampaignAutoRespondList($data1);
	      }
	 }
	     if($res){
	          return back()->with('success','email campaign auto respond saved successfully!');
	     }else{
	          return back()->with('error','something wrong!');
	     }
	 }else{
	    // dd("hello");die;
	     $id = $request->auto_respond_id;
	     if($request->message){
    	     $stringlenght = strlen($request->message);
    	     if($stringlenght <= 500){
    	         $text = $request->message;
    	     }else{
    	          return back()->with('error','characters limit exceeded!');
    	     }
    	  }else{
    	      $text = "";
    	  }
    	   $data = array(
	          'user_reply' => $request->unsubscribe,
	          'custom_keywords' => $request->keyword,
	          'subject' => $request->subject,
	          'text_message' => $text,
	          'remove_from_campaign' => $request->remove_from_campaign,
	          'add_to_contact_list' => $request->add_to_contact,
	         // 'contact_list' => $list,
	          'created_by' => $request->session()->get('user_id')
	         );
	      // dd($data);die;
	      $res = \App\Contact::updateEmailCampaignAutoRespond($data,$id);
	       if($request->test){
	           $delCont = \App\Contact::deleteContactListAutoRespond($id);
	      foreach($request->test as $val){
	      $data1 = array(
	            'campaign_auto_respond_id' => $id,
	            'contact_list' => $val,
	            'created_by' => $request->session()->get('user_id')
	          );
	          $res = \App\Contact::insertEmailCampaignAutoRespondList($data1);
	      }
	      return back()->with('success','email campaign auto respond updated successfully!');
	 }
	 }
	 } 
	 
	 //function to send email campaign on scheduled time
	 //Vikash Rai
	 public function sendScheduleEmails(){
	    // print_r("hello");
	    $data = array(
	          'status' => "Active"
	        );
	   $table = "email_campaign";  
	     $res = \App\Contact::fetchMaster($table,$data);   
	    // print_r($res);
	    if($res){
	        foreach($res as $key => $val){
	            $lists[] = explode(",",$val->lists);
	            $emailfrom[] = $val->email_from;
	        }
	       // print_r($lists);
	        $email_from = implode(",",$emailfrom);
	     $table = "contact_list";
	    $result = \App\Contact::fetchScheduledEmail($table,$lists); 
	      //  $listsize = count($kavi);
	      // print_r($result); 
	       foreach($result as $val){
	           $value[] = $val->contact_email;
	       }
	      // print_r($value);
	       $email_list = array_unique($value);
	       $email_to = implode(",",$email_list);
	      // print_r($email_to);
	      $todaydate = date('Y-m-d');
	     // print_r($checkdate);
	       foreach($res as $val){
	           $createddate[] = $val->date;
	           $email_campaign_name[] = $val->campaign_name;
	           
	       }
	          $campaign_creation_date = array_unique($createddate);
	           $datecheck = implode(",",$campaign_creation_date);
	           if($datecheck <= $todaydate){
	               $mailcheck = \App\Contact::checkMailSentStatus($email_campaign_name,$todaydate);
	               $mailsendstatus = json_decode(json_encode($mailcheck), true);
	            // print_r($mailcheck);
	           
	               if(empty($mailsendstatus[0])){
	                  // print_r("sending scheduled mails");
	                  foreach($res as $key => $value){
	                    $details[] = array(
	                       // '_token' => Session::token(),
                	         'title' => $value->campaign_name,
                	         'body' => $value->text,
                	         'email_to' => $email_to,
                	         'email_from' => $email_from
                	        );
                	        
                	  } 
	                  // print_r($details); 
	                  
	                   foreach($email_campaign_name as $campaignname){
	                   $data = array(
	                         'campaign_name' => $campaignname,
	                         'mail_sent_date' => date('Y-m-d')
	                       );
	                    $mail_status_value = \App\Contact::insertDailyCampaignStatus($data);   
	                   }  
	                   app('App\Http\Controllers\MyProfile')->sendScheduleCampaignEmails($details);
	               }else{
	                   print_r("Today's mail sent for all the active email campaign");
                	  } 
	           }else{
	              // print_r("problem");
	           }
	     // print_r($datecheck);
	    }
	 }
	 
	 public function campaignTemplate(){
	     return view('emailcampaigntemplate');
	 }
	 
	  public function saveTextCampaign(Request $request){
	     if($request->campaign_id == 0){
	         $data = array(
	          'text_campaign_name' => $request->camp_title,
	          'phone' => $request->cell_num,
	          'message' => $request->text_dsc,
	          'looping' => $request->is_looping,
	          'add_to_list' => $request->is_list,
	          'message_gap_days' => $request->after_days,
	          'created_by' => $request->session()->get('user_id')
	         );
	         
	         $res = \App\Contact::insertTextCampaign($data);
	        // dd($res);die;
	        if($res){
	         $contactlist = $request->contactlist;
	         foreach($contactlist as $clist){
	             $contact_list = $clist;
	             $data1 = array(
	                  'text_campaign_id' => $res,
	                  'contact_name' => $clist,
	                  'created_by' => $request->session()->get('user_id')
	                 );
	             $result = \App\Contact::insertTextCampaignContact($data1);    
	         }
	         $list = $request->list;
	         foreach($list as $val){
	             $listname = $val;
	             $data2 = array(
	                  'text_campaign_id' => $res,
	                  'list_name' => $val,
	                  'created_by' => $request->session()->get('user_id')
	                 );
	             $result = \App\Contact::insertTextCampaignList($data2);    
	         }
	          $contactlist = $request->contactlist;
	         foreach($contactlist as $clist){
	             $number = \App\Contact::fetchUsernumber($clist);
	          $id = $request->session()->get('user_id');
                $credentials = \App\Contact::fetchUserTwilioInfo($id);
               // dd($credentials[0]->account_sid);die;
               if($credentials[0]){
                $sid    = $credentials[0]->account_sid;
                $token  = $credentials[0]->auth_token;
                $twilio = new Client($sid, $token);
                $message = $twilio->messages
                  ->create("+1".$number[0]->phone, // to
                       [
                           "body" => $request->text_dsc,
                           "from" => $credentials[0]->twilio_phone
                       ]
                  );
	         
	        }
	        return back()->with('success','text campaign created and scheduled successfully!');
	         // dd($contact_list);die;
	 }
	        }else{
	            return back()->with('error','something wrong!');
	        } 
	     }else{
	         $id = $request->campaign_id;
	          $data = array(
	         // 'campaign_id' => $request->campaign_id,
	          'text_campaign_name' => $request->camp_title,
	          'phone' => $request->cell_num,
	          'message' => $request->text_dsc,
	          'looping' => $request->is_looping,
	          'add_to_list' => $request->is_list,
	          'message_gap_days' => $request->after_days,
	          'created_by' => $request->session()->get('user_id')
	         );
	        $res = \App\Contact::updateTextCampaign($data,$id);
	      //  $contactlist = $request->contactlist;
	   //  dd($contactlist);die;
	      
	           $delContact = \App\Contact::deleteContact($id);
	          // dd($delContact);die;
	         $contactlist = $request->contactlist;
	         foreach($contactlist as $clist){
	             $contact_list = $clist;
	             $data1 = array(
	                  'text_campaign_id' => $id,
	                  'contact_name' => $clist,
	                  'created_by' => $request->session()->get('user_id')
	                 );
	             $result = \App\Contact::insertTextCampaignContact($data1);    
	         }
	          $dellist = \App\Contact::deleteList($id);
	           $list = $request->list;
	         foreach($list as $val){
	             $listname = $val;
	             $data2 = array(
	                  'text_campaign_id' => $id,
	                  'list_name' => $val,
	                  'created_by' => $request->session()->get('user_id')
	                 );
	             $result = \App\Contact::insertTextCampaignList($data2);    
	         } $contactlist = $request->contactlist;
	         foreach($contactlist as $clist){
	             $number = \App\Contact::fetchUsernumber($clist);
	          $id = $request->session()->get('user_id');
                $credentials = \App\Contact::fetchUserTwilioInfo($id);
               // dd($credentials[0]->account_sid);die;
               if($credentials[0]){
                $sid    = $credentials[0]->account_sid;
                $token  = $credentials[0]->auth_token;
                $twilio = new Client($sid, $token);
                $message = $twilio->messages
                  ->create("+1".$number[0]->phone, // to
                       [
                           "body" => $request->text_dsc,
                           "from" => $credentials[0]->twilio_phone
                       ]
                  );
	         
	        }
	        return back()->with('success','text campaign updated and scheduled successfully!');
	        
	  }
	     }
	  }
	  
	  public function sendScheduleTexts(){
	     $table = "text_campaign";  
	     $res = \App\Contact::fetchData($table);
	    
	     foreach($res as $val){
	         $date = date('Y-m-d', strtotime($val->created_at));
	         $textcampaign_creationdate[] = $date;
	         $phonefrom[] = $val->phone;
	         $id[] = $val->id;
	     }
	     $table1 = "text_campaign_contacts";
	     $contact = \App\Contact::fetchScheduledTasksContacts($table1,$id);
	     foreach($contact as $key => $value){
	         $sendto = $value;
	         // $contact[] = \App\Contact::fetchScheduledTasksContactNumber($val);
	     }
	    // $contact_list = array_unique($contact);
	     print_r($contact);
	 }
	 
	  public function clearRoute()
    {
        \Artisan::call('route:clear');
    }
    
    public function broadcast(){
      //  print_r("hello");die;
        $contact= Contact::all();
        return view('dashboard.broadcast',["contact"=>$contact]);
    }
    
    public function createBroadcast(Request $request){
       // dd($request);die;
      // $file = $request->virtual_message;
      if($_FILES['virtual_message']['name']){
       $file = $_FILES['virtual_message']['name'];
       $file_size =$_FILES['virtual_message']['size'];
       $file_tmp =$_FILES['virtual_message']['tmp_name'];
       $file_type=$_FILES['virtual_message']['type'];
       $ext = explode(".",$file);
      // dd($ext[1]);die;
       $upload = move_uploaded_file($file_tmp,public_path()."/broadcast_vm/$file");
      
       
      }
      if($upload){
          $files = $file;
      }else{
          $files = "";
      }
       $data = array(
            'sms_no' => $request->sms_number,
            'mobile' => $request->mobile_number,
            'email_id' => $request->email_add,
            'virtual_message' => $files,
            'message' => $request->message,
            'email' => $request->is_email,
            'sms' => $request->is_sms,
            'vm' => $request->is_vm,
            'track_clicks' => $request->is_click,
            'created_by' => $request->session()->get('user_id')
           );
        // dd($data);die;
         $res = \App\Contact::saveBroadcast($data);
        // dd($res);die; 
         if($res){
             $data1 = array(
                  'broadcast_id' => $res,
                  'email_id' => $request->email_add,
                  'email_subject' => $request->email_sub,
                  'email_body' => $request->email_body,
                  'created_by' => $request->session()->get('user_id')
                 );
          // dd($data1);die; 
           $result = \App\Contact::saveBroadcastData($data1);
            $details = [
                'title' => 'WBE CRMS',
                'body' => 	$request->email_body,
            ];
    
   
            \Mail::to($request->email_add)->send(new \App\Mail\MyMail($details));
        	$mail_det = new SendTemplate;
              $mail_det->send_to = $request->email_add;
              $mail_det->temp = $request->email_body;
              $mail_det->user_id = $request->session()->get('user_id');
              $mail_det->save();
           if($result){
               $id = $request->session()->get('user_id');
                $credentials = \App\Contact::fetchUserTwilioInfo($id);
               // dd($credentials[0]->account_sid);die;
               if($credentials[0]){
                $sid    = $credentials[0]->account_sid;
                $token  = $credentials[0]->auth_token;
                $twilio = new Client($sid, $token);
                $message = $twilio->messages
                  ->create("+1".$request->sms_number, // to
                       [
                           "body" => $request->message,
                           "from" => $credentials[0]->twilio_phone
                       ]
                  );
                  if(!empty($file)){
                  $call = $twilio->calls->create(
                  "+1".$request->mobile_number, // Destination phone number
                  $credentials[0]->twilio_phone, // Valid Twilio phone number
                  array(
                      "record" => True,
                      "url" => "http://demo.twilio.com/docs/voice.xml")
                  );
                  }
                 return back()->with('success','broadcast created and broadcasting done successfully!');
               }    
                return back()->with('success','broadcast created successfully but no twilio info for broadcasting!');
           }else{
               return back()->with('error','something wrong!');
           }
         }
    }
    
     public function sendBroadcast(Request $request){
         
         $user = $request->broadcast_to;
         $body = $request->broadcast_template;
        // dd($user);die;
          $id = $request->session()->get('user_id');
            $credentials = \App\Contact::fetchUserTwilioInfo($id);
           // dd($credentials[0]->account_sid);die;
           if($credentials[0]){
            foreach($user as $clist){
	        $number = \App\Contact::fetchUsernumber($clist);
            $sid    = $credentials[0]->account_sid;
            $token  = $credentials[0]->auth_token;
            $twilio = new Client($sid, $token);
            $message = $twilio->messages
              ->create("+1".$number[0]->phone, // to
                   [
                       "body" => $body,
                       "from" => $credentials[0]->twilio_phone
                   ]
              );
     }
      return back()->with('success','broadcasting done successfully!');
     }else{
         return back()->with('error','No twilio information available!');
     }
    }

}
