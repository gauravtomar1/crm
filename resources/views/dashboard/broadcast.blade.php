@php ($page_title ='data table')
@extends('layout')
@section('content')

<div class="page-wrapper">
  <div class="container-fluid">


    <div class="row page-titles">
      <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><strong>Broadcast</strong></h4>
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
          <h6 class="mb-0"><b>Broadcast</b></h6>
        </div>
      </div>

      <div class="col-md-3 col-sm-3 col-12">
        <div class="call-name-detail border bg-white p-3 h-100">
          <h6 class="mb-0"><b>Logged in user</b> <span class="ml-2">User ABC</span></h6>
        </div>
      </div>

      <div class="col-md-6 col-sm-6 col-12">
        <div class="call-name-detail border bg-white p-3 h-100">
          <h6 class="mb-0"><b>29/02/2020</b> <span><b>15:00</b></span></h6>
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

    <div class="row mb-3">
      <div class="col-md-12 col-sm-12 col-12">
        <div class="h-100 bg-white p-3">
            <form method="POST" action="/broadcast-send" enctype="multipart/form-data">
		     @csrf 
          <div class="row">
             
            <div class="col-md-6 col-sm-8 col-12">
              <div class="select-temp-u p-3 border h-100">

                <h6><b>Broadcast To:</b></h6>
                <select class="form-control chosen-select" required="required" data-placeholder="Select here.." multiple name="broadcast_to[]">
                   @forelse ($contact as $val)
                    <option value="{{$val->first_name}}">{{$val->first_name." ".$val->last_name}}</option>
                    @empty
				    <option>No Contacts Available</option>
                    @endforelse
                </select>
              </div>
            </div>
           <div class="col-md-6">
              <div class="dropvm-option p-3 border h-100">
                <h6><b>Broadcast Template:</b></h6>
                <select class="form-control" name="broadcast_template" required="required" data-placeholder="Broadcast Template..">
                  <option>Template A</option>
                  <option>Template B</option>
                  <option>Template C</option>
                  <option>Template D</option>
                </select>
              </div>
            </div><br/>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
          </div>
        </form>    
       

          <div class="row mt-3">
            <div class="col-12">
              <div class="script-apear-q border p-3 h-100">
                <h6><b>Create new broadcast</b></h6>

                <form method="POST" action="/broadcast-create" enctype="multipart/form-data">
						 @csrf
                  <div class="row">
                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label>Enter sms no.</label>
                        <input type="text" name="sms_number" class="form-control" placeholder="Enter SMS No." required>
                      </div>
                    </div>

                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label>Mobile no.</label>
                        <input type="text" name="mobile_number" class="form-control" placeholder="Mobile No." required>
                      </div>
                    </div>

                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label>Upload VM here</label>
                          <input type="file" class="form-control" name="virtual_message" placeholder="Upload VM" required>
                      </div>
                    </div>

                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label>Enter Message</label>
                        <input type="text" name="message" placeholder="Message" class="form-control" required>
                      </div>
                    </div>

                    <div class="col-md-6 col-12">
                      <div class="form-group">
                        <label class="check ">Include SMS
                          <input type="checkbox"  name="is_sms">
                          <span class="checkmark"></span>
                        </label>

                        <label class="check ">Include Email
                          <input type="checkbox"  name="is_email">
                          <span class="checkmark"></span>
                        </label>

                        <label class="check ">Include VM
                          <input type="checkbox"  name="is_vm">
                          <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>
                    
                    <div class="col-md-12 col-12">
                      <div class="form-group">
                        <label>For email include email address</label>
                        <input type="email" name="email_add" class="form-control" placeholder="Enter subject here" required>
                      </div>
                    </div>
                    <div class="col-md-12 col-12">
                      <div class="form-group">
                        <label>For email include subject</label>
                        <input type="text" name="email_sub" class="form-control" placeholder="Enter subject here" required>
                      </div>
                    </div>

                    <div class="col-md-12 col-12">
                      <div class="form-group">
                        <label>Enter text here</label>
                        <textarea class="form-control" name="email_body" rows="5" placeholder="Email text here" required></textarea>
                      </div>
                    </div>

                    <div class="col-md-12 col-12">
                      <div class="form-group">
                        <label class="check ">Track Clicks
                          <input type="checkbox"  name="is_click">
                          <span class="checkmark"></span>
                        </label>
                      </div>
                    </div>

                    <div class="col-12">
                     <!-- <a href="#" class="btn btn-primary">Submit</a>-->
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </div>
                </form>


              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</div>



@stop