@extends('layouts.ui')
@section('title')
    Student Profile
@endsection
@section('content')
    <div class="row my-2">
        <div class="col-md-3 text-center">
            @if ($student->image == '' || $student->image == null)
                <img src="{{asset('admin/img/undraw_profile.svg')}}" class="w-100"  alt="">
            @else
                <img src="{{asset('student_img/'.$student->image)}}" class="w-100"  alt="">                        
            @endif
            <strong>{{$student->first_name }} {{$student->last_name }}</strong><br>
            <small>{{$student->student_number }}</small>
        </div>
        <div class="col-md-9" style="text-transform:uppercase">
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
                            <td>{{$student->school->school}}</td>
                        </tr>
                        <tr>
                            <td><strong>Program: </strong></td>
                            <td>{{$student->program}}</td>
                        </tr>
                        <tr>
                            <td><strong>Year and Section: </strong></td>
                            <td>{{$student->year}}-{{$student->section}}</td>
                           </tr>
                           <tr>
                               <td><strong>Email: </strong></td>
                               <td style="text-transform: lowercase !important">{{isset($student->user->email) ? $student->user->email:""}}</td>
                              </tr>
                              <tr>
                                  <td><strong>Contact Number: </strong></td>
                                  <td style="text-transform: lowercase !important">{{isset($student->contact) ? $student->contact:""}}</td>
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
                    @foreach ($student->work_exp as $item)
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
                            @foreach ($student->skill_tbl as $item)                            
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