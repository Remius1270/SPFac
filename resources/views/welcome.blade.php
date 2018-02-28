<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fullcalendar and Laravel</title>

    <style>

        body {
            margin: 40px 10px;
            padding: 0;
            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }

    </style>

    {!! Html::style('css/app.scss') !!}
    {!! Html::style('vendor/antoine/fullcalendar/fullcalendar.min.css') !!}
</head>
<body>
<div class='container'>
    <div id='calendar'></div>
</div>
</body>
{!! Html::script('js/app.js') !!}
{!! Html::script('cendor/antoine/fullcalendar/lib/moment.min.js') !!}
{!! Html::script('cendor/antoine/fullcalendar/lib/jquery.min.js') !!}
{!! Html::script('cendor/antoine/fullcalendar/fullcalendar.min.js') !!}
<script>

    $(document).ready(function() {

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
            },
            defaultDate: '2018-02-12',
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: [
                {
                    title: 'All Day Event',
                    start: '2018-02-01',
                },
                {
                    title: 'Long Event',
                    start: '2018-02-07',
                    end: '2018-02-10'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: '2018-02-09T16:00:00'
                },
                {
                    id: 999,
                    title: 'Repeating Event',
                    start: '2018-02-16T16:00:00'
                },
                {
                    title: 'Conference',
                    start: '2018-02-11',
                    end: '2018-02-13'
                },
                {
                    title: 'Meeting',
                    start: '2018-02-12T10:30:00',
                    end: '2018-02-12T12:30:00'
                },
                {
                    title: 'Lunch',
                    start: '2018-02-12T12:00:00'
                },
                {
                    title: 'Meeting',
                    start: '2018-02-12T14:30:00'
                },
                {
                    title: 'Happy Hour',
                    start: '2018-02-12T17:30:00'
                },
                {
                    title: 'Dinner',
                    start: '2018-02-12T20:00:00'
                },
                {
                    title: 'Birthday Party',
                    start: '2018-02-13T07:00:00'
                },
                {
                    title: 'Click for Google',
                    url: 'http://google.com/',
                    start: '2018-02-28'
                }
            ]
        });

    });

</script>
</html>
