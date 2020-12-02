@php ($page_title ='data table')
@extends('layout')
@section('content')

        <div class="page-wrapper">
            
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <div class="container-fluid">
            <!-- ============================================================== -->
              <!--content start here-->
              <!-- Page Title Start -->
              <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor"><strong>Profile Details</strong></h4>
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
            <!-- Page Title Close -->
            <!-- Template Box Row Start -->
              <div class="row">

                    <!-- Column -->

                    <div class="col-lg-12 col-sm-12 col-12">

                        <div class="card mb-0"> 
                            <div class="card-body">

                                <h6><b>From:</b> {{config('mail.from.name')}} ({{config('mail.from.address')}})  <span class="float-right"><a href="#">Help Emailing</a></span></h6>
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
                                <form method="POST" action="/send-email" enctype="multipart/form-data">
								@csrf
                                    <div class="form-group">
										 <label class="col-form-label label-align"><b>Contact Email</b></label>
										<select class="form-control chosen-select" id="assgn" data-placeholder="List to choose here.." multiple name="toEmail[]" required="required">
										@forelse ($contact as $val)
										<option value="{{$val->email}}">{{$val->email}}</option>
										@empty
										<option>No contacts</option>
										@endforelse
                                        </select>
									
                                    </div>
                                    <div class="form-group">
                                        <textarea class="textarea_editor form-control" rows="8" placeholder="Enter text ..." name="htmltext"required></textarea>
                                    </div>

                                <div class="email-bottom d-flex">
                                    <div class="email-left">
                                        <button type="file" class="btn btn-primary">Use a template</button> <span>Draft save may 9th 2019, 2:05:55 PM </span>
                                    </div>

                                    <div class="email-right ml-auto">
                                      
                                        <a href="/profile" class="btn btn-link">Cancel</a>
										<input type="submit" value="Send Email" class="btn btn-info">
                                      
                                    </div>
                                </div>
								
							</form>
                            </div>

                        </div>

                    </div>

                </div>

                <div class="row mt-3 mb-3">

                    <div class="col-lg-4 col-sm-12 col-12">
                        <div class="card mb-0 h-100">
                            <div class="card-body">
                                <div class="profile-ques">
                                    <div class="q1 border p-3 mb-3">
                                        <h6><span class="font-weight-bold mr-2">1.</span>Put the Question</h6>
                                        <div class="d-flex">
                                            <div class="custom-control custom-radio">
                                            <input type="radio" id="yes1" name="customRadio1" class="custom-control-input">
                                            <label class="custom-control-label" for="yes1">Yes</label>
                                        </div>

                                        <div class="custom-control custom-radio ml-3">
                                            <input type="radio" id="no1" name="customRadio1" class="custom-control-input">
                                            <label class="custom-control-label" for="no1">No</label>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="q1 border p-3 mb-3">
                                        <h6><span class="font-weight-bold mr-2">2.</span>Put the Question</h6>
                                        <div class="d-flex">
                                            <div class="custom-control custom-radio">
                                            <input type="radio" id="yes2" name="customRadio2" class="custom-control-input">
                                            <label class="custom-control-label" for="yes2">Yes</label>
                                        </div>

                                        <div class="custom-control custom-radio ml-3">
                                            <input type="radio" id="no2" name="customRadio2" class="custom-control-input">
                                            <label class="custom-control-label" for="no2">No</label>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="q1 border p-3 mb-3">
                                        <h6><span class="font-weight-bold mr-2">3.</span>Put the Question</h6>
                                        <div class="d-flex">
                                            <div class="custom-control custom-radio">
                                            <input type="radio" id="yes3" name="customRadio3" class="custom-control-input">
                                            <label class="custom-control-label" for="yes3">Yes</label>
                                        </div>

                                        <div class="custom-control custom-radio ml-3">
                                            <input type="radio" id="no3" name="customRadio3" class="custom-control-input">
                                            <label class="custom-control-label" for="no3">No</label>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="q1 border p-3 mb-3">
                                        <h6><span class="font-weight-bold mr-2">4.</span>Put the Question</h6>
                                        <div class="d-flex">
                                            <div class="custom-control custom-radio">
                                            <input type="radio" id="yes4" name="customRadio4" class="custom-control-input">
                                            <label class="custom-control-label" for="yes4">Yes</label>
                                        </div>

                                        <div class="custom-control custom-radio ml-3">
                                            <input type="radio" id="no4" name="customRadio4" class="custom-control-input">
                                            <label class="custom-control-label" for="no4">No</label>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="q1 border p-3 mb-3">
                                        <h6><span class="font-weight-bold mr-2">5.</span>Put the Question</h6>
                                        <div class="d-flex">
                                            <div class="custom-control custom-radio">
                                            <input type="radio" id="yes5" name="customRadio5" class="custom-control-input">
                                            <label class="custom-control-label" for="yes5">Yes</label>
                                        </div>

                                        <div class="custom-control custom-radio ml-3">
                                            <input type="radio" id="no5" name="customRadio5" class="custom-control-input">
                                            <label class="custom-control-label" for="no5">No</label>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="q1 border p-3 mb-3">
                                        <h6><span class="font-weight-bold mr-2">6.</span>Put the Question</h6>
                                        <div class="d-flex">
                                            <div class="custom-control custom-radio">
                                            <input type="radio" id="yes6" name="customRadio6" class="custom-control-input">
                                            <label class="custom-control-label" for="yes6">Yes</label>
                                        </div>

                                        <div class="custom-control custom-radio ml-3">
                                            <input type="radio" id="no6" name="customRadio6" class="custom-control-input">
                                            <label class="custom-control-label" for="no6">No</label>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="q1 border p-3 mb-3">
                                        <h6><span class="font-weight-bold mr-2">7.</span>Put the Question</h6>
                                        <div class="d-flex">
                                            <div class="custom-control custom-radio">
                                            <input type="radio" id="yes7" name="customRadio7" class="custom-control-input">
                                            <label class="custom-control-label" for="yes7">Yes</label>
                                        </div>

                                        <div class="custom-control custom-radio ml-3">
                                            <input type="radio" id="no7" name="customRadio7" class="custom-control-input">
                                            <label class="custom-control-label" for="no7">No</label>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="q1 border p-3 mb-3">
                                        <h6><span class="font-weight-bold mr-2">8.</span>Put the Question</h6>
                                        <div class="d-flex">
                                            <div class="custom-control custom-radio">
                                            <input type="radio" id="yes8" name="customRadio8" class="custom-control-input">
                                            <label class="custom-control-label" for="yes8">Yes</label>
                                        </div>

                                        <div class="custom-control custom-radio ml-3">
                                            <input type="radio" id="no8" name="customRadio8" class="custom-control-input">
                                            <label class="custom-control-label" for="no8">No</label>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="q1 border p-3 mb-3">
                                        <h6><span class="font-weight-bold mr-2">9.</span>Put the Question</h6>
                                        <div class="d-flex">
                                            <div class="custom-control custom-radio">
                                            <input type="radio" id="yes9" name="customRadio9" class="custom-control-input">
                                            <label class="custom-control-label" for="yes9">Yes</label>
                                        </div>

                                        <div class="custom-control custom-radio ml-3">
                                            <input type="radio" id="no9" name="customRadio9" class="custom-control-input">
                                            <label class="custom-control-label" for="no9">No</label>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="q1 border p-3 mb-3">
                                        <h6><span class="font-weight-bold mr-2">10.</span>Put the Question</h6>
                                        <div class="d-flex">
                                            <div class="custom-control custom-radio">
                                            <input type="radio" id="yes10" name="customRadio10" class="custom-control-input">
                                            <label class="custom-control-label" for="yes10">Yes</label>
                                        </div>

                                        <div class="custom-control custom-radio ml-3">
                                            <input type="radio" id="no10" name="customRadio10" class="custom-control-input">
                                            <label class="custom-control-label" for="no10">No</label>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8  col-sm-12 col-12">

                        <div class="card mb-0 h-100">

                            <div class="card-body">
                                <div class="profile-right-detail">
                                    <ul class="nav nav-tabs profile-tab" role="tablist">

                                        <!-- <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Timeline</a> </li> -->

                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Settings</a> </li>

                                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Password</a> </li>

                                    </ul>

                            <!-- Tab panes -->

                                    <div class="tab-content">


                                        <div class="tab-pane active" id="profile" role="tabpanel">

                                        <div class="card-body p-0 pt-3">

                                                <form class="form-horizontal form-material" method="post" action="/user-update">
														@csrf
                                                    <div class="form-group">

                                                        <label class="col-md-12">Full Name</label>

                                                        <div class="col-md-12">

                                                            <input type="text" value="{{ $user->name}}" class="form-control form-control-line" name="name" required>

                                                        </div>

                                                    </div>

                                                    <div class="form-group">

                                                        <label for="example-email" class="col-md-12">Email</label>

                                                        <div class="col-md-12">

                                                            <input type="email" class="form-control form-control-line" name="email" id="example-email" value="{{ $user->email}}" required>

                                                        </div>

                                                    </div>

                                                    

                                                    <div class="form-group">

                                                        <label class="col-md-12">Phone No</label>

                                                        <div class="col-md-12">

                                                            <input type="text" name="contact" class="form-control form-control-line" value="{{ $user->contact}}" required>

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

                                        <div class="tab-pane" id="settings" role="tabpanel">

                                            <div class="card-body p-0 pt-3">

                                                <form class="form-horizontal form-material" method="post" action="/password-update">
																		@csrf
                                                    <div class="form-group">

                                                        <label class="col-md-12">Password</label>

                                                        <div class="col-md-12">

                                                            <input type="password" name="password" class="form-control form-control-line" pattern=".{6,}"   required title="6 characters minimum">

                                                        </div>

                                                    </div>

                                                    <div class="form-group">

                                                        <label for="example-email" class="col-md-12">Confirm Password</label>

                                                        <div class="col-md-12">

                                                            <input type="password" name="confirm_pass" class="form-control form-control-line" pattern=".{6,}"   required title="6 characters minimum">

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

                                    <hr>

                                    <form method="post" action="/user-address">
									@csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label>Note About Call</label>
                                                    <textarea class="form-control" rows="3" placeholder="Note About Call" name="noteadd" required></textarea>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" name="paddress" class="form-control" placeholder="Enter Address" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label>Units</label>
                                                    <input type="text" name="punits" class="form-control" placeholder="Enter Units" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label>Vacent</label>
                                                    <input type="text" name="pvacent" class="form-control" placeholder="Enter Vacent" name="required">
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-sm-6 col-12">
                                                <div class="form-group">
                                                    <label>Date Available</label>
                                                    <input type="date" name="pdates" class="form-control" required>
                                                </div>
                                            </div>

                                            <div class="col-12">

                                                <button class="btn btn-success">Update</button>

                                            </div>
                                        </div>
                                    </form>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="profile-table">

                                                <h6><b>All Details</b></h6>
                                                	    <table class="table table-bordered data-table">
	
        <thead>

            <tr>

                <th>No</th>

                <th>Address</th>
				<th>Units</th>
				<th>Vacent</th>
				<th>Date available</th>
                <th width="100px">Action</th>

            </tr>

        </thead>

        <tbody>

        </tbody>

    </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="row mt-3 mb-3">
                    <div class="col-12">
                        <div class="history-table bg-white p-3">
                            <h6><b>Contact History</b></h6>
                            <table class="table table-bordered data-table-contacts">
	
        <thead>

            <tr>

            <th>No</th>

