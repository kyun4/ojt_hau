@extends('layouts.student_ui')
@section('title')
Job Details: ({{$job->title}})
@endsection
@section('content')
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    <div class="row">
        <div class="col-md-11">

            <div style="float: right">
                Posted By: {{$job->user->profile->company_name}}
                <br />
                Posted Date: {{$job->updated_at->format("d-m-Y")}}
            </div>
            <h3>{{$job->title}}</h3>
            <hr />

            <div class="col-md-3">
                @if (!is_null($job->user->profile->banner))
                    <div class="embed-responsive embed-responsive-1by1">
                        <img class="embed-responsive-item" src="{{ asset('partner_img/' . $job->user->profile->banner) }}" style="width: 100%;">
                    </div>
                @endif
            </div>

            <p align="justify">
                <h4>Job Descriptions</h4>
                @php
                    echo urldecode($job->job_descriptions);
                @endphp
            </p>
            <p align="justify">
                <h4>Skills Set</h4>
                <ul>
                @foreach ($job->job_skills as $job_skills)
                    <li>{{$job_skills->skill}}</li>
                @endforeach
                </ul>
            </p>
            <h4>Additional Information</h4>
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
    <div class="card-header">Work Length Experience</div>
    <div class="card-body">
        {{$job->experience_length}} Year/s
    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
    <div class="card-header">Job Type</div>
    <div class="card-body">
        {{$job->level==null ? "Not Specified":$job->level}}
    </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
    <div class="card-header">Location</div>
    <div class="card-body">
        {{$job->location}}
    </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-1">
            @php
                $checker =0;
            @endphp
            @foreach ($applications as $id_app)
                @if ($job->id==$id_app)
                @php $checker=1; @endphp
                @endif
            @endforeach
            @if ($checker==1)
                <button class="btn btn-sm btn-primary" disabled>Applied</button>
            @else
                <button class="btn btn-sm btn-primary" onclick="apply_job('{{$job_id}}')">Apply</button>
               
            @endif

        </div>
    </div>
@endsection
@section('script')
    <script>
        function apply_job(id){
            var c = confirm('Are your sure to apply on this job?');
            if(c == true){
                window.open('/student/apply/job/'+id,'_parent');
               
            }
        }
        function details_job(id){
            window.open('/student/details/job/'+id,'_parent');
        }
    </script>
@endsection
