@extends('backend.layouts.app')

@section('after-styles')
    <style media="screen">
        .box-tools > .btn-group {
            margin-right: 10px;
            margin-top: 4px;
        }

        .add-new-item {
            margin-bottom: 15px;
        }

        .add-new-item .btn {
            padding: 10px;
        }

        .add-new-item .dropdown-menu {
            margin-left: 5%;
            width: 90%;
        }

        .add-new-item .dropdown-menu>li>a {
            padding: 10px 20px;
        }

        .chart-container {
            height: 300px;
        }
    </style>
@stop

@section('page-header')
    <h1>
        {{ $tenant->name }}
        <small>{{ trans('strings.backend.dashboard.title') }}</small>
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-lg-3">
            <div class="add-new-item">
                <div class="btn-group btn-block">
                    <button type="button" class="btn btn-success btn-block dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-plus-circle"></i>
                        {{ trans('labels.backend.dashboard.add_new') }}
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('admin.students.create') }}"><i class="fa fa-user-o"></i> {{ trans('labels.backend.dashboard.student') }}</a></li>
                        <li><a href="{{ route('admin.sessions.create') }}"><i class="fa fa-clock-o"></i> {{ trans('labels.backend.dashboard.session') }}</a></li>
                        <li><a href="{{ route('admin.payments.create') }}"><i class="fa fa-usd"></i> {{ trans('labels.backend.dashboard.payment') }}</a></li>
                        <li><a href="{{ route('admin.batches.create') }}"><i class="fa fa-users"></i> {{ trans('labels.backend.dashboard.batch') }}</a></li>
                        <li><a href="{{ route('admin.courses.create') }}"><i class="fa fa-clone"></i> {{ trans('labels.backend.dashboard.course') }}</a></li>
                        <li><a href="{{ route('admin.teachers.create') }}"><i class="fa fa-graduation-cap"></i> {{ trans('labels.backend.dashboard.teacher') }}</a></li>
                        <li><a href="{{ route('admin.locations.create') }}"><i class="fa fa-map-marker"></i> {{ trans('labels.backend.dashboard.location') }}</a></li>
                        <li><a href="{{ route('admin.rooms.create') }}"><i class="fa fa-building-o"></i> {{ trans('labels.backend.dashboard.room') }}</a></li>
                    </ul>
                </div>
            </div>

            <div class="info-box bg-light-blue">
                <span class="info-box-icon"><i class="fa fa-user-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">{{ trans('strings.backend.dashboard.students') }}</span>
                    <span class="info-box-number">{{ $totalStudents }}</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: {{ $totalStudents ? ($thisMonthStudents / $totalStudents) * 100 : 0 }}%"></div>
                    </div>
                    <span class="progress-description">
                        {{ $totalStudents ? round(($thisMonthStudents / $totalStudents) * 100, 2) : 0 }}% increase in this month
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>

            <div class="info-box bg-yellow-active">
                <span class="info-box-icon"><i class="fa fa-clock-o"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">{{ trans('strings.backend.dashboard.sessions') }}</span>
                    <span class="info-box-number">{{ $totalSessions }}</span>

                    <div class="progress">
                        <div class="progress-bar" style="width: {{ $totalStudents ? ($thisMonthStudents / $totalStudents) * 100 : 0 }}%"></div>
                    </div>
                    <span class="progress-description">
                        {{ $totalSessions ? round(($thisMonthSessions / $totalSessions) * 100, 2) : 0 }}% increase in this month
                    </span>
                </div>
                <!-- /.info-box-content -->
            </div>

            @include('backend.includes.widgets.quick-links')
        </div>
        <div class="col-md-8 col-lg-9">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('strings.backend.dashboard.welcome') }} {{ $logged_in_user->name }}!</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    {!! trans('strings.backend.welcome') !!}
                    <example></example>
                </div><!-- /.box-body -->
            </div><!--box box-success-->

            <div class="box box-default box-chart students-attendance">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('strings.backend.charts.students_attendance') }}</h3>
                    <div class="box-tools pull-right">
                        @if(!empty($incomeYears))
                        <div class="btn-group year-selector">
                            <button type="button" id="sa-prev-year" class="btn btn-default btn-sm prev-year" {{ $incomeYears->first() == date('Y') ? 'disabled' : '' }} data-min="{{ $incomeYears->first() }}"><i class="fa fa-chevron-left"></i></button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    <span class="year" id="sa-year" data-year="{{ date('Y') }}">{{ date('Y') }}</span>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-years" data-el="#sa-year">
                                    @foreach($incomeYears as $year)
                                    <li class="year year-{{ $year }} {{ $year == date('Y') ? 'active' : '' }}"><a href="#{{ $year }}" data-year="{{ $year }}">{{ $year }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <button type="button" id="sa-next-year" class="btn btn-default btn-sm next-year" {{ $incomeYears->last() == date('Y') ? 'disabled' : '' }} data-max="{{ $incomeYears->last() }}"><i class="fa fa-chevron-right"></i></button>
                        </div>
                        @endif
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="chart-container">
                        <canvas id="students-attendance" class="chart" data-url="{{ route('admin.charts.students-attendance') }}"></canvas>
                    </div>
                </div><!-- /.box-body -->
                <div class="overlay" id="sa-overlay">
                  <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div><!-- income-over-year -->

            <div class="box box-default box-chart income-over-year">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('strings.backend.charts.income_over_year') }}</h3>
                    <div class="box-tools pull-right">
                        @if(!empty($incomeYears))
                        <div class="btn-group year-selector">
                            <button type="button" id="ioy-prev-year" class="btn btn-default btn-sm prev-year" {{ $incomeYears->first() == date('Y') ? 'disabled' : '' }} data-min="{{ $incomeYears->first() }}"><i class="fa fa-chevron-left"></i></button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
                                    <span class="year" id="ioy-year" data-year="{{ date('Y') }}">{{ date('Y') }}</span>
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-years" data-el="#ioy-year">
                                    @foreach($incomeYears as $year)
                                    <li class="year year-{{ $year }} {{ $year == date('Y') ? 'active' : '' }}"><a href="#{{ $year }}" data-year="{{ $year }}">{{ $year }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <button type="button" id="ioy-next-year" class="btn btn-default btn-sm next-year" {{ $incomeYears->last() == date('Y') ? 'disabled' : '' }} data-max="{{ $incomeYears->last() }}"><i class="fa fa-chevron-right"></i></button>
                        </div>
                        @endif
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="chart-container">
                        <canvas id="income-over-year" class="chart" data-url="{{ route('admin.charts.income-over-year') }}"></canvas>
                    </div>
                </div><!-- /.box-body -->
                <div class="overlay" id="ioy-overlay">
                  <i class="fa fa-refresh fa-spin"></i>
                </div>
            </div><!-- income-over-year -->

            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('history.backend.recent_history') }}</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    {!! history()->render() !!}
                </div><!-- /.box-body -->
            </div><!--box box-success-->
        </div>
    </div>
