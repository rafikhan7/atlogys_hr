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
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"> Edit Event Detail</h4>
               </div>
               <div class="box box-primary">
                  <div class="box-header with-border">
                     <h3 class="box-title">Enter Details</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" action="<?php echo Router::url(array('controller'=>'notifications', 'action'=>'admin_notification_edit'))?>" method="post" enctype="multipart/form-data">
                     <div class="box-body notification-con">
                      <div class="user-registration">
                           <label for="exampleInputEmail1"></label>
                            <div class="box">
                          <div class="box-header">
                            <h3 class="box-title">Notification
                            </h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                              <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fa fa-minus"></i></button>
                              <button type="button" class="btn btn-default btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                                <i class="fa fa-times"></i></button>
                            </div>
                            <!-- /. tools -->
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body pad">
                            <form>
                              <textarea name="event_description" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">

                              <?php echo $notification['Notification']['notification']; ?></textarea>
                            </form>
                          </div>
                        </div>
                        </div>
                        
                        

                     <!-- /.box-body -->
                     <div class="box-footer">
                        <input class="btn btn-primary" type="submit" value="Submit">
                      
                     </div>
                  </form>
               </div>
               <!-- <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
               </div> -->
            </div>
            <!-- /.modal-content -->
         <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <script type="text/javascript">
      $(function(){
         $('*[name=date_of_birtth]').appendDtpicker();
      });
       $(function(){
         $('*[name=joining_date]').appendDtpicker();
      });
   </script>  