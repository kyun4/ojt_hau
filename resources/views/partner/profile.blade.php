@extends('layouts.partner_ui')
@section('title')
    Student Profile
@endsection
@section('content')
    <div class="row my-2">
        <div class="col-md-3 text-center">
            @if ($applicant->image == '' || $applicant->image == null)
                <img src="{{asset('admin/img/undraw_profile.svg')}}" style="width: 1px; height: 1px;" alt="">
            @else
                <img src="{{asset('student_img/'.$applicant->image)}}" class="w-100"  alt="">
            @endif
            <strong>{{$applicant->first_name }} {{$applicant->last_name }}</strong><br>
            <small>{{$applicant->student_number }}</small>
        </div>
        <div class="col-md-9" style="text-transform:uppercase">
            <a href="/partners/job/applicants/{{$job_id}}">
            <button class="btn btn-sm btn-primary" style="float: right">Back</button>
            </a>
            <h4 class="text-primary">Student's Profile</h4>
            <hr>
            <div class="card my-1">
                <div class="card-header">
                    <strong>Basic Information</strong>
                </div>
                <div class="card-body">
                    <table cellpadding='5px'>
                        <tr>
                            <td><strong>School/College: </strong></td>
                            <td>{{$applicant->school->school}}</td>
                        </tr>
                        <tr>
                            <td><strong>Program: </strong></td>
                            <td>{{$applicant->program}}</td>
                        </tr>
                        <tr>
                            <td><strong>Year and Section: </strong></td>
                            <td>{{$applicant->year}}-{{$applicant->section}}</td>
                           </tr>
                           <tr>
                               <td><strong>Email: </strong></td>
                               <td style="text-transform: lowercase !important">{{$applicant->user->email}}</td>
                              </tr>
                              <tr>
                                  <td><strong>Contact Number: </strong></td>
                                  <td style="text-transform: lowercase !important">{{$applicant->contact}}</td>
                                 </tr>

                    </table>
                </div>
              </div>

            <div class="card my-1">
                <div class="card-header">
                    <strong>Work Experience</strong>
                </div>
                <div class="card-body">
                    {{-- {{Auth::user()->profile}} --}}
                    @foreach ($applicant->work_exp as $item)
                        <table cellpadding='5px'>
                            <tr>
                                <td><strong>Position: </strong></td>
                                <td>{{$item->work_exp_position}}</td>
                            </tr>
                            <tr>
                                <td><strong>Company: </strong></td>
                                <td>{{$item->work_exp_company}}</td>
                            </tr>
                            <tr>
                                <td><strong>Address: </strong></td>
                                <td>{{$item->work_exp_address}}</td>
                            </tr>
                            <tr>
                                <td><strong>Work Dates: </strong></td>
                                <td>{{$item->work_exp_s_year.'-'.$item->work_exp_e_year}}</td>
                            </tr>
                        </table>
                        <hr>
                    @endforeach
                </div>
              </div>

              <div class="card my-1">
                <div class="card-header">
                    <strong>Skills</strong>
                </div>
                <div class="card-body">
                    {{-- {{Auth::user()->profile}} --}}

                        <table cellpadding='5px'>
                            @php
                                $counter = 0;
                            @endphp
                            @foreach ($applicant->skill_tbl as $item)
                                @php $counter++ @endphp
                                <tr>
                                    <td><strong>{{$counter}}: </strong></td>
                                    <td>{{$item->skill}}</td>
                                </tr>
                            @endforeach
                        </table>
                </div>
              </div>

        </div>
    </div>
@endsection
