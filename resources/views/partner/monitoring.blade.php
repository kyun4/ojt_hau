@extends('layouts.partner_ui')
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

<!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body" id="modal_body" >

        </div>
      </div>
    </div>
  </div>

@endsection
@section('title')

@if($total_times === $internship_duration)
    <a href="/partners/student/evaluation/{{base64_encode($student->id)}}" class="btn btn-sm btn-success" style="float: right">Evaluate</a>
@elseif (count($evaluation) != 0)
    <a href="/partners/student/view/evaluation/{{base64_encode($student->id)}}" class="btn btn-sm btn-success" style="float: right">View Evaluation</a>
@else
<a href="/partners/student/evaluation/{{base64_encode($student->id)}}" class="btn btn-sm btn-success" style="float: right">Evaluate</a>

@endif

{{$student->first_name}} {{$student->middle_name}} {{$student->last_name}} Log Sheet:
@endsection
@section('script')
    <script>
        $('#exampleModal').on('show.bs.modal', function (e) {
            var id = $(e.relatedTarget).data('id');
            $("#exampleModalLabel").html("Attendance Remarks");
            $("#modal_body").load('/partners/student/remarks/'+id);

        })
    </script>
@endsection
