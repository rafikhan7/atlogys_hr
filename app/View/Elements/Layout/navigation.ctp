<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
  
  <!-- Sidebar user panel start here -->
   <!--   
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $this->webroot; ?>img/logo.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Atlogys HR </p>
          <a href="#"><i class="fa fa-circle text-success"></i>Online</a>
        </div>
      </div> -->
      <!-- search form -->
      <!-- Sidebar user panel ended here -->
  


      <?php
    $link = $this->request->here;
    $link_array = explode('/', $link);
     $page = end($link_array);
?>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu tree" data-widget="tree">
        <!-- <li class="header">MAIN NAVIGATION</li> -->
        <li class="<?php if ($page== "admin") {
    ?> active<?php
} ?> treeview menu-open">
          <a href="<?php echo Router::url(array('controller'=>'users', 'action'=>'admin_dashboard'))?>">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="<?php if ($page== "user_list") {
        ?> active<?php
    } ?> treeview menu-open">
          <a href="<?php echo Router::url(array('controller'=>'users', 'action'=>'user_list'))?>">
          <i class="fa fa-users"></i> <span>Atlogys Users</span>
        </a>
        </li>
        
        <li class="<?php if ($page== "leave_list") {
        ?> active<?php
    } ?> treeview menu-open">
          <a href="<?php echo Router::url(array('controller'=>'leaves', 'action'=>'admin_leave_list'))?>">
              <i class="fa fa-dashboard"></i> <span>Leave Managment</span>
          </a>
        </li>
                <li class="<?php if ($page== "evnt_list") {
        ?> active<?php
    } ?>  treeview menu-open">
          <a href="<?php echo Router::url(array('controller'=>'events', 'action'=>'admin_evnt_list'))?>">
           <i class="fa fa-fw fa-calendar-check-o"></i><span>Events</span>
          </a>
        </li>
         
           <!--  <li class="<?php if ($page== "post_list") {
        ?> active<?php
    } ?>  treeview menu-open">
          <a href="<?php echo Router::url(array('controller'=>'posts', 'action'=>'admin_post_list'))?>">
           <i class="fa fa-fw fa-calendar-check-o"></i><span>Technical Post</span>
          </a>
        </li> -->

         <li class="<?php if ($page== "notification_list") {
        ?> active<?php
    } ?>  treeview menu-open">
          <a href="<?php echo Router::url(array('controller'=>'holidays', 'action'=>'admin_holiday_list'))?>"> 
          <i class="fa fa-globe" aria-hidden="true"></i><span>Official Holidays</span>
          </a>
        </li>


          <ul class="treeview-menu">
            <li><?php  echo $this->Html->link("View Admin Profile", array('controller'=>'users','action'=>'admin_profile'));  ?></li>
            <li><?php  echo $this->Html->link("Edit Admin Profile", array('controller'=>'users','action'=>'admin_profile_edit'));  ?></li>
              <?php $user = $this->Session->read('Auth.User');
              if ($user['role'] == 'admin') {
                  ?>
            <li><?php  echo $this->Html->link("View Atlogys Employe List", array('controller'=>'users','action'=>'user_list')); ?></li>
            <li><?php  echo $this->Html->link("Create A New User", array('controller'=>'users','action'=>'admin_add')); ?></li>
            <?php
              } ?>
            <li><?php  echo $this->Html->link("Logout", array('controller'=>'users','action'=>'admin_logout'));  ?></li>
          </ul>
       
    </section>
    <!-- /.sidebar -->
  </aside>