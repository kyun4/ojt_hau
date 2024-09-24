@extends('layouts.student_ui')
@section('title')

<a href="/student/accomplishment/new" class="btn btn-sm btn-success" style="float: right">New</a>
Accomplishments
@endsection
@section('content')
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Date Start</th>
                        <th>Date End</th>
                        <th>Total Hours Rendered</th>
                        <th>Actual Accomplishment</th>
                        <th>Action</th>
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
                        <td width='15%'>
                            @if($accomplishment->status == null)
                                <button title="update" class="btn btn-sm btn-warning" style="color:#000 !important" onclick="accomplishment_update('{{base64_encode($accomplishment->id)}}')"><i class="fas fa-fw fa-pen"></i></button>
                            @else
                                <button title="update" class="btn btn-sm btn-warning" style="color:#000 !important" onclick="accomplishment_update('{{base64_encode($accomplishment->id)}}')"><i class="fas fa-fw fa-pen"></i></button>`
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
@endsection
@section('script')
    <script>
        function details_job(id){
            window.open('/student/details/job/'+id,'_parent');
        }
        function approval(id){
            window.open('/student/for/approval/'+id,'_parent');
        }
        function accomplishment_update(id){
            window.open('/student/accomplishment/update/'+id,'_parent');
        }
    </script>
@endsection
