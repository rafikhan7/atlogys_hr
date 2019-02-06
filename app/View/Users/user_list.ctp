
<div class="" >
    <!-- Content Header (Page header) -->
<div class="callout callout-info">
   <h4>Atlogys HR User List  </h4>
</div>
    <section class="content-header">
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-info">Add New User</button>

      <div class="modal modal-info fade user-registration-form" id="modal-info">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">New User Registration</h4>
               </div>
               <div class="box box-primary">
                  <div class="box-header with-border">
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" id="adduser" action="<?php echo Router::url(array('controller'=>'users', 'action'=>'admin_register'))?>" method="post" enctype = "multipart/form-data" >
                     <div class="box-body">

                        <div class="row" > 
                        <div class="col-md-12">
                           <div class="user-registration">
                           <label for="exampleInputEmail1">Employe ID*</label>
                           <input type="text" class="form-control" id="employe_id"
                              name="employe_id" placeholder="Enter Employe id">
                           </div>
                        </div>
                        </div>

                        <div class="row margin-top-20">
                            <div class="col-md-6">
                            <div class="user-registration
                           '">
                           <label for="exampleInputEmail1">First Name*</label>
                           <input type="text" class="form-control" id="first_name"
                              name="first_name" placeholder="Enter First Name">
                        </div>
                         </div>

                          <div class="col-md-6">
                             <div class="user-registration">
                             <label for="exampleInputEmail1">Last Name*</label>
                             <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name">
                             </div>
                          </div>
                        </div>                       
                       
                        <div class="row margin-top-20">
                            <div class="col-md-6">
                              <div class="user-registration">
                             <label for="exampleInputEmail1">Desgination*</label>
                             <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter Designation">
                          </div>
                            </div>

                            <div class="col-md-6">
                              <div class="user-registration">
                               <label for="exampleInputEmail1">Department*</label>
                               <select class="form-control" id="department"
                                  name="department">
                                  <option value="">Select Department</option>
                                  <option value="Development">Development</option>
                                  <option value="QA">QA</option>
                                  <option value="HR Admin">HR Admin</option>
                                  <option value="UI Department">UI Department</option>
                                  <option value="Oprations">Operations</option>
                                </select>
                             </div>
                            </div>

                            </div>

                             <div class="row margin-top-20">
                            <div class="col-md-12">
                               <div class="user-registration">
                               <label for="exampleInputEmail1">Email address*</label>
                               <input type="email" class="form-control" id="email"
                                  name="email" placeholder="Enter email">
                              </div>
                            </div>

                           
                            </div>

                              <div class="row margin-top-20">
                              
                              <div class="col-md-6">
                                <div class="user-registration">
                                <label for="exampleInputEmail1">Joining Date*</label>
                                <input id="joining_date" name="joining_date" class="form-control" format="yyyy-MM-dd" type="date">
                                </div>
                              </div>

                              <div class="col-md-6">
                               <div class="user-registration">
                                 <label for="exampleInputEmail1">Phone Number*</label>
                                 <input type="text" class="form-control " id="phone_number"
                                    name="phone_number" placeholder="Enter Phone Number" onkeypress='validate(event)'>
                              </div>
                              </div>

                              </div>


                              <div class="row margin-top-20">
                             
                              <div class="col-md-6">
                                 <div class="user-registration">
                                   <label for="exampleInputEmail1">D.O.B.*</label>
                                   <input  id="date_of_birth" name="date_of_birth" class="form-control" format="yyyy-MM-dd" type="date">
                                 </div>
                              </div>
                          
                            <div class="col-md-6">
                              <div class="user-registration">
                               <label for="exampleInputEmail1">Experience*</label>
                               <input type="text" class="form-control" id="experience"
                                  name="experience" placeholder="Enter Experience">
                            </div>
                            </div>
                        </div>


                  
                        
                           <div class="row margin-top-20">
                          
                        </div>

                         
                              <div class="row margin-top-20">
                               <div class="col-md-6">
                                <div class="user-registration">
                                <label for="exampleInputEmail1">Address</label>
                                <textarea class="form-control" id="address" name="address" placeholder="Enter Current Address"rows="4" cols="30"></textarea>
                                 </div>
                               </div>

                               <div class="col-md-6">
                                   <div class="user-registration">
                                   <label for="exampleInputEmail1">Permanent Address</label>
                                   <textarea class="form-control" id="per_address"
                                      name="per_address" placeholder="Enter Permanent Address" rows="4" cols="30"></textarea>                             
                                </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="user-registration">
                                   <label for="exampleInputEmail1">Zip code*</label>
                                   <input type="text" class="form-control" id="zip_code"
                                  name="zip_code" placeholder="Enter Zip code"></div>
                               </div>
                               <div class="col-md-6">
                                   <div class="user-registration">
                                   <label for="exampleInputEmail1">Personal Email ID*</label>
                                   <input type="text" class="form-control" id="per_email"
                                  name="per_email" placeholder="Enter Email"></div>
                               </div>

                               <div class="col-md-6">
                                   <div class="user-registration">
                                   <label for="exampleInputEmail1">PAN Card No.*</label>
                                   <input type="text" class="form-control" id="pan_no"
                                  name="pan_no" placeholder="Enter PAN No">
                                                        
                                </div>
                               </div>

                               <div class="col-md-6">
                                   <div class="user-registration">
                                   <label for="exampleInputEmail1">Aadhar Card No *</label>
                                   <input type="text" class="form-control" id="adhar_no"
                                  name="adhar_no" placeholder="Enter Aadhar No">                       
                                </div>
                               </div>


                               <div class="col-md-6">
                                   <div class="user-registration">
                                   <label for="exampleInputEmail1">Emergancy Contact Name* </label>
                                   <input type="text" class="form-control" id="emergancy_contact_number"
                                  name="emergancy_contact_number" placeholder="Emergancy Contact Name">                        
                                </div>
                               </div>

                               </div>

                               <div class="row margin-top-20">
                               <div class="col-md-12">
                                 <div class="user-registration checkbox">
                            <label>
                              <input rel="active" type="checkbox" name="is_reporting_manager" id="is_reporting_manager" value="1" /> User Role Manager?
                            </label>
                          </div>
                               </div>
                               </div>

                                <div class="row margin-top-20">
                                
                                <div class="col-md-6">
                                    <div class="user-registration">
                                     <label for="exampleInputPassword1">Reporting Manager</label>
                                      <select name="manager_id" id="manager_id" class="form-control" >
                                      <option value="">Select Reporting Manager</option>
                                      <?php 
                                        foreach ($user as $value) {
                                            if ($value['User']['is_reporting_manager']== 1) {
                                                ?>
                                      <option value="<?php echo $value['User']['id']; ?>"><?php echo $value['User']['first_name']; ?>  
                                       <?php echo $value['User']['last_name']; ?></option>
                                      <?php
                                            }
                                        }?>
                                     </select>
                                </div>
                                </div>

                                 <div class="col-md-6">
                                    <div class="user-registration">
                                     <label for="exampleInputPassword1">Select CC Person</label>
                                      <select name="cc_id" id="cc_id"  class="form-control mdb-select colorful-select dropdown-primary" multiple searchable="Search here..">
                                      <?php 
                                        foreach ($user as $value) {
                                            if ($value['User']['is_reporting_manager']== 1) {
                                                ?>
                                      <option value="<?php echo $value['User']['id']; ?>"><?php echo $value['User']['first_name']; ?>  
                                       <?php echo $value['User']['last_name']; ?></option>
                                      <?php
                                            }
                                        }?>
                                     </select>
                                  </div>
                                 </div>

                                </div>

                 



                          <div class="row margin-top-20">
                              <div class="col-md-6">
                                  <div class="user-registration">
                                   <label for="exampleInputPassword1">Add CL</label>
                                   <input rel="active" type="text" class="form-control" name="cl" id="cl" />
                                </div>
                              </div>

                             <div class="col-md-6">
                                  <div class="user-registration">
                                   <label for="exampleInputPassword1">Add EL</label>
                                   <input rel="active" type="text" class="form-control" name="el" id="el" />
                                </div>
                              </div>

                          </div>

                      
                          <div class="row margin-top-20">
                              <div class="col-md-6">
                               <div class="user-registration">
                           <input class="btn btn-primary" type="submit" value="Submit"> 
                        </div>
                              </div>
                            </div> 
                            <br/> 
                       
                      
                      
                       <!--  <div class="form-group user-registration">
                           <label for="exampleInputFile">Profile Image</label>
                           <input type="file" id="image" name="file">
                        </div> -->

                       

                     

                      

                     </div>



                     <!-- /.box-body -->

                    <!--  <div class="box-footer">
                       
                      
                     </div> -->
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
 <script type="text/javascript">
        toastr.options = {
            "timeOut": "5000",
            "positionClass": "toast-top-center"
        }
        Command: toastr["success"]("<?php echo $successmsg; ?>, ")
    </script>
    <section class="content">

      <?php
      if (!empty($successmsg)) {
          ?>

        <script type="text/javascript">
        toastr.options = {
            "timeOut": "5000",
            "positionClass": "toast-top-center"
        }
        Command: toastr["success"]("<?php echo $successmsg; ?>, ")
    </script>
     <?php
      }
      if (!empty($errormsg)) {
          ?>

           <div class="alert alert-danger">
  <strong><?php echo $errormsg;?>
</div>
     <?php
      } ?>

     
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">User List</h3>
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
                     <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Name</th>
                     <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Desgination</th>
                     <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Department</th>
                     <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Joining Date</th>
                     <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Email</th>
                     <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Role</th>
                     <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Created Date</th>
                     <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                  </tr>
                </thead>
                
              <tbody>
                  <?php $i =0;
                     foreach ($user as $key => $value) {
                         $i++;
                         $id = $value['User']['id']; ?>
                  <tr role="row" class="odd">
                      <td class="sorting_1"><?php echo $i; ?></td>
                     <td class="sorting_1"><a  href="<?php echo $this->webroot; ?>users/user_view/<?php echo $id?>"><?php echo $value['User']['first_name'] ?>  
                         <?php echo $value['User']['last_name'] ?></a></td>
                     <td class="sorting_1"><?php echo $value['User']['designation'] ?></td>
                     <td class="sorting_1"><?php echo $value['User']['department'] ?></td>
                     <td class="sorting_1"><?php $timestamp = $value['User']['joining_date'];
                     $joiningdate = date('d F  Y', strtotime($timestamp));
                      echo $joiningdate; ?></td>
                     <td><?php echo $value['User']['email'] ?></td>
                     <td><?php echo $value['User']['role'] ?></td>
                     <td><?php $timestamp = $value['User']['created'];
                              $datetime = explode(" ",$timestamp);
                              $date = $datetime[0];   

                   $date = date('d F  Y', strtotime($date));
                   echo $date; ?> </td>
                     <td>
                        <a href="#"><i class="fa fa-eye"  data-toggle="modal" data-target="#modal-warning<?php echo $i; ?>"></i></a>
                           
                        <a href="<?php echo Router::url(array('controller'=>'users', 'action'=>'admin_user_edit'))."/".$id?>"><i class="fa fa-fw fa-edit"></i></a>
                         <a href="#"><i class="fa fa-fw fa-remove" data-toggle="modal" data-target="#myModal<?php echo $i; ?>"></i></a>
                        
                  </tr>
<!-- Modal -->
  <div class="modal fade" id="myModal<?php echo $i; ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Usr Delete</h4>
        </div>
        <div class="modal-body">
          <p>Are you sure you want to delete <?php echo $value['User']['first_name'] ?>  <?php echo $value['User']['last_name'] ?> account ?</p>
          <a class="button btn btn-primary" href="<?php echo Router::url(array('controller'=>'users', 'action'=>'admin_user_delete'))."/".$id?>">Yes</a> <button type="button" class="button btn btn-primary" data-dismiss="modal">No</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<div class="modal fade" id="modal-warning<?php echo $i; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><?php echo $value['User']['first_name'] ?> Profile</h4>
              </div>
              <div class="modal-body">

              <div class="user-details-form clearfix">
                  <?php $ProfileImg = $value['User']['profile_image']; if(empty($ProfileImg)){?>
               <img src="<?php echo $this->webroot; ?>files/uploads/users/profile.png" class="img-circle" alt="User Image">
             <?php }else{?>
                 <img src="<?php echo $this->webroot; ?>files/uploads/users/<?php echo $ProfileImg; ?>" class="img-circle" alt="User Image">
               <?php }?>
                     <div class="user-details">
                         <div class="profile-usertitle-name">
                          <?php echo $value['User']['first_name'] ?>  <?php echo $value['User']['last_name'] ?>
                       </div>
                     
                       <div class="profile-usertitle-job">
                            <?php echo $value['User']['designation']; ?><br>
                          <!-- <button type="button" class="btn btn-danger btn-sm">Send Message</button> -->
                       </div>
                     </div></div><!-- user-details-form ended -->


               
           
              <div class="user-description clearfix">
               

  
              <div class="col-md-12">
                 <div class="profile-sidebar">
              
                     
                       <ul class="nav">
                          <li class="col-sm-6">
                             <strong>Designation:</strong><?php echo $value['User']['designation'] ?>
                          </li>
                          <li class="col-sm-6">  
                              <strong>Experience:</strong>
                              <?php  $previusExp = $value['User']['experience'] ?>
                        <?php  
                        $joiningDate = $value['User']['joining_date'];
                         $currentDate =  date("Y-m-d");
                         $ts1 = strtotime($joiningDate);
                         $ts2 = strtotime($currentDate);
   

                         $year1 = date('Y', $ts1);
                         $year2 = date('Y', $ts2);

                         $month1 = date('m', $ts1);
                         $month2 = date('m', $ts2);

                         $months = (($year2 - $year1) * 12) + ($month2 - $month1);
                         $years = $months/12;
                         $totalExp = $previusExp + $years;
                         echo number_format((float)$totalExp, 1, '.', ''); ?>
                          </li>
                          <li class="col-sm-6">
                             <strong>Department:</strong><?php echo $value['User']['department']; ?>
                          </li>
                          <li class="col-sm-6">
                             <strong>D.O.B.:</strong>
                             <?php $dob = $value['User']['date_of_birth'];
                     $dobDate = date('d F  Y', strtotime($dob));
                      echo $dobDate; ?>
                          </li>
                          <li class="col-sm-6">
                             <strong>Joining Date:</strong> <?php $timestamp = $value['User']['joining_date'];
                     $joiningdate = date('d F  Y', strtotime($timestamp));
                      echo $joiningdate; ?>
                          </li>
                          <li class="col-sm-6">
                             <strong>Current Address:</strong><?php echo $value['User']['address']; ?>
                          </li>

                          <li class="col-sm-6"> <strong>Permanent Address: </strong><?php echo $value['User']['per_address']; ?>
                          </li>
                           <li class="col-sm-6">
                              <strong>Phone Number:</strong><?php echo $value['User']['phone_number']; ?>
                          </li>
                          <li class="col-sm-6">
                              <strong>Role :</strong>
                             <?php echo $value['User']['role'] ?>
                          </li>

                       </ul>
                    </div>   
                 </div>
            </div>
              </div>

             <!--  <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              </div> -->
            </div>
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
              <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
              <?php echo $this->Paginator->numbers(array(   'class' => 'numbers '     ));?>
              <?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
                
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
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
    <!-- /.content -->
  </div>
<script>
jQuery(document).ready(function($) {
   $('#adduser').validate({
     rules: {
      employe_id:{
             required: true
             },
      first_name :{
             required: true
             },

      last_name :{
             required: true
             },

       email:{
             required: true
         },

      designation:{
          required:true
         },

      department:{
          required:true
         },

      date_of_birth:{
          required:true
         },

      joining_date:{
          required:true
         },

      address:{
          required:true
         },

      per_address:{

          required:true

         },
      phone_number:{
          required:true
         },

      experience:{
          required:true
         },

      manager_id:{
          required:true
         },
      per_email:{
          required:true
         },
      pan_no:{
          required:true
         },
      adhar_no:{
          required:true
         },
      emergancy_contact_name:{
          required:true
         },
      emergancy_contact_number:{
          required:true
         },
      zip_code:{
          required:true
         },

     },
     messages: {
      employe_id :{

        required: "Please Enter Employe ID."
      },
      first_name :{

        required: "Please Enter First Name."
      },

      last_name :{
        required: "Please Enter Last Name."
      },

      email :{
        required: "Please Enter Email address."
      },
      designation: {
             required: "Please Enter Designation."
          },

       department: {
             required: "Please Enter Department."
          },

      date_of_birth: {
             required: "Please Enter Date of Birth."
          },

      joining_date: {
             required: "Please Enter Joining Date."
          },

      address: {
             required: "Please Enter Address."
          },

      per_address: {
             required: "Please Enter Permanent Address."
          },

      phone_number: {
             required: "Please Enter Phone Number."
          },

      experience: {
             required: "Please Enter Experience."
          },

      manager_id: {
             required: "Please Select Reporting Manager."
          },
      per_email: {
             required: "Please Enter Personal Email id."
          },
      pan_no: {
             required: "Please Enter Pan Card no."
          },
      adhar_no: {
             required: "Please Enter Adhar number."
          },
      emergancy_contact_name: {
             required: "Please Enter Emergancy Conatct Name."
          },
     emergancy_contact_number: {

             required: "Please Enter Emergancy Contact Number."

          },
      zip_code: {
               required: "Please Enter Zip Code."
             },
     
       },
           });


   });
function validate(evt) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode( key );
  var regex = /[0-9]|\./;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}

$( "#close" ).click(function() {
  $('#adduser')[0].reset();
  var validator = $( "#adduser" ).validate();
    validator.resetForm();
});


  
  

// Future date disbale function start here 

var dtToday = new Date();
    
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
        day = '0' + day.toString();
    
    var maxDate = year + '-' + month + '-' + day;
    $('#date_of_birth, #joining_date').attr('max', maxDate);

// Future date disbale function ended here 





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
  