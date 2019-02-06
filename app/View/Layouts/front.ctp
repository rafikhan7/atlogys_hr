<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <style type="text/css">
 .error{
  color: #ff0000;
  }</style>
    <title>Atlogys Technical</title>
    <?php echo $this->Html->css('bootstrap.min'); ?>
    <?php echo $this->Html->css('style'); ?>
    <?php echo $this->Html->css('toastr'); ?>
    <?php echo $this->Html->script('jquery.min'); ?>
    <?php echo $this->Html->script('bootstrap.min'); ?>
    <?php echo $this->Html->script('custom'); ?>
    <?php echo $this->Html->script('toastr'); ?>
    <?php echo $this->Html->script('jquery.validate.min'); ?>
    <?php $userId =  $this->Session->read('Auth.User.id');
     $url =  $this->Html->url('/');
    if(!empty($userId)){
        header('Location: '.$url.'users/user_dashboard');
       exit;
  
    }
    ?>
<script>

jQuery(document).ready(function($) {
   $('#login').validate({
     rules: {
      username :{
             required: true
             },

      password :{
             required: true
             },
     },
     messages: {
      username :{

        required: "Please enter your Username."
      },

      password :{
        required: "Please enter your Password."
      },
    },
           });
   });
</script>        
  </head>
  <body>
      <div class="wrapper">
          <div class="black-layer">
              <div class="login-box" id="loginform" style ="display:block";>
                  
                  <h2>Welcome to Atlogys</h2>
                  <?php //echo $this->Session->flash('form1') ?>
                  <div class="error-msg">
                  <i class="fa fa-times-circle"></i>
                  <?php echo $this->Session->flash();?>
                </div>
                  
              <form  id="login" action="<?php echo Router::url(array('controller'=>'users', 'action'=>'login'))?>" method="post">
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                     <input type="email" class="form-control" id="username" name="username" placeholder="username"/>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="password"/>
                 
                 <input class="btn btn-primary" type="submit" value="Submit">
              <a href="<?php echo Router::url(array('controller'=>'users', 'action'=>'forget_password'))?>" id="show">Forgot Password?</a>
                </form>
              
  </div>
</div>
</div>
    <style>
 .error-msg{
        color: #FF0000 !important;
         font-family:FontAwesome;
            }
  label{
    font-weight:100;
  }
</style>       
       

  </body>
</html>

