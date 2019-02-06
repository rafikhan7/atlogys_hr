
 <?php
    $link = $this->request->here;
    $link_array = explode('/',$link);
    $teamid = end($link_array);
?>
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add Team Member</h4>
              </div>
              <div class="modal-body">
                 <img class="team-img" src="/project/img/team1.jpg" class="img-circle" alt="User Image">
                      <a class="users-list-name" href="#"></a>
                      <span class="users-list-date"></span>
                        <div class="container">
   
      <div class="col-md-6">
         <div class="profile-sidebar">
      
               <div class="profile-usertitle-name">Add New Team Members
               </div>
               <div class="profile-usertitle-job">
                  
                 
               </div> 
               <form id="mainDiv" action="<?php echo Router::url(array('controller'=>'teams', 'action'=>'admin_team_list'))?>" method="post">
               <ul>
                 <input type="hidden" name="teamid" value="<?php echo $teamid;?>">
                </ul>
                 <input type="submit" value="add">
              </div>
              </form>
                <select name="user" onchange="selectIngredient(this);" class="selectpicker" data-style="btn-primary">
              
                      <option value="">Select Team Members</option>

                  <?php foreach ($users as  $value) {

                    ?>
              
                                <option value="<?php echo $value['User']['id']?>">
                                  <?php echo  $value['User']['first_name'];?> <?php echo $value['User']['last_name']?></option>
                 <?php     }?>
                 
                </select>
                 
            </div>

               
         </div>
      </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
              </div>
            </div>
            <!-- /.modal-content -->

          <!-- /.modal-dialog -->
      
        <!-- /.modal -->







<script>

  function selectIngredient(select)
{
  var option = select.options[select.selectedIndex];
  var ul = select.parentNode.getElementsByTagName('ul')[0];
     
  var choices = ul.getElementsByTagName('input');
  for (var i = 0; i < choices.length; i++)
    if (choices[i].value == option.value)
      return;
     
  var li = document.createElement('li');
  var input = document.createElement('input');
  var text = document.createTextNode(option.firstChild.data);
     
  input.type = 'hidden';
  input.name = 'user[]';
  input.value = option.value;

  li.appendChild(input);
  li.appendChild(text);
  li.setAttribute('onclick', 'this.parentNode.removeChild(this);');     
    
  ul.appendChild(li);
}
  </script>