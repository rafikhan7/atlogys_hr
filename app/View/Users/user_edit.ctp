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
   <h4>User Edit  </h4>
</div>
<div class="box-body">
   <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
     
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">
                    <a href="<?php echo Router::url(array('controller'=>'users', 'action'=>'user_list'))?>">
                    <i class="fa fa-fw fa-remove"></i> <span></span></a></button>
                  <h4 class="modal-title">Edit User Information</h4>
               </div>
               <div class="box box-primary">
                  <div class="box-header with-border">
                     <h3 class="box-title">Enter Details</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" action="<?php echo Router::url(array('controller'=>'users', 'action'=>'admin_user_edit'))?>" method="post">
                     <div class="box-body">
                        <?php 
                     foreach ($user as $key => $value) {
                      ?>
                        <div class="form-group user-registration
                           '">
                           <label for="exampleInputEmail1">username</label>
                           <input type="text" class="form-control" id="username"
                              name="username" value="<?php echo $value['username']?>" placeholder="Enter First Name">
                        </div>
                         <input type="hidden" class="form-control" id="username"
                              name="id" value="<?php echo $value['id']?>" placeholder="Enter First Name">
                        <div class="form-group user-registration">
                           <label for="exampleInputEmail1">First Name</label>
                           <input type="text" class="form-control" id="first_name"
                              name="first_name" value="<?php echo $value['first_name'];?>" placeholder="Enter First Name">
                        </div>
                        <div class="form-group user-registration">
                           <label for="exampleInputEmail1">Last Name</label>
                           <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $value['last_name'];?>" placeholder="Enter Last Name">
                        </div>
                        <div class="form-group user-registration">
                           <label for="exampleInputEmail1">Desginatiom</label>
                           <input type="text" class="form-control" id="designation" name="designation" value="<?php echo $value['designation'];?>" placeholder="Enter Designation">
                        </div>
                        <div class="form-group user-registration">
                           <label for="exampleInputEmail1">Department</label>
                           <select class="form-control" id="department"
                              name="department">
                              <?php $optionVlue = $value['department']; ?>
                              <option value="<?php echo $optionVlue;?>"><?php echo $value['department'];?></option>
                              <?php if($optionVlue != 'Development') {?>
                              <option value="Development">Development</option>
                              <?php }?>
                              <?php if($optionVlue != 'QA') {?>
                              <option value="QA">QA</option>
                              <?php }?>
                              <?php if($optionVlue != 'HR Admin') {?>
                              <option value="HR Admin">HR Admin</option>
                              <?php }?>
                              <?php if($optionVlue != 'UI Department') {?>
                              <option value="UI Department">UI Department</option>
                              <?php }?>
                              <?php if($optionVlue != 'Oprations') {?>
                              <option value="Development">Oprations</option>
                              <?php }?>
                            </select>
                           
                        </div>
                        <div class="form-group user-registration">
                           <label for="exampleInputEmail1">D.O.B.</label>
                           <input type="date" class="form-control" id="date" name="date_of_birth"  format="yyyy-MM-dd" value="<?php echo $value['date_of_birth'];?>" placeholder="Enter Designation">
                        </div>
                        <div class="form-group user-registration">
                           <label for="exampleInputEmail1">Joining Date.</label>
                           <input type="date" class="form-control" id="date" name="joining_date"  format="yyyy-MM-dd" value="<?php echo $value['joining_date'];?>" placeholder="Enter Designation">
                        </div>
                        <div class="form-group user-registration">
                           <label for="exampleInputEmail1">Experience</label>
                           <input type="text" class="form-control" id="experience" name="experience" value="<?php echo $value['experience'];?>" placeholder="Enter Designation">
                        </div>
                         <div class="form-group user-registration">
                           <label for="exampleInputEmail1">Current Address</label>
                             <textarea class="form-control input-lg" id="address"
                              name="address" placeholder="Enter Current Address"rows="4" cols="30"><?php echo $value['address'];?>
                              </textarea>
                        </div>
                         <div class="form-group user-registration">
                           <label for="exampleInputEmail1">Permanent Address</label>
                              <textarea class="form-control input-lg" id="per_address"
                              name="per_address"  placeholder="Enter Permanent Address"rows="4" cols="30"><?php echo $value['per_address'];?>
                              </textarea>
                        </div>
                         <div class="form-group user-registration">
                           <label for="exampleInputEmail1">Phone Number</label>
                           <input type="tel" class="form-control " id="phone_number"
                              name="phone_number" value="<?php echo $value['phone_number'];?>" placeholder="Enter Phone Number">
                        </div>
                        <div class="form-group user-registration"><input type="hidden" class="form-control" id="UserRole" name="data[user][role]" value="user" placeholder="Enter role">
                        </div>
                        <div class="form-group user-registration
                           "><input type="hidden" class="form-control" id="UserRole" 
                           name="role" value="<?php echo $value['role'];?>" placeholder="Enter role">
                        </div>
                        <div class="form-group user-registration">
                           <label for="exampleInputEmail1">Email address</label>
                           <input type="email" class="form-control" id="email"
                              name="email"  value="<?php echo $value['email'];?>" placeholder="Enter email">
                        </div>
                          <div class="form-group user-registration">
                           <label for="exampleInputPassword1">Manager</label>
                           <input  type="checkbox" name="is_reporting_manager" value="1" 
                           <?php $chackdata = $value['is_reporting_manager']; if ($chackdata == 1) echo "checked='checked'"; ?> />
                        </div>
                            <div class="form-group user-registration">
                         <label for="exampleInputPassword1">Reporting Manager</label> 
                         
                            
                              
                        <select name="reporting_manager">
                            <option value=""><?php echo $value['manager_name'];?></option>                          
                            <?php 
                               $manageroptionselcted = $value['manager_name'];

                              foreach ($friendList as $friendList){ 
                                $manageroption = $friendList['User']['name'];

                        if($friendList['User']['is_reporting_manager'] == 1 && $manageroption != $manageroptionselcted){?>
                            <option value="<?php echo $friendList['User']['id'];?>"> 
                              <?php echo $manageroption; ?></option>
                            <?php } }?>
                           </select>
                           </div>
                           <div class="form-group user-registration">
                         <label for="exampleInputPassword1">Select CC Person</label> 
                         <select name="cc_id" id="cc_id" multiple>
                            <option value="">Select CC Person</option>
                            <?php foreach ($friendList as $friendList){
                                ?>
                            <option value="<?php echo $friendList['id'];?>"> 
                              <?php echo $friendList['first_name'];?>  
                             <?php echo $friendList['last_name'];?></option>
                            <?php  }?>
                           </select>
                           </div>
                     </div>
                      <?php 
                     }
                      ?>

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