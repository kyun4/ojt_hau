@extends('layouts.partner_ui')

@section('title') Dashboard @endsection
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
    <div class="col-md-4">
        <div class="row">
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    {{-- <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" style="background-color: #600">
                        <h6 class="m-0 font-weight-bold text-white">Student Hired</h6>
                        <div class="dropdown no-arrow"></div>
                    </div> --}}
                    <!-- Card Body -->
                    <div class="card-body card border-left-danger shadow h-100 py-2" >
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <div class="mt-4 text-center small">
                            <span class="mr-2">
                                <i class="fas fa-circle text-success"></i>COMPLETED
                            </span>
                            <span class="mr-2">
                                <i class="fas fa-circle text-primary"></i>  ON-GOING
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4" style="cursor: pointer;" onclick="show_table_function('Applicants')">
                <div class="card border-left-danger shadow h-100 py-2 hoverable">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                    Applicants</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($applications)}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4"  style="cursor: pointer;" onclick="window.open('/partners/trainee/students','_parent')">
                <div class="card border-left-danger shadow h-100 py-2 hoverable">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                    TOTAL TRAINEE</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($students)}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4"  style="cursor: pointer;" onclick="show_table_function('On-Going')">
                <div class="card border-left-danger shadow h-100 py-2 hoverable">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                    On-Going TRAINEE</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($students->where('status','ON-GOING'))}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xl-3 col-md-6 mb-4"  style="cursor: pointer;" onclick="show_table_function('Completed')">
                <div class="card border-left-danger shadow h-100 py-2 hoverable">
                    <div class="card-body ">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                    FOR EVALUATION</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($students->where('status','COMPLETED'))}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-xl-3 col-md-6 mb-4"  style="cursor: pointer;"  onclick="show_table_function('Accomplishments')">
                <div class="card border-left-danger shadow h-100 py-2 hoverable">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                    ACCOMPLISHMENTs</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($accomplishments)}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4"  style="cursor: pointer;" onclick="show_table_function('Completed')">
                <div class="card border-left-danger shadow h-100 py-2 hoverable">
                    <div class="card-body ">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                    Completed TRAINEE</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($students->where('evaluation','COMPLETED'))}}</div>
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
                    <div class="card-header text-white" style="background-color: #600;"><strong>ON-GOING TRAINEE</strong></div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <tr>
                                <th>Student Number</th>
                                <th>Last Name</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Hours Rendered</th>
                            </tr>
                            @foreach ($students as $student)
                                @php
                                    $total_times = ''; // Reset total_times for each student
                                    $y = 0; // Reset $y for each student
                                @endphp

                                @foreach ($student->monitorings as $monitoring)
                                    @php
                                        if($monitoring->time_out != null){
                                            $date_raw = explode('-', $monitoring->date_log);
                                            $time_in_raw_ampm = explode(' ', $monitoring->time_in);
                                            $time_in_raw = explode(':', $time_in_raw_ampm[0]);
                                            $time_out_raw_ampm = explode(' ', $monitoring->time_out);
                                            $time_out_raw = explode(':', $time_out_raw_ampm[0]);

                                            if($time_in_raw_ampm[1] == "PM"){
                                                $time_in_raw[0] += 12;
                                            }
                                            if($time_out_raw_ampm[1] == "PM"){
                                                $time_out_raw[0] += 12;
                                            }

                                            $date1 = strtotime("{$date_raw[2]}-{$date_raw[0]}-{$date_raw[1]} {$time_in_raw[0]}:{$time_in_raw[1]}:{$time_in_raw[2]}");
                                            $date2 = strtotime("{$date_raw[2]}-{$date_raw[0]}-{$date_raw[1]} {$time_out_raw[0]}:{$time_out_raw[1]}:{$time_out_raw[2]}");

                                            $diff = abs($date2 - $date1);
                                            $hours = floor($diff / (60*60));
                                            $minutes = floor(($diff % (60*60)) / 60);
                                            $seconds = $diff % 60;

                                            $hours = str_pad($hours, 2, "0", STR_PAD_LEFT);
                                            $minutes = str_pad($minutes, 2, "0", STR_PAD_LEFT);
                                            $seconds = str_pad($seconds, 2, "0", STR_PAD_LEFT);

                                            if($y == 0){
                                                $total_times = "$hours:$minutes:$seconds";
                                                $y++;
                                            }
                                            else{
                                                $time2 = "$hours:$minutes:$seconds";
                                                $secs = strtotime($time2) - strtotime("00:00:00");
                                                $total_times = date("H:i:s", strtotime($total_times) + $secs);
                                            }
                                        }
                                    @endphp
                                @endforeach

                                <tr>
                                    <td>{{$student->student->student_number}}</td>
                                    <td>{{$student->student->last_name}}</td>
                                    <td>{{$student->student->first_name}}</td>
                                    <td>{{$student->student->middle_name}}</td>
                                    <td>{{ $total_times }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
            labels: ["Completed", "On-Going"],
            datasets: [{
            data: [{{count($students->where('status','COMPLETED'))}}, {{count($students->where('status','ON-GOING'))}}],
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

    <script>
        function show_table_function(content){
            // alert(content);
            $("#show_table").load('/partners/dashboard/table/'+content);
            // document.getElementById('show_table').
        }
    </script>

@endsection
