  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />


     <?php
    $link = $this->request->here;
    $link_array = explode('/', $link);
     $page = end($link_array);
     $second  = explode(':', $page);
     $pageVal = end($second);
?>


                        <div class="">
                             
                           
        <section class="clearfix col-md-12"><br/>
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#applyleav">Apply Leave</button>
       <ul class="list-inline pull-right">
             <?php 
              
         
             $el = $user['User']['el'];
             $cl = $user['User']['cl'];?>
            
              
            
              <li><button type="button" class="btn btn-primary">
                CL: <?php echo $cl; ?> </button></li>
              <li><button type="button" class="btn btn-primary">EL: <?php echo $el;?> </button></li><li><button type="button" class="btn btn-primary">Taken Leave: <?php echo $leavecount;  ?></button></li>
       </ul>

      <div class="modal applyleav fade" id="applyleav">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                Enter Leave Details
                  <button type="button" class="close" data-dismiss="modal" id="close" aria-label="Close"> 
                  <span aria-hidden="true">&times;</span></button>
               </div>
               <div class="box box-primary">
                  <div class="box-header with-border">
                     
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form role="form"  id="addleave" action="<?php echo Router::url(array('controller'=>'users', 'action'=>'user_leave'))?>" method="post">
                     <div class="box-body clearfix">
                       
                        
                        <div class="user-registration col-md-6">
                        <label class="control-label">Leave Date</label>
                      
                      <input type="text" name="date" id="date" class="daterange form-control" required/>
                    </div>

                        <div class="user-registration col-md-6" id="selectdate">
                      <label class="control-label">Leave Type*</label>
                      <select name="leavetype" id="leavetype" class="form-control" required>
                        <option value="">Leave Type</option>
                          <option value="1">Full Day</option>
                          <option value=".5">Half Day</option>
                        </select>
                        </div>

                        <div class="user-registration col-md-12 text-area-con">
                           <label for="exampleInputEmail1">Detail*</label>
                           <textarea rows="4" cols="50" name="request_text" class="form-control text-left" required></textarea>
                        </div>

                        <div class="user-registration col-md-12 text-right">
                            <input class="btn btn-primary" id="applyleave" type="submit" value="Submit">
                        </div>
                       
                         
                     </div>
                     <!-- /.box-body -->
                     
                  </form>
               </div>
               
            </div>
            <!-- /.modal-content -->
         </div>
         <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </section>


    <!-- Main content -->
    <section class="">
      <div class="">
        <div class="col-md-12">
          <div class="box">
            <div class="">
              <h3 class="box-title">Leave List</h3>
            
            </div>
            <!-- /.box-header -->
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
                      <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Action</th>
                </thead>
                <tbody>
              <tbody>
                 <?php 
                 if(is_numeric($pageVal)){
                 $i = $pageVal*10-9;
               }
                 else{ $i =1;
                    # code...
                  } //$pageVal*10-9;
                  foreach ($leave as $value) {
                   ?>
                  <tr role="row" class="odd">
                    
                  <td class="sorting_1"><span><?php echo $i; ?></span></td>
                  <td class="sorting_1"><span><?php  $date1 = $value['Leave']['leave_start_date'];$date1 = date('d F  Y', strtotime($date1)); echo $date1; ?></span></td>
                     <td class="sorting_1"><span><?php $date2 = $value['Leave']['leave_end_date'];$date2 = date('dS F  Y', strtotime($date2));echo $date2; ?></span></td>
                     <td class="sorting_1"><span><?php echo $value['Leave']['total_leaves']; ?></span></td>
                     <td class="sorting_1"><span><?php $status = $value['Leave']['leave_status'];
                   if ($status ==0) {
                       echo "Pending";
                   } elseif ($status ==2) {
                       echo "Reject";
                   } else {
                       echo "Approved";
                   } ?></span></td>
                     <td><span><?php echo $value['Leave']['leave_approve_by'];?></span></td>
                     <td><span><?php echo $value['Leave']['request_text'] ?></span></td>
                     <td><span><?php echo $value['Leave']['approver_comment'] ?></span></td>
                     <td><span><?php $timestamp = $value['Leave']['leave_created'];$datetime = explode(" ",$timestamp);$date = $datetime[0];$date = date('d F  Y', strtotime($date));echo $date; ?></span></td>
                     <?php $id = $value['Leave']['id'];?>
                     <td><span></a><?php if($status == 0){?><a href="<?php echo Router::url(array('controller'=>'users', 'action'=>'leave_delete'))."/".$id ?>"><i class="fa fa-fw fa-remove"></i></a><?php } ?></span></td>
                   
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

              
        </div></section>

<div class="text-right">
               <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
              <?php echo $this->Paginator->numbers(array(   'class' => 'numbers'     ));?>
              <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled '));?></div>
        </div>
      </div>
 
   <footer class="footer">
      <strong>Atlogys Technical Cunsulting HR Dashboard </strong>© Copyright 2017
    </footer>
    <!-- // Footer -->

 
  <script>
jQuery(document).ready(function($) {
   $('#addleave').validate({
     rules: {
      date:{
             required: true
             },
      leavetype :{
             required: true
             },

      description :{
             required: true
             },
     },
     messages: {
      date :{

        required: "Please enter leave date."
      },
      leavetype :{

        required: "Please enter leave type."
      },

      description :{
        required: "Please enter leave detail."
      },
     
       },
           });


   });

(function(){
  $('.dropdown').click(function(){ 
  $(this).addClass("open");
    });
})();

 $( "#close" ).click(function() {  
  $('#addleave')[0].reset();
  var validator = $( "#addleave" ).validate();
    validator.resetForm();
});

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

</script>


  <?php echo $this->Html->script('all'); ?>
<?php echo $this->Html->script('app'); ?>
<?php echo $this->Html->script('js'); ?>

