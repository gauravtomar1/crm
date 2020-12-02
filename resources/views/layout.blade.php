<!DOCTYPE php>
<php lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- Tell the browser to be responsive to screen width -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">
	  <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- Favicon icon -->
      <link rel="icon" type="image/png" sizes="16x16" href="">
      <title>WBE CRM | Automation Template</title>
      <!-- This page CSS -->
      <!-- chartist CSS -->
	  <style>
	  table.data-table-contacts tbody td {
      word-break: break-word;
      vertical-align: top;
              }
			        table.data-table-users  tbody td {
      word-break: break-word;
      vertical-align: top;
              }
	  </style>
      <link href="{!!asset('public/dist/css/morris.css')!!}" rel="stylesheet">
      <link rel="stylesheet" href="{!!asset('public/dist/css/bootstrap-wysihtml5.css')!!}" />
      <link href="{!!asset('public/dist/css/fullcalendar.css')!!}" rel="stylesheet" />
      <link href="{!!asset('public/dist/css/style.min.css')!!}" rel="stylesheet">
      <link href="{!!asset('public/dist/css/custom.css')!!}" rel="stylesheet">
      <link href="{!!asset('public/dist/css/bootstrap-tagsinput.css')!!}" rel="stylesheet">
	  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
      <!-- <link href="dist/css/chosen.min.css" rel="stylesheet"> -->
      <!-- Dashboard 1 Page CSS -->
      <link href="{!!asset('public/dist/css/pages/dashboard1.css')!!}" rel="stylesheet">
      <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
      <!-- php5 Shim and Respond.js IE8 support of php5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/php5shiv/3.7.0/php5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
	  <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
	  <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	        <script src="{!!asset('public/dist/js/jquery-3.2.1.min.js')!!}"></script>
      <!-- Bootstrap popper Core JavaScript -->
      <script src="{!!asset('public/dist/js/popper.min.js')!!}"></script>
      <script src="{!!asset('public/dist/js/bootstrap.min.js')!!}"></script>
      <script src="{!!asset('public/dist/js/wysihtml5-0.3.0.js')!!}"></script>
      <script src="{!!asset('public/dist/js/bootstrap-wysihtml5.js')!!}"></script>
      <!-- slimscrollbar scrollbar JavaScript -->
      <script src="{!!asset('public/dist/js/perfect-scrollbar.jquery.min.js')!!}"></script>
	  
      <!--Wave Effects -->
      <script src="{!!asset('public/dist/js/waves.js')!!}"></script>
      <!--Menu sidebar -->
      <script src="{!!asset('public/dist/js/sidebarmenu.js')!!}"></script>
      <!--Custom JavaScript -->
      <script src="{!!asset('public/dist/js/custom.min.js')!!}"></script>
      <!-- ============================================================== -->
      <!-- This page plugins -->
      <!-- ============================================================== -->
      <!--morris JavaScript -->
      <script src="{!!asset('public/dist/js/raphael-min.js')!!}"></script>
      <script src="{!!asset('public/dist/js/morris.min.js')!!}"></script>
      <script src="{!!asset('public/dist/js/jquery.sparkline.min.js')!!}"></script>
      <!-- Chart JS -->
      <script src="{!!asset('public/dist/js/dashboard1.js')!!}"></script>
      <script src="{!!asset('public/dist/js/bootstrap-tagsinput.min.js')!!}"></script>
      <!-- <script src="../assets/chosen.jquery.min.js"></script> -->
      <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
      <script src="{!!asset('public/dist/js/jquery-ui.min.js')!!}"></script>
    <script src="{!!asset('public/dist/js/moment.js')!!}"></script>
      
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	 
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
   </head>
   <body class="skin-blue fixed-layout">
      <!-- ============================================================== -->
      <!-- Preloader - style you can find in spinners.css -->
      <!-- ============================================================== -->
      <div class="preloader">
         <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">WBE</p>
         </div>
      </div>
      
      <div id="main-wrapper">
         
         <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
               <!-- ============================================================== -->
               <!-- Logo -->
               <!-- ============================================================== -->
               <div class="navbar-header">
                  <a class="navbar-brand" href="index.php">
                     <!-- Logo icon -->
                     <b>
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <img src="{!!asset('public/dist/image/logo-icon.png')!!}" alt="homepage" class="dark-logo" />
                        <!-- Light Logo icon -->
                        <img src="{!!asset('public/dist/image/logo-light-icon.png')!!}" alt="homepage" class="light-logo" style="display:none;"/>
                     </b>
                     <!--End Logo icon -->
                     <!-- Logo text -->
                     <span>
                        <!-- dark Logo text -->
                        <img src="{!!asset('public/dist/image/logo-text.png')!!}" alt="homepage" class="dark-logo" />
                        <!-- Light Logo text -->   
                       <!--  <img src="../assets/images/imgpsh_fullsize_anim.png" class="light-logo" alt="homepage" style="width:100px; margin-left: 40px;" /> -->

                       <span class="text-center" style="font-size: 25px;"><b>WBE</b></span>
                     </span>
                  </a>
                  <!--<img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" /></span> </a>-->
               </div>
               <!-- ============================================================== -->
               <!-- End Logo -->
               <!-- ============================================================== -->
               <div class="navbar-collapse">
                  <!-- ============================================================== -->
                  <!-- toggle and nav items -->
                  <!-- ============================================================== -->
                  <ul class="navbar-nav mr-auto">
                     <!-- This is  -->
                     <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                     <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                     <!-- ============================================================== -->
                     <!-- Search -->
                     <!-- ============================================================== -->
                  </ul>
                  <!-- ============================================================== -->
                  <!-- User profile and search -->
                  <!-- ============================================================== -->
                  <ul class="navbar-nav my-lg-0">
                     
                     <!-- ============================================================== -->
                     <!-- User Profile -->
                     <!-- ============================================================== -->
                     <li class="nav-item dropdown u-pro">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{!!asset('public/dist/image/1.jpg')!!}" alt="user" class=""> <span class="hidden-md-down">{{ Session::get('user')}} &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                        <div class="dropdown-menu dropdown-menu-right animated flipInY">
                           <!-- text-->
                           <a href="/profile" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                           <!-- text-->
                           <div class="dropdown-divider"></div>
                           <!-- text-->
                           <a href="/logout" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                           <!-- text-->
                        </div>
                     </li>
                     <!-- ============================================================== -->
                     <!-- End User Profile -->
                     <!-- ============================================================== -->
                  </ul>
               </div>
            </nav>
         </header>
		          <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
               <!-- Sidebar navigation-->
               <nav class="sidebar-nav">
                  <ul id="sidebarnav">

                    <li> <a href="/users" aria-expanded="false"><i class="icon-home"></i><span class="hide-menu">Start Here</span></a></li>

                    <li> <a href="/incoming" aria-expanded="false"><i class="ti-email"></i><span class="hide-menu">Incoming</span></a></li>

                    <li> <a href="/script" aria-expanded="false"><i class="ti-layout-grid2"></i><span class="hide-menu">Scripts</span></a></li>

                    <li> <a href="/people-user" aria-expanded="false"><i class="icon-user"></i><span class="hide-menu">People</span></a></li>

                    
                    <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-address-card-o"></i><span class="hide-menu">Contact</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/contacts">Add Contact</a></li>
								<li><a href="/contacts-category">Category</a></li>
								<li><a href="{{ route('list.contact') }}">View Contacts</a></li>
								<li><a href="{{ route('list.group') }}">List Groups</a></li>
                            </ul>
                        </li>
                      
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-address-card"></i><span class="hide-menu">Campaign</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-address-card mr-2"></i><span class="hide-menu">Email</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="/email-create">Create</a></li>
                                        <li><a href="/campaign-info">View</a></li>
                                        <li><a href="/automation-template">Templates</a></li>
                                    </ul>
                                </li>
                                <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-address-card mr-2"></i><span class="hide-menu">Text</span></a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="/textSms-create">Create</a></li>
                                    </ul>
                                </li>
                                <li><a href="/broadcast">Broadcast</a></li>
                                <li><a href="/email-dial">Dial</a></li>
                                <li><a href="/campaignlist">Lists</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-user"></i><span class="hide-menu">Profile</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/log">Logs</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-bell"></i><span class="hide-menu">NotificationX</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/notificationx">All NotificationX</a></li>
                            </ul>
                        </li>
                        <li> <a href="/scraper-setting" aria-expanded="false"><i class="fas ti-settings"></i><span class="hide-menu">Scraper Setting</span></a></li>
                        <li> <a href="/response-rate" aria-expanded="false"><i class="fas ti-pie-chart"></i><span class="hide-menu">Responce Rate</span></a></li>
                     <li> <a href="/logout" aria-expanded="false"><i class="fa fa-sign-out"></i><span class="hide-menu">Logout</span></a></li>
                  </ul>
               </nav>
               <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
         </aside>
        
