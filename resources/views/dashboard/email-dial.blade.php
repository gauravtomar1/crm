@php ($page_title ='data table')
@extends('layout')
@section('content')

<div class="page-wrapper">
  <div class="container-fluid">


    <div class="row page-titles">
      <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><strong>Dial</strong></h4>
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
          <h6><b>Ravi Kant</b> <span class="ml-2">8987677665</span></h6>
          <p>Jet li 1-123-456-7890</p>

          <h6><b>Schedule Callback</b> <span class="ml-3"><a href="#">Yes</a> / <a href="#">No</a></span></h6>
        </div>
      </div>

      <div class="col-md-3 col-sm-3 col-12">
        <div class="call-name-detail border bg-white p-3 h-100">
          <h6><b>Logged in user</b> <span class="ml-2">User ABC</span></h6>
        </div>
      </div>

      <div class="col-md-6 col-sm-6 col-12">
        <div class="call-name-detail border bg-white p-3 h-100">
          <h6><b>29/02/2020</b> <span><b>15:00</b></span></h6>

          <ul>
            <a data-target="#myModal" data-toggle="modal" id="MainNavHelp" 
               href="#myModal" class="btn btn-success mt-2"><li>Call</li></a>
            <li><a href="#" class="btn btn-primary mt-2">Pause</a></li>
            <li><a href="#" class="btn btn-danger mt-2">End</a></li>
            <li><a href="#" class="btn btn-warning mt-2">Transfer</a></li>
            <li><a href="#" class="btn btn-info mt-2">End Session</a></li>
          </ul>
        </div>
      </div>
      
    </div>


    <div class="row mb-3">
      <div class="col-md-8 col-sm-12 col-12">
        <div class="h-100 bg-white p-3">
          <div class="row">
            <div class="col-md-6 col-sm-8 col-12">
              <div class="select-temp-u p-3 border h-100">
                <label>Select Template</label>
                <select class="form-control">
                  <option disabled>Select Template</option>
                  <option>Template A</option>
                  <option>Template B</option>
                  <option>Template C</option>
                  <option>Template D</option>
                </select>

                <div class="text-center mt-3 mb-3">
                  <span class="text-center">OR</span>
                </div>

                <div class="form-group">
                  <label>Upload Template</label>
                  <input type="file" class="form-control" name="upload-template">
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="dropvm-option p-3 border h-100">
                <h6><b>Drop VM now option</b></h6>

                <div class="form-group row mb-1">
                    <div class="col-xs-12">
                      <label class="check ">VM Template
                        <input type="radio"  name="is_name">
                        <span class="checkmark"></span>
                      </label>

                      <label class="check ">Upload Here
                        <input type="radio"  name="is_name">
                        <span class="checkmark"></span>
                      </label>
                    </div>
                </div>

                <h6 class="mt-3"><b>Transfer call</b></h6>
                <select class="form-control">
                  <option>Select Transfer Call</option>
                  <option>Team</option>
                  <option>Team Parent</option>
                </select>
              </div>
            </div>
          </div>

          <hr>

          <div class="row">
            <div class="col-12">
              <div class="script-apear-q border p-3 h-100">
                <h6><b>Selected Appear</b></h6>

                <select class="form-control">
                  <option>Using a template</option>
                  <option>Not using a template </option>
                </select>

                <h6 class="mt-3"><b>Select</b></h6>
                <select class="form-control">
                  <option>Seller profile question</option>
                  <option>Buyer profile question</option>
                  <option>Invester profile question</option>
                  <option>ETC</option>
                </select>

                <h6 class="mt-3"><b>Calling Buyers:</b></h6>

                <div class="form-group">
                  <label>1. What area do you desire to live in most?</label>
                  <textarea type="text" name="q1" class="form-control" rows="3" placeholder="Answer"></textarea>
                </div>

                <div class="form-group">
                  <label>2. How much can your afford to pay each month/monthly income?</label>
                  <textarea type="text" name="q2" class="form-control" rows="3" placeholder="Answer"></textarea>
                </div>

                <div class="form-group">
                  <label>3. How many bedrooms/bathrooms do you needs? </label>
                  <textarea type="text" name="q3" class="form-control" rows="3" placeholder="Answer"></textarea>
                </div>

                <p><b>Notes:</b> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p>

                <a href="#" class="btn btn-primary">Save Response</a>


              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-4 col-12">
        <div class="right-detail-dial h-100 bg-white p-3">

          <h6><b>Jet li</b></h6>
          <ul>
            <li>1- 123-456-7890</li>
            <li>2- 123-456-7890</li>
            <li>3- 123-456-7890</li>
            <li>4- 123-456-7890</li>
          </ul>


          <h6 class="mt-3"><b>Property Address</b></h6>

          <ul>
            <li>Address will come here</li>
          </ul>

          <h6 class="mt-3"><b>Category</b></h6>

          <select class="form-control">
            <option>Select Category</option>
            <option>Buyer</option>
            <option>Seller</option>
            <option>Investor</option>
            <option>Agent</option>
          </select>

          <h6 class="mt-3"><b>Contact Snapshot</b></h6>

          <div class="contact-snapshot">
            <div class="snapshot">
              <ul>
                <li><img src="public/dist/image/s1.jpg" class="img-fluid w-100"></li>
              </ul>
            </div>
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
                    <h4 class="modal-title">Dialer</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    
                     <div class="form-group">
                   <iframe id="myIframe" name="myIframe" class="col-lg-12 col-md-12 col-sm-12" height="400" onclick="getIframeContent('myIframe')"></iframe>
                  </div>
              
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
<script>
     $(document).ready(function(){
    $('#myIframe').attr('src', 'https://wbecrm.younggeeks.net/dialer');
   });    
   
</script>

@stop