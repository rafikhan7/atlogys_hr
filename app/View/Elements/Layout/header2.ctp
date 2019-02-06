<!DOCTYPE html>
<!-- saved from url=(0084)http://themekit-v4.themekit.io/dist/themes/social-2/user-public-profile.html#profile -->
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">



  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Atlogys HR</title>
  <?php echo $this->Html->css('app'); ?>
  <?php echo $this->Html->css('toastr'); ?>
  <?php echo $this->Html->css('lightbox.min.css'); ?>
  <?php echo $this->Html->css('bootstrap.min'); ?>
  <?php echo $this->Html->css('daterangepicker'); ?>
  <?php echo $this->Html->css('perfect-scrollbar.min'); ?>
  <?php echo $this->Html->css('pignose.calendar.min'); ?>
  <?php echo $this->Html->css('calendar-style'); ?>    
  <?php echo $this->Html->css('all'); ?>
  <?php echo $this->Html->css('style'); ?>  
  <?php echo $this->Html->script('jquery.min'); ?>
  <?php echo $this->Html->script('toastr'); ?>
  <?php echo $this->Html->script('bootstrap.min'); ?>
  
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <?php echo $this->Html->script('moment-with-locales.min');?>
  <?php echo $this->Html->script('bootstrap-material-datetimepicker');?>
<style type="text/css">

.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}

</style>
<?php
    $link = $this->request->here;
    $link_array = explode('/', $link);
    $page = end($link_array);
    $view = $link_array[3];

?>
<?php  
$this->Session->read('Auth.User'); 
$userId =  $this->Session->read('Auth.User.id');
$userNme =  $this->Session->read('Auth.User.name');
$userProfile =  $this->Session->read('Auth.User.profile_image');
$visitorUserId = $user['User']['id'];
if(empty($userId)){
   return $this->redirect('/');
} ?>
    
    
<script src="https://use.fontawesome.com/6da00612c6.js"></script>
    
