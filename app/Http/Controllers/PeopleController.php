<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Crypt;
use DataTables;

class PeopleController extends Controller
{
    public function index(Request $request)
	{
						 if ($request->ajax()) {

            $data = User::all();
		
            return Datatables::of($data)

                    ->addIndexColumn()

                    ->addColumn('action', function($row){


                           
		$btn = '<button class="btn btn-xs btn-danger btn-delete" data-id="'.$row->id.'" data-remote="/users/destroy/' . $row->id . '"><i class="glyphicon glyphicon-trash"></i>Delete</button>';

                            return $btn;

                    })

                    ->rawColumns(['action'])

                    ->make(true);

        }
	
        return view('dashboard.people-user');
	}
	
		public function destroy(Request $request,$id){
                        User::where("id",$id)->delete();
		return true;
        }
        
        public function store(Request $request){
                if($request->ad_new=='add'){
                $validatedData = $request->validate(['email' => 'required|string|email|unique:users',
                                                     'phone' => 'required|numeric|unique:users,contact',
                ]); 
                $data= new User;
                $data->name= $request->name;
                $data->email= $request->email;
                $data->contact= $request->phone;
                $data->save();
                if($data->id){
                        return back()->with('success',' user save successfully!');
                }else{
                        return back()->with('error',' something wrong!');  
                }
        }elseif($request->ad_old=='upd' && $request->userId){
                $validatedData = $request->validate([
                        'email' => 'required|string|email|max:255|unique:users,email,'.$request->userId,
                        'phone' => 'required|numeric|unique:users,contact,'.$request->userId,
                            ]);
                $data= User::find($request->userId);
                $data->name= $request->name;
                $data->email= $request->email;
                $data->contact= $request->phone;
                $data->save();
                if($data->id){
                        return back()->with('success',' user update successfully!');
                }else{
                        return back()->with('error',' something wrong!');  
                }
        }
        }

        public function userDeatail($id){
                $data= User::where("id",$id)->first();
                return json_encode($data);
        }

        public function password(Request $request){
                if($request->userIds){
                if($request->pass==$request->confirmpass){
                $user = User::find($request->userIds);
                $user->password = Crypt::encrypt($request->pass);
                $user->save();	
                return back()->with('success',' password update successfully!');
                }else{
                        return back()->with('error','something wrong!');
                }
        }else{
                return back()->with('error','please select user!');
        }
                
        }

        public function status(Request $request){

             if($request->user && $request->status==0 || $request->status==1) {
                     User::where("id",$request->user)->update(["active"=>$request->status]);
                     return true;
             } 
             else {
                     return false;
             }

        }
}
