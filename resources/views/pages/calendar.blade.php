@extends('pages.adminlayout')

@section('content')
<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="row align-items-center my-3">
          <div class="col">
            <h2 class="page-title">Calendar</h2>
          </div>
        </div>
        <div id='calendar'></div>
        <!-- new event modal -->
      
      </div> <!-- .col-12 -->
  </div> <!-- .container-fluid -->
</main> <!-- main -->


<script src='../js/fullcalendar.js'></script>
<script src='../js/fullcalendar.custom.js'></script>
<script src='https://unpkg.com/popper.js/dist/umd/popper.min.js'></script>
<script src='https://unpkg.com/tooltip.js/dist/umd/tooltip.min.js'></script>

        <script>
          /** full calendar */
            document.addEventListener('DOMContentLoaded', function()
            {
          var calendarEl = document.getElementById('calendar');
              var calendar = new FullCalendar.Calendar(calendarEl,
              {
                plugins: ['dayGrid', 'timeGrid', 'list', 'bootstrap'],
       
                defaultView: 'dayGridMonth',
                displayEventEnd: true,
                timeZone: 'UTC',
                themeSystem: 'bootstrap',
                header:
                {
                  left: 'today, prev, next',
                  center: 'title',
                  right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
                },
            
    



                events:  {!!$schedules!!}
               });
              calendar.render();
            });
          
        </script>
@endsection