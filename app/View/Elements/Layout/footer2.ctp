            <!-- /st-content -->
            <!-- Footer -->
            <footer class="footer">
              
<?php echo $this->Html->script('moment.min'); ?>
<?php echo $this->Html->script('daterangepicker'); ?>
<?php 
if 
    (!$this->Session->read('Auth.User')) {
    return $this->redirect('/');

}

                ?>

<?php echo $this->Html->script('markerclusterer.min'); ?>
<?php echo $this->Html->script('jquery.validate.min'); ?>
<?php echo $this->Html->script('lightbox.min'); ?>
<?php echo $this->Html->script('perfect-scrollbar.min'); ?>                
<?php echo $this->Html->script('semantic.ui.min'); ?>
<?php echo $this->Html->script('pignose.calendar.full.min'); ?>    
<?php echo $this->Html->script('bootstrap.min'); ?>                      
<?php echo $this->Html->script('customjs');?>

<script type="text/javascript">
var getDates = function(startDate, endDate) {
  var dates = [],
      currentDate = startDate,
      addDays = function(days) {
        var date = new Date(this.valueOf());
        date.setDate(date.getDate() + days);
        return date;
      };
  while (currentDate <= endDate) {
    dates.push(currentDate);
    currentDate = addDays.call(currentDate, 1);
  }
  return dates;
};

// Usage


var officalHoliday = '<?php echo json_encode($holiday, JSON_FORCE_OBJECT);?>';
var eventDate = '<?php echo json_encode($events, JSON_FORCE_OBJECT);?>';
var approveLeave = '<?php echo json_encode($leave, JSON_FORCE_OBJECT);?>';
var birthday = '<?php echo json_encode($userBirthday, JSON_FORCE_OBJECT);?>';
var managerleav = '<?php echo json_encode($managerleavList, JSON_FORCE_OBJECT);?>';
officalHoliday = jQuery.parseJSON(officalHoliday);
eventDate = jQuery.parseJSON(eventDate);
approveLeave = jQuery.parseJSON(approveLeave);
birthdayDate = jQuery.parseJSON(birthday);
managerData = jQuery.parseJSON(managerleav);

//alert(officalHolidays);leave_data
//employeebirthdays = jQuery.parseJSON(employeebirthday);
 $('#calendarCover .version strong').text('v' + $.fn.pignoseCalendar.version);

 function onClickHandler(date, obj) {
     /**
      * @date is an array which be included dates(clicked date at first index)
      * @obj is an object which stored calendar interal data.
      * @obj.calendar is an element reference.
      * @obj.storage.activeDates is all toggled data, If you use toggle type calendar.
      * @obj.storage.events is all events associated to this date
      */

     var $calendar = obj.calendar;
     var $box = $calendar.parent().siblings('.box').show();
     var text = 'You choose date ';

     if (date[0] !== null) {
         text += date[0].format('YYYY-MM-DD');
     }

     if (date[0] !== null && date[1] !== null) {
         text += ' ~ ';
     } else if (date[0] === null && date[1] == null) {
         text += 'nothing';
     }

     if (date[1] !== null) {
         text += date[1].format('YYYY-MM-DD');
     }

     $box.text(text);
 }

/* // Default Calendar
 $('.calendar').pignoseCalendar({
     select: onClickHandler
 });*/

 // This use for DEMO page tab component.
 $('.menu .item').tab();

 $(".pignose-calendar-body").addClass("clearfix");

 //    Calendar Custom modification start here

 // Calendar Custom code start here

 $('#calendarCover .version strong').text('v' + $.fn.pignoseCalendar.version);

 function onClickHandler(date, obj) {
     /**
      * @date is an array which be included dates(clicked date at first index)
      * @obj is an object which stored calendar interal data.
      * @obj.calendar is an element reference.
      * @obj.storage.activeDates is all toggled data, If you use toggle type calendar.
      * @obj.storage.events is all events associated to this date
      */

     var $calendar = obj.calendar;
     var $box = $calendar.parent().siblings('.box').show();
     var text = 'You choose date ';

     if (date[0] !== null) {
         text += date[0].format('YYYY-MM-DD');
     }

     if (date[0] !== null && date[1] !== null) {
         text += ' ~ ';
     } else if (date[0] === null && date[1] == null) {
         text += 'nothing';
     }

     if (date[1] !== null) {
         text += date[1].format('YYYY-MM-DD');
     }

     $box.text(text);
 }

 // Default Calendar
 $('.calendar-1').pignoseCalendar({
     select: onClickHandler
 });

 // This use for DEMO page tab component.
 $('.menu .item').tab();

 $(".pignose-calendar-body").addClass("clearfix");

 //    Calendar Custom modification start here

