
<?php
    $link = $this->request->here;
    $link_array = explode('/', $link);
    $page = end($link_array);
?>
                 <!-- <i class="fa fa-bell-ookmark"></i> Events -->
                   
                                <div class="panel panel-default share">
                            <div class="panel-heading panel-heading-gray clearfix">
                                <i class="fa fa-bookmark"></i> Upcoming Events
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <?php 
                                    

                                    foreach ($events as  $value) {

                                        $eventDate = $value['Event']['event_date']; 
                                        $eventId = $value['Event']['id']; 
                                        $currentDateTime = date('Y-m-d');
                                      // if($eventDate == $currentDateTime || $eventDate >$currentDateTime  ) {
                                    ?>

                                        <div class="col-md-4">
                                            <div class="panel panel-default event-page">
                                                <div class="panel-body">
                                                    <div class="pull-right">
                                                        <a href="" class="btn btn-success btn-xs"><i class="fa fa-check-circle"></i></a>
                                                    </div>
                                                    <a href="#" class="h5">
                                                        <?php echo $value['Event']['event_title']; ?>
                                                    </a>
                                                </div>
                                                <a href="">
                       <?php $imageEvent = $value['Event']['event_image'];
                                                  if(!empty($imageEvent)){?>
                        <img src="<?php echo $this->webroot.EVENT_IMAGE_PATH; ?><?php echo $value['Event']['event_image'];  ?>" alt="image" class="img-responsive dashboard-post-img">
                        <?php }else{?>
                        <img src="<?php echo $this->webroot.POST_IMAGE_PATH;?>blog-img-1.jpg" alt="image" class="img-responsive dashboard-post-img">

                        <?php } ?>
                      </a>
                                                <ul class="icon-list icon-list-block">
                                                    <li><i class="fa fa-calendar fa-fw"></i>
                                                        <a href="">
                                                            <?php $evDate =  $value['Event']['event_date'];
                                                             $date = date('d F  Y', strtotime($evDate));
                                                            echo $date; ?>
                                                        </a>
                                                    </li>
                                                     <li><i class="fa fa-clock-o fa-fw"></i>
                                                        <a href="">
                                                            <?php echo $value['Event']['event_time']; ?>
                                                        </a>
                                                    </li>
                                                    <li><i class="fa fa-map-marker fa-fw"></i>
                                                        <a href="">
                                                            <?php echo $value['Event']['event_location']; ?>
                                                        </a>
                                                    </li>
                                                    <li><i class="fa fa-file-text-o" aria-hidden="true"></i>
                                                        <a href="">
                                                            <?php echo $value['Event']['event_description']; ?>
                                                        </a>
                                                           <a class="pull-right" href="<?php echo Router::url(array('controller'=>'Events', 'action'=>'event_detail'))."/".$eventId?>" class="btn btn-primary btn-xs custom-btn ">Read More</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <?php //}
                                                } ?>
                                </div>
                            </div>
                        </div>

  <?php echo $this->Html->script('all'); ?>
<?php echo $this->Html->script('app'); ?>
<?php echo $this->Html->script('js'); ?>
<script>
(function(){
  $('.dropdown').click(function(){ 
  $(this).addClass("open");
    });
})();
$( "#close" ).click(function() {
  $('#adduser')[0].reset();
  var validator = $( "#adduser" ).validate();
    validator.resetForm();
});
</script>