</head>

    <body class="breakpoint-1024">

        <!-- Wrapper required for sidebar transitions -->
        <!-- Fixed navbar -->
        <div class="navbar navbar-main navbar-primary navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="" data-effect="st-effect-1" data-toggle="sidebar-menu" class="toggle pull-left visible-xs"><i class="fa fa-ellipsis-v"></i></a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-nav">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="" data-toggle="sidebar-menu" data-effect="st-effect-1" class="toggle pull-right visible-xs"><i class="fa fa-comments"></i></a>
                    <a class="navbar-brand admin-logo" href="#"><img src="<?php echo $this->webroot.USER_IMAGE_PATH; ?>logo.png" class="main-logo" /></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="main-nav">
                    <ul class="nav navbar-nav">
                        <li><a href="">Atlogys Technical Consulting </a></li>
                    </ul>
              
                   
                  
                    <ul class="nav navbar-nav navbar-right">
                        
                          <?php $is_reporting_manager =  $user['User']['is_reporting_manager'];
                     if(!empty($is_reporting_manager)){?>
                        <li class="leave-icon-con">
                          <a href="<?php echo Router::url(array('controller'=>'users', 'action'=>'managerList'))?>">
                            <span class="header-notification">
                          <i class="fa fa-plane"></i><span>Team Leave</span>
                          <!-- <span class="notification-icon"></span> -->
                            </span>
                          </a>
                        </li><?php } ?>
                        
                       <!-- <li class="dropdown notification-con"> 
                        
                            <a href="#" class="dropdown-toggle"  data-toggle="dropdown" >
                                <span class="header-notification">
                            <i class="fa fa-bell-o" aria-hidden="true"></i> <span class="notification-icon">2</span></span></a>--> 
                            
                            
                            <ul class="dropdown-menu"  aria-labelledby=""> 
                               <?php foreach ($notification as  $value) { ?>                           
                                <li><a href="#">
                                      <img src="<?php echo $this->webroot.USER_IMAGE_PATH; ?><?php echo $value['minMap']['User']['profile_image'];?>" class="img-circle" />
                                    <p><strong>
                                 <?php echo $value['minMap']['User']['name'];?>
                                 </strong> <?php echo $value['Notification']['action_type'];?> 
                                 <strong><?php //$title =  $value['minMap']['Event']['post_title'];
                                     // echo  $title =  substr($title,0,25),'...';

                                      ?>
                                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.</strong></p>
                                    <span class="date"><?php //echo $value['minMap']['Post']['event_created'];?></span>
                                    </a></li>
                                    <?php }?>
                                 </ul> 
                            
                         </li>
                        
                        
                        <li class="dropdown user-con">
                            <a href="" class="dropdown-toggle user" data-toggle="dropdown" >
                <?php $profile_image = $user['User']['profile_image']; 
                      if (empty($profile_image)) {
                          ?>
                              <img src="<?php echo $this->webroot.USER_IMAGE_PATH; ?>profile.png" alt="people" class="img-circle">
                             <?php
                              } else {
                                  ?>
                              <img src="<?php echo $this->webroot.USER_IMAGE_PATH; ?><?php echo $profile_image; ?>" alt="people" class="img-circle">
                          <?php
                           } echo $userNme; ?> <span class="caret"></span>
              </a>
                            <ul class="dropdown-menu" role="menu">
                                  <li><a href="<?php echo Router::url(array('controller'=>'users', 'action'=>'user_dashboard'))?>"><i class="fa fa-user"></i> Dashboard</a></li>
                                  <?php $role = $user['User']['role'];
                                    if ($role == "admin") {?>
                                  <li><a href="<?php echo $this->Html->url('/admin');?>"><i class="fa fa-user"></i> HR Dashboard</a></li>
                                  <?php }?>
                                  <li><a href="<?php echo Router::url(array('controller'=>'users', 'action'=>'user_logout'))?>"><i class="fa fa-sign-out"></i> Logout</a></li>
                                <!-- <li><a href=""><i class="fa fa-envelope" aria-hidden="true"></i> Messages</a></li> -->
                            

                            </ul>
                        </li>
                        
                    </ul>

                </div>
    </div>
        </div>
        
                            <!-- Model ended here -->


        <div class="sidebar left sidebar-size-2 sidebar-offset-0 sidebar-visible-desktop sidebar-visible-mobile sidebar-skin-dark" id="sidebar-menu">
            <div  class="aside-inner" >
                <div class="sidebar-block">
                    <div class="profile">
                         <div class="profile-img-con">
                      <?php $profile_image = $user['User']['profile_image']; 
                      if (empty($profile_image)) {
                          ?>
                              <img src="<?php echo $this->webroot.USER_IMAGE_PATH; ?>profile.png" alt="people" class="img-circle">
                             <?php
                              } else {
                                  ?>
                              <img src="<?php echo $this->webroot.USER_IMAGE_PATH; ?><?php echo $profile_image; ?>" alt="people" class="img-circle">
                          <?php
                           }  if($view == "user_dashboard"){?>
                               <span><i class="fa fa-camera" aria-hidden="true"  data-toggle="modal" data-target="#uploadPhoto"></i></span> 
                             <?php } ?>
                              <!--<span><i class="fa fa-camera" aria-hidden="true"></i></span>-->
                              
                                        
                          
                         </div><!-- profile-img-con ended -->
                        <h4><?php    echo $user['User']['first_name']?> <?php echo $user['User']['last_name'] ?>  </h4>
                    </div>
                </div>
                <div class="category">About </div>
                <div class="sidebar-block">
                    <ul class="list-about clearfix">
                        <li>
                            <div><span class="title">Technology: </span>
                              <span class="title-values">  <?php echo $user['User']['department'] ?></span>
                        </li>
                        <li>
                            <div><span class="title" >Designation: </span>
                             <span class="title-values"><?php echo $user['User']['designation'] ?></span>
                            </div>
                        </li>
                        <li>
                            <div><span class="title" > Experience: </span>
                               <span class="title-values">
                                    <?php  $previusExp = $user['User']['experience'] ?>
                                    <?php  $joiningDate = $user['User']['joining_date'];
                                           $currentDate =  date("Y-m-d");
                                          $ts1 = strtotime($joiningDate);
                                          $ts2 = strtotime($currentDate);
   

                                        $year1 = date('Y', $ts1);
                                        $year2 = date('Y', $ts2);

                                        $month1 = date('m', $ts1);
                                        $month2 = date('m', $ts2);

                                         $months = (($year2 - $year1) * 12) + ($month2 - $month1);
                                          $years = $months/12;
                                         $totalExp = $previusExp + $years;
                                         echo number_format((float)$totalExp, 1, '.', '');
                                          ?> Year</span>
                                            </div>
                                        </li>
                                    </ul>
                               </div>
                               <?php if($visitorUserId == $userId){?>
                    <div class="category">Photos</div>
                    <div class="sidebar-block">
                        <div class="sidebar-photos">
                            <ul>
                                <?php $i = 1;
                                  foreach ($image as $key => $value) {
                                      ?>
                                      
                                    <li><a href="<?php echo $this->webroot.USER_IMAGE_PATH; ?><?php echo $value['Image']['image_name']; ?>" data-lightbox="image-1"><img src="<?php echo $this->webroot.USER_IMAGE_PATH; ?><?php echo $value['Image']['image_name']; ?>" alt="people"></a>

                                        <div id="myModal<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <img src="<?php echo $this->webroot.BANNER_IMAGE_PATH; ?><?php echo $value['Image']['image_name']; ?>" class="img-responsive">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <form action="<?php echo Router::url(array('controller'=>'images', 'action'=>'delete_images'))?>" method="post" enctype="multipart/form-data" class="photoForm">
                                        <input type="hidden" name="id" value="<?php echo $value['Image']['id']; ?>" >
                                         <button type="button" class="close" aria-label="Close" onclick = this.form.submit();>
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </form>

                                    </li>
                                    <?php $i++;
                                  }?>
                            </ul>
                            <div class="file_upload">
                                <form action="<?php echo Router::url(array('controller'=>'images', 'action'=>'upload_images'))?>" method="post" enctype="multipart/form-data">
                                
                                <span class="upload-con">
                                  <input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" />
                                </span><!-- upload-con ended! -->

                                <input class="btn btn-primary btn-xs disabled" id="sidePhotoUpload" type="submit" value="Upload!" />
                            </form>

                            </div><!-- file upload ended -->
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>

            <div class="chat-window-container"></div>

            <div class="st-pusher" id="content">

                <div class="st-content">

                    <div class="st-content-inner">

                        <nav class="navbar navbar-subnav navbar-static-top margin-bottom-none" role="navigation">
                            <div class="container-fluid">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#subnav" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="fa fa-ellipsis-h"></span>
                                    </button>
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->

                                <div class="collapse navbar-collapse" id="subnav" aria-expanded="false">
                                        <?php if($visitorUserId == $userId){?>
                                    <ul class="nav navbar-nav ">
                                        <li <?php if ($page=="user_dashboard") {
                                      ?> class="active"
                                            <?php
                                  } ?>><a href="<?php echo Router::url(array('controller'=>'users', 'action'=>'user_dashboard'))?>"><i class="fa fa-table" ></i> Timeline</a></li>
                                        <li <?php if ($page=="user_leave") {
                                      ?> class="active"
                                            <?php
                                  } ?>><a href="<?php echo Router::url(array('controller'=>'users', 'action'=>'user_leave'))?>"><i class="fa fa-plane"></i> Leaves</a></li>
                                       <!--  <li <?php if ($page=="user_post") {
                                      ?> class="active"
                                            <?php
                                  } ?>><a href="<?php echo Router::url(array('controller'=>'users', 'action'=>'user_post'))?>"><i class="fa fa-microphone"></i> Posts</a></li> -->
                                        <li <?php if ($page=="user_event") {
                                      ?> class="active"
                                            <?php
                                  } ?>><a href="<?php echo Router::url(array('controller'=>'users', 'action'=>'user_event'))?>"><i class="fa fa-calendar"></i> Event's</a></li>
                                    <!--     <li <?php if ($page=="user_birthday") {
                                      ?> class="active"
                                            <?php
                                  } ?>>
                                            <a href="<?php echo Router::url(array('controller'=>'users', 'action'=>'user_birthday'))?>"><i class="fa fa-gift" ></i> Birthday</a>
                                        </li> -->
                                    </ul>
                                    <ul class="nav navbar-nav hidden-xs navbar-right ">
                                       <!-- <li><a href="" class="chat-btn">Message <i class="fa fa-fw fa-comment-o"></i></a></li>-->
                                       
                                    </ul>
                                     <?php }?>
<!--
                                <div class="chat-cover">
                                        
                                        <span class="close-btn"><a href="#" class="close-chat">X</a></span>
                                        
                                        <ul class="chat-list">
                                            <li class="currentSelected">
                                                <a href="#">
                                                <img src="..//app/webroot/img/guy-1.jpg" class="img-circle" />
                                                <span class="chat-name">Yatendra Jain</span>
                                                <span class="chat-time"></span>    
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a href="#">
                                                <img src="..//app/webroot/img/guy-2.jpg" class="img-circle" />
                                                <span class="chat-name">Sumit Ranjan</span>
                                                 
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a href="#">
                                                <img src="..//app/webroot/img/guy-3.jpg" class="img-circle" />
                                                <span class="chat-name">Virendra Sharma</span>
                                                
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a href="#">
                                                <img src="..//app/webroot/img/guy-4.jpg" class="img-circle" />
                                                <span class="chat-name">Rahul Jain</span>
                                                
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a href="#">
                                                <img src="..//app/webroot/img/guy-5.jpg" class="img-circle" />
                                                <span class="chat-name">Krishn Nand</span>
                                               
                                                </a>
                                            </li>
                                            
                                             <li>
                                                <a href="#">
                                                <img src="..//app/webroot/img/guy-1.jpg" class="img-circle" />
                                                <span class="chat-name">Yatendra Jain</span>
                                                <span class="chat-time"></span>    
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a href="#">
                                                <img src="..//app/webroot/img/guy-2.jpg" class="img-circle" />
                                                <span class="chat-name">Sumit Ranjan</span>
                                                 
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a href="#">
                                                <img src="..//app/webroot/img/guy-3.jpg" class="img-circle" />
                                                <span class="chat-name">Virendra Sharma</span>
                                                
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a href="#">
                                                <img src="..//app/webroot/img/guy-4.jpg" class="img-circle" />
                                                <span class="chat-name">Rahul Jain</span>
                                                
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a href="#">
                                                <img src="..//app/webroot/img/guy-5.jpg" class="img-circle" />
                                                <span class="chat-name">Krishn Nand</span>
                                               
                                                </a>
                                            </li>
                                        </ul>
                                        
                                        <div class="chat-history-cover">
                                            <div class="user-chat active">
                                                
                                                <span class="title-bar">
                                                  Yatendra Jain
                                                    
                                                    <span class="close-chat-btn">X</span>
                                                </span>
                                                
                                                <div class="chat-history">
                                                    <span class="me">
                                                      <img src="/app/webroot/img/woman-3.jpg" alt="" class="user-chat-img img-circle">
                                                        <span>Hello Yatendra How are you !</span>
                                                    </span>
                                                   
                                                </div>
                                                
                                            </div>
                                        </div>  
                                        
                                    </div>
-->
                                    
                                </div>
                                <!-- /.navbar-collapse -->
                            </div>

                        </nav>
  <script src="http://demo.itsolutionstuff.com/plugin/croppie.js"></script>
  <link rel="stylesheet" href="http://demo.itsolutionstuff.com/plugin/croppie.css">
 <div class="modal fade " id="uploadPhoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog uploadeprofile" role="document">
                                <div class="modal-content">
                                  <div class="modal-header clearfix">
                                     <h5 class="modal-title" id="exampleModalLabel">Upload Your Profile Image</h5>

                                     <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                                     <span aria-hidden="true">×</span></button>

                                  </div>
                                  <div class="modal-body clearfix">
                                       <!--croper-->
                                <div class="container">
                                    <div class="panel panel-default">
                                      <div class="panel-heading">Image Upload</div>
                                      <div class="panel-body">

                                        <div class="row">
                                            <div class="col-md-4 text-center">
                                                <div id="upload-demo" style="width:350px"></div>
                                            </div>
                                            <div class="col-md-4" style="padding-top:30px;">
                                                <strong>Select Image:</strong>
                                                <br/>
                                                <input type="file" id="upload">
                                                <br/>
                                                <button class="btn btn-success disabled upload-result">Upload Image</button>
                                            </div>
                                            <div class="col-md-4" style="">
                                                <div id="upload-demo-i" style="background:#e1e1e1;width:300px;padding:30px;height:300px;margin-top:30px"></div>
                                                <div id="succes-profile">
                                                </div>
                                                
                                            </div>
                                        </div>
<!--croper end-->
                                          
                                      </div>
                                    </div>
                                </div>
                                 
                                  </div>
                                
                                </div>
                              </div>
                            </div>
<script type="text/javascript">
function refreshPage(){
    window.location.reload();
} 
$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 200,
        height: 200,
        type: 'circle'
    },
     showZoomer: false,
    enableResize: true,
    enableOrientation: true,
    mouseWheelZoom: 'ctrl',
    boundary: {
        width: 300,
        height: 300
    }
});

$('#upload').on('change', function () { 
	var reader = new FileReader();
    reader.onload = function (e) {
    	$uploadCrop.croppie('bind', {
    		url: e.target.result
    	}).then(function(){
    		console.log('jQuery bind complete');
    	});
    	
    }
    reader.readAsDataURL(this.files[0]);
});

$('.upload-result').on('click', function (ev) {
	$uploadCrop.croppie('result', {
		type: 'canvas',
		size: 'viewport'
	}).then(function (resp) {

		$.ajax({
			url: "<?php echo Router::Url(['controller' => 'users', 'action' => 'update_profileImage']);?>",  
			type: "POST",
			data: {"image":resp},
			success: function (data) {
				html = '<img src="' + resp + '" />';
				$("#upload-demo-i").html(html);
				$("#succes-profile").html('<div class="alert alert-success"><i class="fa fa-check"></i> Image hase been successfully uploaded!</div><button class="btn btn-success"  onClick="refreshPage()">Complete</button>');
			}
		});
	});
});

</script>
