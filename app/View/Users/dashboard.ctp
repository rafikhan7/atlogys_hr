<?php 

/*$userdetails = $this->Session->read('Auth.User');
$role = $userdetails['role'];
if($role != 'admin'){
Router::url('http://google.com', true);
}*/ 

?>
    <script>
    $(document).ready(function() {
    //toastr.info('Are you the 6 fingered man?')


    Command: toastr[success]("   ", "Settings Saved!")

    toastr.options: {
    "debug": false,
    "positionClass": "toast-top-right",
    "onclick": null,
    "fadeIn": 300,
    "fadeOut": 1000,
    "timeOut": 5000,
    "extendedTimeOut": 1000
    }
    });
    </script>
 <?php

 $successmsg = $this->Session->flash();
if (!empty($successmsg)) {
    ?>
      <script type="text/javascript">
        toastr.options = {
          "timeOut": "5000",
          "positionClass": "toast-top-center"
        }
        Command: toastr["info"]("<?php echo $successmsg; ?>","Welcome!")
      </script>
<?php
}  ?>
<div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon"><i class="fa fa-users"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">USERS</span>
              <span class="info-box-number"><?php echo $user;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon"><i class="fa fa-share-alt-square"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">POSTS</span>
              <span class="info-box-number"><?php echo $post;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon"><i class="fa fa-fw fa-calendar-check-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">EVENTS</span>
              <span class="info-box-number"><?php echo $event;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">ACTIVE MEMBER</span>
              <span class="info-box-number"><?php echo $user;?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>


      <div class="row">
            <div class="col-md-6">
              <!-- DIRECT CHAT -->
              <div class="box direct-chat direct-chat-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">Message</h3>
    
                  <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="" class="badge bg-yellow" data-original-title="3 New Messages"><?php echo $massagecount = count($massege); ?></span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Contacts">
                      <i class="fa fa-comments"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- Conversations are loaded here -->
                  
                  <div class="direct-chat-messages">
                     <?php

                    foreach ($massege as $value) {
                        ?>
                    <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left"><?php echo $value['User']['name']; ?></span>
                        <span class="direct-chat-timestamp pull-right"><?php $massagedate = $value['Massege']['created'];
                        $date1 = date('dS F  Y', strtotime($massagedate));
                        echo $date1; ?></span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img src="<?php echo $this->webroot; ?>files/uploads/users/<?php echo $value['User']['profile_image']; ?>" class="img-circle" alt="User Image"><!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                          <?php echo $value['Massege']['massege']; ?>
                      </div>
                      <!-- /.direct-chat-text -->
                    
                    <!-- /.direct-chat-msg -->

                    <!-- Message to the right -->
                      </div>
                        <?php   # code...
                    }?>
                    

                   
               
                
                  <!--/.direct-chat-messages-->

                  <!-- Contacts are loaded here -->
                 
                  <!-- /.direct-chat-pane -->
                </div></div></div>
                <!-- /.box-body -->

                

      
            <!-- /.col -->
          </div>
          
                <div class="col-md-6">
              <!-- USERS LIST -->
              <div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">Atlogys Employe</h3>

                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
               
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list img-grid clearfix">
                    <?php foreach ($users as $key => $value) {
                        $userID = $value['User']['id'];
                        ?>
                    <li>
                       <div class="img-con">
                        <?php $profile_image = $value['User']['profile_image'];
                        if(!empty($profile_image)){?>
                         <img src="<?php echo $this->webroot; ?>files/uploads/users/<?php echo $profile_image; ?>" class="img-responsive" alt="User Image">
                         <?php } else {?>
                         <img src="<?php echo $this->webroot; ?>files/uploads/users/profile.png" alt="people" class="img-circle">
                       <?php }?>
                         </div><!--img-con ended -->
                      <a class="users-list-name" href="<?php echo $this->webroot; ?>users/user_view/<?php echo $userID?>"><?php echo $value['User']['first_name'] ?></a>
                    </li>
                    <?php
                    } ?>
                    
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="<?php echo Router::url(array('controller'=>'users', 'action'=>'user_list'))?>" class="uppercase">View All Users Details</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
          
</div><!-- row ended ! -->