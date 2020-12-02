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
                     <h4 class="text-themecolor"><strong>Evergreen Newsletter</strong></h4>
                  </div>
                  <!-- <div class="col-md-7 align-self-center text-right">
                     <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="javascript:void(0)">Go back to list</a></li>
                        </ol>
                     </div>
                  </div> -->
               </div>
               <!-- Page Title Close -->
                  <div class="row mar_bot_20">
                     <div class="col-lg-12">
                        <div class="x_panel">
                           <div class="x_content">
                              <div id="wizard" class="form-wizard wizard_horizontal">
                                 <form class="form-wizard wizard">
                                 <ul id="progressbar" class="tab">
                                    <li class="active" id="camp_info">
                                       <strong>Step 1<br /><small> Campaign information</small></strong>
                                    </li>
                                    <li id="camp_filter">
                                       <strong>Step 2<br /><small>Campaign Filters</small></strong>
                                    </li>
                                    <li id="text_voice_msg">
                                       <strong>Step 3<br /><small>Text & Voice Messages</small></strong>
                                    </li>
                                    <li id="incoming_msg">
                                       <strong>Step 4<br /><small>Incoming Messages auto Classification</small></strong>
                                    </li>
                                    <li id="active_camp ">
                                       <strong>Step 5<br /><small>Active Campaign</small></strong>
                                    </li>
                                 </ul>
                                <div class="card_wizard_form">
                                 <!-- Information campaign form Start -->
                                 <fieldset id="camp_inf">                                    
                                     <div class="x_title d-flex align-items-center">
                                        <h3 class="h4">Campaign Information</h3>
                                        <div class="clearfix"></div>
                                     </div>
                                    <div class="form-wizard wizard">
                                       <div class="form-group row">
                                          <div class="col-md-6 col-sm-6 ">
                                          <label class="col-form-label label-align" for="first-name">Enter a title for campaign</label>
                                             <input type="text" id="name" required="required" class="form-control" value="Evergreen Newsletter">
                                          </div>
                                          <div class="col-md-6 col-sm-6 ">
                                          <label class="col-form-label label-align" for="last-name">Phone Select</label>
                                             <select class="form-control" id="phone" required="required">
                                                 <option>Select Phone</option>
                                                 <option>91 9872817267</option>
                                                 <option>01 7872636452</option>
                                                 <option>91 9876543421</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <div class="col-md-12 col-sm-12">
                                          <label class="col-form-label label-align" for="last-name">Desciption</label>
                                             <textarea cols="6" rows="4" class="form-control" id="desc" required="required">Get off the weekly content treadmill by turning your newsdletter into an evergreen email sequence. All the latest subscribers will recieve your best content timed to when they subscribe</textarea>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <div class="col-md-6 col-sm-6 ">
                                              <label class="col-form-label label-align">Select Categories*</label>
                                              <select class="form-control chosen-select" id="cat" data-placeholder="Begin typing a name to categories filter" multiple name="test" required="required">
                                                <option>American Black Bear</option>
                                                <option>Asiatic Black Bear</option>
                                                <option selected>Brown Bear</option>
                                                <option>Giant Panda</option>
                                                <option>Sloth Bear</option>
                                                <option>Sun Bear</option>
                                                <option>Polar Bear</option>
                                                <option>Spectacled Bear</option>
                                              </select>
                                          </div>
                                          <div class="col-md-6 col-sm-6 ">
                                              <label class="col-form-label label-align">Select Cities*</label>
                                              <select class="form-control chosen-select" id="city" data-placeholder="Begin typing a name to cities filter" multiple name="test" required="required" required="required">
                                                <option class="result-selected">Agra</option>
                                                <option>Aligarh</option>
                                                <option>Delhi</option>
                                                <option>Dehradun</option>
                                                <option>Goa</option>
                                                <option>Kanpur</option>
                                                <option>Mumbai</option>
                                                <option>Nasik</option>
                                                <option selected>Noida</option>
                                              </select>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <div class="col-md-6 col-sm-6">
                                            <label class="col-form-label label-align">Blast a maximum of*</label>
                                             <input type="text" class="form-control w_80" name="search" id="blst_no." value="1000">
                                             <button type="submit" class="listing_btn">listing</button>
                                          </div>
                                          <div class="col-md-6 col-sm-6">
                                            <label class="col-form-label label-align">Run blast every[between 1 and 14 days]*</label>
                                             <input type="text" class="form-control w_80" name="search" id="days_no." value="4">
                                             <button type="submit" class="day_btn">days</button>
                                          </div>
                                       </div>
                                    </div>                                    
                                    <input type="submit" name="next" class="save btn btn-sm btn-primary" value="Save progress" />
                                    <input type="submit" name="next" class="next btn btn-sm btn-primary" value="Next" />
                                 </fieldset>
                                 <!-- Information campaign form Close -->
                                 <!-- Filters campaign form Start -->
                                 <fieldset id="camp_filtrs">
                                    <div class="x_title d-flex align-items-center">
                                        <h3 class="h4">Campaign Filters</h3>
                                        <div class="clearfix"></div>
                                     </div>
                                    <div class="wizard">
                                       <div class="form-group row">
                                          <div class="col-md-12 col-xs-12">
                                              <label class="col-form-label label-align d-block">Price(Min-Max)</label>
                                              <input type="text" name="min_price" class="form-control" id="min_price" placeholder="Minimum Price">
                                              <p class="input_divider">*</p>
                                              <input type="text" name="max_price" id="max_price" class="form-control" placeholder="Maximum Price">
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                         <div class="col-md-12 col-xs-12">
                                              <label class="col-form-label label-align d-block">Sq.Ft.(Min-Max)</label>
                                              <input type="text" name="min_sq" class="form-control" id="min_sq" placeholder="Minimum Sq. Ft.">
                                              <p class="input_divider">*</p>
                                              <input type="text" name="max_sq" id="max_sq" class="form-control" placeholder="Maximum Sq. Ft.">
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <div class="col-md-4 col-xs-12">
                                              <label class="col-form-label label-align" for="last-name">Badrooms</label>
                                             <select class="form-control" id="badroom" required="required">
                                                 <option>--Select Badrooms--</option>
                                                 <option>1+</option>
                                                 <option>2+</option>
                                                 <option>3+</option>
                                                 <option>4+</option>
                                                 <option>5+</option>
                                             </select>
                                          </div>
                                          <div class="col-md-4 col-xs-12">
                                              <label class="col-form-label label-align" for="last-name">Balcony</label>
                                             <select class="form-control" id="balcony" required="required">
                                                 <option>--Select Baalcony--</option>
                                                 <option>1+</option>
                                                 <option>2+</option>
                                             </select>
                                          </div>
                                          <div class="col-md-4 col-xs-12">
                                              <label class="col-form-label label-align" for="last-name">Washroom</label>
                                             <select class="form-control" id="washroom" required="required">
                                                 <option>--Select Washroom--</option>
                                                 <option>1+</option>
                                                 <option>2+</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <div class="col-md-6 col-xs-12">
                                              <label class="col-form-label label-align" for="last-name">Include ads that contain these sentences/words (use commas to seperate entries)</label>
                                                <div id="input">
                                                    <input type="text" value="" data-role="tagsinput"></input>
                                                </div>
                                          </div>
                                          <div class="col-md-6 col-xs-12">
                                              <label class="col-form-label label-align" for="last-name">Exclude ads that contain these sentences/words (use commas to seperate entries)</label>
                                                <div id="input">
                                                    <input type="text" value="Vacant Land" data-role="tagsinput"></input>
                                                </div>
                                          </div>
                                       </div>
                                    </div>
                                    <input type="submit" name="save_progress" class="save_progress btn btn-sm btn-primary" value="Save progress" />

                                    <input type="submit" name="next" class="next btn btn-sm btn-primary" value="Next" />
                                    <input type="submit" name="previous" class="save previous btn btn-sm btn-outline-secondary" value="Previous" />
                                 </fieldset>
                                 <!-- Filters campaign form Close -->  
                                 <!-- Text And Voice Messages form Start -->
                                 <fieldset id="text_voice_fld">
                                    <div class="x_title d-flex align-items-center">
                                        <h3 class="h4">Text & Voice message</h3>
                                        <div class="clearfix"></div>
                                     </div>
                                    <div class="wizard">
                                       <div class="form-group row">
                                          <div class="col-md-12 col-sm-12">
                                          <label class="col-form-label label-align" for="last-name">Select followup campaign</label>
                                             <select class="form-control" id="phone" required="required">
                                                 <option selected="selected">Evergreen Newsletter</option>
                                                 <option>Campaign two</option>
                                                 <option>Campaign three</option>
                                                 <option>Campaign four</option>
                                                 <option>Campaign five</option>
                                                 <option>Campaign six</option>
                                             </select>
                                             <span class="notes">[Only Voice and Text campaign are shown Email campaign are not currently supported].</span>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <div class="col-md-12 col-xs-12 text-right">
                                              <a href="javascript:void(0);" class="edit_camp">Edit followup campaign</a>
                                              <a href="javascript:void(0);" class="create_camp">Create followup campaign</a>
                                          </div>
                                       </div>
                                        <div class="campaign_box">
                                            <!-- Day By Day Campaign Status Start -->
                                            <div class="day_by_day_camp">
                                               <div class="form-group row">
                                                 <div class="col-md-7 col-xs-7">
                                                     <h3 class="evnt_tl">Event Title:</h3>
                                                     <p>1 Day - RTO Seller URL</p>
                                                 </div>
                                                 <div class="col-md-5 col-xs-5">
                                                     <h3 class="sts">Status:</h3>
                                                     <span class="tags_active">Active</span>
                                                 </div>
                                               </div>
                                               <div class="form-group row">
                                                  <div class="col-md-4 col-xs-4">
                                                      <h3 class="evnt_tl">Target:</h3>
                                                      <p>Lead</p>
                                                  </div>
                                                  <div class="col-md-4 col-xs-4">
                                                      <h3 class="evnt_tl">Send Immediate:</h3>
                                                      <span class="tags_active">Yes</span>
                                                  </div>
                                                  <div class="col-md-4 col-xs-4">
                                                      <h3 class="evnt_tl">Event Priority:</h3>
                                                      <p>High</p>
                                                  </div>
                                               </div>
                                               <div class="camp_day">
                                                   <div class="form-group row box_shd">
                                                      <div class="col-md-12 col-xs-12">
                                                          <h3 class="evnt_tl"><i class="fas fa-comment"></i> 1 Day</h3>
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <div class="col-md-12 col-xs-12">
                                                          <p class="dsc">Would you consider selling your house 'rent to buy.' If you would, I an very interested. Please text or phone me. Thank you.</p>
                                                      </div>
                                                   </div>
                                               </div>
                                            </div>
                                            <div class="divider_box">
                                                <span class="divi_span"></span>
                                                <p class="divi_p"></p>
                                            </div>
                                            <!-- Day by Day Campaign Status Close -->
                                            <!-- Day By Day Campaign Status Start -->
                                            <div class="day_by_day_camp">
                                               <div class="form-group row">
                                                 <div class="col-md-7 col-xs-7">
                                                     <h3 class="evnt_tl">Event Title:</h3>
                                                     <p>4 Day - RTO Seller URL</p>
                                                 </div>
                                                 <div class="col-md-5 col-xs-5">
                                                     <h3 class="sts">Status:</h3>
                                                     <span class="tags_active">Active</span>
                                                 </div>
                                               </div>
                                               <div class="form-group row">
                                                  <div class="col-md-4 col-xs-4">
                                                      <h3 class="evnt_tl">Target:</h3>
                                                      <p>Lead</p>
                                                  </div>
                                                  <div class="col-md-4 col-xs-4">
                                                      <h3 class="evnt_tl">Send Immediate:</h3>
                                                      <span class="tags_dactv">No</span>
                                                  </div>
                                                  <div class="col-md-4 col-xs-4">
                                                      <h3 class="evnt_tl">Event Priority:</h3>
                                                      <p>High</p>
                                                  </div>
                                               </div>
                                               <!-- Loops Div start -->
                                               <div class="form-group row">
                                                  <div class="col-md-3 col-xs-6">
                                                      <h3 class="evnt_tl">Loops:</h3>
                                                      <p>0</p>
                                                  </div>
                                                  <div class="col-md-3 col-xs-6">
                                                      <h3 class="evnt_tl">Start Period:</h3>
                                                      <p>4</p>
                                                  </div>
                                                  <div class="col-md-2 col-xs-4">
                                                      <h3 class="evnt_tl">Stay Unit:</h3>
                                                      <p>Days</p>
                                                  </div>
                                                  <div class="col-md-2 col-xs-4">
                                                      <h3 class="evnt_tl">Start Time:</h3>
                                                      <p>08:00 AM</p>
                                                  </div>
                                                  <div class="col-md-2 col-xs-4">
                                                      <h3 class="evnt_tl">End Time:</h3>
                                                      <p>06:00 PM</p>
                                                  </div>
                                               </div>
                                               <!-- Loops Div close -->
                                               <div class="camp_day">
                                                   <div class="form-group row box_shd">
                                                      <div class="col-md-12 col-xs-12">
                                                          <h3 class="evnt_tl"><i class="fas fa-comment"></i> 4 Day</h3>
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <div class="col-md-12 col-xs-12">
                                                          <p class="dsc">Would you consider selling your house 'rent to buy.' If you would, I an very interested. Please text or phone me. Thank you.</p>
                                                      </div>
                                                   </div>
                                               </div>
                                            </div>
                                            <!-- Day by Day Campaign Status Close -->
                                            <div class="divider_box">
                                                <span class="divi_span"></span>
                                                <p class="divi_p"></p>
                                            </div>
                                            <!-- Day By Day Campaign Status Start -->
                                            <div class="day_by_day_camp">
                                               <div class="form-group row">
                                                 <div class="col-md-7 col-xs-7">
                                                     <h3 class="evnt_tl">Event Title:</h3>
                                                     <p>8 Day - RTO Seller URL</p>
                                                 </div>
                                                 <div class="col-md-5 col-xs-5">
                                                     <h3 class="sts">Status:</h3>
                                                     <span class="tags_active">Active</span>
                                                 </div>
                                               </div>
                                               <div class="form-group row">
                                                  <div class="col-md-4 col-xs-4">
                                                      <h3 class="evnt_tl">Target:</h3>
                                                      <p>Lead</p>
                                                  </div>
                                                  <div class="col-md-4 col-xs-4">
                                                      <h3 class="evnt_tl">Send Immediate:</h3>
                                                      <span class="tags_active">Yes</span>
                                                  </div>
                                                  <div class="col-md-4 col-xs-4">
                                                      <h3 class="evnt_tl">Event Priority:</h3>
                                                      <p>High</p>
                                                  </div>
                                               </div>
                                               <!-- Loops Div start -->
                                               <div class="form-group row">
                                                  <div class="col-md-3 col-xs-6">
                                                      <h3 class="evnt_tl">Loops:</h3>
                                                      <p>0</p>
                                                  </div>
                                                  <div class="col-md-3 col-xs-6">
                                                      <h3 class="evnt_tl">Start Period:</h3>
                                                      <p>8</p>
                                                  </div>
                                                  <div class="col-md-2 col-xs-4">
                                                      <h3 class="evnt_tl">Stay Unit:</h3>
                                                      <p>Days</p>
                                                  </div>
                                                  <div class="col-md-2 col-xs-4">
                                                      <h3 class="evnt_tl">Start Time:</h3>
                                                      <p>08:00 AM</p>
                                                  </div>
                                                  <div class="col-md-2 col-xs-4">
                                                      <h3 class="evnt_tl">End Time:</h3>
                                                      <p>06:00 PM</p>
                                                  </div>
                                               </div>
                                               <!-- Loops Div close -->
                                               <div class="camp_day">
                                                   <div class="form-group row box_shd">
                                                      <div class="col-md-12 col-xs-12">
                                                          <h3 class="evnt_tl"><i class="fas fa-comment"></i> 8 Day</h3>
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <div class="col-md-12 col-xs-12">
                                                          <p class="dsc">Would you consider selling your house 'rent to buy.' If you would, I an very interested. Please text or phone me. Thank you.</p>
                                                      </div>
                                                   </div>
                                               </div>
                                            </div>
                                            <!-- Day by Day Campaign Status Close -->
                                            <div class="divider_box">
                                                <span class="divi_span"></span>
                                                <p class="divi_p"></p>
                                            </div>
                                            <!-- Day By Day Campaign Status Start -->
                                            <div class="day_by_day_camp">
                                               <div class="form-group row">
                                                 <div class="col-md-7 col-xs-7">
                                                     <h3 class="evnt_tl">Event Title:</h3>
                                                     <p>15 Day - RTO Seller URL</p>
                                                 </div>
                                                 <div class="col-md-5 col-xs-5">
                                                     <h3 class="sts">Status:</h3>
                                                     <span class="tags_active">Active</span>
                                                 </div>
                                               </div>
                                               <div class="form-group row">
                                                  <div class="col-md-4 col-xs-4">
                                                      <h3 class="evnt_tl">Target:</h3>
                                                      <p>Lead</p>
                                                  </div>
                                                  <div class="col-md-4 col-xs-4">
                                                      <h3 class="evnt_tl">Send Immediate:</h3>
                                                      <span class="tags_active">Yes</span>
                                                  </div>
                                                  <div class="col-md-4 col-xs-4">
                                                      <h3 class="evnt_tl">Event Priority:</h3>
                                                      <p>High</p>
                                                  </div>
                                               </div>
                                               <!-- Loops Div start -->
                                               <div class="form-group row">
                                                  <div class="col-md-3 col-xs-6">
                                                      <h3 class="evnt_tl">Loops:</h3>
                                                      <p>0</p>
                                                  </div>
                                                  <div class="col-md-3 col-xs-6">
                                                      <h3 class="evnt_tl">Start Period:</h3>
                                                      <p>15</p>
                                                  </div>
                                                  <div class="col-md-2 col-xs-4">
                                                      <h3 class="evnt_tl">Stay Unit:</h3>
                                                      <p>Days</p>
                                                  </div>
                                                  <div class="col-md-2 col-xs-4">
                                                      <h3 class="evnt_tl">Start Time:</h3>
                                                      <p>08:00 AM</p>
                                                  </div>
                                                  <div class="col-md-2 col-xs-4">
                                                      <h3 class="evnt_tl">End Time:</h3>
                                                      <p>06:00 PM</p>
                                                  </div>
                                               </div>
                                               <!-- Loops Div close -->
                                               <div class="camp_day">
                                                   <div class="form-group row box_shd">
                                                      <div class="col-md-12 col-xs-12">
                                                          <h3 class="evnt_tl"><i class="fas fa-comment"></i> 15 Day</h3>
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <div class="col-md-12 col-xs-12">
                                                          <p class="dsc">Would you consider selling your house 'rent to buy.' If you would, I an very interested. Please text or phone me. Thank you.</p>
                                                      </div>
                                                   </div>
                                               </div>
                                            </div>
                                            <!-- Day by Day Campaign Status Close -->
                                            <div class="divider_box">
                                                <span class="divi_span"></span>
                                                <p class="divi_p"></p>
                                            </div>
                                            <!-- Day By Day Campaign Status Start -->
                                            <div class="day_by_day_camp">
                                               <div class="form-group row">
                                                 <div class="col-md-7 col-xs-7">
                                                     <h3 class="evnt_tl">Event Title:</h3>
                                                     <p>22 Day - RTO Seller URL</p>
                                                 </div>
                                                 <div class="col-md-5 col-xs-5">
                                                     <h3 class="sts">Status:</h3>
                                                     <span class="tags_active">Active</span>
                                                 </div>
                                               </div>
                                               <div class="form-group row">
                                                  <div class="col-md-4 col-xs-4">
                                                      <h3 class="evnt_tl">Target:</h3>
                                                      <p>Lead</p>
                                                  </div>
                                                  <div class="col-md-4 col-xs-4">
                                                      <h3 class="evnt_tl">Send Immediate:</h3>
                                                      <span class="tags_active">Yes</span>
                                                  </div>
                                                  <div class="col-md-4 col-xs-4">
                                                      <h3 class="evnt_tl">Event Priority:</h3>
                                                      <p>High</p>
                                                  </div>
                                               </div>
                                               <!-- Loops Div start -->
                                               <div class="form-group row">
                                                  <div class="col-md-3 col-xs-6">
                                                      <h3 class="evnt_tl">Loops:</h3>
                                                      <p>0</p>
                                                  </div>
                                                  <div class="col-md-3 col-xs-6">
                                                      <h3 class="evnt_tl">Start Period:</h3>
                                                      <p>22</p>
                                                  </div>
                                                  <div class="col-md-2 col-xs-4">
                                                      <h3 class="evnt_tl">Stay Unit:</h3>
                                                      <p>Days</p>
                                                  </div>
                                                  <div class="col-md-2 col-xs-4">
                                                      <h3 class="evnt_tl">Start Time:</h3>
                                                      <p>08:00 AM</p>
                                                  </div>
                                                  <div class="col-md-2 col-xs-4">
                                                      <h3 class="evnt_tl">End Time:</h3>
                                                      <p>06:00 PM</p>
                                                  </div>
                                               </div>
                                               <!-- Loops Div close -->
                                               <div class="camp_day">
                                                   <div class="form-group row box_shd">
                                                      <div class="col-md-12 col-xs-12">
                                                          <h3 class="evnt_tl"><i class="fas fa-comment"></i> 22 Day</h3>
                                                      </div>
                                                   </div>
                                                   <div class="form-group row">
                                                      <div class="col-md-12 col-xs-12">
                                                          <p class="dsc">Would you consider selling your house 'rent to buy.' If you would, I an very interested. Please text or phone me. Thank you. <a href="javascript:void(0);">Link Attached on your site.</a></p>
                                                      </div>
                                                   </div>
                                               </div>
                                            </div>
                                            <!-- Day by Day Campaign Status Close -->
                                        </div>
                                    </div>
                                    <input type="submit" name="save_progress" class="save_progress btn btn-sm btn-primary" value="Save progress" />
                                    <input type="button" name="next" class="next btn btn-sm btn-primary" value="Next" />
                                    <input type="button" name="previous" class="save previous btn btn-sm btn-outline-secondary" value="Previous" />
                                 </fieldset>
                                 <!-- Text And Voice Messages form Close -->
                                 <!-- Incoming Messages auto classifiacation form Start -->
                                 <fieldset id="incom_msg_fld">
                                    <div class="x_title d-flex align-items-center">
                                        <h3 class="h4">Incoming message auto classification</h3>
                                        <div class="clearfix"></div>
                                     </div>
                                    <div class="wizard">
                                        <div class="form-group row">
                                            <div class="col-md-5 col-sm-12">
                                                <label class="col-form-label label-align ">Key Value Areas</label>
                                                <select id="select_kva" class="form-control">
                                                    <option>Choose option</option>
                                                    <option>Customer Value</option>
                                                    <option>Product Quality</option>
                                                    <option>Product Delivery</option>
                                                    <option>Servant Leadership</option>
                                                </select>
                                            </div>
                                            <div class="col-md-5 col-sm-12">
                                                <label class="col-form-label label-align ">Key Performance Indicators</label>
                                                <div id="input">
                                                    <input type="text" class="form-control" value="Vacant Land" data-role="tagsinput"></input>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-12 pad-top-40">
                                                <a href="javascript:void(0);" class="save_inc"><i class="fas fa-plus"></i> Save</a>
                                                <a href="javascript:void(0);" class="clear_btn"><i class="fas fa-eraser"></i> Clear</a>
                                            </div>
                                        </div>
                                       <div class="form-group row">
                                            <table class="inc_table" style="width:100%;">
                                                <tr>
                                                    <th class="w_33">Followup Campaign</th>
                                                    <th class="w_33">Keywords</th>
                                                    <th class="w_33 text-right">Action</th>
                                                </tr>
                                                <tr>
                                                    <td valign="top">Yes/Maybe - Text Follow Up</td>
                                                    <td valign="top">
                                                        <div class="key_data">
                                                            Yes,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                                        </div>
                                                    </td>
                                                    <td valign="top" class="text-right">
                                                        <div class="btn-group">
                                                            <a href="javascript:void(0);" class="ti_pen">
                                                                <i class="ti-pencil-alt"></i>
                                                            </a>
                                                            <a href="javascript:void(0);" class="ti_close">
                                                                <i class="ti-close"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="top">No - Text Follow Up</td>
                                                    <td valign="top">
                                                        <div class="key_data">
                                                            No,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                                                        </div>
                                                    </td>
                                                    <td valign="top" class="text-right">
                                                        <div class="btn-group">
                                                            <a href="javascript:void(0);" class="ti_pen">
                                                                <i class="ti-pencil-alt"></i>
                                                            </a>
                                                            <a href="javascript:void(0);" class="ti_close">
                                                                <i class="ti-close"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                       </div>
                                       <div class="form-group row">
                                          <div class="col-md-3 col-sm-3">
                                             <input id="kpi_to" class="" required="required" type="text" style="display:none;">
                                          </div>
                                       </div>
                                    </div>
                                    <input type="submit" name="save_progress" class="save_progress btn btn-sm btn-primary" value="Save progress" />
                                    <input type="submit" name="next" class="next btn btn-sm btn-primary" value="Next" />
                                    <input type="submit" name="previous" class="save previous btn btn-sm btn-outline-secondary" value="Previous" />
                                 </fieldset>
                                 <!-- Incoming Messages auto classifiacation form close -->
                                 <!-- Active Campaign form Start -->
                                 <fieldset id="act_camp">
                                    <div class="x_title d-flex align-items-center">
                                        <h3 class="h4">Campaign Active</h3>
                                        <div class="clearfix"></div>
                                     </div>
                                    <div class="wizard">
                                       <div class="form-group row">
                                          <label class="col-form-label col-md-3 col-sm-3 label-align ">Sprint Length</label>
                                          <div class="col-md-3 col-sm-3 ">
                                             <select id="sprint_length" class="form-control form-control-sm">
                                                <option>Choose option</option>
                                                <option>One Week</option>
                                                <option>Two Weeks</option>
                                                <option>Three Weeks</option>
                                                <option>Four Weeks</option>
                                             </select>
                                          </div>
                                       </div>
                                       <br /><br />
                                       <div class="form-group-row">
                                          <div class="table-responsive">
                                             <table class="table col-sm-6 offset-sm-3">
                                                <thead>
                                                   <tr class="headings">
                                                      <th class="column-title">Sprint # </th>
                                                      <th class="column-title">End Date </th>
                                                      <th class="column-title">Forecast </th>
                                                      <th class="column-title">Actual </th>
                                                      <th class="column-title no-link last"><span class="nobr">Action</span>
                                                      </th>
                                                      <th class="bulk-actions" colspan="7">
                                                         <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                                      </th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                   <tr class="even pointer">
                                                      <th scope="row">1</th>
                                                      <td><input class="form-control form-control-sm" required="required" type="text" disabled placeholder="03/13/20"></td>
                                                      <td><input class="form-control form-control-sm" required="required" type="text" disabled placeholder="$1M"></td>
                                                      <td><input class="form-control form-control-sm" required="required" type="text" disabled placeholder="$1.3M"></td>
                                                      <td class=" last"><a href="#">Edit</a>
                                                      </td>
                                                   </tr>
                                                   <tr class="even pointer">
                                                      <th scope="row">1</th>
                                                      <td><input class="form-control form-control-sm" required="required" type="text" disabled placeholder="03/27/20"></td>
                                                      <td><input class="form-control form-control-sm" required="required" type="text" disabled placeholder="$1.1M"></td>
                                                      <td><input class="form-control form-control-sm" required="required" type="text" disabled placeholder="$1.3M"></td>
                                                      <td class=" last"><a href="#">Edit</a>
                                                      </td>
                                                   </tr>
                                                 </tbody>
                                             </table>
                                          </div>
                                       </div>
                                    </div>
                                    <input type="button" name="previous" class="previous btn btn-sm btn-outline-secondary" value="Previous" />
                                    <input type="button" name="submit" class="next btn btn-sm btn-primary" value="Submit" />
                                 </fieldset>
                                 <!-- Active Campaign form Close -->
                                </div>
                              </form>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>


               
               <!-- ============================================================== -->
            </div>
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
         </div>

@stop