@endsection

@section('after-scripts')
    {{ Html::script("js/plugins/chart.js/Chart.min.js") }}

    <script type="text/javascript">
        $(document).ready(function() {
            $('.dropdown-years .year a').on('click', function(evt) {
                evt.preventDefault();
                var $selector = $(this).closest('.year-selector');
                var $dropdown = $(this).closest('.dropdown-years');
                var prev = $selector.find('.prev-year');
                var next = $selector.find('.next-year');
                var year = $(this).data('year');
                var el = $($dropdown.data('el'));
                var chart = $(this).closest('.box-chart').find('canvas.chart');
                el.text(year).data('year', year);
                $dropdown.find('li').removeClass('active');
                $($(this).closest('li').addClass('active'));
                prev.prop('disabled', prev.data('min') == year);
                next.prop('disabled', next.data('max') == year);
                loadChartData(chart.data('chart'), chart.data('url'), {year: year});
            });

            $('.prev-year').on('click', function(evt) {
                evt.preventDefault();
                var $selector = $(this).closest('.year-selector');
                var $link = $selector.find('.dropdown-years li.year.active').prev().find('a');
                $link.click();
                $(this).prop('disabled', $(this).data('min') == $link.data('year'));
                $selector.find('.next-year').prop('disabled', false);
            });

            $('.next-year').on('click', function(evt) {
                evt.preventDefault();
                var $selector = $(this).closest('.year-selector');
                var $link = $selector.find('.dropdown-years li.year.active').next().find('a');
                $link.click();
                $(this).prop('disabled', $(this).data('max') == $link.data('year'));
                $selector.find('.prev-year').prop('disabled', false);
            });

            function loadChartData(chart, url, options) {
                $('#' + chart.canvas.id).closest('.box-chart').find('.overlay').removeClass('hidden');
                $.getJSON(url, options).done(function(data) {
                    updateChart(chart, data);
                });
            }

            function updateChart(chart, data) {
                chart.data.labels = data.labels;
                chart.data.datasets.forEach(function(dataset, index) {
                    if(index < data.datasets.length) {
                        var values = Object.values(data.datasets[index]);
                        dataset.data.length = 0;
                        values.map(function(value) {
                            dataset.data.push(value);
                        });
                    }
                });
                chart.reset();
                chart.update();
                $('#' + chart.canvas.id).closest('.box-chart').find('.overlay').addClass('hidden');
            }

            var incomeChart = new Chart('income-over-year', {
                type: 'line',
                options: {
                    legend: {
                        display: false
                    },
                    responsive: true,
                    maintainAspectRatio: false,
                },
                data: {
                    labels: ['...', '...', '...', '...', '...', '...', '...', '...', '...', '...', '...', '...'],
                    datasets: [{
                        label: '{{ trans("strings.backend.charts.income") }}',
                        data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                        borderWidth: 1,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                    }]
                }
            });
            $('#income-over-year').data('chart', incomeChart);
            loadChartData(incomeChart, $('#income-over-year').data('url'), {});

            var attendanceChart = new Chart('students-attendance', {
                type: 'line',
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                },
                data: {
                    labels: ['...', '...', '...', '...', '...', '...', '...', '...', '...', '...', '...', '...'],
                    datasets: [{
                        label: '{{ trans("strings.backend.charts.students_registered_for_sessions") }}',
                        data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                        borderWidth: 1,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        pointBackgroundColor: 'rgba(54, 162, 235, 1)',
                    },
                    {
                        label: '{{ trans("strings.backend.charts.students_attended_for_sessions") }}',
                        data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
                        borderWidth: 1,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255,99,132,1)',
                        pointBackgroundColor: 'rgba(255,99,132,1)',
                        /*backgroundColor: 'rgba(153, 102, 255, 0.2)',
                        borderColor: 'rgba(153, 102, 255, 1)',
                        pointBackgroundColor: 'rgba(153, 102, 255, 1)',*/
                    }]
                }
            });
            $('#students-attendance').data('chart', attendanceChart);
            loadChartData(attendanceChart, $('#students-attendance').data('url'), {});
        });
    </script>
@endsection
