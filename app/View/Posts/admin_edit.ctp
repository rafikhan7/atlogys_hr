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
   <h4>Post Edit  </h4>
</div>
<div class="box-body">
   <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
     
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title"> Edit Post Detail</h4>
               </div>
               <div class="box box-primary user-post-con">
                  <div class="box-header with-border">
                     <h3 class="box-title">Enter Details</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" action="<?php echo Router::url(array('controller'=>'posts', 'action'=>'admin_post_edit'))?>" method="post" enctype="multipart/form-data">
                     <div class="box-body">
                       
                        <div class="user-registration
                           '">
                           <label for="exampleInputEmail1">Post Name</label>
                           <input type="text" class="form-control" id="post_title"
                              name="post_title" value="<?php echo  $post['Post']['post_title']; ?>" placeholder="Enter Post Name">
                              <input type="hidden" class="form-control" id="id"
                              name="id" value="<?php echo  $post['Post']['id'];?>" placeholder="Enter First Name">
                        </div>
                        <div class="user-registration">
                           <label for="exampleInputEmail1"></label>              
                            <h3 class="box-title">Post Description
                            </h3>
                          <div class="box-body pad">
                              <textarea name="post_description" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $post['Post']['post_description']; ?></textarea>
                        </div>
                        </div>
                         <div class="form-group user-registration">
                           <label for="exampleInputEmail1">Post Image</label>
                         <img id="blah" src="<?php echo $this->webroot; ?>files/uploads/post/<?php echo $post['Post']['post_image']; ?>" alt="your image" width="300" height="300" />
                           <input name="post_image"  type='file' id="imgInp" />
                         
                        </div>
                     <div class="box-footer">
                        <input class="btn btn-primary" type="submit" value="Submit">
                      
                     </div>
                  </form>
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
               </div>
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