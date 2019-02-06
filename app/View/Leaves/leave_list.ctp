
     <?php
    $link = $this->request->here;
    $link_array = explode('/', $link);
     $page = end($link_array);
     $second  = explode(':', $page);
     $pageVal = end($second);
?><!-- app/View/leaves/add.ctp -->
<style>
.leave-registration label {
    width: 20%;
    /* display: block; */
}
.leave-registration {
    display: block;
    width: 100%;
    padding-bottom: 15px;
}
</style>
<div class="leaves form">
<div class="callout callout-info">
   <h4>Atlogys Employee Leave List  </h4>
</div>
<div class="box-body">
   <div id="example2_wrapper" class="form-inline dt-bootstrap">
      <div class="row">
         <div class="col-sm-6"></div>
         <div class="col-sm-6"></div>
      </div>
     
     <div class="row">
        <div class="col-xs-12  ">
          <div class="box">
            <div class="box-header leave-export">
              <h3 class="box-title">Leave List</h3>
             <form class="employee-form"  action="<?php echo Router::url(array('controller'=>'leaves', 'action'=>'admin_leave_list'))?>" method="post">
             <select name="myselect" class="form-control" id="myselect" onchange="this.form.submit()" >
               <option <?php if($selected =='desc'){ echo "selected"; } ?> value="desc">All</option>
               <option <?php if($selected ==1){ echo "selected"; } ?> value="1">Approved</option>
               <option <?php if($selected ==2){ echo "selected"; } ?> value="2">Rejected</option>
               <option <?php if($selected ==0){ echo "selected"; } ?> value="0">Pending</option>
             </select>

             </form>
              <button type="button btn export-btn "><?php echo $this->Html->link('Download Last Month Leave List',array('controller'=>'leaves','action'=>'export'), array('target'=>'_blank')); ?> </button>
            </div>
             <?php if(empty($leave)){?>
                    
                  <div class="if-empty">
                      <p>No Records found !</p>
                  </div>
                  <?php } else{ ?>
            <div class="box-body">
              <div id="example2_wrapper" class=" form-inline dt-bootstrap">
              <div class="row">
              <div class="col-sm-6">
                
              </div>
              <div class="col-sm-6"></div>
              </div>

              <div class="row">
              <div class="col-sm-12 table-scroll-con">
              <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                 <tr role="row">
                  <th class="" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">S.N</th>
                     <th  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Name</th>
                     <th  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Leave Start</th>
                     <th  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Leave End </th>
                     <th  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Numbers of Leaves</th>
                      <th  tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Status</th>
                     <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Approved By</th>
                     <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Approved Date</th>
                     <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Request Text</th>
                     <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Comment</th>
                     <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Leave apply Date</th>
                  <!--    <th tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th> -->
                  </tr>
                </thead>
                <tbody>
                  
                    
                     <?php 
                 if(is_numeric($pageVal)){
                 $i = $pageVal*10-9;
               }
                 else{ $i =1;
                    # code...
                  } foreach ($leave as $value) {?>
                  <tr role="row" class="odd">
                    

                <td class="sorting_1"><?php echo $i;?></td>
                <td class="sorting_1"><?php echo $value['Leave']['apply_by'];?></td>
                <td class="sorting_1"><?php  $date1 = $value['Leave']['leave_start_date'];$date1 = date('d F  Y', strtotime($date1));echo $date1;?></td>
                <td class="sorting_1"><?php $date2 = $value['Leave']['leave_end_date'];$date2 = date('dS F  Y', strtotime($date2));echo $date2; ?></td>
                     <td class="sorting_1"><?php echo $value['Leave']['total_leaves']; ?></td>
                     <td class="sorting_1"><?php $status = $value['Leave']['leave_status'];
                       if($status ==0){
                        echo "Pending";}else if($status ==2){
                          echo "Reject";
                        }
                        else{ echo "Approve";}?></td>

                     <td><?php echo $value['Leave']['leave_approve_by'] ?></td>
                     <td><?php $approvedate = $value['Leave']['leave_approve_date'];
                            if($approvedate == '0000-00-00'){
                                echo "N/A";
                              }else{
                            echo $approvedate;
                             }?></td>

                     <td><?php echo $value['Leave']['request_text'] ?></td>
                     <td><?php echo $value['Leave']['approver_comment'] ?></td>
                     <td><?php $timestamp = $value['Leave']['leave_created'];$datetime = explode(" ",$timestamp);$date = $datetime[0];$date = date('d F  Y', strtotime($date));echo $date; ?></td>
                     <!-- <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?php echo $i;?>" data-whatever="@mdo">Action</button>
                     </td> -->
                   
  
   <div class="modal fade" id="exampleModal<?php echo $i;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="takeaction" name="takeaction" action="<?php echo Router::url(array('controller'=>'leaves', 'action'=>'action_leave'))?>" method="post">
      <div class="modal-header">
        <span class="modal-title" id="exampleModalLabel">Take Action On Leave Application</span>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="form-control-label">Select Status:</label>
            <select name="leave_status" id="leave_status" class="form-control">
              <option value="1"><?php $status = $value['Leave']['leave_status'];
                   if ($status ==0) {
                       echo "Pending";
                   } elseif ($status ==2) {
                       echo "Reject";
                   } else {
                       echo "Approve";
                   } if($status != 1){?></option>
              <option value="1">Approve</option><?php }if($status != 2){?>
              <option value="2">Reject</option><?php }?>
            </select>
            </div>

              <div class="form-group">
          <input type="hidden" name="leave_approve_by" value="<?php echo AuthComponent::user('name'); ?>">
                 <input type="hidden" name="leave_id" value="<?php echo $value['Leave']['id'] ?>">
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
       
      </div>
      
      </form>
    </div>
  </div>
</div>
</tr>
<?php $i++;  } ?>

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
          <?php }?>
          <!-- /.box -->
        </div>
      </div>
   </div>
</div>

<script>
jQuery(document).ready(function($) {
   $('#takeaction').validate({
     rules: {
      leave_status :{
             required: true
             },

      approver_comment :{
             required: true
             },
     },
     messages: {
      leave_status :{

        required: "Please enter your first name."
      },

      approver_comment :{
        required: "Please enter your last name."
      },

      
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
