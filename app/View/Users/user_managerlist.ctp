<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

    <?php
    $link = $this->request->here;
    $link_array = explode('/', $link);
    $page = end($link_array);
?>                      <div class="">
<div class="leaves form">

<div class="box-body">
   <div id="example2_wrapper" class="form-inline dt-bootstrap">
      <div class="row">
         <div class="col-sm-6"></div>
         <div class="col-sm-6"></div>
      </div>     
    <section class="content manager-list">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
              <div class="manager-box-header">
          <h3 class="box-title">Team Leave List</h3>
                  
           </div>
           <div class="clearfix filter-cover">
                <form class="employee-form"  action="<?php echo Router::url(array('controller'=>'users', 'action'=>'managerList'))?>" method="post">
              <div class="filter-box">
                   <p>Filter:Status <?php $selected = $filterData['sortBy'];
                                          $datefilter = $filterData['date_filter'];
               ?></p>
                 
                      
                     <select name="myselect" class="form-control" id="date_filter" onchange="this.form.submit()" >
                      
                       <option <?php if($selected ==0){ echo "selected"; } ?>  value=0>All</option>                          
                       <option <?php if($selected ==1){ echo "selected"; } ?>  value="1">Approved</option>
                       <option <?php if($selected ==2){ echo "selected"; } ?>  value="2">Rejected</option>
                       <option <?php if($selected =="desc"){ echo "selected"; } ?>  value="desc">Pending</option>                         
                     </select></div><div class="filter-box"><p>Filter:Date</p>
                        <select name="date_filter" class="form-control" id="date_filter" onchange="this.form.submit()" >
                            
                           <option>Select</option>
                           <option <?php if($datefilter ==2){ echo "selected"; } ?> value="2">Future Date</option>
                           <option <?php if($datefilter ==1){ echo "selected"; } ?> value="1">Past Date</option>
                           
                         </select>
                    </div>
                     </form>
            
             
                  
           </div>
              <br/>
        
            <!-- /.box-header -->
              <?php if(empty($detail)){?>
                    
                  <div class="if-empty">
                      <p>No Records found !</p>
                  </div>
                  <?php }else{ ?>
            <div class="box-body">
              <div id="example2_wrapper" class="form-inline dt-bootstrap leave-list"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
               <tr role="row">
                    <th class="" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">S.N</th>
                     <th  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Name</th>
                     <th  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Leave Start Date</th>
                     <th  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Leave End Date</th>
                     <th  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">No. of Leaves</th>
                      <th  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Status</th>
                     <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Approved By</th>
                     <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Backup Name</th>
                     <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Request Text</th>
                     <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Comment</th>
                     <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Leave apply Date</th>
                     <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
               </tr>
                </thead>
                <tbody>
              <tbody>
                <?php 
              $i=1; foreach ($detail as $value) {
                   $userID = $value['Leave']['user_id'];?>
                  <tr role="row" class="odd">
                    

                      <td class="sorting_1"><?php echo $i; ?></td>
                      <td class="sorting_1"><a href="<?php echo Router::url(array('controller'=>'users', 'action'=>'user_view'))."/".$userID?>"><?php echo $value['Leave']['apply_by'];?></a></td>
                     <td class="sorting_1"><?php  $date1 = $value['Leave']['leave_start_date'];$date1 = date('d F  Y', strtotime($date1));echo $date1; ?></td>
                     <td class="sorting_1"><?php $date2 = $value['Leave']['leave_end_date'];$date2 = date('dS F  Y', strtotime($date2));echo $date2; ?></td>
                     <td class="sorting_1"><?php echo $value['Leave']['total_leaves']; ?></td>
                     <td class="sorting_1"><?php $status = $value['Leave']['leave_status'];
                   if ($status ==0) {
                       echo "Pending";
                   } elseif ($status ==2) {
                       echo "Reject";
                   } else {
                       echo "Approved";
                   } ?></td>
                     <td><?php echo $value['Leave']['leave_approve_by'] ?></td>
                     <td><?php echo $value['Leave']['user_backup'] ?></td>
                     <td><?php echo $value['Leave']['request_text'] ?></td>
                     <td><?php echo $value['Leave']['approver_comment'] ?></td>
                     <td><?php $timestamp = $value['Leave']['leave_created']; $datetime = explode(" ",$timestamp); $date = $datetime[0]; $date = date('d F  Y', strtotime($date)); echo $date; ?></td>
                     <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?php echo $i; ?>" data-whatever="@mdo">Action</button>
                     </td>
                   
   <div class="modal fade leave-modal-1 " id="exampleModal<?php echo $i; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
       <form id="takeaction" name="takeaction" action="<?php echo Router::url(array('controller'=>'users', 'action'=>'manger_action_leave'))?>" method="post"> 
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Take Action On Leave Application</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body clearfix">
          <div class="col-md-12">
            <label for="recipient-name" class="col-md-12">Select Status:</label>
            <select name="leave_status" class="form-control col-md-12" id="leave_status" required>
              <option value="0"><?php $status = $value['Leave']['leave_status'];
                   if ($status ==0) {
                       echo "Pending";
                   } elseif ($status ==2) {
                       echo "Reject";
                   } else {
                       echo "Approved";
                   } if($status != 1){?></option>
              <option value="1">Approve</option><?php }if($status != 2){?>
              <option value="2">Reject</option><?php }?>
                          </select>
                            <div class="">
          <input type="hidden" name="leave_approve_by" value="<?php echo AuthComponent::user('name'); ?>">
                 <input type="hidden" name="leave_id" value="<?php echo $value['Leave']['id'] ?>">
                </div>
          </div>
          <div class="col-md-12">Apply leave <?php  $date1 = $value['Leave']['leave_start_date'];$date1 = date('d F  Y', strtotime($date1)); echo $date1; ?> to <?php $date2 = $value['Leave']['leave_end_date'];$date2 = date('dS F  Y', strtotime($date2));echo $date2; ?>
          <label class="control-label"> Do You Want Modify Leave Date?  <button id="modifydate" type="button" class="btn btn-primary">Yes</button></label>
          <label class="control-label">Modify Leave Date:
            <input type="text" name="date" id="date" value="" class="daterange form-control" style="display:none" required/>
          <div id="appenddatepicer">
          
          </div>
          </div>
          <div class="col-md-12">
            <label for="message-text" class="col-md-12">Message:</label>
            <textarea name="approver_comment" cols="70" rows="4" id="approver_comment" class="form-control col-md-12" id="message-text"></textarea>
          </div>
          <div class="col-md-12">
            <label for="message-text" class="col-md-12">Backup Person:</label>
         <input type="text" class="form-control col-md-12" name="user_backup" value=""> 
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
               }
?>
                  
                </tbody>
              </table></div></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         <?php }?>
            </div></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

 </div>

        <div id="ascrail2000" class="nicescroll-rails" style="width: 5px; z-index: auto; cursor: default; position: absolute; top: 446px; left: 1066px; height: 39px; display: none; opacity: 0;"><div style="position: relative; top: 0px; float: right; width: 5px; height: 0px; background-color: rgb(195, 169, 97); border: 0px; background-clip: padding-box; border-radius: 5px;"></div></div><div id="ascrail2000-hr" class="nicescroll-rails" style="height: 5px; z-index: auto; top: 480px; left: 15px; position: absolute; cursor: default; display: none; opacity: 0;"><div style="position: absolute; top: 0px; height: 5px; width: 0px; background-color: rgb(195, 169, 97); border: 0px; background-clip: padding-box; border-radius: 5px; left: 0px;"></div></div><div id="ascrail2003" class="nicescroll-rails" style="width: 5px; z-index: auto; cursor: default; position: absolute; top: 446px; left: 1066px; height: 39px; display: none;"><div style="position: relative; top: 0px; float: right; width: 5px; height: 0px; background-color: rgb(22, 174, 159); border: 0px; background-clip: padding-box; border-radius: 5px;"></div></div><div id="ascrail2003-hr" class="nicescroll-rails" style="height: 5px; z-index: auto; top: 480px; left: 15px; position: absolute; cursor: default; display: none;"><div style="position: absolute; top: 0px; height: 5px; width: 0px; background-color: rgb(22, 174, 159); border: 0px; background-clip: padding-box; border-radius: 5px;"></div></div></div>
        <!-- /st-content-inner -->

      </div>
      <!-- /st-content -->
    <!-- Footer -->
   <footer class="footer">
      <strong>Atlogys Technical Cunsulting HR Dashboard </strong>© Copyright 2017
    </footer>
    <!-- // Footer -->

  </div>
 
  <script>
  $("#modifydate").click(function () {
  $("#date").attr("style","disply:block");
  $("#modifydate").attr("disabled","disabled");
});
jQuery(document).ready(function($) {
   $('#addleave').validate({
     rules: {
      date :{
             required: true
             },

      leavetype :{
             required: true
             },

     },
     messages: {
      date :{

        required: "Please enter your first name."
      },

      leavetype :{
        required: "Please enter your last name."
      },
     
       },
           });


   });
</script>

  <script>
  $('#date').attr("placeholder","Check In");
(function(){
  $('.dropdown').click(function(){ 
  $(this).addClass("open");
    });
})();
$('.daterange').daterangepicker();
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
  $( ".daterange" ).datepicker({
  onSelect: function(date) {
     var term = $('.daterange').val();
    alert(term);
    //do your processing here
  }
 })
  $('.daterange').val('Check In');
   $('.daterange').datepicker({
                    format: "dd/mm/yyyy",

    
                });

</script>
<?php echo $this->Html->script('all'); ?>
<?php echo $this->Html->script('app'); ?>
<?php echo $this->Html->script('js'); ?>
</body></html>