<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Note</th>
<th>Category</th>
<th>Details</th>
<th width="100px">Action</th>

            </tr>

        </thead>

        <tbody>

        </tbody>

    </table>


                        </div>
                    </div>
                </div>
              <!-- Template Box Row Close -->
            <!-- ============================================================== -->
            </div>
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
					<script type="text/javascript">
//DataTable functionality
  $(function () {
    
    var table = $('.data-table').DataTable({
		responsive: true,
        processing: true,

        serverSide: true,

        ajax: "{{ route('profile.index') }}",

        columns: [

            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'address', name: 'address'},
			
            {data: 'units', name: 'units'},
			{data: 'vacent', name: 'vacent'},
			{data: 'date_available', name: 'date_available'},

            {data: 'action', name: 'action', orderable: false, searchable: false},

        ]

    });

        var table = $('.data-table-contacts').DataTable({
		responsive: true,
        processing: true,

        serverSide: true,

        ajax: "{{ route('profile.contact') }}",

        columns: [

            {data: 'DT_RowIndex', name: 'DT_RowIndex',width : '10px'},
            {data: 'first_name', name: 'first_name',width : '50px'},
			
            {data: 'email', name: 'email',width : '50px'},
			{data: 'phone', name: 'phone',width : '50px'},
			{data: 'note', name: 'note',width : '70px'},
			{data: 'category', name: 'category',width : '30px'},
			{data: 'details', name: 'details',width : '60px'},

            {data: 'action', name: 'action', orderable: false, searchable: false,width : '20px'},

        ]

    });
	
	$('.data-table-contacts').on('click', '.btn-delete[data-remote]', function (e) { 
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
            $('.data-table-contacts').DataTable().draw(false);
        });
    }else
        alert("You have cancelled!");
});

  });
  </script>
       @stop
	   
	   		