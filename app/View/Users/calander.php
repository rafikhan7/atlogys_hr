// Calendar Custom code start here
    <script type="text/javascript" src="javascript.php?c=<?php echo $config_file; ?>">
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

                if(date[0] !== null) {
                    text += date[0].format('YYYY-MM-DD');
                }

                if(date[0] !== null && date[1] !== null) {
                    text += ' ~ ';
                } else if(date[0] === null && date[1] == null) {
                    text += 'nothing';
                }

                if(date[1] !== null) {
                    text += date[1].format('YYYY-MM-DD');
                }

                $box.text(text);
            }

            // Default Calendar
            $('.calendar').pignoseCalendar({
                select: onClickHandler
            });

            // This use for DEMO page tab component.
            $('.menu .item').tab();
            
             $(".pignose-calendar-body").addClass("clearfix");        
    
//    Calendar Custom modification start here
    
              var eventData = <?php  pr($users);?>;
              var leaveData = "Leave data content";
    
           function calendarExcute() {
                    $(".pignose-calendar-unit-date").click(function(e){
                  e.stopPropagation();
                  if( !$(this).children().hasClass("data-clip")){
                      $(this).append("<div class='data-clip'><span class='clip-event clearfix'><span class='title'>Event</span><span class='close'>X</span> <br/> <span class='cli-content'> " + eventData + " </span> </span><br/><span class='clip-leave'><span class='title'>Leave</span><span class='close'>X</span><br/> <span class='cli-content'> " + leaveData + " </span> </span></div>");
                      
                      
                   $("[class*='clip-']").click(function(){ 
                       $("[class*='clip-']").removeClass("active");
                       $(this).addClass("active");
                   });
                      
                    $(".data-clip .close").click(function(e){ 
                          e.stopPropagation();
                       $(this).parent("[class*='clip-']").removeClass("active");
                    });  
               
                  }
                
                
//                 var dateFeatch = $(this).attr("data-date");
               
            });
           }   
      
          calendarExcute();
    
    
    
         
    
            setInterval(function(){ 
//               console.log("Working !");

                  $(".pignose-calendar-top-nav").click(function(){
        //                alert("Working !");
                        calendarExcute();
                   });  
                
                   $(".pignose-calendar-unit-date").each(function(){ 
                    if( ($(this).attr("data-date") == "2018-01-26") || ($(this).attr("data-date") == "2018-02-13") || ($(this).attr("data-date") == "2018-03-02") || ($(this).attr("data-date") == "2018-03-25") || ($(this).attr("data-date") == "2018-08-15") || ($(this).attr("data-date") == "2018-09-03") || ($(this).attr("data-date") == "2018-10-02") || ($(this).attr("data-date") == "2018-09-19") || ($(this).attr("data-date") == "2018-11-07") || ($(this).attr("data-date") == "2018-11-08") || ($(this).attr("data-date") == "2018-11-09") || ($(this).attr("data-date") == "2018-12-25")   ){
                 
                $(this).addClass("officalHoliday");       
            }
          });  
                
                
            }, 1000);
    
        
              
               
    
    //    Calendar Custom modification ended here
    
    </script>