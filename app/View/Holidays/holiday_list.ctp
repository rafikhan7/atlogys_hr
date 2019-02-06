
<div class="users form">
    <div class="callout callout-info">
        <h4>Atlogys Holiday </h4>
    </div>
    <div class="box-body">
        <div id="example2_wrapper" class="form-inline dt-bootstrap">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-info">Add New Holiday</button>
            <div class="modal modal-info fade" id="modal-info">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button"  id="close" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">New Holiday</h4>
                        </div>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Enter Details</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" id="notificationadd" action="<?php echo Router::url(array('controller'=>'holidays', 'action'=>'admin_holiday_add'))?>" method="post" enctype="multipart/form-data">
                                <div class="box-body">

                                    
                                    <div class="user-registration notification-list-con">
                                       
                                            <div class="box-body pad">        

                                                <div class="row">
                                                  <div class="col-md-6">
                                                     <label for="exampleInputEmail1">Holiday Name</label>
                                                    <input type="text" class="form-control" name="holiday_name" placeholder="Holiday Name">
                                                  </div>
                                                  <div class="col-md-6">
                                                    <label for="exampleInputEmail1">Holiday Date</label>
                                                     <input type="date" class="form-control" name="holiday_date">
                                                  </div>

                                                </div>                                       
                                                     
                                                    
                                                
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
            </div></div>
            <!-- /.modal -->
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Holoidaty List</h3>
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
                                                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Holiday Description</th>
                                                        
                                                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Holiday Date</th>
                                                        
                                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php

                                                    $i =0;
                     foreach ($holidays  as $key => $value) {
                         $i++;
                         $id = $value['Holiday']['id']; ?>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"><?php echo $i; ?></td>
                                                            <td class="sorting_1"><?php echo $value['Holiday']['holiday_name'] ?></td>
                                                            <td class="sorting_1"><?php $eventDate = $value['Holiday']['holiday_date'];$eventDate = date('d F  Y', strtotime($eventDate));echo $eventDate; ?> </td>
                                                            <td><a href="<?php echo Router::url(array('controller'=>'holidays', 'action'=>'admin_holidays_delete'))."/".$id?>"><i class="fa fa-fw fa-remove"></i></a></td>
                                                            
                                                        </tr>

                  <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->

                                                            <!-- /.modal -->
                                                            <?php
                     }  ?>

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
   $('#notificationadd').validate({
     rules: {
      holiday_name :{
             required: true
             },
      holiday_date :{
             required: true
             },
     
     },
     messages: {
      holiday_name :{

        required: "Please enter holiday name."
      },

      holiday_date :{
        required: "Please enter holiday date."
      }
       },
           });R


   });
$( "#close" ).click(function() {
  $('#notificationadd')[0].reset();
  var validator = $( "#notificationadd" ).validate();
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