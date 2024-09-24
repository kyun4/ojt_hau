@extends('layouts.partner_ui')
@section('title')
Job Post List
@endsection
@section('content')
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Job Title</th>
                    <th>Position</th>
                    <th>location</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobs as $job)
                    <tr>
                        <td>{{$job->title}}</td>
                        <td width='25%'>{{$job->position}}</td>
                        <td width='25%'>{{$job->location}}</td>
                        <td width='25%'>
                            <a href="/partners/job/applicants/{{base64_encode($job->id)}}">
                                <button title="Applicants" class="btn btn-success btn-sm">
                                    <i class="fas fa-user-plus" title="Applicants"></i>
                                </button>
                            </a>
                            <a href="/partners/job/details/{{base64_encode($job->id)}}">
                                <button title="Job Details" class="btn btn-primary btn-sm">
                                    <i class="fas fa-info-circle" title="Job Details"></i>
                                </button>
                            </a>
                            <button title="Archive" class="btn btn-danger btn-sm" onclick="archive('{{base64_encode($job->id)}}')">
                                <i class="fas fa-fw fa-box-open" title="Archive"></i>
                            </button>
                        </td>
                     </tr>
                 @endforeach
            </tbody>
        </table>
    </div>
@endsection
@section('script')
    <script>
        function archive(id){
            var conf = confirm("Are you sure to archive this job?");
            if(conf==true){
                location.replace('/partners/job/archive/'+id);
            }
        }
    </script>
@endsection
