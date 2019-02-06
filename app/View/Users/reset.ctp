<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atlogys Technical
    </title>
    <?php echo $this->Html->css('bootstrap.min'); ?>
    <?php echo $this->Html->css('style'); ?>
    <?php echo $this->Html->css('toastr'); ?>
    <?php echo $this->Html->script('jquery.min'); ?>
    <?php echo $this->Html->script('bootstrap.min'); ?>
    <?php echo $this->Html->script('custom'); ?>
    <?php echo $this->Html->script('toastr'); ?>
    <?php echo $this->Html->script('jquery.min'); ?>
    <?php echo $this->Html->script('jquery.validate.min'); ?>

     <?php
    if(!empty($errors)){
    ?>
      <script type="text/javascript">
        toastr.options = {
          "timeOut": "5000",
          "positionClass": "toast-top-center"
        }
        Command: toastr["error"]("<?php echo $errors; ?>","Erorr")
      </script>
      <?php }  ?>
            <?php
      if(!empty($successmsg)){
      ?>
      <script type="text/javascript">
        toastr.options = {
          "timeOut": "5000",
          "positionClass": "toast-top-center"
        }
        Command: toastr["success"]("<?php echo $successmsg; ?>","Success")
      </script>
<?php }  ?>
    <?php
    $link = $this->request->here;
    $link_array = explode('/',$link);
    $id = end($link_array);

    ?>
<section class="content">
      </head>
    <body>
      <div class="wrapper">
        <div class="black-layer">
          <div class="login-box" id="loginform" style ="display:block";>
            <h2>Forget Password?
            </h2>
            <form id="reset" action="<?php echo Router::url(array('controller'=>'users', 'action'=>'reset'))?>" method="post">
              Please Enter Your New Password Here:-
              <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
              <input type="password" id="password" class="form-control"  name="password" placeholder="Password"/>
               </div><div class="form-group">
               <label for="exampleInputEmail1">Confirm Password</label>
               <input type="password" class="form-control"  name="confirm_password" id="confirm_password" placeholder="Confirm Password"/>
               <input type="hidden" class="form-control"  name="id" value="<?php $id; ?>"/>
              <button type="submit" class="btn btn-primary">Submit
              </button> 
              <a href="<?php echo Router::url(array('controller'=>'users', 'action'=>'Login'))?>" id="hide">Login
              </a>
            </form>
          </div>
        </div>
      </div>

    </body>
    <script>
jQuery(document).ready(function($) {
   $('#rest').validate({
     rules: {
      password :{
             required: true
             },

      confirm_password :{
             required: true
             },
     },
     messages: {
      password :{

        required: "Please enter your new password."
      },

      confirm_password :{
        required: "Please enter your confirm password"
      },
       },
           });


   });
</script>
    </html>
