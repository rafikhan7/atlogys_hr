<script>

</script>
   <?php
    $link = $this->request->here;
    $link_array = explode('/', $link);
     $page = end($link_array);
     $second  = explode(':', $page);
     $pageVal = end($second);
?>
<div class="users form">
    <div class="callout callout-info">
        <h4>Atlogys Post </h4>
    </div>
    <div class="box-body">
        <div id="example2_wrapper" class="form-inline dt-bootstrap">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adminPost">Add New Post</button>
            <div class="modal modal-info fade" id="adminPost">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">New Post</h4>
                        </div>
                        <div class="box box-primary user-post-edit">
                            <div class="box-header with-border">
                                <h3 class="box-title">Enter Details</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" id="postadd" action="<?php echo Router::url(array('controller'=>'posts', 'action'=>'admin_post_add'))?>" method="post" enctype="multipart/form-data">
                                <div class="box-body">

                                    <div class="user-registration
                           '">
                                        <label for="exampleInputEmail1">Post Title</label>
                                        <input type="text" class="form-control" id="post_title" name="post_title" placeholder="Enter Post Title">
                                    </div>
                                    <div class="user-registration">
                                        <label for="exampleInputEmail1"></label>
                                       
                                            <div class="box-header">
                                                <h3 class="box-title">Post Description
              </h3>
                                    
                                            </div>
                                            <!-- /.box-header -->
                                            <div class="box-body pad">
                                               
                                                    <textarea name="post_description" id="post_description" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                
                                            </div>
                                        </div>
                                    
                                    <div class="user-registration">
                                       <label for="exampleInputEmail1">Post Image</label>
                                       <input  id="post_image" name="post_image"  class="form-control" type="file">
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <input class="btn btn-primary" type="submit" value="Submit">

                                    </div>
                            </form>
                            </div>
                           
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Post List</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div id="example2_wrapper" class="form-inline dt-bootstrap">
                                    <div class="row">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-6"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">S.No</th>
                                                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Post Name</th>
                                                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Description</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Created Date</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                   <?php 
                 if(is_numeric($pageVal)){
                 $i = $pageVal*10-9;
               }
                 else{ $i =0;
                    # code...
                  } //$pageVal*10-9;
                     foreach ($post as $key => $value) {

                          $i++;
                      $id = $value['Post']['id'];?>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1">
                                                                <?php echo $i; ?>
                                                            </td>
                                                            <td class="sorting_1">
                                                                <?php echo $value['Post']['post_title'] ?>
                                                            </td>
                                                            <td class="sorting_1">
                                                                <?php echo $value['Post']['post_description'] ?>
                                                            </td>
                                                            <td>
                                                    <?php $timestamp = $value['Post']['created'];
                                                          $datetime = explode(" ",$timestamp);
                                                          echo $date = $datetime[0]; ?>
                                                            </td>
                                                            <td>
                                                                <a href="#"><i class="fa fa-eye"  data-toggle="modal" data-target="#modal-warning<?php echo $id;?>"></i></a>

                                                                <a href="<?php echo Router::url(array('controller'=>'posts', 'action'=>'admin_Post_edit'))."/".$id?>"><i class="fa fa-fw fa-edit"></i></a>
                                                                <a href="<?php echo Router::url(array('controller'=>'posts', 'action'=>'admin_post_delete'))."/".$id?>"><i class="fa fa-fw fa-remove"></i></a>
                                                        </tr>

                      <div class="modal fade" id="modal-warning<?php echo $id;?>">
                      <div class="modal-dialog">
                      <div class="modal-content">
                       <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                       <h4 class="modal-title"><?php echo $value['Post']['post_title'] ?> Details</h4>
                          </div>
                          <div class="modal-body">
                        
                         <a class="users-list-name" href="#"></a>
                         <span class="users-list-date"></span>
                         <div class="row">
                        <div class="col-md-12">
                         <div class="profile-sidebar">
                         <div class="profile-usertitle-name"></div>
                        <div class="profile-usertitle-job">
                           <img src="<?php echo $this->webroot; ?>files/uploads/post/<?php echo $value['Post']['post_image'] ?>" class="img-responsive" alt="User Image">
                        </div>
                        <ul class="nav card-block">
                           
                         <li class="col-sm-6">
                      <strong>Description:</strong> <?php echo $value['Post']['post_description'] ?>
                        </li>
                        <li class="col-sm-6">
                        <strong>Post Date:</strong> 
                         <?php echo $value['Post']['created'] ?> 
                         </li>
                       </ul>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->

                                                            <!-- /.modal -->
                                                            <?php  }  ?>

                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-7">
                                                <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                                    <?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
                                                        <?php echo $this->Paginator->numbers(array(   'class' => 'numbers'     ));?>
                                                            <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <!-- /.box -->

                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
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
<style>
 .error{
        color: #FF0000 !important;
         font-family:FontAwesome;
            }
  label{
    font-weight:100;
  }
</style>