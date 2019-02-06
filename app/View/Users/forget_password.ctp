<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atlogys Technical
    </title>
     <style type="text/css">
 .error{
  color: #ff0000;
  }</style>
    <?php echo $this->Html->css('bootstrap.min'); ?>
     
    <?php echo $this->Html->css('style'); ?>
    <?php echo $this->Html->css('toastr'); ?>
    <?php echo $this->Html->script('jquery.min'); ?>
    <?php echo $this->Html->script('bootstrap.min'); ?>
    <?php echo $this->Html->script('custom'); ?>
    <?php echo $this->Html->script('toastr'); ?>
    <?php echo $this->Html->script('jquery.validate.min'); ?>
<script>

jQuery(document).ready(function($) {
   $('#forget').validate({
     rules: {
      email :{
             required: true
             },
     },
     messages: {
      email :{

      required: "Please enter your Email."
      },
    },
           });
   });
</script>        
    <section class="content">
      <?php
if (!empty($errors)) {
    ?>
      <script type="text/javascript">
        toastr.options = {
          "timeOut": "5000",
          "positionClass": "toast-top-center"
        }
        Command: toastr["error"]("<?php echo $errors; ?>","Erorr")
      </script>
      <?php
}  ?>
      <?php
if (!empty($successmsg)) {
        ?>
      <script type="text/javascript">
        toastr.options = {
          "timeOut": "5000",
          "positionClass": "toast-top-center"
        }
        Command: toastr["success"]("<?php echo $successmsg; ?>","Success")
      </script>
<?php
    }  ?>
 
      </head>
    <body>
      <div class="wrapper">
        <div class="black-layer">
          <div class="login-box" id="loginform" style ="display:block";>
            <h2>Forget Password ?
            </h2>
            <form  id="forget" action="<?php echo Router::url(array('controller'=>'users', 'action'=>'forget_password'))?>" method="post">
              Please Enter Your user name or email here:-
              <input type="email" class="form-control"  name="email" placeholder="email"/>
              <button type="submit" class="btn btn-primary">Submit
              </button> 
              <a href="<?php echo Router::url('/', true);?>" id="hide">Login
              </a>
            </form>
          </div>
        </div>
      </div>
    </body>
    </html>
