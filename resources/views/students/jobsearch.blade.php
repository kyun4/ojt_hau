@extends('layouts.student_ui')
@section('content')
<form action="/student/job/search" method="post">
    @csrf
    <div class="row my-2 py-5" style="background-image:url('{{asset('img/bg_test_1.jpg')}}'); background-position:center; background-size:cover">
        <div class="col-md-2">
            <strong>Search Jobs</strong>
        </div>
        <div class="col-md-3">
            <input type="text" name="title" id="" class="form-control" placeholder="Job Title">
        </div>
        <div class="col-md-3">
            <input type="text" name="area" id="" class="form-control" placeholder="Area">
        </div>
        {{-- <div class="col-md-3">
            <select name="specialization" id="" class="form-control">
                <option value="">-- Specialization --</option>
                @foreach ($specialization_search as $spec)
                    <option value="{{$spec->id}}">{{$spec->specialization}}</option>
                @endforeach
            </select>
        </div> --}}
        <div class="col-md-1">
            <button class="btn btn-primary">Search</button>
        </div>
    </div>
</form>
@if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif
<div class="row">
    <div class="col-md-12">
        <h3>Search Result:</h3>
    </div>
</div>
    {{-- <div class="card py-2 text-center" style="background-color:#300"></div> --}}
         @foreach ($jobs->where('status','Active') as $job)
         @php
            $checker =0;
        @endphp
        @foreach ($applications as $id_app)
            @if ($job->id==$id_app)
            @php $checker=1; @endphp
            @endif
        @endforeach
            <div class="row  my-1 ">
                <div class="col-md-12">
                    <div style="background-color: #EEE;padding:8px;">
                        <div class="row  my-1 ">                    
                            <div class="col-md-10" style="padding-left:20px !important">
                                <h5>{{$job->position}}</h5>
                                <p>
                                    {{$job->user->profile->company_name}}<br />
                                    {{$job->location}}<br />
                                    PHP {{$job->salary_s}} - {{$job->salary_e}}   <br />  
                                    Date Posted: {{$job->updated_at->format('d-M-Y')}}                     
                                </p>
                                {{-- <p>{{$job->job_descriptions}}</p> --}}
                                {{-- <p>{{$job->job_descriptions}}</p> --}}
                            </div>
                            <div class="col-md-2 text-center">
                                @if ($checker==1)
                                <button class="btn btn-sm btn-primary" disabled>Applied</button>
                            @else
                                <button class="btn btn-sm btn-primary" onclick="apply_job('{{base64_encode($job->id)}}')">Apply</button>
                            @endif
                            <button class="btn btn-sm btn-success" onclick="details_job('{{base64_encode($job->id)}}')">Details</button>
                       
                                {{-- <button class="btn btn-sm btn-primary" onclick="apply_job('{{base64_encode($job->id)}}')">Apply</button> --}}
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        @endforeach
    
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