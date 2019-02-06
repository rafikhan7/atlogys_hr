  <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<?php
    $link = $this->request->here;
    $link_array = explode('/', $link);
     $page = end($link_array);
?>

                                <!-- <i class="fa fa-bookmark"></i> Technical Posts -->

                          
                                <div class="inner-pages technical-post-section">
                                    <h2><i class="fa fa-bookmark"></i> Technical Post</h2>


                                   <div class="row">
                                        <?php 

                                         foreach ($post as  $value) { 
                                          $post_id = $value['Post']['id'];
                                                    ?>
                                            <div class="col-md-4 blog-box">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                       <h4>
                                                         <?php echo $value['Post']['post_title']; ?>
                                                       </h4>

                                                        <div class="text-muted">
                                                            <small><i class="fa fa-calendar"></i>
                                                             <?php $timestamp = $value['Post']['created'];
                                                          $datetime = explode(" ",$timestamp);
                                                          echo $date = $datetime[0]; ?></small>
                                                        </div>
                                                    </div>
                                                    <?php $postImage =  $value['Post']['post_image']; if(!empty($postImage)){ ?>
                        <img src="<?php echo $this->webroot.POST_IMAGE_PATH;?><?php echo $postImage; ?>" alt="image" class="img-responsive dashboard-post-img">
                        <?php }else{?>
                          <img src="<?php echo $this->webroot.POST_IMAGE_PATH;?>blog-img-1.jpg" alt="image" class="img-responsive dashboard-post-img">

                        <?php } ?>
                                                    <div class="panel-body">
                                                        <p>
                                                        <?php $description =  $value['Post']['post_description'];;
                                                           echo  $description =  substr($description,0,100),'...'; ?>

                                                        </p>
                                                        <div class="clearfix">
                                                            
                                                            <div class="pull-left">
                                                                <ul class="list-inline">
                                                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                                                </ul>
                                                            </div>
                                                            
                                                            <div class="pull-right">
                                                                <a href="<?php echo Router::url(array('controller'=>'Posts', 'action'=>'post_detail'))."/".$post_id?>" class="btn btn-primary btn-xs custom-btn ">Read More</a>
                                                            </div>

                                                            
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php
                                              
                                                } ?>
                                </div><!-- row ended -->
                    <div id="ascrail2000" class="nicescroll-rails" style="width: 5px; z-index: auto; cursor: default; position: absolute; top: 446px; left: 1066px; height: 39px; display: none; opacity: 0;">
                        <div style="position: relative; top: 0px; float: right; width: 5px; height: 0px; background-color: rgb(195, 169, 97); border: 0px; background-clip: padding-box; border-radius: 5px;"></div>
                    </div>
                    <div id="ascrail2000-hr" class="nicescroll-rails" style="height: 5px; z-index: auto; top: 480px; left: 15px; position: absolute; cursor: default; display: none; opacity: 0;">
                        <div style="position: absolute; top: 0px; height: 5px; width: 0px; background-color: rgb(195, 169, 97); border: 0px; background-clip: padding-box; border-radius: 5px; left: 0px;"></div>
                    </div>
                    <div id="ascrail2003" class="nicescroll-rails" style="width: 5px; z-index: auto; cursor: default; position: absolute; top: 446px; left: 1066px; height: 39px; display: none;">
                        <div style="position: relative; top: 0px; float: right; width: 5px; height: 0px; background-color: rgb(22, 174, 159); border: 0px; background-clip: padding-box; border-radius: 5px;"></div>
                    </div>
                    <div id="ascrail2003-hr" class="nicescroll-rails" style="height: 5px; z-index: auto; top: 480px; left: 15px; position: absolute; cursor: default; display: none;">
                        <div style="position: absolute; top: 0px; height: 5px; width: 0px; background-color: rgb(22, 174, 159); border: 0px; background-clip: padding-box; border-radius: 5px;"></div>
                    </div>
                </div>
                <!-- /st-content-inner -->

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
</script>