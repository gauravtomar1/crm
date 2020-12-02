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
                     <h4 class="text-themecolor"><strong><i class="fas fa-bell notification"></i> NotificationX</strong></h4>
                     <a href="javascript:void(0);" class="btn btn-primary ml-3">+ Add New</a>
                  </div>
                  <div class="col-md-7 align-self-center text-right">
                     <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
                        </ol>
                     </div>
                  </div>
               </div>
               <!-- Page Title Close -->
                  <div class="row mar_bot_20">
                     <div class="col-md-12 col-xs-12">
                        <span class="all_noti">All (1)</span>
                        <span class="enable_noti">Enabled (1)</span>
                     </div>
                  </div>
                  <!-- Notification table start -->
                  <div class="row mar_bot_20">
                     <div class="col-md-12 col-xs-12 notify_table">
                        <table>
                          <thead>
                            <tr>
                              <th>NotificationX Title</th>
                              <th>Preview</th>
                              <th>Status</th>
                              <th>Type</th>
                              <th>Stats</th>
                              <th>Date</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td data-column="NotificationX Title">
                                 <p class="tb_title"><a href="javascript:void(0);">Tutor LMS</a></p>
                                 <a href="" class="edit_txt"><i class="fas fa-edit"></i> Edit</a>
                                 <a href="" class="copy"><i class="far fa-copy"></i> Duplicate</a>
                                 <a href="" class="sortcode"><i class="fas fa-code"></i> Shortcode</a>
                                 <a href="" class="trash"><i class="fas fa-trash-alt"></i> Trash</a>
                              </td>
                              <td data-column="Preview">
                                 <div class="preview_tmp">
                                    <div class="row prv_box">
                                       <i class="fas fa-code-branch tmp_icon"></i>
                                       <div class="col-md-2 col-xs-4 pad_0">
                                          <img src="../assets/images/users/1.jpg" alt="user" class="prv_box_img">
                                       </div>
                                       <div class="col-md-10 col-xs-8 pad_t_2">
                                          <h3 class="titl_prv">Jonh deo Los Angeles</h3>
                                          <span class="tb_publsd">Published:</span>
                                          <span class="publ_tag">demo</span>
                                          <span class="publ_tag">demo1</span>
                                          <span class="publ_tag">demo2</span>
                                          <p class="tb_publsd">Demo</p>
                                       </div>
                                    </div>
                                 </div>
                              </td>
                              <td data-column="Status">
                                 <p class="mar_0"><span id="enabled">Enabled</span></p>
                                 <div class="checkbox switcher">
                                    <label for="test">
                                      <input type="checkbox" id="test" value="" checked="">
                                      <span><small></small></span>
                                    </label>
                                  </div>
                              </td>
                              <td data-column="Type">
                                 Sale <br>Notification
                              </td>
                              <td data-column="Stats"><a href="javascript:void(0);">12 views</a></td>
                              <td data-column="Date">Published <br>2019/10/02</td>
                            </tr>
                          </tbody>
                        </table>
                     </div>
                  </div>
                  <!-- Notification table Close -->
               <!-- ============================================================== -->
            </div>
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
         </div>

       @stop