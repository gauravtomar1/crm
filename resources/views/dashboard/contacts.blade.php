@php ($page_title ='data table')
@extends('layout')
@section('content')
<div class="page-wrapper">
  <div class="container-fluid">


    <div class="row page-titles">
      <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><strong>Contact Details</strong></h4>
      </div>
      <!-- <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
          </ol>
        </div>
      </div> -->
    </div>

    <div class="row mar_bot_20">

      <div class="col-md-3 col-sm-3 col-12">
        <div class="call-name-detail border bg-white p-3 h-100">
          <h6 class="mb-0"><b>Contacts</b></h6>
        </div>
      </div>

      <div class="col-md-3 col-sm-3 col-12">
        <div class="call-name-detail border bg-white p-3 h-100">
          <h6 class="mb-0"><b>Logged in user</b> <span class="ml-2">{{ Session::get('user')}}</span></h6>
        </div>
      </div>

      <div class="col-md-6 col-sm-6 col-12">
        <div class="call-name-detail border bg-white p-3 h-100">
          <h6 class="mb-0"><b>{{date('d/m/Y')}}</b> <span><b>{{date('h:i')}}</b></span></h6>
        </div>
      </div>
      
    </div>


    <div class="row mb-3">
      <div class="col-md-8 col-sm-12 col-12">
        <div class="h-100 bg-white p-3">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-12">
              <div class="select-temp-u p-3 border h-100">
			    <a href="/download-template">Download Template</a>
				<form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label><b>Add Contact (CSV File)</b></label>
                  <input type="file" class="form-control" name="file" required>
                </div>
				<input type="submit" value="Add" class="btn btn-primary">
				</form>
              </div>
            </div>
          </div>
@if ($message = Session::get('success'))

<div class="alert alert-success alert-block">

    <button type="button" class="close" data-dismiss="alert">×</button>    

    <strong>{{ $message }}</strong>

</div>

@endif

  

@if ($message = Session::get('error'))

<div class="alert alert-danger alert-block">

    <button type="button" class="close" data-dismiss="alert">×</button>    

    <strong>{{ $message }}</strong>

</div>