@yield('content')
<footer class="footer">
            © 2020 WBE ALL RIGHT RESERVED
         </footer>
         <!-- ============================================================== -->
         <!-- End footer -->

      <!-- ============================================================== -->
      <!-- End Wrapper -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- All Jquery -->
	  <script src="{!!asset('public/dist/js/fullcalendar.min.js')!!}"></script>
    <script src="{!!asset('public/dist/js/cal-init.js')!!}"></script>
      <!-- ============================================================== -->


      <script type="text/javascript">
        $(document).ready(function() {

        $('.textarea_editor').wysihtml5();


    });

         $(document).ready(function(){
         
         var current_fs, next_fs, previous_fs; //fieldsets
         var opacity;
         
         $(".next").click(function(){
         
         current_fs = $(this).parent();
         next_fs = $(this).parent().next();
         
         //Add Class Active
         $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");
         
         //show the next fieldset
         next_fs.show();
         //hide the current fieldset with style
         current_fs.animate({opacity: 0}, {
         step: function(now) {
         // for making fielset appear animation
         opacity = 1 - now;
         
         current_fs.css({
         'display': 'none',
         'position': 'relative'
         });
         next_fs.css({'opacity': opacity});
         },
         duration: 600
         });
         });
         
         $(".previous").click(function(){
         
         current_fs = $(this).parent();
         previous_fs = $(this).parent().prev();
         
         //Remove class active
         $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");
         
         //show the previous fieldset
         previous_fs.show();
         
         //hide the current fieldset with style
         current_fs.animate({opacity: 0}, {
         step: function(now) {
         // for making fielset appear animation
         opacity = 1 - now;
         
         current_fs.css({
         'display': 'none',
         'position': 'relative'
         });
         previous_fs.css({'opacity': opacity});
         },
         duration: 600
         });
         });
         
         $('.radio-group .radio').click(function(){
         $(this).parent().find('.radio').removeClass('selected');
         $(this).addClass('selected');
         });
         
         $(".submit").click(function(){
         return false;
         })

         $(".chosen-select").chosen({
          no_results_text: "Oops, nothing found!"
        })

        // $('#camp_info').click(function(){
        //     $('#camp_inf').show();
        //     $('#camp_info').addClass('active');
        //     $('#camp_filtrs, #text_voice_fld, #incom_msg_fld, #act_camp').hide();
        //     $('#camp_filter, #text_voice_msg, #incoming_msg, #active_camp').removeClass('active');
        // });
        // $('#camp_filter').click(function(){
        //     $('#camp_filtrs').show();
        //     $('#camp_filter').addClass('active');
        //     $('#camp_inf, #text_voice_fld, #incom_msg_fld, #act_camp').hide();
        //     $('#camp_info, #text_voice_msg, #incoming_msg, #active_camp').removeClass('active');
        // });
        // $('#text_voice_msg').click(function(){
        //     $('#text_voice_fld').show();
        //     $('#text_voice_msg').addClass('active');
        //     $('#camp_filtrs, #camp_inf, #incom_msg_fld, #act_camp').hide();
        //     $('#camp_info, #camp_filtrs, #incoming_msg, #active_camp').removeClass('active');
        // });
        // $('#incoming_msg').click(function(){
        //     $('#incom_msg_fld').show();
        //     $('#incoming_msg').addClass('active');
        //     $('#camp_filtrs, #text_voice_fld, #camp_inf, #act_camp').hide();
        //     $('#camp_info, #camp_filtrs, #text_voice_msg, #active_camp').removeClass('active');
        // });
        // $('#active_camp').click(function(){
        //     $('#act_camp').show();
        //     $('#active_camp').addClass('active');
        //     $('#camp_filtrs, #text_voice_fld, #incom_msg_fld, #act_camp').hide();
        //     $('#camp_info, #camp_filter, #text_voice_msg, #incoming_msg').removeClass('active');
        // });


         });
		 
      </script>
	  <script>
	  $(document).ready(function(){
         setInterval(function(){
          //  alert("hello");
           $.ajax({
              url: "/scheduleEmails",
              type: "GET",
              success: function(dataResult){
                //alert(dataResult); 
                 if(dataResult){
                 // alert(dataResult); 
               }else{
                  // alert("Check Code.")
               }
              }  
            });
         },3000);
        });
        
           $(document).ready(function(){
           setInterval(function(){
              $.ajax({
                 url: "/scheduleTexts",
                 type: "GET",
                 success: function(dataResults){
                /*    if(dataResult){  
                    // alert(dataResults);
                 }else{
                   //  alert("checkCode");
                 }*/
                 }     
              }); 
           },3000); 
        });
        
  </script>


