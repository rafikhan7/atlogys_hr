<?php
     
    $link = $this->request->here;
    $link_array = explode('/', $link);
    $page = end($link_array);

?>
<script type="text/javascript">
<?php if (!empty($_GET['msg'])) {
    ?>

  toastr.success('Your image has been succesfully uploaded !', 'Success Alert', {timeOut: 50000})
  setTimeout(function(){
       window.location.href =  window.location.href.split("?")[0]
    }, 5000);
  
        <?php
}?>
        
<?php if (!empty($_GET['sendmsg'])) {
    ?>

  toastr.success('Your massege has been succesfully send !', 'Success Alert', {timeOut: 50000})
  setTimeout(function(){
       window.location.href =  window.location.href.split("?")[0]
    }, 5000);
  
        <?php
}?>
<?php if (!empty($_GET['error'])) {
    ?>

  toastr.error('Please select required field', 'Error Alert', {timeOut: 50000})
  setTimeout(function(){
       window.location.href =  window.location.href.split("?")[0]
    }, 5000);
  
        <?php
}


?>
 </script>
 <?php $banner_image = $user['User']['banner_image'];?>
               <!--          <div class="cover overlay cover-image-full height-300-lg" style="background:url(<?php echo $this->webroot.BANNER_IMAGE_PATH; ?><?php echo $banner_image; ?>); background-size:cover;">
                             
                             <div class="toast-model">
                               <div class="icon-con">
                                   <i class="fa fa-smile-o" aria-hidden="true"></i>
                               </div>
                                  <div class="msg-con">
                                    <h3>Welcome</h3>
                                    <p>To Your Atlogys HR Dashboard !</p>
                                  </div>
                             </div>
                             <?php 
                            if (empty($banner_image)) {
                                ?>
                              <img src="<?php echo $this->webroot.BANNER_IMAGE_PATH; ?>default_banner.jpg" alt="cover">
                            <?php
                            }?>
                            <div class="overlay overlay-full">
                                <div class="v-top">

                                    <p class="btn btn-cover" onclick="myFunction()"><i class="fa fa-fw fa-edit"></i></p>
                                    <div id="panel" class="banner_upload" >
                                        <form action="<?php echo Router::url(array('controller'=>'users', 'action'=>'user_update'))?>" method="Post" enctype="multipart/form-data">
                                            <input type="file" id="banner_image" name="banner_image">
                                            <br>
                                            <input type="hidden" name="id" value="<?php echo $user['User']['id'] ?>">
                                            <input class="btn btn-primary btn-xs" type="submit" value="Upload">
                                        <p class="btn btn-cover" onclick="yourFunction()"><i class="fa fa-times" aria-hidden="true"></i></p>

                                        </form>
                                    </div>

                                    <script>
                                        function myFunction() {
                                            document.getElementById("panel").style.display = "block";
                                        }

                                        function yourFunction() {
                                            document.getElementById("panel").style.display = "none";
                                        }
                                    </script>
                                </div>
                            </div>
                        </div> 
 -->

                        <div class="container-fluid">
   
                        <div id="calendarCover" >

                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                    <ul class="list-inline color-container">
                                        <li><span class="color-box"></span> Event</li>
                                        <li><span class="color-box"></span> Leave</li>
                                        <li><span class="color-box"></span> Official Holiday</li>
                                        <li><span class="color-box"></span> Holiday</li>
                                        <li><span class="color-box"></span> Current Date</li>
                                        <li><span class="color-box"></span> Employee Leave Info</li>
                                    </ul>
                                </div>
                                
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div id="basic" class="article">
                                        <div class="calendar-1"></div>
                                    </div>
                                    <!-- basic ended -->
                                </div><!-- col-md-12 ended -->
                                
                                
                          
                            </div><!-- row ended -->

                        </div><!-- calendar-cover ended -->
                            
                        <div class="panel panel-default share">
                                <div class="input-group share-post-con">
                                    <form id="hrmsg" action="<?php echo Router::url(array('controller'=>'masseges', 'action'=>'add_masseges'))?>" method="post">
                                       <textarea name="massege" id='searchInput' class="form-control share-text" placeholder="Write message..."></textarea></br>
                <input type='submit' name='submit' id='submitBtn' class='btn btn-primary enableOnInput' disabled='disabled' />
                                </div>
                                </form>
                            </div>
                            
                        <div class="tabbable share">
                                <ul class="nav nav-tabs" tabindex="0" style="overflow: hidden; outline: none;">
                                  
                                    <li class="active"><a href="" data-toggle="tab" aria-expanded="true"><i class="fa fa-fw fa-folder"></i>About</a></li>
                                      
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade" id="home">
                                     <textarea name="massege" class="form-control share-text" placeholder="Write message..."><?php echo $user['User']['about_text'] ?></textarea>

                                    </div>
                                    <div class="tab-pane fade active in" id="profile">
                                        <p>
                                            <?php echo $user['User']['about_text'] ?>
                                        </p>
                                    </div>
                                    <div class="tab-pane fade" id="dropdown1">
                                        <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
                                    </div>
                                    <div class="tab-pane fade" id="dropdown2">
                                        <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
                                    </div>
                                </div>
                            </div>
                            
                        <div id="useredit" class="modal " role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Your Personal Information</h4>
      </div>
      <div class="modal-body">
         <!--  <form role="form" action="<?php echo Router::url(array('controller'=>'users', 'action'=>'user_info_edit'))?>" method="post">
                     <div class="box-body dashboard-form clearfix">
                        <?php 
                     foreach ($user as $key => $value) {
                         ?>
                        <div class="form-group user-registration
                           ">
                           <label for="exampleInputEmail1">About Your Self</label>
                          <textarea class="form-control" id="address"
                              name="address" placeholder="Enter Current Address"rows="4" cols="30">
                               <?php echo $value['about_text']; ?>
                              </textarea>
                        </div>
                         <input type="hidden" class="form-control" id="username"
                              name="id" value="<?php echo $value['id']?>" placeholder="Enter First Name">
                        <div class="form-group user-registration col-md-6">
                           <label for="exampleInputEmail1">First Name</label>
                           <input type="text" class="form-control" id="first_name"
                              name="first_name" value="<?php echo $value['first_name']; ?>" placeholder="Enter First Name">
                        </div>
                        <div class="form-group user-registration col-md-6">
                           <label for="exampleInputEmail1">Last Name</label>
                           <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $value['last_name']; ?>" placeholder="Enter Last Name">
                        </div>
                        <div class="form-group user-registration col-md-6">
                           <label for="exampleInputEmail1">Desginatiom</label>
                           <input type="text" class="form-control" id="designation" name="designation" value="<?php echo $value['designation']; ?>" placeholder="Enter Designation">
                        </div>
                        <div class="form-group user-registration col-md-6">
                           <label for="exampleInputEmail1">Department</label>
                           <input type="text" class="form-control" id="department" name="department" value="<?php echo $value['department']; ?>" placeholder="Enter Designation">
                        </div>
                        <div class="form-group user-registration col-md-6">
                           <label for="exampleInputEmail1">D.O.B.</label>
                           <input type="date" class="form-control" id="date" name="date_of_birth"  format="yyyy-MM-dd" value="<?php echo $value['date_of_birth']; ?>" placeholder="Enter Designation">
                        </div>
                          <div class="form-group user-registration col-md-6">
                           <label for="exampleInputEmail1">Phone Number</label>
                           <input type="tel" class="form-control " id="phone_number"
                              name="phone_number" value="<?php echo $value['phone_number']; ?>" placeholder="Enter Phone Number">
                        </div>
                        <div class="form-group user-registration col-md-6">
                           <label for="exampleInputEmail1">Address</label>
                             <textarea class="form-control text-left" id="address"
                              name="address" placeholder="Enter Current Address"rows="4" cols="30">
                               <?php echo $value['address']; ?>
                              </textarea>
                        </div>
                        <div class="form-group user-registration col-md-6">
                           <label for="exampleInputEmail1">Permanent Address</label>
                              <textarea class="form-control text-left" id="per_address"
                              name="per_address"  placeholder="Enter Permanent Address"rows="4" cols="30">
                            <?php echo $value['per_address']; ?>
                              </textarea>
                        </div>
                       
                        <div class="form-group user-registration">
                            <input type="hidden" class="form-control" id="UserRole" name="data[user][role]" value="user" placeholder="Enter role">
                        </div>
                          
                     </div>
                      <?php } ?>

                     <div class="box-footer">
                        <input class="btn btn-primary" type="submit" value="Submit" disabled>
                      
                     </div>
                  </form> -->

         <div class="well">
            <h2>Please contact to HR for edit details.</h2>
         </div>

      </div>
      
    </div>

  </div>