@endif
          <div class="row mt-3">
            <div class="col-12">
              <div class="contact-form border p-3">
			  <form action="/contact-form" method="post">
							@csrf
                <div class="row">
                  <div class="col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                      <label><b>First Name</b></label>
                      <input type="text" class="form-control" placeholder="First Name" name="fname">
                    </div>
                  </div>

                  <div class="col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                      <label><b>Last Name</b></label>
                      <input type="text" class="form-control" placeholder="Last Name" name="lname">
                    </div>
                  </div>

                  <div class="col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                      <label><b>Phone</b></label>
                      <input type="text" class="form-control" placeholder="Phone No." name="phone" required>
                    </div>
                  </div>

                  <div class="col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                      <label><b>Email</b></label>
                      <input type="email" class="form-control" placeholder="Email ID" name="email">
                    </div>
                  </div>

                  <div class="col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                      <label><b>Details</b></label>
                      <input type="text" class="form-control" placeholder="Property Address" name="detail" required>
                    </div>
                  </div>

                  <div class="col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                      <label><b>Category</b></label>
                      <select class="form-control" name="cat" required>
                        @forelse ($cat_list as $val)
                        <option value="{{strtolower($val->name)}}">{{$val->name}}</option>
                        @empty
					    <option>No Category</option>
                        @endforelse
                      </select>
                    </div>
                  </div>

                  <div class="col-md-12 col-sm-12 col-12">
                    <div class="form-group">
                      <label><b>Add to list (s)</b></label>
                      <!-- Trigger the modal with a button -->
                      <button type="button" class="d-inline float-right btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Create List</button>
                      <div class="clearfix"></div>
                      <select class="form-control chosen-select" multiple name="lists[]" id="lists" required>
                        <!--<option selected disabled>Please Select List</option>-->
                        <!--<option value="yes">Yes</option>-->
                        <!--<option value="no">No</option>-->
                         @forelse ($group_list as $val)
                        <option value="{{strtolower($val->name)}}">{{$val->name}}</option>
                        @empty
					    <option>No List Available</option>
                        @endforelse
                      </select>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label><b>Note</b></label>
                      <textarea class="form-control" rows="3" placeholder="Note" name="note"></textarea>
                    </div>
                  </div>

                  <div class="col-12">
					<input type="submit" value="Submit" class="btn btn-primary">
                  </div>
                </div>
				</form>
              </div>
            </div>
          </div>
		  
          <div class="row mt-3">
            <div class="col-12">
              <div class="contact-detail-t border p-3">
                <h6 class="font-weight-bold"><b>Contact resent information</b></h6>
				@forelse ($list as $val)
                <div class="contact-form-d border p-3">
                  <h6>{{$val->first_name." ".$val->last_name}}<span class="ml-2">{{$val->category}}</span> <span>{{$val->phone}}</span> <span class="font-weight-bold text-success ml-2"><i class="fa fa-dot-circle"></i></span></h6>

                  <p class="mb-1">{{$val->details}}</p>
                  <p class="mb-1">{{$val->note}}<span class="ml-2">{{$val->email}}</span></p>
                </div>

				@empty
					<p>No recent contacts</p>
                @endforelse
              </div>
            </div>
          </div>

        </div>
      </div>
	
      <div class="col-md-4 col-sm-4 col-12">
        <div class="right-detail-dial h-100 bg-white p-3">
		<form action="/contact-snapshot" method="post">
							@csrf
          <h6 class="font-weight-bold"><b>Contact Snapshot Info.</b></h6>

          <div class="form-group">
            <label class="col-form-label label-align"><b>Contact</b></label>
            <select class="form-control" name="contact">
			@forelse ($contact as $val)
			@if($val->category!='investor')
            <option value="{{($val->first_name)?$val->first_name." ".$val->last_name:$val->phone}}">@if($val->first_name){{$val->first_name." ".$val->last_name}}@else{{@$val->phone}}@endif</option>
			@endif
			@empty
					<option>No contacts</option>
            @endforelse
            </select>
             
          </div>

          <div class="form-group">
            <label class="col-form-label label-align"><b>Category</b></label>
            <select class="form-control" name="investor">
	    	 @forelse ($cat_list as $val)
                <option value="{{strtolower($val->name)}}">{{$val->name}}</option>
                @empty
			    <option>No Category</option>
             @endforelse
            </select>
             
          </div>

          <div class="form-group">
            <label class="col-form-label label-align"><b>Goal</b></label>
            <textarea class="form-control" rows="3" placeholder="Goal" name="goal" required></textarea>
             
          </div>

          <div class="form-group">
              <label class="col-form-label label-align"><b>Contact History</b></label>
              <select class="form-control chosen-select" id="assgn" data-placeholder="List to choose here.." multiple name="contact_history[]" required="required">
			@forelse ($contact as $val)
              <option value="{{($val->first_name)?$val->first_name." ".$val->last_name:$val->phone}}">@if($val->first_name){{$val->first_name." ".$val->last_name}}@else{{@$val->phone}}@endif</option>
			@empty
					<option>No contacts</option>
            @endforelse
                                  
              </select>
                           
          </div>

          <div class="form-group">
            <label><b>Other notes</b></label>
            <textarea class="form-control" rows="3" placeholder="Other notes" name="other_notes"></textarea>
          </div>

          <div class="form-group">
			<input type="submit" value="Submit" class="btn btn-primary">
          </div>
        </form>
 
		          
            <div class="col-12">
              <div class="contact-detail-t border p-3">
                <h6 class="font-weight-bold"><b>Snapshot resent information</b></h6>
				@forelse ($snap_list as $val)
                <div class="contact-form-d border p-3">
                  <h6>{{$val->contact}}<span class="ml-2">{{$val->contact_investor}}</span> <span>{{$val->contact_history}}</span> <span class="font-weight-bold text-success ml-2"><i class="fa fa-dot-circle"></i></span></h6>

                  <p class="mb-1">{{$val->goal}}</p>
                  <p class="mb-1">{{$val->other_notes}}</p>
                </div>

				@empty
					<p>No recent snapshot</p>
                @endforelse
              </div>
            </div>
          
        </div>

      </div>
	
    </div>
		
  </div>
</div>
<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Create New List</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
           <form action="#" method="post">
				@csrf
                <div class="row">
                  <div class="col-md-6 col-sm-12 col-12">
                    <div class="form-group">
                      <label><b>List Name</b></label>
                      <input type="text" class="form-control" placeholder="List Name" name="listname" id="listname">
                       <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                    </div>
                  </div>
                </div>
                <div class="row">
		     	 <!--<input type="submit" value="Submit" id="butsave" class="btn btn-primary">-->
		     	 <button type="button" id="butsave" class="btn btn-primary" onclick="createList()">Submit</button>
                </div>
         </form>   
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
@stop

 <!-- Script -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type='text/javascript'>
    /*$(document).ready(function(){
    //alert('hello');
         // AJAX request 
         $.ajax({
           url: 'getLists',
           type: 'get',
           dataType: 'json',
           success: function(response){

             var len = 0;
             if(response['data'] != null){
               len = response['data'].length;
             }

             if(len > 0){
               // Read data and create <option >
               for(var i=0; i<len; i++){

                // var id = response['data'][i].id;
                 var name = response['data'][i].name;

                // var option = "<option value='"+id+"'>"+name+"</option>"; 
                 var option = "<option>"+name+"</option>"; 

                 $("#lists").append(option); 
               }
             }

           }
        });
      });*/
    </script>
    <script>
     function createList(){
        name = document.getElementById('listname').value;
       // alert(name);
        if(name){
            $.ajax({
              url: "/listData",
              type: "POST",
              data: {
                  _token: $("#csrf").val(),
                  name: name
              },
              success: function(dataResult){
               // alert(dataResult);  
               if(dataResult = "done"){
                  // $("#myModal").modal("hide");
                  location.reload();
               }else{
                   alert("Issue In Adding List, Please Try Again.")
               }
              }  
            });
        }else{
            alert("List Name Is Mandatory.");
        }
  };  
    </script>