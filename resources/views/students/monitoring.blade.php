@extends('layouts.student_ui')
@section('title')
<div style="float: right">
    <a href="/student/monitoring/new" class="btn btn-sm btn-success" style="float: right">New Log</a>
</div>
Student Log Sheet
@endsection
@section('content')
<div class="table-responsive">
    @php
        $total_times = ''; // For total_times
        $total_times_seconds = 0; // Initialize total_times_seconds
        $internship_duration_seconds = 0;
    @endphp

    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th width='20%'>Date (MM-DD-YYYY)</th>
                <th width='20%'>Time-In</th>
                <th width='20%'>Time-Out</th>
                <th width='20%'>Total Hrs (HH-MM-SS)</th>
                <th>Remarks</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
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
                <tr>
                    <td>{{ $monitoring->date_log }}</td>
                    <td>{{ $monitoring->time_in }}</td>
                    <td>{{ $monitoring->time_out }}</td>
                    <td>
                        @if ($monitoring->time_out != null)
                            {{ "$hours:$minutes:$seconds" }}
                        @endif
                    </td>
                    <td>{{ $monitoring->remarks }}</td>
                    <td>
                        @if ($monitoring->remarks == null)
                            <button title="update" class="btn btn-sm btn-warning" style="color:#000 !important" onclick="monitoring_update('{{ base64_encode($monitoring->id) }}')"><i class="fas fa-fw fa-pen"></i></button>
                        @else
                            <button title="update" class="btn btn-sm btn-danger" style="color:#000 !important" disabled><i class="fas fa-fw fa-pen"></i></button>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

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

    <div style="float: right;"><strong>Total Time: </strong>{{ $total_times }}</div><br>
    <div style="float: right;"><strong>Remaining Time: </strong>{{ $remaining_time }}</div>

    <br>
</div>


@endsection

@section('script')
    <script>
        function monitoring_update(id){
            window.open('/student/monitoring/update/'+id,'_parent');
        }
    </script>
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
@endsection
