@php ($page_title ='data table')
@extends('layout')
@section('content')
        <div class="page-wrapper">

            <div class="container-fluid">
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor"><strong>People User</strong></h4>
                    </div>
                <!-- <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Automation templates</li>
                            </ol>
                        </div>
                    </div> -->
                </div>
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
        <button type="button" class="close" data-dismiss="alert">×</button>
            @foreach ($errors->all() as $error) 
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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

                <div class="row">

                    <!--<div class="col-lg-4 col-xlg-3 col-md-5">-->

                    <!--    <div class="card"> <div class="card-img" style="height: 425px" ></div>-->

                    <!--        <div class="card-img-overlay card-inverse text-white social-profile d-flex justify-content-center">-->

                    <!--        <div class="align-self-center"> <img src="{!!asset('public/dist/image/1.jpg')!!}" style="border-radius: 10px; margin-bottom: 20px;" class="" width="300">-->

                    <!--            <h4 class="card-title">James Anderson</h4>-->

                    <!--           <h6 class="card-subtitle" style="color: #ccc;">@jamesandre</h6>-->

                    <!--           </div>-->

                    <!--        </div>-->

                    <!--    </div>-->

                    <!--    <div class="card">-->

                    <!--        <div class="card-body"> <small class="text-muted">Email address </small>-->

                    <!--            <h6 id="email-add"></h6> <small class="text-muted p-t-30 db">Phone</small>-->

                    <!--            <h6 id="phone-add"></h6> <small class="text-muted p-t-30 db">Address</small>-->

                            

                    <!--           <small class="text-muted p-t-30 db">Social Profile</small>-->


                    <!--            <br/>-->

                    <!--            <button class="btn btn-circle btn-secondary"><i class="fa fa-facebook-f"></i></button>-->

                    <!--            <button class="btn btn-circle btn-secondary"><i class="fa fa-twitter"></i></button>-->

                    <!--            <button class="btn btn-circle btn-secondary"><i class="fa fa-youtube"></i></button>-->

                    <!--        </div>-->

                    <!--    </div>-->

                    <!--</div>-->



                    <div class="col-lg-12 col-xlg-12 col-md-12">

                        <div class="card p-3">
                            <h6><b>User List</b></h6>
                       
            <table class="table table-bordered data-table-users">
	
        <thead>

            <tr>

                <th>No</th>

                <th>Name</th>
				<th>Email</th>
				<th>Phone</th>
                <th width="100px">Action</th>

            </tr>

        </thead>

        <tbody>

        </tbody>

    </table>

                        </div>

                        <div class="card">


                            <ul class="nav nav-tabs profile-tab" role="tablist">

                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Settings</a> </li>

                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Password</a> </li>

                            </ul>


                            <div class="tab-content">

                                <div class="tab-pane active" id="profile" role="tabpanel">

                                    <div class="card-body">

                                        <form class="form-horizontal form-material" action="/add-users" method="post">
											@csrf
                                            <input type="hidden" id="user_id" name="userId"/>
                                            <div class="form-group">

                                                <label class="col-md-12">Full Name</label>

                                                <div class="col-md-12">

                                                    <input type="text" name="name" class="form-control form-control-line" required>

                                                </div>

                                            </div>

                                            <div class="form-group">

                                                <label for="example-email" class="col-md-12">Email</label>

                                                <div class="col-md-12">

                                                    <input type="email" class="form-control form-control-line" name="email" id="example-email" required>

                                                </div>

                                            </div>

                                            

                                            <div class="form-group">

                                                <label class="col-md-12">Phone No</label>

                                                <div class="col-md-12">

                                                    <input type="text" name="phone" class="form-control form-control-line" required>

                                                </div>

                                            </div>

                                          

                                            <div class="form-group">

                                                <div class="col-sm-12">
                                                
                                                    <button class="btn btn-primary" name="ad_new" value="add"
                                                    >Add New</button>
                                                    <button class="btn btn-success" name="ad_old" value="upd" id="update-users" style="display:none;">Update</button>
                                        
                                                </div>

                                            </div>

                                        </form>

                                    </div>

                                </div>

                                <div class="tab-pane" id="settings" role="tabpanel">

                                    <div class="card-body">

                                        <form class="form-horizontal form-material" action="/update-user-password" method="post">
                                            @csrf
                                            <input type="hidden" id="user_id_pass" name="userIds"/>
                                            <div class="form-group">

                                                <label class="col-md-12">Password</label>

                                                <div class="col-md-12">

                                                    <input type="password" name="pass" class="form-control form-control-line" pattern=".{6,}"   required title="6 characters minimum">

                                                </div>

                                            </div>

                                            <div class="form-group">

                                                <label for="example-email" class="col-md-12">Confirm Password</label>

                                                <div class="col-md-12">

                                                    <input type="password" name="confirmpass" class="form-control form-control-line" pattern=".{6,}"   required title="6 characters minimum" >

                                                </div>

                                            </div>
                                            <div class="form-group">

                                                <div class="col-sm-12">

                                                    <button class="btn btn-success">Update</button>

                                                </div>

                                            </div>

                                        </form>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="card p-3">
                            <h6><b>Give Access to</b></h6>

                            <form>
                                <div class="form-group">
                                    <label>Dialer</label>
                                    <select class="form-control">
                                        <option>Select</option>
                                        <option>Dialer 1</option>
                                        <option>Dialer 2</option>
                                        <option>Dialer 3</option>
                                        <option>Dialer 4</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="col-form-label label-align">Partner user</label>
                                     <select class="form-control chosen-select" id="assgn" data-placeholder="List to choose here.." multiple name="test" required="required">
                                         @forelse ($user as $val)
                                        <option value="{{strtolower($val->name)}}">{{$val->name}}</option>
                                        @empty
                					    <option>No partner user</option>
                                        @endforelse
                                     </select>
                                </div>

                                <div class="form-group">
                                    <button type="button" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>

                    </div>

                    <!-- Column -->

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

            {data: 'DT_RowIndex', name: 'DT_RowIndex',width : '10px'},
            {data: 'name', name: 'name',width : '50px'},
            {data: 'email', name: 'email',width : '50px'},
			{data: 'contact', name: 'contact',width : '50px'},
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

  });

  $('.data-table-users').on('click', 'tbody td', function() {

//get row of the TD
var dataId= $(this).closest('tr').find(':last-child').find(".btn-delete").data('id');
$.get({
                    url: '/get-user-detail/'+dataId,             
                    success: function(data) {
                   var parseData= JSON.parse(data);
                   $('#user_id').attr("value", parseData.id);
                   $('#user_id_pass').attr("value", parseData.id);
                   $('#update-users').css("display", "block")
                   $('input[name="name"]').attr("value", parseData.name);
                   $('input[name="email"]').attr("value", parseData.email);
                   $('#email-add').text(parseData.email);
                   $('input[name="phone"]').attr("value", parseData.contact);
                   $('#phone-add').text(parseData.contact);
                    }
                    });
})
  </script>
@stop