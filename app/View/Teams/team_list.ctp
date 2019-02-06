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
ul.options li {
    background: #def url(../img/cross_bright.png) no-repeat 98% center;
    margin: 1px;
    padding: 0.1em 0.3em;
    cursor: pointer;
    color: #46a;
    font-weight: bold;
    border: solid 1px #cde;
}
</style>
    


<div class="users form">
<div class="callout callout-info">
   <h4>Atlogys Teamss </h4>
</div>
<div class="box-body">
   <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-info">Add New Teams</button>
      <div class="modal modal-info fade" id="modal-info">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">New Teams</h4>
               </div>
               <div class="box box-primary">
                  <div class="box-header with-border">
                     <h3 class="box-title">Enter Details</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" action="<?php echo Router::url(array('controller'=>'teams', 'action'=>'admin_team_add'))?>" method="post">
                     <div class="box-body">
                       
                        <div class="form-group user-registration
                           '">
                           <label for="exampleInputEmail1">Team Name</label>
                           <input type="text" class="form-control" id="Teams_title"
                              name="team_name" placeholder="Enter Team Name">
                        </div>
                        <div class="form-group user-registration">
                           <label for="exampleInputEmail1"></label>
                            <div class="box">
            <div class="box-header">
              <h3 class="box-title">Project Name & Description
              </h3>
             
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form>
                <textarea name="project_name" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
               <div class="modal-footer">
                  <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
               </div>
            </div></div>
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
              <h3 class="box-title">Teams List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                      <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">S.No</th>
                     <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Teams Name</th>
                     <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Description</th>
                     <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Created Date</th>
                     <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Team Member</th>
                     <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Action</th>
                  </tr>
                </thead>
                <tbody>
                
                  <?php
                   $i =0;
                     foreach ($teams as $key => $value) {
                      
                         
                          $i++;
                      $id = $value['Team']['id'];?>
                  <tr role="row" class="odd">
                      <td class="sorting_1"><?php echo $i; ?></td>
                     <td class="sorting_1"><?php echo $value['Team']['team_name'] ?>  
                       </td>
                     <td class="sorting_1"><?php echo $value['Team']['project_name'] ?></td>
                     <td class="sorting_1"><?php echo $value['Team']['created'] ?></td>
                     

                    <td>
                      <?php $teamid = $value['Team']['id'];
                      $team = Hash::extract($value,  'TeamUser.{n}.User.name');
                      foreach ($team as $key => $value) {
                        echo $value.",";
                       } ?>
                    </td>
                     <td>
                      <?php    ?>
                        <a href="<?php echo Router::url(array('controller'=>'teams', 'action'=>'admin_member'))?>/<?php echo $teamid; ?>"> <i class="fa fa-plus"  data-toggle="modal" data-target="#modal-warning"></i></a>
                           
                        <a href="<?php echo Router::url(array('controller'=>'Teamss', 'action'=>'admin_Teams_edit'))."/".$id?>"><i class="fa fa-fw fa-edit"></i></a>
                        <a href="<?php echo Router::url(array('controller'=>'Teamss', 'action'=>'Teams_delete'))."/".$id?>"><i class="fa fa-fw fa-remove"></i></a>
                  </tr>
                  <?php  }  ?>

                   
                 
                </tbody>
              </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-7"><div class="dataTables_paginate paging_simple_numbers" id="example2_paginate"><ul class="pagination"><li class="paginate_button previous disabled" id="example2_previous"><a href="#" aria-controls="example2" data-dt-idx="0" tabindex="0">Previous</a></li><li class="paginate_button active"><a href="#" aria-controls="example2" data-dt-idx="1" tabindex="0">1</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="2" tabindex="0">2</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="3" tabindex="0">3</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="4" tabindex="0">4</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="5" tabindex="0">5</a></li><li class="paginate_button "><a href="#" aria-controls="example2" data-dt-idx="6" tabindex="0">6</a></li><li class="paginate_button next" id="example2_next"><a href="#" aria-controls="example2" data-dt-idx="7" tabindex="0">Next</a></li></ul></div></div></div></div>
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
  
          