@php ($page_title ='data table')
@extends('layout')
@section('content')
         <!-- ============================================================== -->
         <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <div class="container-fluid">
               <!-- ============================================================== -->
               <!--content start here-->
               <!-- Page Title Start -->
               <div class="row page-titles">
                  <div class="col-md-5 align-self-center">
                     <h4 class="text-themecolor"><strong>Campaign Text(SMS)</strong></h4>
                     <a href="javascript:void(0);" class="noti_add_new">+ Add New</a>
                  </div>
                  <div class="col-md-7 align-self-center text-right">
                     <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                        </ol>
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
               <!-- Page Title Close -->
                  <div class="row mar_bot_20">
                     <div class="col-md-12 col-xs-12">
                        <div class="card_section">
                           <ul class="ul_sty">
                              <li><a href="javascript:void(0);">Campaign Templates</a></li>
                           </ul>

                        <div class="form-group row">
                              <div class="col-md-12 col-sm-12">
                                 <label class="col-form-label label-align" for="last-name">
                                    Create a campaign from our admin created templates. Select one to view it
                                 </label>
                                 <select class="form-control" id="templtes_no" required="required">
                                    <option>--Choose Template--</option>
                                    <option>Evergreen Newsletter</option>
                                    <option>Evergreen product pitch</option>
                                    <option>Host a webinar</option>
                                    <option>Prduct launch</option>
                                    <option>Follow up with customers who don't purchase</option>
                                    <option>Personalize content based on survey results</option>
                                 </select>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  
                  <!-- Create Templates Section Start -->
                  <div class="row mar_bot_20">
                     <div class="col-md-12 col-xs-12">
                        <div class="card_section h_75">
                           <ul class="ul_sty">
                              <li>Create new Campaign <br> 
                                 <span class="txt_gray">Use the form below to setup your SMS campaign</span>
                              </li>
                           </ul>
                        </div>
                     </div>
                  </div>
                <div class="row mar_bot_20">
                     <div class="col-md-12 col-xs-12">
                        <div class="card_section">
                           <form class="p-3" method="POST" action="/save-text-campaign" enctype="multipart/form-data">
                               @csrf
                              <div class="form-group row">
                                 <div class="col-md-6 col-sm-6 ">
                                   <label class="col-form-label label-align" for="first-name">Enter a title for campaign</label>
                                   <?php if($textCampaignData){ ?>
                                    <input type="text" id="camp_title" required="required" class="form-control" name="camp_title" value="{{$textCampaignData[0]->text_campaign_name}}">
                                    <input type="hidden" id="campaign_id" class="form-control" name="campaign_id" value="{{$textCampaignData[0]->id}}">
                                   <?php }else{ ?>
                                    <input type="text" id="camp_title" required="required" class="form-control" name="camp_title" placeholder="Enter campaign title here..">
                                    <input type="hidden" id="campaign_id" class="form-control" name="campaign_id" value="0">
                                   <?php } ?>
                                 </div>
                                 <div class="col-md-6 col-sm-6">
                                    <label class="col-form-label label-align" for="last-name">Cell/Phone number</label>
                                    <input type="text" id="cell_num" required="required" class="form-control" name="cell_num" value="{{$twilio_phone->twilio_phone}}" readonly="readonly"> 
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <div class="col-md-12 col-xs-12">
                                    <label class="col-form-label label-align" for="last-name">First message of campaign</label>
                                    <?php if($textCampaignData){ ?>
                                    <textarea rows="4" class="form-control w_100" id="text_dsc" name="text_dsc" required="required" value="{{$textCampaignData[0]->message}}">{{$textCampaignData[0]->message}}</textarea>
                                     <?php }else{ ?>
                                    <textarea rows="4" class="form-control w_100" id="text_dsc" name="text_dsc" required="required" placeholder="Write your text message of your SMS...."></textarea>
                                   <?php } ?>
                                 </div>
                              </div>
                              <div class="form-group row mar_bot_0">
                                 <div class="col-md-12 col-sm-12">
                                    <label class="col-form-label label-align">Contact List</label>
                                    <select class="form-control chosen-select" id="cat" data-placeholder="--Select multiple contact of your list--" multiple name="contactlist[]"required="required">
                                    <?php if($textCampaignData){ ?>
                                     @forelse ($contact as $val)
                                    <option value="{{$val->first_name}}" {{(in_array($val->first_name, $contact_name))? 'selected':''}}>{{$val->first_name." ".$val->last_name}}</option>
                                    @empty
            					    <option>No Contact Available</option>
                                    @endforelse
                                    <?php }else{ ?>
                                       @forelse ($contact as $val)
                                        <option value="{{$val->first_name}}">{{$val->first_name." ".$val->last_name}}</option>
                                        @empty
                					    <option>No Contact Available</option>
                                        @endforelse
                                        <?php } ?>
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <div class="col-xs-12">
                                    <label class="check ">Loop campaign when done
                                    <?php if($textCampaignData && $textCampaignData[0]->looping == "on"){ ?>
                                        <input type="checkbox"  name="is_looping" checked>
                                        <?php }else{ ?>
                                         <input type="checkbox"  name="is_looping">
                                        <?php } ?>
                                      <span class="checkmark"></span>
                                    </label>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <div class="col-md-6 col-sm-12 col-xs-6">
                                    <label class="check mar_bot_10">When campaign is done add to list
                                      <?php if($textCampaignData && $textCampaignData[0]->add_to_list == "on"){ ?>
                                        <input type="checkbox"  name="is_list" checked>
                                        <?php }else{ ?>
                                         <input type="checkbox"  name="is_list">
                                        <?php } ?>
                                      <span class="checkmark"></span>
                                    </label>
                                    <select class="form-control chosen-select" id="selc_cont_list" multiple name="list[]" required="required">
                                        <?php if($textCampaignData){ ?>
                                     @forelse ($group_list as $val)
                                    <option value="{{$val->name}}" {{(in_array($val->name, $list_name))? 'selected':''}}>{{$val->name}}</option>
                                    @empty
            					    <option>No List Available</option>
                                    @endforelse
                                    <?php }else{ ?>
                                       @forelse ($group_list as $val)
                                        <option value="{{$val->name}}">{{$val->name}}</option>
                                        @empty
                					    <option>No List Available</option>
                                        @endforelse
                                        <?php } ?>
                                       
                                    </select>
                                 </div>
                                 <div class="col-md-6 col-sm-12">
                                    <label class="col-form-label label-align" for="first-name">Campaign Text(SMS) sent (interval days)</label>
                                    <?php if($textCampaignData){ ?>
                                    <input type="text" id="after_days" required="required" name="after_days" class="form-control" value="{{$textCampaignData[0]->message_gap_days}}">
                                    <?php }else { ?>
                                    <input type="text" id="after_days" required="required" name="after_days" class="form-control" value="" placeholder="Enter days here...">
                                    <?php } ?>
                                 </div>
                              </div>
                              <div class="form-group row">
                                 <div class="col-md-12 col-xs-12">
                                    <!--<input type="button" name="next" class="cancl btn btn-sm btn-primary" value="Cancel" />-->
                                    <input type="submit" name="next" class="save btn btn-sm btn-primary" value="Save campaign" />
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
                  <!-- Create Templates Section Close -->
               <!-- ============================================================== -->
            </div>
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
         </div>

       @stop