<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LogCallendar;
use App\Event;


class LogController extends Controller
{
    public function store(Request $request)
	{
		$log = new LogCallendar;
		$log->title = $request->title;
        $log->start_date = $request->start_date;
        $log->user_id = $request->session()->get('user_id');
        $log->category = $request->categoryClass;

        $log->save();
      
      	if($log->id)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function event(Request $request){
		
		$data= LogCallendar::where("user_id",$request->session()->get('user_id'))->get();
		$event=[];
		foreach($data as $val){
			if($val->start_date){
			$event[]=["id"=>$val->id,"start"=>$val->start_date,"title"=>$val->title,"className"=>$val->category];	
			}
		}
		return json_encode($event);
		
	}
	
	public function addEvent(Request $request)
	{
		$log = new Event;
		$log->title = $request->category_name;
        $log->category = $request->category_color;
        $log->user_id = $request->session()->get('user_id');

        $log->save();
      
      	if($log->id)
		{
			return back()->with('success','save event list successfully!');
		}
		else
		{
			return back()->with('error','something wrong!');
		}
	}
	
	public function index(Request $request){
		$data= Event::where("user_id",$request->session()->get('user_id'))->get();
	    return view('dashboard.log',["data"=>$data]);	
	}
	
	public function destroy($id){
		Event::where("id",$id)->delete();
		return true;
	}
	
	public function destroyEvent($id){
		LogCallendar::where("id",$id)->delete();
		return true;
	}
	
	public function updateEvent(Request $request,$id){
		LogCallendar::where("id",$id)->update(['title' => $request->title]);
		return true;
	}
}
