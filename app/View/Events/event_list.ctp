   <?php
    $link = $this->request->here;
    $link_array = explode('/', $link);
     $page = end($link_array);
     $second  = explode(':', $page);
     $pageVal = end($second);
?>
<div class="users form">
    <div class="callout callout-info">
        <h4>Atlogys Events </h4>
    </div>
    <div class="">
        <div id="example2_wrapper" class="form-inline dt-bootstrap">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-info">Add New Event</button>
            <div class="modal modal-info fade" id="modal-info">
                <div class="modal-dialog">
                    <div class="modal-content event-edit">
                        <div class="modal-header">
                            <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">New Event</h4>
                        </div>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Enter Details</h3>
                            </div>
                            <!-- /.box-header -->
                            <!-- form start -->
                            <form role="form" id="eventadd" action="<?php echo Router::url(array('controller'=>'events', 'action'=>'admin_event_add'))?>" method="post" enctype="multipart/form-data">
                                <div class="box-body">

                                   <div class="row margin-top-20">
                                     <div class="col-md-12">
                                        <div class="user-registration">
                                        <label for="exampleInputEmail1">Event Name*</label>
                                        <input type="text" class="form-control" id="event_title" name="event_title" placeholder="Enter Event Name">
                                    </div>
                                     </div>
                                   </div>

                                     <div class="row margin-top-20">
                                     <div class="col-md-12">
                                        <div class="user-registration">
                                          <label for="exampleInputEmail1">Event Description</label>
                                          <textarea name="event_description" id="event_description" class="form-control" placeholder="Place some text here"  > </textarea>

                                        </div>
                                     </div>
                                     </div>  

                                   
                                   <div class="row margin-top-20">
                                     <div class="col-md-6">
                                       <div class="">
                                        <label for="exampleInputEmail1">Event Date*</label>
                                        <input id="date" name="event_date" class="form-control" format="yyyy-MM-dd" type="text">
                                    </div>
                                     </div>

                                       <div class="col-md-6">
                                         <div class="">
                                         <label for="exampleInputEmail1">Event Time</label>
                                        <input type="text" name="event_time" id="time" placeholder="HH:mm" class="form-control" data-dtp="dtp_Y2QAK">
                                         </div>
                                       </div>

                                    </div> 
                                    <div class="margin-top-20">
                                        <label for="exampleInputEmail1">Event Location*</label>
                                        <input id="location" name="event_location" class="form-control"  type="text">
                                    </div><br/>
                                    
                                    <div class="">  
                                       <label for="exampleInputEmail1">Event Image</label>
                                       <input  id="event_image" name="event_image"  class="form-control" type="file">
                                    </div><br/>

                                    <div class="">
                                       <input class="btn btn-primary" type="submit" value="Submit">
                                    </div>
                                    
                                    <br/>

                                 
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
                                <h3 class="box-title">Event List</h3>
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
                                                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Event Name</th>
                                                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Description</th>
                                                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Event Date</th>
                                                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Event Location</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Created Date</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php  if(is_numeric($pageVal)){
                                                     $i = $pageVal*10-9;
                                                   }
                                                     else{ $i = 1;
                    # code...
                  } //$pageVal*10-9;
                     foreach ($events as $value) {
                         $id = $value['Event']['id']; ?>
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1"><?php echo $i; ?></td>
                                                            <td class="sorting_1"><?php echo $value['Event']['event_title'] ?></td>
                                                            <td class="sorting_1"><?php echo $value['Event']['event_description'] ?></td>
                                                            <td class="sorting_1"><?php $eventDate = $value['Event']['event_date'];$eventDate = date('d F  Y', strtotime($eventDate));echo $eventDate; ?></td>
                                                             <td class="sorting_1"><?php echo $value['Event']['event_location'] ?></td>
                                                            <td><?php $timestamp = $value['Event']['event_created'];$datetime = explode(" ",$timestamp);$date = $datetime[0];$date = date('d F  Y', strtotime($date));echo $date; ?></td>
                                                            <td><a href="#"><i class="fa fa-eye"  data-toggle="modal" data-target="#modal-warning<?php echo $id; ?>"></i></a>
                                                                <a href="<?php echo Router::url(array('controller'=>'events', 'action'=>'admin_event_edit'))."/".$id?>"><i class="fa fa-fw fa-edit"></i></a>
                                                                <a href="<?php echo Router::url(array('controller'=>'events', 'action'=>'admin_event_delete'))."/".$id?>"><i class="fa fa-fw fa-remove"></i></a>
                                                        </tr>

                      <div class="modal fade" id="modal-warning<?php echo $id; ?>">
                      <div class="modal-dialog">
                      <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                          <h4 class="modal-title">Details</h4>
                      </div>
                      <div class="modal-body">

                          <a class="users-list-name" href="#"></a>
                          <span class="users-list-date"></span>
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="profile-sidebar">
                                      <div class="profile-usertitle-name">
                      
                                      </div>
                                      <div class="profile-usertitle-job">
                                          <img src="<?php echo $this->webroot; ?>files/uploads/event/<?php echo $value['Event']['event_image'] ?>" class="img-responsive" alt="User Image">
                                      </div>

                                      <ul class="nav card-block">

                                          <li class="col-sm-6">
                                             <strong>Description:</strong>&nbsp; <?php echo $value['Event']['event_description'] ?>
                                          </li>
                                          <li class="col-sm-6">
                                              <strong>Event Date:</strong>&nbsp; <?php echo $value['Event']['event_date'] ?> 
                                          </li>
                                          <li class="col-sm-6">
                                              <strong>Event Time:</strong>&nbsp; <?php echo $value['Event']['event_time'] ?> 
                                          </li>
                                          <li class="col-sm-6">
                                              <strong>Event Location:</strong>&nbsp; <?php echo $value['Event']['event_location'] ?> 
                                          </li>

                                      </ul>
                                  </div>

                              </div>
                          </div>
                      </div>

                  </div>
                  <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->

                                                            <!-- /.modal -->
                                                            <?php $i++;
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
        $(document).ready(function($) {
        $('#time').bootstrapMaterialDatePicker({
        date: false,
        shortTime: false,
        format: 'HH:mm a'
      });
      });
     $('#date').bootstrapMaterialDatePicker({ format : 'YYYY-MM-DD', weekStart : 0, time: false });
jQuery(document).ready(function($) {
   $('#eventadd').validate({
     rules: {
      event_title :{
             required: true
             },
      event_description :{
             required: true
             },
       event_date:{
             required: true
             },
       event_location:{
              required: true
             },
     },
     messages: {
      event_title :{

        required: "Please enter event name."
      },

      event_description :{
        required: "Please enter event description."
      },
      event_date :{
        required: "Please enter event date."
      },
      event_location: {
        required: "Please enter event location."
      }

       },
           });


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
<script>
$( "#close" ).click(function() {
  $('#eventadd')[0].reset();
  var validator = $( "#eventadd" ).validate();
    validator.resetForm();
});

// Past date disbale function start here 



    var dtToday = new Date();
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    // alert(maxDate);
    $('#eventDate').attr('min', maxDate);


// Past date disbale function ended here 





</script>