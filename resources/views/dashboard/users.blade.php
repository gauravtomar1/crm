@php ($page_title ='data table')
@extends('layout')
@section('content')
<div class="page-wrapper">
  <div class="container-fluid">


    <div class="row page-titles">
      <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><strong>User Setting</strong></h4>
      </div>
      <!-- <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
          </ol>
        </div>
      </div> -->
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

    <div class="row mar_bot_20">

      <div class="col-12">
        <div class="user-table bg-white p-3">
          <h6><b>User List</b></h6>


          <table class="table table-bordered data-table-users">
	
  <thead>

      <tr>

          <th>No</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th width="100px">Status</th>
          <th width="100px">Action</th>

      </tr>

  </thead>

  <tbody>

  </tbody>

</table>

         
        </div>
      </div>
      
    </div>


    <div class="row mb-3">
      <div class="col-md-8 col-sm-12 col-12">
        <div class="h-100 bg-white">
          <h6 class="bg-info p-3 text-white font-weight-bold">User Information</h6>
          <div class="user-detail p-3">

            <form method="POST" action="/userinfo" enctype="multipart/form-data">
			@csrf
              <div class="form-group">
                <label>User Name</label>
                <input type="text" name="uname" class="form-control" placeholder="User Name" required>
              </div>

              <div class="form-group">
                <label>Mission Statement</label>
                <input type="text" name="mstatement" class="form-control" placeholder="Mission Statement" required>
              </div>

              <div class="form-group">
                <label>Slogan</label>
                <input type="text" name="uslogan" class="form-control" placeholder="Slogan">
              </div>

              <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" required>
                  <option>Active</option>
                  <option>Inactive</option>
                </select>
              </div>

              <div class="userbtn">
                <button type="submit" class="btn btn-primary">Add</button>
                <!--<button type="button" class="btn btn-danger">Delete</button>-->
              </div>
            </form>
          </div>

        </div>
      </div>

      <div class="col-md-4 col-sm-4 col-12">
        <div class="right-detail-dial h-100 bg-white">

          <h6 class="bg-info text-white font-weight-bold p-3">Token Information</h6>

          <div class="user-right-detail p-3">
            <ul >
             <a data-target="#myModal" data-toggle="modal" class="MainNavText" id="MainNavHelp" 
               href="#myModal"> <li class="bg-info text-white pt-3 pb-3 radius mr-2 text-center font-weight-bold mt-3">
                  Twilio</li></a>
             <a data-target="#myModal1" data-toggle="modal" class="MainNavText" id="MainNavHelp" 
               href="#myModal1"> <li class="bg-primary text-white pt-3 pb-3 mt-3 radius mr-2 text-center font-weight-bold mt-3">
                   Sendgrid</li></a>
             <!-- <li class="bg-warning text-white pt-3 pb-3 mt-3 radius mr-2 text-center font-weight-bold">Other</li>-->
            </ul>
          </div>
          
        </div>
      </div>
    </div>

  </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
         <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Twilio Information</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                     <form method="POST" action="/userinfotwilio" enctype="multipart/form-data">
			          @csrf
                     <div class="form-group">
                    <label>Account SID</label>
                    <input type="text" name="account_sid" class="form-control" placeholder="Account SID" required>
                    <input type="hidden" name="type" class="form-control" value="twilio_token">
              </div>
               <div class="form-group">
                    <label>Auth Token</label>
                    <input type="text" name="auth_token" class="form-control" placeholder="Auth Token" required>
              </div>
              <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="twilio_phone" class="form-control" placeholder="Phone Number" required>
              </div>
               <div class="userbtn">
                <button type="submit" class="btn btn-primary">Add</button>
                <!--<button type="button" class="btn btn-danger">Delete</button>-->
              </div>
              </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <div id="myModal1" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Sendgrid Information</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                      <form method="POST" action="/userinfosendgrid" enctype="multipart/form-data">
			          @csrf
                     <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="sendgridname" class="form-control" placeholder="Username" required>
                    <input type="hidden" name="type" class="form-control" value="sendgrid_token">
              </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" name="sendgridpass" class="form-control" placeholder="Password" required>
                    <input type="hidden" name="type" class="form-control" value="sendgrid_token">
              </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="text" name="sendgridemail" class="form-control" placeholder="Email Addess" required>
                    <input type="hidden" name="type" class="form-control" value="sendgrid_token">
              </div>
               <div class="userbtn">
                <button type="submit" class="btn btn-primary">Add</button>
                <!--<button type="button" class="btn btn-danger">Delete</button>-->
              </div>
              </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
<script type="text/javascript">
//DataTable functionality
  $(function () {
   
        var table = $('.data-table-users').DataTable({
			autoWidth: false,
		responsive: true,
        processing: true,

        serverSide: true,

        ajax: "{{ route('users.list') }}",

        columns: [

            {data: 'DT_RowIndex', name: 'DT_RowIndex',width : '50px'},
            {data: 'name', name: 'name',width : '50px'},
            {data: 'email', name: 'email',width : '50px'},
      {data: 'contact', name: 'contact',width : '50px'},
     
      {
                 "render": function(d,t,r){
                   
                     var $select = $("<select></select>", {
                      class:"status",
                      id: r.id,
                     });
                        var opt='';
                        if(r.active ==1){
                          opt += '<option value="1" selected> Active </option>';
                          opt += '<option value="0"> InActive </option>';  
                        }else{
                          opt += '<option value="1" selected> Active </option>';
                          opt += '<option value="0" selected> InActive </option>'; 
                        }
                         $select.append(opt);
                     
                     return $select.prop("outerHTML");
                 }
             },
      
            {data: 'action', name: 'action', orderable: false, searchable: false,width : '20px'},

        ]

    });
	
	$('.data-table-users').on('click', '.btn-delete[data-remote]', function (e) { 
    e.preventDefault();
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
	
    var url = $(this).data('remote');
	
    // confirm then
    if (confirm('Are you sure you want to delete this?')) {
        $.ajax({
            url: url,
            type: 'DELETE',
            dataType: 'json',
            data: {method: '_DELETE', submit: true}
        }).always(function (data) {
            $('.data-table-users').DataTable().draw(false);
        });
    }else
        alert("You have cancelled!");
});

$('.data-table-users').on('change', 'select.status', function (e) {
var active= $(this).val();
var user= $(this).attr('id');
$.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
					
					$.ajax({
                    url: '/user-status',
                    data: 'status='+ active+'&user='+ user,                                                    
                    type: "POST",
                    success: function(data) {
                      $('.data-table-users').DataTable().draw(false);
                    }
                    });
});
  });
  
 
  </script>
@stop