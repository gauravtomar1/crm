@php ($page_title ='data table')
@extends('layout')
@section('content')

<div class="page-wrapper">
  <div class="container-fluid">


    <div class="row page-titles">
      <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><strong>Incoming Details</strong></h4>
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
          <h6 class="mb-1"><b>Incoming Email</b></h6>
          <!--<p class="mb-0">All incoming (SMS,VM,Email)</p>-->
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
   <button type="button" class="btn btn-primary">All incoming (SMS,VM,Email)</button>
   <br />
    <div class="row mb-3">
      <div class="col-md-8 col-sm-12 col-12">
        <div class="h-100 bg-white p-3">

          <div class="row">
            <div class="col-md-6 col-sm-6 col-12">
              <div class="border p-3 bg-white h-100">

                <h6 class="font-weight-bold">New email messages</h6>
                <div class="icomingmail-list">
                  <div class="list-email border p-3">
                    <h6>Jain Austin</h6>
                    <p class="email-sub mb-1">Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet</p>
                    <p class="mb-0">12/07/2020  <span class="text-primary">02:05:55 PM</span></p>
                  </div>

                  <div class="list-email border p-3">
                    <h6>Jain Austin</h6>
                    <p class="email-sub mb-1">Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet</p>
                    <p class="mb-0">12/07/2020  <span class="text-primary">02:05:55 PM</span></p>
                  </div>

                  <div class="list-email border p-3">
                    <h6>Jain Austin</h6>
                    <p class="email-sub mb-1">Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet</p>
                    <p class="mb-0">12/07/2020  <span class="text-primary">02:05:55 PM</span></p>
                  </div>

                  <div class="list-email border p-3">
                    <h6>Jain Austin</h6>
                    <p class="email-sub mb-1">Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet</p>
                    <p class="mb-0">12/07/2020  <span class="text-primary">02:05:55 PM</span></p>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6 col-sm-6 col-12">
              <div class="border p-3 bg-white h-100">

                <h6 class="font-weight-bold">Priority list</h6>
                <div class="icomingmail-list">
                  <div class="list-email border p-3">
                    <h6>Jain Austin  <span class="font-weight-bold text-info float-right"><i class="fa fa-dot-circle"></i></span></h6>
                    <p class="mb-0">ja@gmail.com</p>
                  </div>

                  <div class="list-email border p-3">
                    <h6>Jain Austin  <span class="font-weight-bold text-danger float-right"><i class="fa fa-dot-circle"></i></span></h6>
                    <p class="mb-0">ja@gmail.com</p>
                  </div>

                  <div class="list-email border p-3">
                    <h6>Jain Austin  <span class="font-weight-bold text-danger float-right"><i class="fa fa-dot-circle"></i></span></h6>
                    <p class="mb-0">ja@gmail.com</p>
                  </div>

                  <div class="list-email border p-3">
                    <h6>Jain Austin  <span class="font-weight-bold text-info float-right"><i class="fa fa-dot-circle"></i></span></h6>
                    <p class="mb-0">ja@gmail.com</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-12">
              <div class="incomingmail-all-list bg-white border p-3">
                <h6 class="font-weight-bold">All email list</h6>
                 <div class="all-mail-list border bg-white p-3">
                   <p class="mb-1">12/05/2020  <span class="text-primary ml-3">02:05:55 PM</span></p>
                   <h6 class="mb-1"><b>Jane Austin</b> <span class="font-weight-bold text-danger float-right"><i class="fa fa-dot-circle"></i></span></h6>
                   <p class="font-weight-bold mb-1">Contact snapshot here</p>
                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                   tempor incididunt ut labore et dolore magna aliqua. consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                 </div>

                 <div class="all-mail-list border bg-white p-3">
                   <p class="mb-1">12/05/2020  <span class="text-primary ml-3">02:05:55 PM</span></p>
                   <h6 class="mb-1"><b>Jane Austin</b> <span class="font-weight-bold text-danger float-right"><i class="fa fa-dot-circle"></i></span></h6>
                   <p class="font-weight-bold mb-1">Contact snapshot here</p>
                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                   tempor incididunt ut labore et dolore magna aliqua. consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                 </div>

                 <div class="all-mail-list border bg-white p-3">
                   <p class="mb-1">12/05/2020  <span class="text-primary ml-3">02:05:55 PM</span></p>
                   <h6 class="mb-1"><b>Jane Austin</b> <span class="font-weight-bold text-danger float-right"><i class="fa fa-dot-circle"></i></span></h6>
                   <p class="font-weight-bold mb-1">Contact snapshot here</p>
                   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                   tempor incididunt ut labore et dolore magna aliqua. consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                 </div>
              </div>
            </div>
          </div>

        </div>
      </div>

      <div class="col-md-4 col-sm-4 col-12">
        <div class="right-detail-dial h-100 bg-white p-3">

          <h6 class="font-weight-bold"><b>Special options</b></h6>

          <form>
            <div class="form-group">
              <label class="col-form-label label-align">Select User to list</label>
                <select class="form-control" data-placeholder="select user to list" required="required">
                  <<!--option>User</option>
                  <option>User 1</option>
                  <option>User 2</option>
                  <option>User 3</option>-->
                   @forelse ($user as $val)
                    <option value="{{$val->name}}">{{$val->name}}</option>
                    @empty
				    <option>No User Available</option>
                    @endforelse
                </select>
            </div>

            <div class="form-group">
              <label class="col-form-label label-align">Mltiple contact single reply</label>
                <select class="form-control chosen-select" data-placeholder="multiple user single reply" multiple name="test" required="required">
                 <!-- <option>User1</option>
                  <option>User2</option>
                  <option>User3</option>
                  <option>User4</option>
                  <option>User5</option>
                  <option>User6</option>-->
                   @forelse ($userinfo as $val)
                    <option value="{{$val->userinfoname}}">{{$val->userinfoname}}</option>
                    @empty
				    <option>No Contact Available</option>
                    @endforelse
                </select>
            </div>

            <div class="form-group">
              <label class="col-form-label label-align">Add to profile</label>
                <select class="form-control">
                  <option>Yes</option>
                  <option>No</option>
                </select>
            </div>


            <div class="form-group">
              <button class="btn btn-primary">Submit</button>
            </div>
          </form>
          
        </div>

      </div>

    </div>

  </div>
</div>
@stop