@extends('layouts.ui')

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
                            <span class="mr-2">
                                <i class="fas fa-circle text-info"></i> NOT HIRED
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row">
            <div class="col-xl-3 col-md-6 mb-4" style="cursor: pointer;" onclick="window.location.href='/coor/student/accomplishments'">
                <div class="card border-left-danger shadow h-100 py-2 hoverable">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                    Accomplishments</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($accomplishments)}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4" style="cursor: pointer;" onclick="window.open('/coor/student/list','_parent')">
                <div class="card border-left-danger shadow h-100 py-2 hoverable">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                    TOTAL STUDENTS</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($students)}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4 " style="cursor: pointer;" onclick="show_table_function('not_hired')">
                <div class="card border-left-danger shadow h-100 py-2 hoverable">
                    <div class="card-body ">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                    Not Deployed Students</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($student_not_hired)}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6 mb-4" style="cursor: pointer;" onclick="show_table_function('On-Going')">
                <div class="card border-left-danger shadow h-100 py-2 hoverable">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                    Students On-Going OJT</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($ojt_countings->where('status','ON-GOING'))}}</div>
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
                                    Students Completed OJT</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($ojt_countings->where('status','COMPLETED'))}}</div>
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
                    <div class="card-header text-white" style="background-color: #600;"><strong>NOT DEPLOYED STUDENTS</strong></div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-hover" id="dataTableUndeployedStudent" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Student Number</th>
                                    <th>Yr-Section</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($student_not_hired as $student_not_hired_item)
                                    <tr onclick="window.open('/coor/student/profile/{{base64_encode($student_not_hired_item->id)}}')" style="cursor: pointer">
                                        <td>{{$student_not_hired_item->student_number}}</td>
                                        <td>{{$student_not_hired_item->year}}-{{$student_not_hired_item->section}}</td>
                                        <td>{{$student_not_hired_item->last_name}}</td>
                                        <td>{{$student_not_hired_item->first_name}}</td>
                                        <td>{{$student_not_hired_item->middle_name}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
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
            labels: ["Completed", "On-Going", "Not Hired"],
            datasets: [{
            data: [{{count($ojt_countings->where('status','COMPLETED'))}}, {{count($ojt_countings->where('status','ON-GOING'))}}, {{count($student_not_hired)}}],
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
            $("#show_table").load('/coor/dashboard/table/'+content);
            // document.getElementById('show_table').
        }
        $('#dataTable').DataTable( {
            ordering: false
        } );
    </script>

    <script>
        $(document).ready(function() {
            // Initialize DataTables for the tables in other sections
            $('#dataTableUndeployedStudent').DataTable();
        });
    </script>
@endsection
