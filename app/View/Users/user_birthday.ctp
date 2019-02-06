<?php
    $link = $this->request->here;
    $link_array = explode('/', $link);
     $page = end($link_array);
?>
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">
<?php if (!empty($_GET['msg'])) {
    ?>

    toastr.success('Your image has been succesfully uploaded !', 'Success Alert', {timeOut: 5000})
  setTimeout(function(){
       window.location.href =  window.location.href.split("?")[0]
    }, 5000);
  
        <?php
}?>
        
<?php if (!empty($_GET['sendmsg'])) {
    ?>

  toastr.success('Your massege has been succesfully send !', 'Success Alert', {timeOut: 5000})
  setTimeout(function(){
       window.location.href =  window.location.href.split("?")[0]
    }, 5000);
  
        <?php
}?></script>
                        
     <!-- <i class="fa fa-bookmark"></i> Birth day's -->
                                   <?php if(empty($birthdaydata)){ ?>
                                 <div class="inner-pages birthday-post container">
                                  <img src="<?php echo $this->webroot; ?>img/no-birthday.jpg" alt="image" >
                                      
                                 </div><!-- inner-pages ended -->

                                <?php }else {?>
                                   
                              
                               
                                 <div class="inner-pages birthday-post container">
                                    <?php  foreach ($birthdaydata as  $value) {
                                    # code...?>
                                       <h2>Happy Birhtday <?php echo $value['User']['name']; ?></h2>
                                       <span class="birthday-wish">One more year better, one more year greater. Happy birthday.</span>    
                                       
                                       <div class="birthday-photo">
                                        <img src="<?php echo $this->webroot; ?>files/uploads/users/<?php echo $value['User']['profile_image']; ?>" alt="image"  class="user-birthday">
                                        <img src="<?php echo $this->webroot; ?>img/birthday.png" alt="image" class="birthday-template" >
                                        

                                       </div>
                                         
                              <div class="comment-cover clearfix">
                                  
                                  <div class="comment-layer">
                                      <?php 
                                       
                                      foreach ($comments as  $value) {?>
                                      <div class="comment-box clearfix">
                                          
                                            <img src="<?php echo $this->webroot; ?>files/uploads/users/<?php echo $value['User']['profile_image']; ?>" alt="image" class="img-responsive img-circle" />
                                          
                                      <div class="comment">
                                          <p><strong><span><?php echo $value['User']['name']; ?></span> : </strong> <?php echo $value['Comment']['comments'];?></p>
                                     </div>
                                  </div><!-- comment-box ended -->

                                   
                                  <?php $BirhtdayUserCommentId = $value['Comment']['user_birthday_id'];
                                            $BirhtdayUserId = $value['Comment']['user_id'];
                                        
                                   if($BirhtdayUserCommentId == $BirhtdayUserId ){?> 


                                  </div><!-- comment layer ended-->

                                     <div class="comment-box reply clearfix">
                                    <img src="<?php echo $this->webroot; ?>files/uploads/users/<?php echo $value['User']['profile_image']; ?>" alt="image" class="img-responsive img-circle">
                                    <span><?php echo $value['User']['name']; ?></span>
                                     <div class="comment">
                                         <p><?php echo $value['Comment']['comments'];?></p>
                                     </div>
                                  </div><!-- comment-box ended -->
                            <?php  } }?>

                              
                              


                              </div>
                              <div class="write-comment">
                              <form action="<?php echo Router::url(array('controller'=>'users', 'action'=>'birthday_comments'))?>" method="post">
                                <div class="form-group clearfix share-post-con">
                                 <label for="">Enter Your Message:</label>
                                <textarea name="comments" id="searchInput" class="form-control" rows="3"></textarea>
                                  <input type="hidden" name="type" value="birthday">
                                  <input type="hidden" name="user_birthday_id" value="<?php echo $birthdayId; ?>">
                                    <input type='submit' name='submit' id='submitBtn' class='btn btn-primary enableOnInput' disabled='disabled' />
                                 </div>
                                             </form> 


                                       </div><!-- write-comment ended -->
  <?php } }?> 
                                 </div><!-- inner-pages ended -->
<script>
(function(){
  $('.dropdown').click(function(){ 
  $(this).addClass("open");
    });




})();
</script>
<script>
$(function () {
                $('#searchInput').keyup(function () {
                    if ($(this).val() == '') {
                        //Check to see if there is any text entered
                        // If there is no text within the input ten disable the button
                        $('.enableOnInput').prop('disabled', true);
                    } else {
                        //If there is text in the input, then enable the button
                        $('.enableOnInput').prop('disabled', false);
                    }
                });
            }); 

    </script>
<?php echo $this->Html->script('all'); ?>
<?php echo $this->Html->script('app'); ?>
<?php echo $this->Html->script('js'); ?>
                       
                       

                
