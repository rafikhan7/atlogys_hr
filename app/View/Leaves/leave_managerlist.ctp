
<?php
    $link = $this->request->here;
    $link_array = explode('/', $link);
     $page = end($link_array);
?>
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
                    <a class="navbar-brand admin-logo" href="#">Atlogys<!-- <img src="<?php echo $this->webroot; ?>img/at-logo.jpg" class="img-responsive" alt="logo"> --></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="main-nav">
                    <ul class="nav navbar-nav">
                        <li><a href="">Atlogys Technical Consulting </a></li>
                    </ul>
              
                   
                  
                    <ul class="nav navbar-nav navbar-right">
                        <!-- User -->
                        <li><span class="header-notification"><i class="fa fa-bell-o" aria-hidden="true"></i> <span class="notification-icon">10</span></span></li>
                        <li class="dropdown">
                            <a href="" class="dropdown-toggle user" data-toggle="dropdown" aria-expanded="false">
                <img src="<?php echo $this->webroot; ?>files/uploads/users/<?php echo $user['User']['profile_image'] ?>" alt="Bill" class="img-responsive"><?php  echo $user['User']['first_name'] ?> <span class="caret"></span>
              </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href=""><i class="fa fa-user" aria-hidden="true"></i> Profile</a></li>
                                <li><a href=""><i class="fa fa-envelope" aria-hidden="true"></i> Messages</a></li>
                                <li><?php  echo $this->Html->link("Logout", array('controller'=>'users','action'=>'admin_logout'));  ?></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

            </div>
        </div>

        <!-- Sidebar component with st-effect-1 (set on the toggle button within the navbar) -->

                   <!-- Model start here -->
                      <div class="modal fade" id="uploadPhoto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header clearfix">
                                    <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body clearfix">
                               <form action="<?php echo Router::url(array('controller'=>'users', 'action'=>'update_profileImage'))?>" method="post" enctype="multipart/form-data">
                               <input type="file" accept="image/*" name="profile_image" onchange="loadFile(event)">
                               <img id="output"/>
                               <input type="hidden" name="id" value="<?php echo $user['User']['id'] ?>">
                              <input class="btn btn-primary btn-xs" type="submit" value="Upload">
                              </form>

                                  </div>
                                
                                </div>
                              </div>
                            </div>
                            <!-- Model ended here -->


        <div class="sidebar left sidebar-size-2 sidebar-offset-0 sidebar-visible-desktop sidebar-visible-mobile sidebar-skin-dark" id="sidebar-menu">
            <div data-scrollable="" tabindex="1" >
                <div class="sidebar-block">
                    <div class="profile">
                         <div class="profile-img-con">
                              <img src="<?php echo $this->webroot; ?>files/uploads/users/<?php echo $user['User']['profile_image'] ?>" alt="people" class="img-circle">
                              <!-- <span><i class="fa fa-camera" aria-hidden="true"  data-toggle="modal" data-target="#uploadPhoto"></i></span> -->
                              <span><i class="fa fa-camera" aria-hidden="true"></i></span>

                              <input type="file" value="" placeholder="" />
                

                         </div><!-- profile-img-con ended -->
                        <h4><?php echo $user['User']['first_name'] ?> <?php echo $user['User']['last_name'] ?>  </h4>
                    </div>
                </div>
                <div class="category">About</div>
                <div class="sidebar-block">
                    <ul class="list-about">
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
                    <div class="category">Photos</div>
                    <div class="sidebar-block">
                        <div class="sidebar-photos">
                            <ul>
                                <?php $i = 1;
               foreach ($image as $key => $value) {
                   ?>
                                    <li><a href="<?php echo $this->webroot; ?>files/uploads/users/<?php echo $value['Image']['image_name']; ?>" data-lightbox="image-1"><img src="<?php echo $this->webroot; ?>files/uploads/users/<?php echo $value['Image']['image_name']; ?>" alt="people"></a>

                                        <div id="myModal<?php echo $i; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <img src="<?php echo $this->webroot; ?>files/uploads/users/<?php echo $value['Image']['image_name']; ?>" class="img-responsive">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php $i++;
               }?>
                            </ul>
                            <div class="file_upload">
                                <form action="<?php echo Router::url(array('controller'=>'images', 'action'=>'upload_images'))?>" method="post" enctype="multipart/form-data">
                                
                                <span class="upload-con">
                                    <input type="file" id="file" name="files[]" multiple="multiple" accept="image/*" />
                                <span class="upload-btn"><i class="fa fa-upload" aria-hidden="true"></i></span>
                                </span><!-- upload-con ended! -->

                                <input class="btn btn-primary btn-xs" type="submit" value="Upload!" />
                            </form>

                            </div><!-- file upload ended -->
                        </div>
                    </div>

                    <div class="category"><a href="<?php echo Router::url(array('controller'=>'users', 'action'=>'managerList'))?>">Leave Notification</a><span class="notification-icon">2</span></div>

                </div>
                <div id="ascrail2001" class="nicescroll-rails" style="width: 5px; z-index: 2; cursor: default; position: absolute; top: 0px; left: 194px; height: 510px; opacity: 0;">
                    <div style="position: relative; top: 0px; float: right; width: 5px; height: 315px; background-color: rgb(195, 169, 97); border: 0px; background-clip: padding-box; border-radius: 5px;"></div>
                </div>
                <div id="ascrail2004" class="nicescroll-rails" style="width: 5px; z-index: 2; cursor: default; position: absolute; top: 0px; left: 194px; height: 309px; opacity: 1;">
                    <div style="position: relative; top: 0px; float: right; width: 5px; height: 96px; background-color: rgb(22, 174, 159); border: 0px; background-clip: padding-box; border-radius: 5px;"></div>
                </div>
            </div>
            <script id="chat-window-template" type="text/x-handlebars-template">

                <div class="panel panel-default">
                    <div class="panel-heading" data-toggle="chat-collapse" data-target="#chat-bill">
                        <a href="#" class="close"><i class="fa fa-times"></i></a>
                        <a href="#">
                            <span class="pull-left">
                    <img src="{{ user_image }}" width="40">
                </span>
                            <span class="contact-name">{{user}}</span>
                        </a>
                    </div>
                    <div class="panel-body" id="chat-bill">
                        <div class="media">
                            <div class="media-left">
                                <img src="{{ user_image }}" width="25" class="img-circle" alt="people" />
                            </div>
                            <div class="media-body">
                                <span class="message">Feeling Groovy?</span>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <img src="{{ user_image }}" width="25" class="img-circle" alt="people" />
                            </div>
                            <div class="media-body">
                                <span class="message">Yep.</span>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <img src="{{ user_image }}" width="25" class="img-circle" alt="people" />
                            </div>
                            <div class="media-body">
                                <span class="message">This chat window looks amazing.</span>
                            </div>
                        </div>
                        <div class="media">
                            <div class="media-left">
                                <img src="{{ user_image }}" width="25" class="img-circle" alt="people" />
                            </div>
                            <div class="media-body">
                                <span class="message">Thanks!</span>
                            </div>
                        </div>
                    </div>
                    <input type="text" class="form-control" placeholder="Type message..." />
                </div>
            </script>

            <div class="chat-window-container"></div>

            <!-- sidebar effects OUTSIDE of st-pusher: -->
            <!-- st-effect-1, st-effect-2, st-effect-4, st-effect-5, st-effect-9, st-effect-10, st-effect-11, st-effect-12, st-effect-13 -->

            <!-- content push wrapper -->
            <div class="st-pusher" id="content">

                <!-- sidebar effects INSIDE of st-pusher: -->
                <!-- st-effect-3, st-effect-6, st-effect-7, st-effect-8, st-effect-14 -->

                <!-- this is the wrapper for the content -->
                <div class="st-content">

                    <!-- extra div for emulating position:fixed of the menu -->
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
                                    <ul class="nav navbar-nav ">
                                        <li <?php if ($page=="user_dashboard") {
                   ?> class="active"
                                            <?php
               } ?>><a href="<?php echo Router::url(array('controller'=>'users', 'action'=>'user_dashboard'))?>"><i class="fa fa-table" ></i> Timeline</a></li>
                                        <li><a href="<?php echo Router::url(array('controller'=>'users', 'action'=>'user_leave'))?>"><i class="fa fa-plane"></i> Leaves</a></li>
                                        <li><a href="<?php echo Router::url(array('controller'=>'users', 'action'=>'user_dashboard'))?>"><i class="fa fa-microphone"></i> Posts</a></li>
                                        <li><a href="<?php echo Router::url(array('controller'=>'users', 'action'=>'user_dashboard'))?>"><i class="fa fa-calendar"></i> Event's</a></li>
                                        <li>
                                            <a href="<?php echo Router::url(array('controller'=>'users', 'action'=>'user_dashboard'))?>"><i class="fa fa-gift" ></i> Birthday</a>
                                        </li>
                                    </ul>
                                    <ul class="nav navbar-nav hidden-xs navbar-right ">
                                        <li><a href="" data-toggle="chat-box">Chat <i class="fa fa-fw fa-comment-o"></i></a></li>
                                       
                                    </ul>
                                </div>
                                <!-- /.navbar-collapse -->
                            </div>

                        </nav>
                        <div class="cover overlay cover-image-full height-300-lg">
