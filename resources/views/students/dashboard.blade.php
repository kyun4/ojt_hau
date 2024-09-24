@extends('layouts.student_ui')
@section('title')
Dashboard
@endsection
@section('css')
    <style>
        .hoverable{
            transition: all 0.2s ease;
            cursor: pointer;
        }
        .hoverable:hover{
            box-shadow: 5px 6px 6px 2px #e9ecef;
            transform: scale(1.1);
        }
    </style>
@endsection

@section('content')
<div class="row">
    @php
    $total_times = ''; // For total_times
    $total_times_seconds = 0; // Initialize total_times_seconds
    $internship_duration_seconds = 0;
@endphp

@foreach ($monitorings as $monitoring)
            @php
                $student = $monitoring->student()->with('school:id,internship_duration')->first();
                $internship_duration = $student->school->internship_duration;

                // Convert internship duration from string to seconds
                list($hours, $minutes, $seconds) = explode(':', $internship_duration);
                $internship_duration_seconds = ($hours * 3600) + ($minutes * 60) + $seconds;

                // Calculate total time for each monitoring
                if ($monitoring->time_out != null) {
                    $date_raw = explode('-', $monitoring->date_log);

                    $time_in_raw_ampm = explode(' ', $monitoring->time_in);
                    $time_in_raw = explode(':', $time_in_raw_ampm[0]);

                    $time_out_raw_ampm = explode(' ', $monitoring->time_out);
                    $time_out_raw = explode(':', $time_out_raw_ampm[0]);

                    if ($time_in_raw_ampm[1] == "PM") {
                        $time_in_raw[0] += 12;
                    }
                    if ($time_out_raw_ampm[1] == "PM") {
                        $time_out_raw[0] += 12;
                    }

                    $date1 = strtotime("{$date_raw[2]}-{$date_raw[0]}-{$date_raw[1]} {$time_in_raw[0]}:{$time_in_raw[1]}:{$time_in_raw[2]}");
                    $date2 = strtotime("{$date_raw[2]}-{$date_raw[0]}-{$date_raw[1]} {$time_out_raw[0]}:{$time_out_raw[1]}:{$time_out_raw[2]}");

                    $diff = abs($date2 - $date1);
                    $hours = floor($diff / (60 * 60));
                    $minutes = floor(($diff % (60 * 60)) / 60);
                    $seconds = $diff % 60;

                    $hours = str_pad($hours, 2, "0", STR_PAD_LEFT);
                    $minutes = str_pad($minutes, 2, "0", STR_PAD_LEFT);
                    $seconds = str_pad($seconds, 2, "0", STR_PAD_LEFT);

                    $total_times_seconds += $diff; // Accumulate total seconds
                }
            @endphp
        @endforeach

        @php
            // Convert total seconds to HH:MM:SS format
            $total_hours = floor($total_times_seconds / 3600);
            $total_minutes = floor(($total_times_seconds % 3600) / 60);
            $total_seconds = $total_times_seconds % 60;
            $total_times = sprintf("%02d:%02d:%02d", $total_hours, $total_minutes, $total_seconds);

            // Calculate remaining time
            $remaining_hours_seconds = $internship_duration_seconds - $total_times_seconds;
            $remaining_hours = floor($remaining_hours_seconds / 3600);
            $remaining_minutes = floor(($remaining_hours_seconds % 3600) / 60);
            $remaining_seconds = $remaining_hours_seconds % 60;
            $remaining_time = sprintf("%d:%02d:%02d", $remaining_hours, $remaining_minutes, $remaining_seconds);
        @endphp
    <div class="col-md-4">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-body card border-left-danger shadow h-100 py-2">
                        <h6 class="font-weight-bold text-black text-uppercase m-0">Time Progress</h6>
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i>Rendered Hours: {{$total_times ?? 'N/A'}}
                            </span><br>
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i>Remaining Hours: {{$remaining_time ?? 'N/A'}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4 " style="cursor: pointer;" onclick="window.location.href='/student/monitoring'">
                <div class="card border-left-danger shadow h-100 py-2 hoverable">
                    <div class="card-body ">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                    Monitoring</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $monitoring_count }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4" style="cursor: pointer;" onclick="window.location.href='/student/accomplishments'">
                <div class="card border-left-danger shadow h-100 py-2 hoverable">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                    Accomplishments</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $accomplishments_count }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4" style="cursor: pointer;" onclick="window.location.href='/student/requirements'">
                <div class="card border-left-danger shadow h-100 py-2 hoverable">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                    Inital Requirements</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Approved </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xl-3 col-md-6 mb-4"  style="cursor: pointer;" onclick="show_table_function('Completed')"> --}}
            <div class="col-xl-3 col-md-6 mb-4" style="cursor: pointer;"
                @if ($student_ojt->status === "FOR COOR APPROVAL")
                    onclick="window.location.href='/student/forms/downloadable'"
                @endif
            >
                <div class="card border-left-danger shadow h-100 py-2 hoverable">
                    <div class="card-body ">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                    Final Requirements</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    @if ($student_ojt->evaluation != null && $student_ojt->reflection != null && $student_ojt->certificate != null || $student_ojt->status == 'Approved')
                                    Approved
                                @endif
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12" id="show_table">
                <div class="card">
                    <div class="card-header text-white" style="background-color: #600;"><strong>Log Sheet</strong></div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Date Start</th>
                                            <th>Date End</th>
                                            <th>Total Hours Rendered</th>
                                            <th>Actual Accomplishment</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($accomplishments as $accomplishment)
                                        <tr>
                                            <td>{{$accomplishment->date_start}}</td>
                                            <td>{{$accomplishment->date_end}}</td>
                                            <td>
                                                @if($accomplishment->hours_rendered == null)
                                                    Log Sheet for approval
                                                @else
                                                    {{ $accomplishment->hours_rendered }}
                                                @endif
                                            </td>
                                            <td><?= urldecode($accomplishment->accomplishment) ?></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                        </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="col-md-4">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4 mt-4">
                    <div class="card-body card border-left-danger shadow h-100 py-2">
                        <h6 class="font-weight-bold text-black text-uppercase m-0">Time Progress</h6>
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i>Remaining Hours: {{$remaining_time}}
                            </span><br>
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i>Rendered Hours: {{$total_times}}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
@section('script')
    <script src="{{asset('admin/vendor/chart.js/Chart.min.js')}}"></script>
    <script>
        // Set new default font family and font color to mimic Bootstrap's default styling
        Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
        Chart.defaults.global.defaultFontColor = '#858796';

        // Pie Chart Example
        var ctx = document.getElementById("myPieChart");
        var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ["Rendered Hours", "Remaining Hours"],
            datasets: [{
            data: [{{$total_times_seconds}}, {{$remaining_hours_seconds}}],
            backgroundColor: [ '#1cc88a', '#4e73df','#36b9cc'],
            hoverBackgroundColor: [ '#17a673','#2e59d9', '#2c9faf'],
            hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
            },
            legend: {
            display: false
            },
            cutoutPercentage: 80,
        },
        });

    </script>

    {{-- <script>
        function show_table_function(content){
            // alert(content);
            $("#show_table").load('/coor/dashboard/table/'+content);
            // document.getElementById('show_table').
        }
        $('#dataTable').DataTable( {
            ordering: false
        } );
    </script> --}}

    {{-- <script>
        $(document).ready(function() {
            // Initialize DataTables for the tables in other sections
            $('#dataTableUndeployedStudent').DataTable();
        });
    </script> --}}

    <script>
        $(document).ready(function() {
            $('#monitoring').DataTable();
        });
    </script>
@endsection
