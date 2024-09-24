@extends('layouts.ui')
@section('title')

<a href = "/coor/student/list" class = "mx-2 pr-3"><i class = "fa fa-arrow-left text-white"></i></a>  {{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}'s Log Sheet
<span class = "float-right">

@foreach($ojt as $ojt_value)
    @foreach($partners as $partner_value)
        @if($partner_value->id == $ojt_value->partner_id)
            COMPANY:  {{ $partner_value->company_name }}        
        @endif
    @endforeach
@endforeach

</span>
@endsection
@section('content')
    <div class="table-responsive">
        
        @php
            $total_seconds = 0; // Initialize total seconds
        @endphp

        @php
            $total_hours = 0;
            $total_minutes = 0;
        @endphp

        @foreach ($monitorings as $monitoring)
            @if ($monitoring->time_out != null)
                @php
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
                    $total_seconds += $diff; // Accumulate total seconds
                @endphp
            @endif
        @endforeach

        @php
            $total_hours = floor($total_seconds / 3600); // Convert total seconds to hours
            $total_minutes = floor(($total_seconds % 3600) / 60); // Convert total seconds to minutes
            $total_times = sprintf('%02d:%02d:00', $total_hours, $total_minutes); // Format total time
        @endphp

        <div style="float: right;"><strong>Total Time: </strong>{{ $total_times }}</div>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th width='20%'>Date (MM-DD-YYYY)</th>
                    <th width='20%'>Time-In</th>
                    <th width='20%'>Time-Out</th>
                    <th width='20%'>Total Hrs (HH-MM-SS)</th>
                    <th>Remarks</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($monitorings as $monitoring)
                    <tr>
                        <th>{{ $monitoring->date_log }}</th>
                        <th>{{ $monitoring->time_in }}</th>
                        <th>{{ $monitoring->time_out }}</th>
                        <th>
                            @if ($monitoring->time_out != null)
                                @php
                                    echo gmdate("H:i:s", $diff); // Output difference for this row
                                @endphp
                            @endif
                        </th>
                        <th>{{ $monitoring->remarks }}</th>
                        <td>
                            <button data-toggle="modal" data-id="{{ base64_encode($monitoring->id) }}" data-target="#exampleModal" class="btn btn-success btn-sm modal_open" style="color: #000" title="Approved">Remarks</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


{{-- Deprecated table --}}
{{-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th width='20%'>Date (MM-DD-YYYY)</th>
            <th width='20%'>Time-In</th>
            <th width='20%'>Time-Out</th>
            <th width='20%'>Total Hrs (HH-MM-SS)</th>
            <th>Remarks</th>
        </tr>
    </thead>
    <tbody>

        @php $x= 0; $total_time=''; @endphp
        @foreach ($monitorings as $monitoring)
        @php $x++; @endphp

            <tr>
                <th>{{$monitoring->date_log}}</th>
                <th>{{$monitoring->time_in}}</th>
                <th>{{$monitoring->time_out}}</th>
                <th>
                    @php
                        if($monitoring->time_out != null){
                            $date_raw = explode('-',$monitoring->date_log);

                            $time_in_raw_ampm = explode(' ',$monitoring->time_in);
                            $time_in_raw = explode(':',$time_in_raw_ampm[0]);

                            $time_out_raw_ampm = explode(' ',$monitoring->time_out);
                            $time_out_raw = explode(':',$time_out_raw_ampm[0]);

                            if($time_in_raw_ampm[1] == "PM"){
                                $time_in_raw[0]+=12;
                            }
                            if($time_out_raw_ampm[1] == "PM"){
                                $time_out_raw[0]+=12;
                            }

                            // echo "{$date_raw[2]}-{$date_raw[1]}-{$date_raw[0]} {$time_in_raw[0]}:{$time_in_raw[1]}:{$time_in_raw[2]}<br />";
                            // echo "{$date_raw[2]}-{$date_raw[1]}-{$date_raw[0]} {$time_out_raw[0]}:{$time_out_raw[1]}:{$time_out_raw[2]}<br />";
                            // $in = strtotime()
                            $date1 = strtotime("{$date_raw[2]}-{$date_raw[0]}-{$date_raw[1]} {$time_in_raw[0]}:{$time_in_raw[1]}:{$time_in_raw[2]}");
                            $date2 = strtotime("{$date_raw[2]}-{$date_raw[0]}-{$date_raw[1]} {$time_out_raw[0]}:{$time_out_raw[1]}:{$time_out_raw[2]}");

                            // $date1 = strtotime("2016-06-01 22:45:00");
                            // $date2 = strtotime("2018-09-21 10:44:01");

                            $diff     = abs($date2 - $date1);
                            $years    = floor($diff / (365*60*60*24));
                            $months   = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
                            $days     = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24) / (60*60*24));
                            $hours    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24) / (60*60));
                            $minutes  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60) / 60);
                            $seconds  = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24 - $days*60*60*24 - $hours*60*60 - $minutes*60));
                            if ($hours<=9) {
                                $hours = "0".$hours;
                            }
                            if ($minutes<=9) {
                                $minutes = "0".$minutes;
                            }
                            if ($seconds<=9) {
                                $seconds = "0".$seconds;
                            }
                            echo "$hours:$minutes:$seconds";
                            if($x == 1){
                                $total_time = "$hours:$minutes:$seconds";
                            }
                            else{
                                $time2 = "$hours:$minutes:$seconds";
                                $secs = strtotime($time2)-strtotime("00:00:00");
                                $total_time = date("H:i:s",strtotime($total_time)+$secs);
                                // echo "<br/>".$total_time;
                            }
                        }
                    @endphp
                </th>
                <th>{{$monitoring->remarks}}</th>
            </tr>
        @endforeach
    </tbody>
    <div style="float: right;"><strong>Total Time: </strong>{{$total_time}}</div>
    <br />
</table> --}}
