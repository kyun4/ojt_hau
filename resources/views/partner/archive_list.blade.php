@extends('layouts.partner_ui')
@section('title')
Archived Job Post List
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
                            <a href="/partners/job/applicants/{{base64_encode($job->id)}}"><button class="btn btn-success btn-sm">Applicants</button> </a>
                            <a href="/partners/job/details/{{base64_encode($job->id)}}"><button class="btn btn-primary btn-sm">Details</button></a>
                            <button class="btn btn-warning btn-sm" onclick="archive('{{base64_encode($job->id)}}')" style="color: black !important">Restore</button>
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
            var conf = confirm("Are you sure to restore this job?");
            if(conf==true){
                location.replace('/partners/job/restore/'+id);
            }
        }
    </script>
@endsection