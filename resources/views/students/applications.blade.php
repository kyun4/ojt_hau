@extends('layouts.student_ui')
@section('title')
Applications List
@endsection
@section('content')
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Company</th>
                <th>Job Title</th>
                <th>Position</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applications as $application)
                @php
                    $job = $application->job;
                    $applied = $application->student_id == Auth::user()->student_id;
                @endphp
                <tr>
                    <td>{{ $job->user->profile->company_name }}</td>
                    <td>{{ $job->title }}</td>
                    <td>{{ $job->position }}</td>
                    <td>{{ $application->status }}</td>
                    <td>
                        <button title="Details" class="btn btn-primary btn-sm" onclick="details_job('{{ base64_encode($job->id) }}')">
                            <i class="fas fa-list-ul"></i>
                        </button>
                        @if ($application->status == 'Recruited')
                            <button title="Requirements" class="btn btn-success btn-sm" style="color: #ffffff" onclick="approval('{{ base64_encode($application->id) }}')">
                                <i class="fas fa-paperclip"></i>
                            </button>
                        @endif
                        @if ($applied)
                            <button title="Cancel Application" class="btn btn-sm btn-danger" onclick="cancel_application('{{ base64_encode(Auth::user()->student_id) }}', '{{ base64_encode($job->id) }}')">
                                <i class="fas fa-ban"></i>
                            </button>
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
        function cancel_application(stud_id, job_id) {
            var c = confirm('Are you sure you want to cancel the job application?');
            if (c) {
                window.open('/student/cancel/job/' + stud_id + '/' + job_id, '_parent');
            }
        }
    </script>
@endsection