<div class="leaves form">
<div class="callout callout-info">
   <h4>Your Team Leave List  </h4>
</div>
<div class="box-body">
   <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
         <div class="col-sm-6"></div>
         <div class="col-sm-6"></div>
      </div>
     
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Leave List</h3>
              <button type="button" style="margin-left:900px;text-decoration:none; background-color:#42CABC; border-radius:4px;">Export</button>
            </div>
  
            <div class="box-body">
              <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                 <tr role="row">
                  <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">S.N</th>
                     <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Name</th>
                     <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Total Leaves</th>
                     <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Leave Date</th>
                     <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Numbers of Leaves</th>
                      <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Status</th>
                     <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Approved By</th>
                     <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Request Text</th>
                     <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Comment</th>
                     <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Leave apply Date</th>
                     <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                    
                     <?php $i=1; foreach ($detail as $value) {
                   ?>
                  <tr role="row" class="odd">
                    

                      <td class="sorting_1"><?php echo $i; ?></td>
                      <td class="sorting_1"><?php echo $value['Leave']['apply_by'];
                   ; ?></td>
                     <td class="sorting_1">
                      <?php  $date1 = $value['Leave']['leave_start_date'];

                   $date1 = date('d F  Y', strtotime($date1));
                   echo $date1; ?></td>
                     <td class="sorting_1">
                      <?php 
                      $date2 = $value['Leave']['leave_end_date'];

                   $date2 = date('dS F  Y', strtotime($date2));
                   echo $date2; ?></td>
                     <td class="sorting_1">
                      <?php echo $value['Leave']['total_leaves']; ?></td>
                     <td class="sorting_1">
                      <?php $status = $value['Leave']['leave_status'];
                   if ($status ==0) {
                       echo "Pending";
                   } elseif ($status ==2) {
                       echo "Reject";
                   } else {
                       echo "approved";
                   } ?></td>
                     <td><?php echo $value['Leave']['leave_approve_by'] ?></td>
                     <td><?php echo $value['Leave']['request_text'] ?></td>
                     <td><?php echo $value['Leave']['approver_comment'] ?></td>
                     <td><?php echo $value['Leave']['leave_created'] ?></td>
                     <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?php echo $i; ?>" data-whatever="@mdo">Action</button>
                     </td>
                   
   <div class="modal fade" id="exampleModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="takeaction" name="takeaction" action="<?php echo Router::url(array('controller'=>'leaves', 'action'=>'action_leave'))?>" method="post">  
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Take Action On Leave Application</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Select Status:</label>
            <select name="leave_status" id="leave_status">
              <option value="" selected disabled hidden>Choose here</option>
              <option value="1">Approve</option>
              <option value="2">Reject</option>
            </select>
            <input type="text" class="form-control-label" name="user_backup" value=""> 
              <div class="form-group">

          <input type="hidden" name="leave_approve_by" value="<?php echo AuthComponent::user('name'); ?>">
                 <input type="hidden" name="leave_id" value="<?php echo $value['Leave']['id'] ?>">
                </div>
          </div>
          <div class="form-group">
            <label for="message-text" class="form-control-label">Message:</label>
            <textarea name="approver_comment" id="approver_comment" class="form-control" id="message-text"></textarea>
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Take Action<?php $i; ?></button>
      </div>
      </form>
    </div>
  </div>
</div>
</tr>
<?php $i++;
               } ?>

                 </tbody>
              
             </tbody>
              </table></div></div><div class="row"><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
              <?php echo $this->Paginator->numbers(array(   'class' => 'numbers'     ));?>
              <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?></div></div></div></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
   <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
   </div>