</div>

                  <div class="row share">
                                <div class="col-md-6 ">
                                    <div class="panel panel-default height-365">
                                        <div class="panel-heading panel-heading-gray clearfix">
                                           <!-- <i class="fa fa-pencil btn btn-white btn-xs pull-right" data-toggle="modal" data-target="#useredit"></i> -->
                                            <i class="fa fa-fw fa-info-circle"></i> About
                                        </div>
                                        <div class="panel-body">
                                            <ul class="list-unstyled profile-about margin-none">
                                                <li class="padding-v-5">
                                                    <div class="row">
                                                        <div class="col-sm-4"><span class="text-muted">Date of Birth</span></div>
                                                        <div class="col-sm-8">
                                                            <?php 
                        echo date('d M', strtotime($user['User']['date_of_birth']));
                             ?>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="padding-v-5">
                                                    <div class="row">
                                                        <div class="col-sm-4"><span class="text-muted">Designaton</span></div>
                                                        <div class="col-sm-8">
                                                            <?php echo $user['User']['designation'] ?>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="padding-v-5">
                                                    <div class="row">
                                                        <div class="col-sm-4"><span class="text-muted">Department</span></div>
                                                        <div class="col-sm-8">
                                                            <?php  echo $user['User']['department'] ?>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="padding-v-5">
                                                    <div class="row">
                                                        <div class="col-sm-4"><span class="text-muted">Lives in</span></div>
                                                        <div class="col-sm-8">
                                                            <?php echo $user['User']['address'] ?>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="padding-v-5">
                                                    <div class="row">
                                                        <div class="col-sm-4"><span class="text-muted">Permanent Address</span></div>
                                                        <div class="col-sm-8">
                                                            <?php echo $user['User']['per_address'] ?>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="padding-v-5">
                                                    <div class="row">
                                                        <div class="col-sm-4"><span class="text-muted">Contact No</span></div>
                                                        <div class="col-sm-8">
                                                            <?php echo $user['User']['phone_number'] ?>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="panel panel-default height-365">
                                        <div class="panel-heading panel-heading-gray">

                                            <i class="fa fa-users"></i> Friends
                                        </div>
                                        <div class="panel-body">

                                            <ul class="img-grid">
                                                <?php
                                                foreach ($friend as  $value) {
                                                    $id = $value['User']['id'];
                                                    $current_id = AuthComponent::user('id');
                                                    $friend_img = $value['User']['profile_image'];
                                                    if ($id != $current_id) {
                                                        ?>
                                                    <li>

                                                        <a href="<?php echo Router::url(array('controller'=>'users', 'action'=>'user_view'))."/".$id?>">
                         <div class="img-con"> 
                              <img src="<?php echo $this->webroot.USER_IMAGE_PATH; ?><?php
                              if(!empty($friend_img)){ echo $friend_img;}else{ echo 'profile.png';}?>" class="img-responsive" alt="image">  
                         </div><!-- img-con ended -->
                         <br/>
                          <span class="name-title"><?php echo $value['User']['name']; ?></span>

                        </a>
                                                    </li>
                                                    <?php } }?>

                                            </ul>
                            <div class="col-md-12 text-center">
                            <a class="btn btn-primary" data-toggle="modal" data-target="#myModal" >View More</a>

                                                                      
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header clearfix">
                                    <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body clearfix">
                                    <ul class="img-grid">
                                                <?php 
                                                $i=0;
                                                foreach ($friend as  $value) { 
                                                    $id = $value['User']['id'];
                                                     $friend_img = $value['User']['profile_image'];
                                                    $current_id = AuthComponent::user('id');
                                                    if ($id != $current_id) {
                                                        ?>
                          <li>
                            <a href="<?php echo Router::url(array('controller'=>'users', 'action'=>'user_view'))."/".$id?>">
                          <img src="<?php echo $this->webroot.USER_IMAGE_PATH; ?><?php
                              if(!empty($friend_img)){ echo $friend_img;}else{ echo 'profile.png';}?>" class="img-responsive" alt="image">
                          <br/>
                          <span class="name-title"><?php echo $value['User']['name']; ?></span>

                        </a>
                                                    </li>
                                                    <?php
                                                    }
                                                }?>

                                            </ul>
                                  </div>
                                  <div class="modal-footer clearfix">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                           
                <!--         <div class="panel panel-default dashboard-panel">
                                <div class="panel-heading panel-heading-gray clearfix">
                                     <i class="fa fa-bookmark"></i> Latest Post
                                    <div class="pull-right">
                                        <button type="button" id="close" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal-info">Add New Post <i class="fa fa-plus"></i>
                                        </button>
                                        <div class="modal modal-info fade post-upload" id="modal-info">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title">New Post</h4>
                                                    </div>
                                                    <div class="box box-primary">
                                                        
                                                        
                              <form role="form" id="postadd" action="<?php //echo Router::url(array('controller'=>'users', 'action'=>'user_publishPost'))?>" method="post" enctype="multipart/form-data">
                                <div class="box-body">

                                    <div class="user-registration'">
                                        <label for="exampleInputEmail1">Post Title</label>
                                        <input type="text" class="form-control" id="post_title" name="post_title" placeholder="Enter Post Title">
                                    </div>
                                    <div class="user-registration">
                                        <label for="exampleInputEmail1"></label>
                                        <div class="box">
                                          
                                           
                                            <div class="box-body pad">
                                               
                                                    <textarea name="post_description" id="post_description" class="form-control textarea" placeholder="Place some text here"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="user-registration">
                                       <label for="exampleInputEmail1">Post Image</label>
                                       <input  id="post_image" name="post_image"  class="form-control" type="file">
                                    </div><br/>
                                
                                    <div class="box-footer">
                                        <input class="btn btn-primary" type="submit" value="Submit">
                    </div>
                            </form>


                                                        </div>
                                                     
                                                    </div>
                                                </div>
                                               
                                            </div>

                                        </div>

                                    </div>
                                  
                                </div> -->

                        <!-- <div class="panel-body share">
                                    <div class="row">
                                        <?php 
                                        $i=0;
                                         foreach ($post as  $value) {
                                          $post_id = $value['Post']['id'];
                                                    ?>

                                            <div class="col-md-4">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">                                                      
                                                        
                                                <h2>
                                                    <a href="" class="">
                                                        <?php $post_description = $value['Post']['post_title']; 
                                                              echo substr($post_description,0,50);
                                                               if(strlen($post_description)>50){
                                                                  echo "...";
                                                        }?>
                                                    </a>
                                                </h2>
                                                        <div class="text-muted">
                                                            <small><i class="fa fa-calendar"></i> <?php $postDate = $value['Post']['created']; 
                                                               $postDate = explode(' ', $postDate);
                                                               echo $postDate = $postDate['0'];
                                                              //   $date = strtotime($postDate); 
                                                              // echo date('M-Y', $date); ?></small>
                                                        </div>
                                                    </div>
                          <?php $postImage =  $value['Post']['post_image']; if(!empty($postImage)){ ?>
                        <img src="<?php echo $this->webroot.POST_IMAGE_PATH;?><?php echo $postImage; ?>" alt="image" class="img-responsive dashboard-post-img">
                        <?php }else{?>
                          <img src="<?php echo $this->webroot.POST_IMAGE_PATH;?>blog-img-1.jpg" alt="image" class="img-responsive dashboard-post-img">

                        <?php } ?>
                                                    <div class="panel-body">
                                                        <p>
                                                            <?php 
                                                            $description =  $value['Post']['post_description'];;
                                                           //echo  $description =  substr($description,0,100),'...';
?>
                                                        </p>
                                                        <div class="clearfix">
                                                            <div class="pull-left">
                                                                <ul class="list-inline">
                                                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                                                </ul>
 </div>
                                                            
                   <div class="pull-right">
                                        <a href="<?php //echo Router::url(array('controller'=>'Posts', 'action'=>'post_detail'))."/".$post_id?>" class="btn btn-primary custom-btn ">Read More</a>
                                                            </div>
                                                          </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <?php
                                              if(++$i > 3) break;
                                                } ?>
                                    </div>
                                </div> -->

                        <div class="panel panel-default dashboard-event">
                            <div class="panel-heading panel-heading-gray clearfix">
                                <i class="fa fa-bookmark"></i> Upcoming Events
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <?php 
                                    $i=0;

                                    foreach ($events as  $value) {
                                                    ?>

                                        <div class="col-md-4">
                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    
                                                    <h2><a href="#" class="">
                                                         <?php $event_description = $value['Event']['event_title']; 
                                                              echo substr($event_description,0,50);
                                                               if(strlen($event_description)>50){
                                                                  echo "...";
                                                        }?>
                                                        </a></h2>
                                                </div>
                                              
                                                  <?php $imageEvent = $value['Event']['event_image'];
                                                  if(!empty($imageEvent)){?>
                        <img src="<?php echo $this->webroot.EVENT_IMAGE_PATH; ?><?php echo $value['Event']['event_image'];  ?>" alt="image" class="img-responsive dashboard-post-img">
                        <?php }else{?>
                        <img src="<?php echo $this->webroot.POST_IMAGE_PATH;?>blog-img-1.jpg" alt="image" class="img-responsive dashboard-post-img">

                        <?php } ?>
                     
                                                <ul class="icon-list icon-list-block">
                                                    <li><i class="fa fa-calendar fa-fw"></i>
                                                        <a href="">
                                                            <?php $evDate =  $value['Event']['event_date'];
                                                             $date = date('d F  Y', strtotime($evDate));
                                                            echo $date; ?>
                                                        </a>
                                                    </li>
                                                     <li><i class="fa fa-clock-o fa-fw"></i>
                                                        <a href="">
                                                            <?php echo $value['Event']['event_time']; ?>
                                                        </a>
                                                    </li>
                                                    <li><i class="fa fa-map-marker fa-fw"></i>
                                                        <a href="">
                                                            <?php echo $value['Event']['event_location']; ?>
                                                        </a>
                                                    </li>
                                                    <li><i class="fa fa-file-text-o" aria-hidden="true"></i>
                                                        <a href="">
                                                            <?php echo $value['Event']['event_description']; ?>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <?php  if(++$i > 3) break;
                                                } ?>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>

                <!-- /st-content-inner -->
               
                      <div class="footer-con">
                <strong>&copy; Copyright 2017 Atlogys Technical Consulting</strong>
                </div>                
<script>
jQuery(document).ready(function($) {
   $('#postadd').validate({
     rules: {
      post_title :{
             required: true
             },
      post_description :{
             required: true
             },
     },
     messages: {
      post_title :{

        required: "Please enter post name."
      },

      post_description :{
        required: "Please enter post description."
      },

       },
           });

   });
$( "#close" ).click(function() {
  $('#postadd')[0].reset();
  var validator = $( "#postadd" ).validate();
    validator.resetForm();
});
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
<style>

.enableOnInput{
  margin-top: 12px;
}

 .error{
        color: #FF0000 !important;
         font-family:FontAwesome;
            }
  label{
    font-weight:100;
  }

</style>