var cntArr = {};
 function calendarExcute() {

     $(".pignose-calendar-unit-date").each(function() {
         var currentDate = ($(this).attr("data-date"));
         //console.log(currentDate);

          for (i in birthdayDate) { 
                    
             if ($(this).attr("data-date") ==  birthdayDate[i].User.date_of_birth) {
                var base_url = window.location.origin;
                 var leavestr = birthdayDate[i].User.date_of_birth;
                 var profileimage = birthdayDate[i].User.profile_image;
                 if(profileimage == ""){
                    var profileimage = "profile.png";
                 }
                  var res = leavestr.split("-");
                   var todaydate ="<a>"+res[2]+"</a>";
                 $(this).addClass("birthday-day");
                 $(this).html("<span class='birthday-content'><img src='"+base_url+"/atlogys_hr/files/uploads/users/"+birthdayDate[i].User.profile_image+"' class=''/><p>"+birthdayDate[i].User.name+"</p></span><span class='birthday-icon'><span class='birthday-name'> <i class='fa fa-birthday-cake'></i> " +birthdayDate[i].User.name+"</span></span>"+todaydate);

                }

            }

            for ( i in eventDate) { 
                var base_url = window.location.origin;
                var eventid = eventDate[i].Event.id;
            if ($(this).attr("data-date") ==  eventDate[i].Event.event_date) {
                  var str = eventDate[i].Event.event_title;
                  str = str.substring(0,10);
                 $(this).append("<div class='data-clip'><span class='clip-event clearfix'><span class='title'>"+str+"...</span><span class='close'>X</span> <br/> <span class='cli-content'> Event:-"+eventDate[i].Event.event_title+"<br>Location:-"+eventDate[i].Event.event_location+" <span class='view-more'><a href='"+base_url+"/atlogys_hr/Events/event_detail/"+eventid+"'>View More</a></span></span> </span>");


             $("[class*='clip-']").click(function() {
                 $("[class*='clip-']").removeClass("active");
                 $(this).addClass("active");
             });

             $(".data-clip .close").click(function(e) {
                 e.stopPropagation();
                 $(this).parent("[class*='clip-']").removeClass("active");
             });

                }

            }

        for ( i in approveLeave) { 
            
             if (Date.parse($(this).attr("data-date")) >=  Date.parse(approveLeave[i].Leave.leave_start_date) 
                &&
                Date.parse($(this).attr("data-date")) <= Date.parse(approveLeave[i].Leave.leave_end_date)) {         
               
                 var leavetype = approveLeave[i].Leave.total_leaves;
                    if(leavetype == ".5"){
                      var leavetype = "Halfday";
                    }else{
                        var leavetype = "Fullday";
                    }
                 var leaveStatus = approveLeave[i].Leave.leave_status;
                    if(leaveStatus == "1"){
                      var leaveStatus = "Approved";
                    }else if(leaveStatus == "2"){
                        var leaveStatus = "Rejected";
                    }else{
                       var leaveStatus = "Pending"; 
                    }
                 $(this).append("<div class='data-clip'><span class='clip-leave'><span class='title'>Leave Status</span><span class='close'>X</span><br/> <span class='cli-content'>Backup:-"+approveLeave[i].Leave.user_backup+"<br>Leave Type:"+leavetype+"<br>Leave Status:"+leaveStatus+"</span> </span></div>");

                   $("[class*='clip-']").click(function() {
                 $("[class*='clip-']").removeClass("active");
                 $(this).addClass("active");
             });

             $(".data-clip .close").click(function(e) {
                 e.stopPropagation();
                 $(this).parent("[class*='clip-']").removeClass("active");
             });

                }

            }         

            
            cntArr[$(this).attr("data-date")] = 0;

            for ( i in managerData) { 
            
             if (Date.parse($(this).attr("data-date")) >=  Date.parse(managerData[i].Leave.leave_start_date) 
                &&
                Date.parse($(this).attr("data-date")) <= Date.parse(managerData[i].Leave.leave_end_date)) {                         
                
                     var emplyename = managerData[i].Leave.apply_by;
                    var splitname = emplyename.split(" ");
                    var name =   splitname[0];


                     cntArr[$(this).attr("data-date")] = cntArr[$(this).attr("data-date")] + 1;
                     $(this).append("<div class='data-clip'><span class='clip-em-leave'><span class='title'>"+name+" <span class='person'></span></span><span class='close'>X</span><br/></span></div>");
                 
            $("[class*='clip-']").click(function() {
                $("[class*='clip-']").removeClass("active");
                $(this).addClass("active");
            });

            $(".data-clip .close").click(function(e) {
                 e.stopPropagation();
                 $(this).parent("[class*='clip-']").removeClass("active");
             });

                }
              
            }
          
             for ( i in managerData) { 
            
             if (Date.parse($(this).attr("data-date")) >=  Date.parse(managerData[i].Leave.leave_start_date) 
                &&
                Date.parse($(this).attr("data-date")) <= Date.parse(managerData[i].Leave.leave_end_date)) {         
               
                 var leavetype = managerData[i].Leave.total_leaves;
                    if(leavetype == ".5"){

                      var leavetype = "Halfday";
                    }else{
                        var leavetype = "Fullday";
                    }   
                 
                    $(this).find('.data-clip .clip-em-leave').append("<span class='cli-content'>Name:-"+managerData[i].Leave.apply_by+"<br>Leave Type:"+leavetype+" </span> ");
                   
                    
                   
                 }
                
                } 
                if(cntArr[$(this).attr("data-date")] >1){
                    $(this).find('.person').html("<span>+ "+(cntArr[$(this).attr("data-date")]-1)+"</span>");
                } 
                 
                 
                
                for (i in officalHoliday) { 
                   
                 if ($(this).attr("data-date") ==  officalHoliday[i].Holiday.holiday_date){
                    var leavestr = officalHoliday[i].Holiday.holiday_date;
                  var res = leavestr.split("-");
                   var todaydate = res[2];
                  $(this).addClass("officalHoliday");
                   $(this).children().html(todaydate+"<span class='holiday-text'>" + officalHoliday[i].Holiday.holiday_name + " </span>");
                 }
             }

     });
 }
