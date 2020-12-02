<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['first_name','last_name','phone','email','details','category','lists','note'];
    
    public static function insert($data)
    {
        $value = DB::table('groups')->insert($data);
        if($value){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    public static function insertEmailCampaign($data){
          $value = DB::table('email_campaign')->insertGetId($data);
        if($value){
            return $value;
        }else{
            return FALSE;
        }
    }
     public static function insertEmailCampaignAutoRespond($data){
           $value = DB::table('email_campaign_auto_respond')->insertGetId($data);
        if($value){
            return $value;
        }else{
            return FALSE;
        }
     }
     
     public static function insertEmailCampaignAutoRespondList($data){
            $value = DB::table('email_campaign_auto_respond_list')->insert($data);
        if($value){
            return TRUE;
        }else{
            return FALSE;
        }
     }
    
    
     public static function fetch()
    {
        $value=DB::table('groups')->where('status', 1)->get();
        return $value;
      
    }
    
    public static function fetchUserInformation(){
         $value=DB::table('user_information')->get();
        return $value;
    }
    
     public static function fetchlist($data)
    {
        $value=DB::table('email_campaign')->where('campaign_name', $data)->get();
        return $value;
      
    }
    
    public static function updateListGroupStatus($id){
          $value = DB::table('groups')->where('id', $id)->update(['status' => 0]);
           if($value){
            return TRUE;
        }else{
            return FALSE;
        }
      }
      
      public static function updateUserInfoStatus($id){
            $value = DB::table('user_information')->where('id', $id)->delete();;
           if($value){
            return TRUE;
        }else{
            return FALSE;
        }
      }
      
      public static function uploadList($data){
        $value = DB::table('groups')->insert($data);
        if($value){
            return TRUE;
        }else{
            return FALSE;
        }  
      }
      
      public static function fetchMaster($table,$data){
         // print_r($data['status']);
          $value=DB::table($table)->where('status', $data['status'])->get();
          return $value;
      }
      
      public static function fetchScheduledEmail($table,$data){
         // print_r($data);
         foreach($data as $val){
             $list[] = $val;
             $value=DB::table($table)->where('list_name', $val)->get();
             
         }
         return $value;
        // print_r($value);
        
      }
      
      public static function insertContactList($data){
           $value = DB::table('contact_list')->insert($data);
            if($value){
                return TRUE;
            }else{
                return FALSE;
            }
      }
      
      public static function checkMailSentStatus($email_campaign_name,$todaydate){
          foreach($email_campaign_name as $val){
          $where = ['campaign_name' => $val, 'mail_sent_date' => $todaydate];
           $value[]=DB::table('campaign_email_check')->where($where)->get();
          }
          return $value;
           
      }
      
      public static function fetchEmailToList($data){
         // dd($data);die;
         foreach($data as $val){
          $where = ['campaign_name' => $val]; 
          $value[]=DB::table('email_campaign')->select('lists')->where($where)->get()->toArray();
         } 
          return $value;
      }
      
      public static function fetchListToEmailScheduled($listname){
          foreach($listname as $name){
              $lists[] = $name[0];
          }
          
          foreach($lists as $listsss){
              $listnames[] = $listsss;
              
          }
          foreach($listnames as $tron){
              $list_name[] = $tron;
          }
          $result = json_decode(json_encode($list_name, true));
          return $result;
      }
      
      public static function objectToArray ($object) {
    if(!is_object($object) && !is_array($object)){
    	return $object;
    }
    return array_map('objectToArray', (array) $object);
}
      
      public static function insertDailyCampaignStatus($data){
          $value = DB::table('campaign_email_check')->insert($data);
            if($value){
                return TRUE;
            }else{
                return FALSE;
            }  
      }
      
       public static function uploadListGroupCsv($data){
          unset($data[0]);
          $oneDim = array();
            foreach($data as $i) {
              $oneDim[] = $i[0];
            }
            foreach($oneDim as $val){
                $details = array(
                     'name' => $val
                    );
                $value = DB::table('groups')->insert($details);    
            }
          //dd($details);die;
            if($value){
                return TRUE;
            }else{
                return FALSE;
            }  
      }
      
      public static function uploadContactCsv($data){
          unset($data[0]);
          $oneDim = array();
            foreach($data as $i) {
              $oneDim[] = $i;
            }
            foreach($oneDim as $val){
                $details[] = array(
                     'first_name' => $val[0],
                     'last_name' => $val[1],
                     'phone' => $val[2],
                     'email' => $val[3],
                     'details' => $val[4],
                     'category' => $val[5],
                    // 'lists' => $val[6],
                     'note' => $val[7],
                     'created_at' =>date('Y-m-d H:i:s')
                    );
                $value = DB::table('contacts')->insert($details);  
                $res=DB::table('contacts')->select('id')->orderBy('id', 'desc')->take(1)->get()->toArray();
                //dd($res[0]->id);die;
                $lists[] = explode(",",$val[6]);
                foreach($lists as  $name){
                    foreach($name as $naam){
                    $datass[] = array(
                         'contact_id' => $res[0]->id,
                         'list_name' => $naam,
                         'contact_email' => $val[3],
                         'status' => "Active"
                        );
                   $value = DB::table('contact_list')->insert($datass);    
                }
                }
             // dd($datass);die;     
            }
           // dd($data);die;
           return $value;
      }
       
      public static function insertUserInfo($data){
       $value = DB::table('user_information')->insert($data);
            if($value){
                return TRUE;
            }else{
                return FALSE;
            }  
      } 
      
      public static function insertUserTokenInfo($data){
          $value = DB::table('user_token_info')->insert($data);
            if($value){
                return TRUE;
            }else{
                return FALSE;
            } 
      }
      
      public static function saveUserTwilioInfo($data){
          $value = DB::table('user_twilio_info')->insert($data);
           if($value){
                return TRUE;
            }else{
                return FALSE;
            } 
      }
      
      public static function insertUserSendgridInfo($data){
         $value = DB::table('user_sendgrid_info')->insert($data);
           if($value){
                return TRUE;
            }else{
                return FALSE;
            }  
      }
      
       public static function fetchData($table){
         $value=DB::table($table)->get()->toArray();
        return $value; 
      }
      
        public static function fetchScheduledTasksContacts($table,$data){
         // print_r($data);
         foreach($data as $val){
             $list[] = $val;
             $value[]=DB::table($table)->select('contact_name')->where('text_campaign_id', $val)->get()->toArray();
             
         }
         return $value;
        // print_r($value);
        
      }
      
      public static function fetchScheduledTasksContactNumber($data){
         // print_r($data);
         foreach($data as $val){
             $list[] = $val;
             $where = ['campaign_name' => $val]; 
             $value[]=DB::table('contacts')->select('phone')->where($where)->get()->toArray();
             
         }
         return $value;
        // print_r($value);
        
      }
      
      public static function insertTextCampaign($data){
          $value = DB::table('text_campaign')->insertGetId($data);
            if($value){
                return $value;
            }else{
                return FALSE;
            } 
      }
      
      public static function insertTextCampaignContact($data){
           $value = DB::table('text_campaign_contacts')->insert($data);
            if($value){
                return TRUE;
            }else{
                return FALSE;
            } 
      }
      
       public static function insertTextCampaignList($data){
           $value = DB::table('text_campaign_list')->insert($data);
            if($value){
                return TRUE;
            }else{
                return FALSE;
            } 
      }
      
      public static function saveBroadcast($data){
           $value = DB::table('broadcast')->insertGetId($data);
            if($value){
                return $value;
            }else{
                return FALSE;
            } 
      }
      
      public static function saveBroadcastData($data){
           $value = DB::table('broadcast_email')->insert($data);
            if($value){
                return TRUE;
            }else{
                return FALSE;
            } 
      }
      
      public static function fetchUserTwilioInfo($id){
          $value = DB::table('user_twilio_info')->where('created_by',$id)->get()->toArray();
          return $value;
      }
      
      public static function fetchUsernumber($data){
          $value = DB::table('contacts')->select('phone')->where('first_name',$data)->get()->toArray();
          return $value;
      }
      
      public static function updateTextCampaign($data,$id){
          $value = DB::table('text_campaign')->where('id',$id)->update($data);
          return $value;
      }
      
      public static function updateEmailCampaign($data,$id){
          $value = DB::table('email_campaign')->where('id',$id)->update($data);
          return $value; 
      }
      
      public static function updateEmailCampaignAutoRespond($data,$id){
         $value = DB::table('email_campaign_auto_respond')->where('id',$id)->update($data);
          return $value;  
      }
      
      public static function deleteContact($id){
          $value = DB::table('text_campaign_contacts')->where('text_campaign_id', $id)->delete();
          return $value;
      }
      
      public static function deleteContactListAutoRespond($id){
        $value = DB::table('email_campaign_auto_respond_list')->where('campaign_auto_respond_id', $id)->delete();
          return $value;  
      }
      
       public static function deleteList($id){
          $value = DB::table('text_campaign_list')->where('text_campaign_id', $id)->delete();
          return $value;
      }
      
      public static function deleteEmailCampaignContacts($id){
        $value = DB::table('email_campaign_contacts')->where('email_campaign_id', $id)->delete();
          return $value;  
      }
      
      public static function deleteCampaignList($id){
        $value = DB::table('email_campaign_list')->where('email_campaign_id', $id)->delete();
          return $value;  
      }
      
      public static function saveCampaignList($data){
          $value = DB::table('email_campaign_list')->insert($data);
            if($value){
                return TRUE;
            }else{
                return FALSE;
            }  
      }
      
      public static function saveEmailCampaignContacts($data){
        $value = DB::table('email_campaign_contacts')->insert($data);
            if($value){
                return TRUE;
            }else{
                return FALSE;
            }   
      }

    public static function fetchContactToSendMail($data){
         $value = DB::table('contacts')->select('email')->where('first_name',$data)->get()->toArray();
        return $value;
    }
    
    public static function fetchCampaignId($campaign){
        $value = DB::table('email_campaign')->select('id')->where('campaign_name',$campaign)->get()->toArray();
        return $value; 
    }
    
     public static function fetchCampaignList($cID){
         $value = DB::table('email_campaign_list')->select('campaign_list')->where('email_campaign_id',$cID)->get()->toArray();
        return $value;
     }
     
     public static function fetchCampaignListEmailAdd($listname){
        $value = DB::table('contact_list')->select('contact_email')->where('list_name',$listname)->get()->toArray();
        return $value; 
     }
}
