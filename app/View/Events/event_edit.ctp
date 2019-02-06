<!-- app/View/Users/add.ctp -->
<style>
.user-registration label {
    width: 20%;
    /* display: block; */
}
.user-registration {
    display: block;
    width: 100%;
    padding-bottom: 15px;
}
</style>
<div class="users form">
<div class="callout callout-info">
   <h4>Event Edit  </h4>
</div>
<div class="box-body">
   <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
     
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">
                    <a href="<?php echo Router::url(array('controller'=>'events', 'action'=>'admin_evnt_list'))?>">
                    <i class="fa fa-fw fa-remove"></i> <span></span></a></button>
                  <h4 class="modal-title"> Edit Event Detail</h4>
               </div><!-- model header ended -->
               <div class="box box-primary">
                  <div class="box-header with-border">
                     <h3 class="box-title">Enter Details</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" action="<?php echo Router::url(array('controller'=>'events', 'action'=>'admin_event_edit'))?>" method="post" enctype="multipart/form-data">
                     <div class="box-body event-edit">
                       

                      <div class="row">
                        <div class="col-md-12">
                          <div class="user-registration">
                             <label for="exampleInputEmail1">Event Name</label>
                             <input type="text" class="form-control" id="event_title"
                                name="event_title" value="<?php echo  $event['Event']['event_title']; ?>" placeholder="Enter Event Name">
                                <input type="hidden" class="form-control" id="id"
                                name="id" value="<?php echo  $event['Event']['id'];?>" placeholder="Enter First Name">
                          </div>  
                        </div>
                      </div>

                      <div class="row">
                        
                        <div class="col-md-6">
                          <div class="user-registration">
                           <label for="exampleInputEmail1">Event Description</label>
                              <textarea name="event_description" rows="4" cols="50"><?php echo $event['Event']['event_description']; ?></textarea>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-md-6">
                            <div class="user-registration">
                           <label for="exampleInputEmail1">Event Image</label>
                           <img id="blah" src="<?php echo $this->webroot; ?>files/uploads/event/<?php echo $event['Event']['event_image']; ?>" alt="Event Image" width="300" height="300" />
                           <input name="post_image"  type='file' id="imgInp" />
                        </div>
                        </div>
                        <div class="clearfix"></div>
                       <div class="col-md-6">
                       <div class="user-registration">
                           <label for="exampleInputEmail1">Event Date</label>
                           <input  id="date" name="event_date" value="<?php echo $event['Event']['event_date']; ?>" class="form-control" type="text">
                        </div>
                        </div>
                        <div class="col-md-6">
                       <div class="user-registration">
                           <label for="exampleInputEmail1">Event Time</label>
                           <input  id="time" name="event_time" value="<?php echo $event['Event']['event_time']; ?>" class="form-control"  type="text">
                        </div>
                        </div>
                        <div class="col-md-6">
                       <div class="user-registration">
                           <label for="exampleInputEmail1">Event Location</label>
                           <input  id="date" name="event_location" value="<?php echo $event['Event']['event_location']; ?>" class="form-control"  type="text">
                        </div>
                        </div>
                       </div> 
                     <!-- /.box-body -->
                     <div class="box-footer">
                        <input class="btn btn-primary" type="submit" value="Submit">
                      
                     </div>
                  </form>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
               </div>
            </div>
      </div>
      <!-- /.modal -->
      <script type="text/javascript">
      $(document).ready(function($) {
        $('#time').bootstrapMaterialDatePicker({
        date: false,
        shortTime: false,
        format: 'HH:mm a'
      });
      });
     $('#date').bootstrapMaterialDatePicker({ format : 'YYYY-MM-DD', weekStart : 0, time: false });
      $(function(){
         $('*[name=date_of_birtth]').appendDtpicker();
      });
       $(function(){
         $('*[name=joining_date]').appendDtpicker();
      });
       function readURL(input) {

        if (input.files && input.files[0]) {
          var reader = new FileReader();

          reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
          }

          reader.readAsDataURL(input.files[0]);
        }
      }

      $("#imgInp").change(function() {
        readURL(this);
      });

   </script>  