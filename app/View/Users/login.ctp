<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <title>Atlogys HR</title>
      

  <?php echo $this->Html->css('bootstrap.min'); ?>
  <?php echo $this->Html->css('style'); ?>
  <?php echo $this->Html->script('jquery.min'); ?>
  <?php echo $this->Html->script('bootstrap.min'); ?>
  <?php echo $this->Html->script('custom'); ?>
      <?php

  $erorrs = $this->Session->flash();
//if(!empty($successmsg)){
?>
      <script type="text/javascript">
        toastr.options = {
          "timeOut": "5000",
          "positionClass": "toast-top-center"
        }
        Command: toastr["erorr"]("<?php echo  $erorrs;?>","Welcome!")
      </script>
<?php //}  ?>
  </head>
  <body>
      <div class="wrapper">
          <div class="black-layer">
              <div class="login-box" id="loginform" style ="display:block";>
                  
                  <h2>Welcome to Atlogys</h2>
                  
              <form   action="<?php echo Router::url(array('controller'=>'users', 'action'=>'login'))?>" method="post">
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                     <input type="email" class="form-control"  name="data[User][username]" placeholder="username"/>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                  <input type="password" class="form-control" name="data[User][password]" placeholder="password"/>
                 
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <a href="<?php echo Router::url(array('controller'=>'users', 'action'=>'forget_password'))?>" id="show">Forgot Password?</a>
                </form>
              
  </div>
</div>
</div>
</body>
</html>