</div>

                                </div>
                            </div>
                        </div>

                    </div>

                    <div id="ascrail2000" class="nicescroll-rails" style="width: 5px; z-index: auto; cursor: default; position: absolute; top: 446px; left: 1066px; height: 39px; display: none; opacity: 0;">
                        <div style="position: relative; top: 0px; float: right; width: 5px; height: 0px; background-color: rgb(195, 169, 97); border: 0px; background-clip: padding-box; border-radius: 5px;"></div>
                    </div>
                    <div id="ascrail2000-hr" class="nicescroll-rails" style="height: 5px; z-index: auto; top: 480px; left: 15px; position: absolute; cursor: default; display: none; opacity: 0;">
                        <div style="position: absolute; top: 0px; height: 5px; width: 0px; background-color: rgb(195, 169, 97); border: 0px; background-clip: padding-box; border-radius: 5px; left: 0px;"></div>
                    </div>
                    <div id="ascrail2003" class="nicescroll-rails" style="width: 5px; z-index: auto; cursor: default; position: absolute; top: 446px; left: 1066px; height: 39px; display: none;">
                        <div style="position: relative; top: 0px; float: right; width: 5px; height: 0px; background-color: rgb(22, 174, 159); border: 0px; background-clip: padding-box; border-radius: 5px;"></div>
                    </div>
                    <div id="ascrail2003-hr" class="nicescroll-rails" style="height: 5px; z-index: auto; top: 480px; left: 15px; position: absolute; cursor: default; display: none;">
                        <div style="position: absolute; top: 0px; height: 5px; width: 0px; background-color: rgb(22, 174, 159); border: 0px; background-clip: padding-box; border-radius: 5px;"></div>
                    </div>
                </div>
                <!-- /st-content-inner -->
</div>
<script>
 var loadFile = function(event) {
   var reader = new FileReader();
   reader.onload = function(){
     var output = document.getElementById('output');
     output.src = reader.result;
   };
   reader.readAsDataURL(event.target.files[0]);
 };
</script>