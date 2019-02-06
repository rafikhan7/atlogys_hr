<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Atlogys Emailer</title>
    <style>
    
    .emailer-cover{text-align: center; font-family:sans-serif; }    
    .email-container{ background: #fff; width: 600px; display: inline-block; border: 2px solid #d4d4d4; padding: 20px; margin: 20px auto;  }
    .email-container h2{ color: #848484; margin:15 0; }
    .email-container .email-logo{ }
    .email-container .inner-container{ padding: 20px; background: #26a69a; color: #fff; } 
    .email-container .inner-container p{ text-align: left;   }
    .email-container .view-btn{ text-decoration: none; padding: 12px 20px; background: #fff; border-radius: 25px; color: #26a69a; display: inline-block; transition:ease 0.5s; border:2px solid transparent;  }
    .email-container .view-btn:hover{ background:#26a69a; color:#fff; border:2px solid #fff;  }    
    .email-container .hr-title{ font-weight:bold; }    
        
        
    </style>
  </head>
  <body>
   
      <div class="emailer-cover">
      <div class="email-container">
             <a href="#" class="email-logo"><img src="<?php echo $this->webroot;?>files/uploads/post/logo[1].png" alt="" /></a>
          
          <h2>Our People are our biggest asset</h2>
          
          <div class="inner-container">
              <p>Hi <?php echo $name; ?>,<br/><br/>
                
                 We have created your account on atlogys family site. now you can login and intract with us with below details:<br>
				User Name: <?php echo $username; ?><br/>
				Password:  <?php  echo $password; ?><br/><br/>
                 Thanks,<br/>
                 Pooja Nagpal<br/>
                 <span class="hr-title">HR Manager Atlogys</span>  
                  
              </p>
              
              <a href="<?php echo $url; ?>" class="view-btn">Login Account</a>
          </div>
          
        </div><!-- email-container ended -->
      </div><!-- emailer-cover ended -->  
      
   
  </body>
</html>