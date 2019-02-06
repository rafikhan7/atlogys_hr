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
   <h4>Atlogys Employee User List  </h4>
 
</div>
<div class="box-body">
   <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <div class="row">
         <div class="col-sm-6"></div>
         <div class="col-sm-6"></div>
      </div>
      <div class="row">
         <div class="col-sm-12">
            <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
               <thead>
                  <tr role="row">
                     <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">User Name</th>
                     <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Designatoin</th>
                     <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Leave Date</th>
                     <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Status</th>
                     <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Approved By</th>
                     <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Request Text</th>
                     <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Comment</th>
                     <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                     foreach ($user as $key => $value) { ?>
                  <tr role="row" class="odd">
                     <td class="sorting_1"><?php echo $value['User']['first_name'] ?></td>
                     <td class="sorting_1"><?php echo $value['User']['last_name'] ?></td>
                     <td class="sorting_1"><?php echo $value['User']['name'] ?></td>
                     <td class="sorting_1"><?php echo $value['User']['username'] ?></td>
                     <td><?php echo $value['User']['email'] ?></td>
                     <td><?php echo $value['User']['role'] ?></td>
                     <td><?php echo $value['User']['created'] ?></td>
                     <td><a href="<?php echo Router::url(array('controller'=>'users', 'action'=>'admin_profile_edit'))?>"><i class="fa fa-fw fa-edit"></i></a>
                        <a href="<?php echo Router::url(array('controller'=>'users', 'action'=>'admin_dashboard'))?>"><i class="fa fa-fw fa-remove"></i></a>
                  </tr>
                  <?php } ?>
               </tbody>
            </table>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-5">
            <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
         </div>
         <div class="col-sm-7">
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
               <ul class="pagination">
                  <li class="paginate_button previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Previous</a></li>
                  <li class="paginate_button active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">1</a></li>
                  <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0">2</a></li>
                  <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0">3</a></li>
                  <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0">4</a></li>
                  <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0">5</a></li>
                  <li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0">6</a></li>
                  <li class="paginate_button next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">Next</a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>