calendarExcute();



 setInterval(function() {
     
          $(".view-more a").click(function(e){
             e.stopImmediatePropagation();    
    });

     $(".pignose-calendar-top-nav").click(function() {
         calendarExcute();
     });

 }, 500);  


   $("#upload").on('change', function() {
      $(".upload-result").removeClass("disabled");
   }); 

      $("#file").on('change', function() {
      $("#sidePhotoUpload").removeClass("disabled");
   }); 


               
    
    //    Calendar Custom modification ended here
</script>
<?php //include 'calander.php';?>

        <script>
            var colors = {
                "danger-color": "#e74c3c",
                "success-color": "#81b53e",
                "warning-color": "#f0ad4e",
                "inverse-color": "#2c3e50",
                "info-color": "#2d7cb5",
                "default-color": "#6e7882",
                "default-light-color": "#cfd9db",
                "purple-color": "#9D8AC7",
                "mustard-color": "#d4d171",
                "lightred-color": "#e15258",
                "body-bg": "#f6f6f6"
            };
            var config = {
                theme: "social-2",
                skins: {
                    "default": {
                        "primary-color": "#16ae9f"
                    },
                    "orange": {
                        "primary-color": "#e74c3c"
                    },
                    "blue": {
                        "primary-color": "#4687ce"
                    },
                    "purple": {
                        "primary-color": "#af86b9"
                    },
                    "brown": {
                        "primary-color": "#c3a961"
                    },
                    "default-nav-inverse": {
                        "color-block": "#242424"
                    }
                }
            };
        </script>
        <script>
            // Get the modal
            var modal = document.getElementById('myModal');

            // Get the image and insert it inside the modal - use its "alt" text as a caption
            var img = document.getElementById('myImg');
            var modalImg = document.getElementById("img01");
            var captionText = document.getElementById("caption");
            img.onclick = function() {
                modal.style.display = "block";
                modalImg.src = this.src;
                captionText.innerHTML = this.alt;
            }

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }
        </script> 

      </footer>
