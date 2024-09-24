@extends('layouts.student_ui')
@section('title')
search job
@endsection
@section('content')
<form action="/student/job/search" method="post">
    @csrf
    <div class="row my-2 py-5" style="background-image:url('{{asset('img/bg_test_1.jpg')}}'); background-position:center; background-size:cover">

        <div class="col-md-5">
            Job Title
            <input type="text" name="title" id="" class="form-control" placeholder="Job Title">
        </div>
        <div class="col-md-5">
            Area
            <input type="text" name="area" id="" class="form-control" placeholder="Area">
        </div>
        <div class="col-md-2">
            &nbsp;
            <button class="btn btn-primary form-control">Search</button>
        </div>
    </div>
</form>
{{-- @if(session('success'))
<div class="alert alert-success">
    {{session('success')}}
</div>
@endif --}}
<div class="row">
    <div class="com-md-12">
        <h3>&nbsp;&nbsp;Available Jobs</h3>
    </div>
</div>
    {{-- <div class="card py-2 text-center" style="background-color:#300"></div> --}}
    {{-- @foreach ($specializations as $specialization) --}}
        {{-- @foreach ($jobs->where('specialization_id',$specialization) as $job) --}}
        @foreach ($jobs as $job)
            {{-- {{$job->status}} --}}
            @if ($job->status == "Active")
                @php $checker =0; @endphp
                @foreach ($applications as $id_app)
                    @if ($job->id==$id_app)
                    @php $checker=1; @endphp
                    @endif
                @endforeach
                {{-- {{$applications}} --}}
                {{-- @if (isset($job->position))                     --}}
                    <div class="row  my-1 " style="background-color: #EEE;padding:8px;">
                        <div class="col-md-3">
                            <div class="embed-responsive embed-responsive-1by1">
                                @if ($job->user->profile->banner != null)
                                    <img class="embed-responsive-item rounded-circle" src="{{ asset('partner_img/' . $job->user->profile->banner) }}">
                                @else
                                    <img class="embed-responsive-item rounded-circle" src="{{ asset('admin/img/undraw_profile.svg') }}">
                                @endif
                            </div>
                        </div>


                        <div class="col-md-9">
                            <div style="background-color: #EEE;padding:8px;">
                                <div class="row  my-1 ">
                                    <div class="col-md-10" style="padding-left:20px !important">
                                        <h5>{{$job->position}}</h5>
                                        <p>
                                            {{$job->user->profile->company_name}}<br />
                                            {{$job->location}}<br />
                                            {{-- PHP {{$job->salary_s}} -  {{$job->salary_e}}  <br />   --}}
                                            Date Posted: {{$job->updated_at->format('d-M-Y')}}
                                        </p>
                                        {{-- <p>{{$job->job_descriptions}}</p> --}}
                                        {{-- <p>{{$job->job_descriptions}}</p> --}}
                                    </div>
                                    <div class="col-md-2 text-center">
                                        @if ($checker==1)
                                            {{-- <button class="btn btn-sm btn-primary" disabled>Applied</button> --}}
                                            <button title="Cancel Application" class="btn btn-sm btn-danger" onclick="cancel_application('{{ base64_encode(Auth::user()->student_id) }}','{{ base64_encode($job->id) }}')">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        @else
                                            <button title="Apply" class="btn btn-sm btn-primary" onclick="apply_job('{{ base64_encode($job->id) }}')">
                                                <i class="fas fa-envelope"></i>
                                            </button>
                                        @endif
                                        <button title="Details" class="btn btn-sm btn-success" onclick="details_job('{{base64_encode($job->id)}}')">
                                            <i class="fas fa-list-ul"></i>
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                {{-- @endif --}}

            @endif
        @endforeach
    {{-- @endforeach --}}

@endsection
@section('script')
    <script>
        function apply_job(id){
            var c = confirm('Are your sure to apply on this job?');
            if(c == true){
                window.open('/student/apply/job/'+id,'_parent');
            }
        }
        function cancel_application(stud_id, job_id) {
            var c = confirm('Are you sure you want to cancel the job application?');
            if (c) {
                window.open('/student/cancel/job/' + stud_id + '/' + job_id, '_parent');
            }
        }
        function details_job(id){
            window.open('/student/details/job/'+id,'_parent');
        }
    </script>
@endsection
