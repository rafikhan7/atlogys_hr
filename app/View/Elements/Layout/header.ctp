<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Atlogys HR</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
  <!-- DataTables -->
  <?php echo $this->Html->css('ionicons.min'); ?>
  <?php //echo $this->Html->css('font-awesome.min'); ?>
  <?php echo $this->Html->css('bootstrap.min'); ?>
  <?php echo $this->Html->css('font-awesome.min'); ?>
  <?php echo $this->Html->css('ionicons.min'); ?>
  <?php echo $this->Html->script('jquery.min'); ?>
  <?php echo $this->Html->css('dataTables.bootstrap'); ?>
  <?php echo $this->Html->css('AdminLTE.min'); ?>
  <?php echo $this->Html->css('bootstrap.min'); ?>
  <?php echo $this->Html->css('_all-skins.min'); ?>
  <?php echo $this->Html->css('jquery.simple-dtpicker'); ?>
  <?php echo $this->Html->css('daterangepicker'); ?>
  <?php echo $this->Html->css('profile'); ?>
  <?php echo $this->Html->css('datepicker3'); ?>
  <?php echo $this->Html->css('bootstrap3-wysihtml5.min'); ?>
  <?php echo $this->Html->css('toastr'); ?>
  <?php echo $this->Html->css('lightbox.min.css'); ?>
  <?php echo $this->Html->css('perfect-scrollbar.min'); ?>
  <?php echo $this->Html->css('all'); ?>
  <?php echo $this->Html->css('style'); ?>  
  <?php echo $this->Html->css('bootstrap-datetimepicker.min'); ?>
  <?php echo $this->Html->css('bootstrap-material-datetimepicker'); ?>
  <?php echo $this->Html->css('bootstrap-datetimepicker-standalone'); ?>
  <?php echo $this->Html->script('jquery.min'); ?>
  <?php echo $this->Html->script('bootstrap.min'); ?>
  <?php echo $this->Html->script('bootstrap-datetimepicker.min');?>
  <?php echo $this->Html->script('customjs');?>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<?php echo $this->Html->script('moment-with-locales.min');?>
  <?php echo $this->Html->script('bootstrap-material-datetimepicker');?>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php $current_user = $this->Session->read('Auth.User');
?>

<header class="main-header">
    <!-- Logo -->
   <!--  <a href="index2.html" class="logo">
      
      <span class="logo-mini"><b>A</b>LT</span>
      logo for regular state and mobile devices
      <span class="logo-lg"><b>Atlogys</b>HR  <?php echo $this->request->here; ?></span>
    </a>
 -->
    <a class="navbar-brand admin-logo" href="#"><img src="<?php echo $this->webroot.USER_IMAGE_PATH; ?>logo.png" class="main-logo" /></a>



    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
     <!--  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a> -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu clearfix">
       <ul class="nav navbar-nav pull-left">
         <li><a href="#">Atlogys Technical Consulting </a></li>
       </ul>

        <ul class="nav navbar-nav pull-right">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs">Atlogys HR <span class="caret"></span></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <?php $ProfileImg = $current_user['profile_image']; if(empty($ProfileImg)){?>

               <img src="<?php echo $this->webroot; ?>files/uploads/users/profile.png" class="img-circle" alt="User Image">
             <?php }else{?>
                 <img src="<?php echo $this->webroot; ?>files/uploads/users/<?php echo $ProfileImg; ?>" class="img-circle" alt="User Image">
               <?php }?>
                <p>
                <?php echo $current_user['first_name'] ?>
                </p>
              </li>
             
              </li>
              <!-- Menu Footer-->
          <li class="user-footer">
                <span class="pull-left">
                  <a href="<?php echo $this->Html->url('/users/user_dashboard');?>" class="btn btn-default btn-flat">
                    Your Profile
                  </a>  
                </span>

                <span class="pull-right"><a href="<?php 
                   echo Router::url(array('controller'=>'users', 'action'=>'admin_logout'));?>" class="btn btn-default btn-flat">Sign out</a>
                </span>
              </li>
            
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>

    </nav>
  </header>
