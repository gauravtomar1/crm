@php ($page_title ='data table')
@extends('layout')
@section('content')
<div class="page-wrapper">
  <div class="container-fluid">


    <div class="row page-titles">
      <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor"><strong>Script</strong></h4>
      </div>
      <!-- <div class="col-md-7 align-self-center text-right">
        <div class="d-flex justify-content-end align-items-center">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
          </ol>
        </div>
      </div> -->
    </div>



    <div class="row mb-3">
      <div class="col-md-6 col-sm-12 col-12">
        <div class="h-100 bg-white p-3">
          <div class="row">
            <div class="col-12">
              <h6 class="mb-0 font-weight-bold bg-info text-white p-3 border">Seller :</h6>
              <div class="border p-3">
                <form>
                  <div class="form-group">
                    <label>Script link</label>
                    <input type="text" name="seller" class="form-control" placeholder="Script link">
                  </div>

                  <div class="form-group">
                    <label>Upload new</label>
                    <input type="file" name="upload" class="form-control" placeholder="Upload new">
                  </div>

                  <div class="form-group">
                    <label>Note</label>
                    <textarea  name="note" class="form-control" rows="3" placeholder="Note:"></textarea>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-12">
              <h6 class="mb-0 font-weight-bold bg-info text-white p-3 border">Buyers :</h6>
              <div class="border p-3">
                <form>
                  <div class="form-group">
                    <label>Buyers Script link</label>
                    <input type="text" name="buyers" class="form-control" placeholder="Script link">
                  </div>

                  <div class="form-group">
                    <label>Buyers Upload new</label>
                    <input type="file" name="upload" class="form-control" placeholder="Upload new">
                  </div>

                  <div class="form-group">
                    <label>Buyers Note</label>
                    <textarea  name="note" class="form-control" rows="3" placeholder="Note:"></textarea>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-12">
              <h6 class="mb-0 font-weight-bold bg-info text-white p-3 border">Providers :</h6>
              <div class="border p-3">
                <form>
                  <div class="form-group">
                    <label>Providers Script link</label>
                    <input type="text" name="providers" class="form-control" placeholder="Script link">
                  </div>

                  <div class="form-group">
                    <label>Providers Upload new</label>
                    <input type="file" name="upload" class="form-control" placeholder="Upload new">
                  </div>

                  <div class="form-group">
                    <label>Providers Note</label>
                    <textarea  name="note" class="form-control" rows="3" placeholder="Note:"></textarea>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="p-3">
              <button class="btn btn-primary mt-3">Submit</button>
            </div>
          </div>


            
        </div>
      </div>

      <div class="col-md-6 col-sm-6 col-12">
        <div class="right-detail-dial h-100 bg-white p-3">

          <div class="row">
            <div class="col-12">
              <h6 class="mb-0 font-weight-bold bg-info text-white p-3 border">Jv's/GXM :</h6>
              <div class="border p-3">
                <form>
                  <div class="form-group">
                    <label>Jv's/GXM Script link</label>
                    <input type="text" name="JvsGXM" class="form-control" placeholder="Script link">
                  </div>

                  <div class="form-group">
                    <label>Jv's/GXM Upload new</label>
                    <input type="file" name="upload" class="form-control" placeholder="Upload new">
                  </div>

                  <div class="form-group">
                    <label>Jv's/GXM Note</label>
                    <textarea  name="note" class="form-control" rows="3" placeholder="Note:"></textarea>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-12">
              <h6 class="mb-0 font-weight-bold bg-info text-white p-3 border">Voice Email :</h6>
              <div class="border p-3">
                <form>
                  <div class="form-group">
                    <label>Voice Email Script link</label>
                    <input type="text" name="voiceemail" class="form-control" placeholder="Script link">
                  </div>

                  <div class="form-group">
                    <label>Voice Email Upload new</label>
                    <input type="file" name="upload" class="form-control" placeholder="Upload new">
                  </div>

                  <div class="form-group">
                    <label>Voice Email Note</label>
                    <textarea  name="note" class="form-control" rows="3" placeholder="Note:"></textarea>
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