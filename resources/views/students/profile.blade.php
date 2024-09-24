@extends('layouts.student_ui')
@section('title')
    Student Profile
@endsection
@section('content')
    <div class="row my-2" style="text-transform:uppercase">
        <div class="col-md-3 text-center">
            @if (Auth::user()->student->image == '' || Auth::user()->student->image == null)
                <img src="{{asset('admin/img/undraw_profile.svg')}}" class="w-100"  alt="">
            @else
                <img src="{{asset('student_img/'.Auth::user()->student->image)}}" class="w-100"  alt="">                        
            @endif
            <strong>{{Auth::user()->student->first_name }} {{Auth::user()->student->last_name }}</strong><br>
            <small>{{Auth::user()->student->student_number }}</small><br>
            
            <button class="btn btn-sm btn-primary" onclick="window.open('/student/profile/image/form')">Update Image</button>
        </div>
        <div class="col-md-9">

            <div class="card my-1">
                <div class="card-header">
                    
                    <a href="/student/profile/update">
                        <button class="btn btn-sm btn-primary" style="float: right">
                            <i class="fas fa-fw fa-pen"></i></button>
                        </a>
                    <strong>Basic Information</strong>
                </div>
                <div class="card-body">
                    <table cellpadding='5px'>
                        <tr>
                            <td><strong>School/College: </strong></td>
                            <td>{{Auth::user()->student->school->school}}</td>
                        </tr>
                        <tr>
                            <td><strong>Program: </strong></td>
                            <td>{{Auth::user()->student->program}}</td>
                        </tr>
                        <tr>
                            <td><strong>Year and Section: </strong></td>
                            <td>{{Auth::user()->student->year}}-{{Auth::user()->student->section}}</td>
                           </tr>
                           
                           <tr>
                            <td><strong>Email: </strong></td>
                            <td style="text-transform: lowercase !important">{{Auth::user()->email}}</td>
                           </tr>
                           <tr>
                               <td><strong>Contact Number: </strong></td>
                               <td style="text-transform: lowercase !important">{{Auth::user()->student->contact}}</td>
                              </tr>

                           <tr>
                               <td><strong>address:</strong></td>
                               <td>{{Auth::user()->student->address}}</td>
                              </tr>
                              <tr>
                                  <td><strong>Guardian Name:</strong></td>
                                  <td>{{Auth::user()->student->parent_first_name}} {{Auth::user()->student->parent_middle_name}} {{Auth::user()->student->parent_last_name}}</td>
                                 </tr>
                       
                    </table>
                </div>
              </div>
              
            <div class="card my-1">
                <div class="card-header">
                    <a href="/student/profile/work/experience">
                        <button class="btn btn-sm btn-primary" style="float: right">
                            <i class="fas fa-fw fa-plus"></i></button>
                        </a>
                    </a>
                    <strong>Work Experience</strong>
                </div>
                <div class="card-body">
                    {{-- {{Auth::user()->profile}} --}}
                    @foreach (Auth::user()->student->work_exp as $item)
                    <div class="row">
                        <div class="col-md-11">
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
                        </div>
                        <div class="col-md-1">
                            <a href="/student/profile/work/experience/update/{{base64_encode($item->id)}}">
                                <button class="btn btn-sm btn-primary" >
                                    <i class="fas fa-fw fa-pen"></i>
                                </button>
                            </a>
                                <button class="btn btn-sm btn-danger" onclick="delete_we('{{base64_encode($item->id)}}')" >
                                    <i class="fas fa-fw fa-trash"></i>
                                </button>
                        </div>
                       </div>
                        <hr>
                    @endforeach
                </div>
              </div>

              <div class="card my-1">
                <div class="card-header">
                    <a href="/student/profile/skills">
                    <button class="btn btn-sm btn-primary" style="float: right">
                        <i class="fas fa-fw fa-plus"></i></button>
                    </a>
                    <strong>Skills</strong>
                </div>
                <div class="card-body">
                    {{-- {{Auth::user()->profile}} --}}
                                        
                    <table cellpadding='5px' class="table table-hover">
                            @php
                                $counter = 0;
                            @endphp
                            @foreach (Auth::user()->student->skill_tbl as $item)                            
                                @php $counter++ @endphp
                                <tr>
                                    
                                    <td>{{$item->skill}}</td>
                                    <td class="text-right">
                                        <a href="/student/profile/skill/update/{{base64_encode($item->id)}}">
                                            <button class="btn btn-sm btn-primary" >
                                                <i class="fas fa-fw fa-pen"></i>
                                            </button>
                                        </a>
                                        <button class="btn btn-sm btn-danger" onclick="delete_skill('{{base64_encode($item->id)}}')" >
                                            <i class="fas fa-fw fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                </div>
              </div>

        </div>
    </div>
@endsection
@section('script')
    <script>
        function delete_we(id){
            var conf = confirm('Are you sure remove this work experience?');
            if( conf == true) window.open('/student/profile/work/experience/delete/'+id,'_parent');            
        }
        function delete_skill(id){
            var conf = confirm('Are you sure remove this skill?');
            if( conf == true) window.open('/student/profile/skill/delete/'+id,'_parent');            
        }
    </script>
@endsection