<?php

    $link = $this->request->here;
    $link_array = explode('/', $link);
    $page = end($link_array);
?>

<!-- /container  -->
<script>
    $(document).ready(function () {
        $('#sample_input').awesomeCropper(
        { width: 150, height: 150, debug: true }
        );
    });
    </script> 

                        <div class="cover overlay cover-image-full height-300-lg">
                           <?php  $banner_image = $user['User']['banner_image'];
                            if (empty($banner_image)) {
                                ?>
                              <img src="<?php echo $this->webroot; ?>files/uploads/banner/default_banner.jpg" alt="cover">
                            <?php
                            }else{?>
                              <img src="<?php echo $this->webroot; ?>files/uploads/banner/<?php echo $banner_image; ?>" alt="cover">
                              <?php } ?>
                               
                            
                        </div> <!-- cover-image-full ended ! -->

                        <div class="container-fluid">

                            <div class="panel panel-default share">

                            <div class="tabbable">
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
                                
                                </div>
                            </div>
               

                <!-- /st-content-inner -->
</div>
                            
                            
                            <div class="panel panel-default share">
                                    <div class="row">
                                <div class="col-md-6 ">
                                    <div class="panel panel-default height-365">
                                        <div class="panel-heading panel-heading-gray clearfix">
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
                                        <div class="panel-heading panel-heading-gray clearfix">
                                            <i class="fa fa-clipboard" aria-hidden="true"></i> <?php echo $user['User']['name'] ?> Post
                                        </div>
                                        <div class="panel-body">
                                            <ul class="user-post-list">
                                                <?php foreach ($userpost as  $post) {
                                                  ?>
                                                   <li>
                                                  <img src="<?php echo $this->webroot; ?>img/uploads/post/<?php echo $post['Post']['post_image'];  ?>" alt="" class="img-responsive" />
                                                    <p><?php echo $post['Post']['post_title'];?></p>
                                                    
                                                </li><?php }?>
                                                
                                                <div class="col-md-12 text-center">
                                                    <a href="#" class="btn btn-primary">Read More</a>
                                                </div>
                                                
                                            </ul>
                                        </div><!-- panel-body ended -->
                                    </div>
                                </div>

                                <div class="col-md-12 ">
                                    <div class="panel panel-default height-365">
                                        <div class="panel-heading panel-heading-gray clearfix">
                                            <i class="fa fa-clipboard" aria-hidden="true"></i> <?php echo $user['User']['name'] ?> Leave's
                                        </div>
                                            <div class="box-body">
              <div id="example2_wrapper" class="form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
               <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">S.No</th>
                     <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Leave Start Date</th>
                       <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Leave End Date</th>
                     <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Number Of Leave</th>
                     <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Status</th>
                     <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Approve By </th>
                     <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Request Text</th>
                     <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Comment</th>
                     <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Created Date</th>
                </thead>
                <tbody>
              <tbody>
                 <?php $i=1; foreach ($leave as $value) {
                   ?>
                  <tr role="row" class="odd">
                    

                      <td class="sorting_1"><?php echo $i; ?></td>
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
                       echo "Approve";
                   } ?></td>
                     <td><?php echo $value['Leave']['leave_approve_by'] ?></td>
                     <td><?php echo $value['Leave']['request_text'] ?></td>
                     <td><?php echo $value['Leave']['approver_comment'] ?></td>
                     <td><?php echo $value['Leave']['leave_created'] ?></td>
                   
                  </tr>
                        <?php $i++;
               } ?>
</tbody>
              </table>
               
                  </div></div>
      </div>
              </div>
                                    </div>
                                </div>
                              
                              
                              

                </div>
                            </div>

<script>
(function(){
  

  // $('.dropdown').click(function(){ 
  // $(this).addClass("open");
  //   });


})();
</script>
