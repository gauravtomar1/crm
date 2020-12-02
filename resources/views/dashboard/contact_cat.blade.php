@php ($page_title ='data table')
@extends('layout')
@section('content')
<div class="page-wrapper">
  <div class="container-fluid">


    <div class="row page-titles">
      <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><strong>Contact Category</strong></h4>
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
          <h6 class="mb-0"><b>Contact</b></h6>
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
	<form action="/contact-category" method="post">
	@csrf
	<input type="hidden" name="custId" value="{{(!empty($data))?$data->id:""}}">
	<div class="row mar_bot_20">
    <div class="form-group col-md-3 col-sm-3 col-12">
    <label for="inputEmail">Category</label>
    <input type="text" class="form-control" name="category" placeholder="Category" value="{{(!empty($data->id))?$data->name:""}}" required>
    </div>
	<div class="form-group col-md-3 col-sm-3 col-12">
    <label>Status</label>
    <select class="form-control" name="status">
    <option value="1" @if(!empty($data->id)&&$data->status==1)selected @endif>Active</option>
    <option value="0" @if(!empty($data->id)&&$data->status==0)selected @endif>InActive</option>
    </select>
	</div>
	<div class="col-md-6 col-sm-6 col-12">
	<br>
	<button type="submit" class="btn btn-primary mt-2">@if(!empty($data->id)) Update @else Add @endif</button>
	@if(!empty($data))
	<a class="btn btn-primary mt-2" href="/contacts-category">Cancel</a>
	@endif
    </div>
	</div>
    
	             
    
</form>	<div class="card">
	    <table class="table table-bordered data-table">
	
        <thead>

            <tr>

                <th>No</th>

                <th>Name</th>

                <th>Status</th>

                <th width="100px">Action</th>

            </tr>

        </thead>

        <tbody>

        </tbody>

    </table>   </div>
	

		
  </div>
  
</div>
<script type="text/javascript">
//DataTable functionality
  $(function () {
    
    var table = $('.data-table').DataTable({

        processing: true,

        serverSide: true,

        ajax: "{{ route('contact.index') }}",

        columns: [

            {data: 'DT_RowIndex', name: 'DT_RowIndex'},

            {data: 'name', name: 'name'},

            {data: 'status', name: 'status'},

            {data: 'action', name: 'action', orderable: false, searchable: false},

        ]

    });

    

  });
  
  
  $('.data-table').on('click', '.btn-delete[data-remote]', function (e) { 
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
            $('.data-table').DataTable().draw(false);
        });
    }else
        alert("You have cancelled!");
});

</script>
@stop

