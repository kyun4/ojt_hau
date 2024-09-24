@extends('layouts.partner_ui')
@section('title')
Job Details: ({{$job->title}})
@endsection
@section('content')
    <div class="row">
        <div class="col-md-10">

            <div style="float: right">
                Posted By: {{$job->user->profile->company_name}}
                <br />
                Posted Date: {{$job->updated_at->format("d-m-Y")}}
            </div>
            <h3>{{$job->title}}</h3>
            <hr />

            @if(!is_null($job->user->profile->banner))
                <img src="{{ asset('partner_img/' . $job->user->profile->banner) }}" style="width:100%">
            @endif
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
        <div class="col-md-2">
            <a href="/partners/job/update/{{base64_encode($job->id)}}"><button class="btn btn-sm btn-primary">Update</button></a>
            <button class="btn btn-sm btn-danger" onclick="archive('{{base64_encode($job->id)}}')">Archive</button>
        </div>
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
