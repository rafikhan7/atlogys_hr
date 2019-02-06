<footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright © 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
    
<?php echo $this->Html->script('toastr'); ?>
<?php echo $this->Html->script('moment.min'); ?>
<?php echo $this->Html->script('daterangepicker'); ?>
<?php echo $this->Html->script('toastr'); ?>
<?php 
if (!$this->Session->read('Auth.User')) {
    return $this->redirect('/');
}?>       
<?php echo $this->Html->script('markerclusterer.min'); ?>
<?php echo $this->Html->script('jquery.validate.min'); ?>
<?php echo $this->Html->script('bootstrap.min'); ?>
<?php echo $this->Html->script('lightbox.min'); ?>
<?php echo $this->Html->script('perfect-scrollbar.min'); ?>
<?php echo $this->Html->script('customjs'); ?>
<?php echo $this->Html->script('custom');?>
  </footer>