@php ($page_title ='data table')
@extends('layout')
@section('content')

<div class="page-wrapper">
  <div class="container-fluid">


    <div class="row page-titles">
      <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><strong>User Information</strong></h4>
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
          <h6 class="mb-0"><b>User Information</b></h6>
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
   
     <button type="button" class="btn btn-primary btn-sm" onclick="download_table_as_csv('listgroup');">Download as CSV</button>     

	<div class="card">
	   
	   <table data-order='[[ 0, "desc" ]]' class="table table-bordered data-table-groups" id="userinfo">
	
        <thead>

            <tr>

                <th>No</th>
                <th>User Info Name</th>
                <th>Mission Statement</th>
                <th>Slogan</th>
                <th width="100px">Action</th>

            </tr>

        </thead>

        <tbody>

        </tbody>

    </table>
	</div>

		
  </div>
  
</div>
<script type="text/javascript">
//DataTable functionality
  $(function () {
	  
        var table = $('.data-table-groups').DataTable({
			autoWidth: false,
		responsive: true,
        processing: true,

        serverSide: true,

        ajax: "{{ route('user.info') }}",

        columns: [

            {data: 'DT_RowIndex', name: 'DT_RowIndex',width : '20px'},
            {data: 'userinfoname', name: 'userinfoname'},
            {data: 'mission_statement', name: 'mission_statement'},
			{data: 'slogan', name: 'slogan'},
			
            {data: 'action', name: 'action', orderable: false, searchable: false},

        ]

    });
	
	$('.data-table-groups').on('click', '.btn-delete[data-remote]', function (e) { 
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
            $('.data-table-groups').DataTable().draw(false);
        });
    }else
        alert("You have cancelled!");
});

  });
  </script>
  <script>
      // Quick and simple export target #table_id into a csv
function download_table_as_csv(table_id) {
    // Select rows from table_id
    var rows = document.querySelectorAll('table#' + table_id + ' tr');
    // Construct csv
    var csv = [];
    for (var i = 0; i < rows.length; i++) {
        var row = [], cols = rows[i].querySelectorAll('td, th');
        for (var j = 0; j < cols.length; j++) {
            // Clean innertext to remove multiple spaces and jumpline (break csv)
            var data = cols[j].innerText.replace(/(\r\n|\n|\r)/gm, '').replace(/(\s\s)/gm, ' ')
            // Escape double-quote with double-double-quote (see https://stackoverflow.com/questions/17808511/properly-escape-a-double-quote-in-csv)
            data = data.replace(/"/g, '""');
            // Push escaped string
            row.push('"' + data + '"');
        }
        csv.push(row.join(';'));
    }
    var csv_string = csv.join('\n');
    // Download it
    var filename = 'export_' + table_id + '_' + new Date().toLocaleDateString() + '.csv';
    var link = document.createElement('a');
    link.style.display = 'none';
    link.setAttribute('target', '_blank');
    link.setAttribute('href', 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv_string));
    link.setAttribute('download', filename);
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}
  </script>
@stop