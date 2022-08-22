<?php  require_once APP_ROOT . '/views/Shared/header.php'; ?>

    <div class="row tran">
        <div class="col-8">

            <div id="script-warning" style="display: block;">
            <code>php/get-events.php</code> must be running.
            </div>

            <div id="loading" style="display: none;">loading...</div>
            <div id='calendar'></div>
        </div>
        <div class="col-4 p-3">
                        <div class="cardt rounded-0 shadow">
                            <div class="card-header bg-gradient bg-primary text-light">
                                <h5 class="card-title">Schedule Form</h5>
                            </div>
                            <div class="card-body">
                                <div class="container-fluid">
                                    <form action="save_schedule.php" method="post" id="schedule-form">
                                        <input type="hidden" name="id" value="">
                                        <div class="form-group mb-2">
                                            <label for="title" class="control-label">Title</label>
                                            <input type="text" class="form-control form-control-sm rounded-0" name="title" id="title" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="description" class="control-label">Description</label>
                                            <textarea rows="3" class="form-control form-control-sm rounded-0" name="description" id="description" required></textarea>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="start_datetime" class="control-label">Start</label>
                                            <input type="datetime-local" class="form-control form-control-sm rounded-0" name="start_datetime" id="start_datetime" required>
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="end_datetime" class="control-label">End</label>
                                            <input type="datetime-local" class="form-control form-control-sm rounded-0" name="end_datetime" id="end_datetime" required>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-center">
                                    <button class="btn btn-primary btn-sm rounded-0" type="submit" form="schedule-form"><i class="fa fa-save"></i> Save</button>
                                    <button class="btn btn-default border btn-sm rounded-0" type="reset" form="schedule-form"><i class="fa fa-reset"></i> Cancel</button>
                                </div>
                            </div>
                        </div>
        </div>
    </div>

    <!-- Modal  to Add Event -->
<div id="createEventModal" class="modal fade" role="dialog">
 <div class="modal-dialog">

 <!-- Modal content-->
 <div class="modal-content">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal">×</button>
 <h4 class="modal-title">Add Event</h4>
 </div>
 <div class="modal-body">
 <div class="control-group">
 <label class="control-label" for="inputPatient">Event:</label>
 <div class="field desc">
 <input class="form-control" id="title" name="title" placeholder="Event" type="text" value="">
 </div>
 </div>
 
 <input type="hidden" id="startTime"/>
 <input type="hidden" id="endTime"/>
 
 
 
 <div class="control-group">
 <label class="control-label" for="when">When:</label>
 <div class="controls controls-row" id="when" style="margin-top:5px;">
 </div>
 </div>
 
 </div>
 <div class="modal-footer">
 <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
 <button type="submit" class="btn btn-primary" id="submitButton">Save</button>
 </div>
 </div>

 </div>
</div>

<!-- Modal to Event Details -->
<div id="calendarModal" class="modal fade">
<div class="modal-dialog">
 <div class="modal-content">
 <div class="modal-header">
 <button type="button" class="close" data-dismiss="modal">×</button>
 <h4 class="modal-title">Event Details</h4>
 </div>
 <div id="modalBody" class="modal-body">
 <h4 id="modalTitle" class="modal-title"></h4>
 <div id="modalWhen" style="margin-top:5px;"></div>
 </div>
 <input type="hidden" id="eventID"/>
 <div class="modal-footer">
 <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
 <button type="submit" class="btn btn-danger" id="deleteButton">Delete</button>
 </div>
 </div>
</div>
</div>
<!--Modal-->

<?php  require_once APP_ROOT . '/views/Shared/footer.php'; ?>

<script>

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      //initialDate: '2020-09-12',
      editable: false,
      navLinks: true, // can click day/week names to navigate views
      dayMaxEvents: true, // allow "more" link when too many events
      selectable: true,
      resizable: false,
    //   events: {
    //     url: 'php/get-events.php',
    //     failure: function() {
    //       document.getElementById('script-warning').style.display = 'block'
    //     }
    //   },
      loading: function(bool) {
        document.getElementById('loading').style.display =
          bool ? 'block' : 'none';
      },
      eventClick:  function(event, jsEvent, view) {  // when some one click on any event
                console.log(event.end);
                endtime = event.end;
                starttime = moment(event.start).format('dddd, MMMM Do YYYY, h:mm');
                var mywhen = starttime + ' - ' + endtime;
                $('#modalTitle').html(event.title);
                $('#modalWhen').text(mywhen);
                $('#eventID').val(event.id);
                $('#calendarModal').modal();
            },
            
            select: function(start, end, jsEvent) {  // click on empty time slot
                console.log(start.startStr);
                endtime = moment(start.startStr).add(30, 'minutes').format('h:mm');
                console.log(endtime);
                starttime = moment(start.startStr).format('dddd, MMMM Do YYYY, h:mm');
                var mywhen = starttime + ' - ' + endtime;
                start = moment(start).format();
                end = moment(end).format();
                $('#createEventModal #startTime').val(start);
                $('#createEventModal #endTime').val(end);
                $('#createEventModal #when').text(mywhen);
                $('#createEventModal').modal('toggle');
           },
           eventDrop: function(event, delta){ // event drag and drop
               $.ajax({
                   url: 'index.php',
                   data: 'action=update&title='+event.title+'&start='+moment(event.start).format()+'&end='+moment(event.end).format()+'&id='+event.id ,
                   type: "POST",
                   success: function(json) {
                   //alert(json);
                   }
               });
           },
           eventResize: function(event) {  // resize to increase or decrease time of event
            //    $.ajax({
            //        url: 'index.php',
            //        data: 'action=update&title='+event.title+'&start='+moment(event.start).format()+'&end='+moment(event.end).format()+'&id='+event.id,
            //        type: "POST",
            //        success: function(json) {
            //            //alert(json);
            //        }
            //    });
            return false;
           }
    });

    calendar.render();
  });

</script>