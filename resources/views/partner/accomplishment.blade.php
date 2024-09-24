@extends('layouts.partner_ui')
@section('css')
    <style>
        .selections{
            text-align: center
        }
    </style>
@endsection
@section('title')
Weekly Accomplishement: {{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}
@endsection
@section('content')
   <div class="row">
            @if (count($accomplishments) == 0)
               <center><strong>No Accomplishement Yet</strong></center>
            @else
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Date Start</th>
                            <th>Date End</th>
                            <th>Actual Accomplishment</th>
                            <th>Total Hours Rendered</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($accomplishments as $accomplishment)
                        <tr>
                            <td>{{$accomplishment->date_start}}</td>
                            <td>{{$accomplishment->date_end}}</td>
                            <td><?= urldecode($accomplishment->accomplishment) ?></td>
                            <td>
                                @if($accomplishment->hours_rendered == null)
                                    Log Sheet for approval
                                @else
                                    {{ $accomplishment->hours_rendered }}
                                @endif
                            </td>
                            <td>
                                @if($accomplishment->status == null)
                                    For Approval
                                @else
                                    {{$accomplishment->status}}
                                @endif
                            </td>
                            <td width='15%'>
                                @if($accomplishment->status == null && $accomplishment->hours_rendered != null)
                                    <button title="Approve" class="btn btn-sm btn-success" style="color: #000" onclick="approve('{{base64_encode($accomplishment->id)}}')"><i class="fas fa-fw fa-check"></i></button>
                                @else
                                    <button title="Approve" class="btn btn-sm btn-danger" style="color: #000" disabled><i class="fas fa-fw fa-check"></i></button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            @endif
    </div>
@endsection
@section('script')
    <script>
        function approve(id){
            var conf = confirm("Are you sure to Approve this accomplishment?");
            if(conf == true) window.open('/partners/approve/accomplishments/'+id,'_parent');
        }
    </script>
@endsection
