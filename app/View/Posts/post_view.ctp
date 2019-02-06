
   <?php
    $link = $this->request->here;
    $link_array = explode('/', $link);
     $page = end($link_array);
     $second  = explode(':', $page);
     $pageVal = end($second);
?>
                                <!-- <i class="fa fa-bookmark"></i> Technical Posts -->

                          
                                <div class="inner-pages technical-post-section">
                                    <h2><i class="fa fa-bookmark"></i> Technical Post</h2>


                                 


                               <div class="container">                                        
                                  <div class="post-details">
                                     <h2><?php echo $post['Post']['post_title']; ?></h2>
                                      <div class="author-con clearfix">
                                           <span class="pull-left">Author: <strong>Yatendra Jain</strong></span>
                                           <span class="pull-right">Date: <strong><?php echo $post['Post']['created']; ?></strong></span>
                                      </div><!-- author-con ended -->
 
                                   <img src="<?php echo $this->webroot; ?>files/uploads/post/<?php echo $post['Post']['post_image']; ?>" alt="image" class="img-responsive">
                                   <p> <?php echo $post['Post']['post_description']; ?></p> 
                                   
                                      
                                      <div class="clearfix">
                                        <div class="pull-left">
                                                                <ul class="list-inline">
                                                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                                                </ul>
                                                            </div>
                                      </div>
                                      
                                  </div><!-- post-details ended -->
                               </div><!-- container ended -->






                                </div>
                                </div>
                           
                            </div>
                        </div>
                       

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
