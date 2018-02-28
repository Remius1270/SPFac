<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>fullCalendar QUI MARCHE PAS CA MERE</title>
    {!! Html::style('vendor/antoine/bootstrap/css/bootstrap.min.css') !!}
    {!! Html::style('vendor/antoine/fullcalendar/fullcalendar.min.css') !!}
    {!! Html::style('vendor/antoine/bootstrap-datetimepicker/css/bootstrap-material-datetimepicker.css') !!}
    {!! Html::style('vendor/antoine/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') !!}
    <link href='vendor/antoine/fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print'/>
</head>
<body>
<div class="container">

    {{ Form::open(['route' => 'event.store', 'method' => 'post', 'role' => 'form']) }}
    <div id="responsive-modal" class="modal fade" tabindex="-1" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Evénements</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {{ Form::label('title', 'TITRE') }}
                        {{ Form::text('title', old('title'), ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('date_start', 'DATE DEBUT') }}
                        {{ Form::text('date_start', old('date_start'), ['class' => 'form-control', 'readonly' => 'true']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('time_start', 'HEURE DEBUT') }}
                        {{ Form::text('time_start', old('time_start'), ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('date_end', 'DATE HEURE FIN') }}
                        {{ Form::text('date_end', old('date_end'), ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('color', 'COULEUR') }}
                        <div class="input-group colorpicker">
                            {{ Form::text('color', old('color'), ['class' => 'form-control']) }}
                            <span class="input-group-addon">
                                        <i></i>
                                    </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dafault" data-dismiss="modal">ANNULER</button>
                    {!! Form::submit('ENVOYER', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
        </div>
    </div>
    {{ Form::close() }}
    <div id='calendar'></div>

    <div id="modal-event" class="modal fade" tabindex="-1" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>DETAILS</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {{ Form::label('_title', 'TITRE') }}
                        {{ Form::text('_title', old('_title'), ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('_date_start', 'DATE DEBUT') }}
                        {{ Form::text('_date_start', old('_date_start'), ['class' => 'form-control', 'readonly' => 'true']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('_time_start', 'HEURE DEBUT') }}
                        {{ Form::text('_time_start', old('_time_start'), ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('_date_end', 'DATE HEURE FIN') }}
                        {{ Form::text('_date_end', old('_date_end'), ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('_color', 'COULEUR') }}
                        <div class="input-group colorpicker">
                            {{ Form::text('_color', old('_color'), ['class' => 'form-control']) }}
                            <span class="input-group-addon">
                                        <i></i>
                                    </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a id="delete" data-href="{{ url('event') }}" data-id="" class="btn btn-danger">SUPPRIMER</a>
                    <button type="button" class="btn btn-dafault" data-dismiss="modal">ANNULER</button>
                    {!! Form::submit('ACTUALISE', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
        </div>
    </div>

</div>
</body>
{!! Html::script('vendor/antoine/fullcalendar/lib/jquery.min.js') !!}
{!! Html::script('vendor/antoine/bootstrap/js/bootstrap.min.js') !!}
{!! Html::script('vendor/antoine/fullcalendar/lib/moment.min.js') !!}
{!! Html::script('vendor/antoine/fullcalendar/fullcalendar.min.js') !!}
{!! Html::script('vendor/antoine/bootstrap-datetimepicker/js/bootstrap-material-datetimepicker.js') !!}
{!! Html::script('vendor/antoine/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') !!}
<script>
    var BASEURL = "{{ url('/') }}";
    $(document).ready(function () {

        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            selectable: true,
            selectHelper: true,

            select: function (start) {
                start = moment(start.format());
                $('#date_start').val(start.format('YYYY-MM-DD'));
                $('#responsive-modal').modal('show');
            },

            event: BASEURL + '/event',

            eventClick: function (event, jsEvent, view) {
                var date_start = $.fullCalendar.moment(event.start).format('YYYY-MM-DD');
                var time_start = $.fullCalendar.moment(event.start).format('hh:mm:ss');
                var date_end = $.fullCalendar.moment(event.end).format('YYYY-MM-DD hh:mm:ss');
                $('#modal-event #delete').attr('data-id', event.id);
                $('#modal-event #_title').val(event.title);
                $('#modal-event #_date_start').val(date_start);
                $('#modal-event #_time_start').val(time_start);
                $('#modal-event #_date_end').val(date_end);
                $('#modal-event #_color').val(event.color);
                $('#modal-event').modal('show');
            }
        });

    });

    $('.colorpicker').colorpicker();

    $('#time_start').bootstrapMaterialDatePicker({
        date: false,
        shortTime: false,
        format: 'HH:mm:ss'
    });

    $('#date_end').bootstrapMaterialDatePicker({
        date: true,
        shortTime: false,
        format: 'YYYY-MM-DD HH:mm:ss'
    });

    $('#delete').on('click', function () {
        var x = $(this);
        var delete_url = x.attr('data-href') + '/' + x.attr('data-id');

        $.ajax({
            url: delete_url,
            type: 'PATCH',
            success: function (result) {
                $('#modal-event').modal('hide');
                alert(result.message);
            },
            error: function (result) {
                $('#modal-event').modal('hide');
                alert(result.message);
            }
        });
    });

</script>
</html>
