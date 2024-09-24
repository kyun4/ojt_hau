@extends('layouts.ui')

@section('title') Partner's Institution List @endsection
@section('content')

@php
    $count = 0;
@endphp
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Company</th>
                        <th>Position</th>

                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Middle Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach ($users as $user)
                  @if ($user->profile->school_id == Auth::user()->profile->school_id)
                    
                      <tr>
                        <td>{{ $count += 1 }}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->profile->company_name}}</td>
                        <td>{{$user->profile->company_position}}</td>
                        <td>{{$user->profile->last_name}}</td>
                        <td>{{$user->profile->first_name}}</td>
                        <td>{{$user->profile->middle_name}}</td>
                        <td>{{$user->status}}</td>
                        @if ($user->status == 'Active')
                                <td>
                                <button title="View Employed OJT's" class="btn btn-sm btn-outline-secondary" data-toggle = "modal" data-target = "#modal_view_employed_ojts_{{$user->id}}"><i class="fas fa-fw fa-users"></i></button>
                                    <button title="Password Reset" class="btn btn-sm btn-success" style="color:#000 !important" onclick="password_reset('{{base64_encode($user->id)}}')"><i class="fas fa-fw fa-sync"></i></button>
                                    <button title="update" class="btn btn-sm btn-warning" style="color:#000 !important" onclick="user_update('{{base64_encode($user->id)}}')"><i class="fas fa-fw fa-pen"></i></button>
                                    <button title="Archive" class="btn btn-sm btn-danger" style="color:#000 !important" onclick="user_archive('{{base64_encode($user->id)}}','{{$user->status}}','{{base64_encode($user->role)}}')"><i class="fas fa-fw fa-box"></i></button>
                                </td>
                            @else
                                <td>
                                   <button title="Restore" class="btn btn-sm btn-warning" style="color:#000 !important"
                                   onclick="user_archive('{{base64_encode($user->id)}}','{{$user->status}}','{{base64_encode($user->role)}}')"><i class="fas fa-fw fa-box-open"></i></button>
                                </td>
                            @endif
                      </tr>

                      <div class = "modal" id = "modal_view_employed_ojts_{{$user->id}}">
                        
                            <div class = "modal-content">
                                <div class = "modal-header">
                                    <h5 class="modal-title">
                                        Employed OJT's in <b>{{ $user->profile->company_name }}</b>                                        
                                    </h5>
                                    <button type = "button" class = "btn btn-outline-secondary" title = "Close" data-dismiss = "modal"><i class ="fa fa-arrow-right"></i></button>
                                </div>
                                <div class = "modal-body">

                                   
                                      
                                                
                                <div class="container-fluid">
                                    
                                @php
                                    $count_row_employed = 0
                                @endphp

                                <div class="row" style = "border-bottom: solid 1px #E7E1E1;">
                                        <div class="col-md-1">
                                            #
                                        </div>
                                        <div class="col-md-2">
                                            <small class = "font-weight-bold">FULL NAME</small>
                                        </div>

                                        <div class="col-md-3">
                                            <small class = "font-weight-bold">Program</small>
                                        </div>
                                        <div class="col-md-1">
                                            <small class = "font-weight-bold">Year</small>
                                        </div>
                                        <div class="col-md-1">
                                            <small class = "font-weight-bold">Section</small>
                                        </div>

                                        <div class="col-md-1">
                                            Evaluation
                                        </div>

                                        <div class="col-md-1">
                                            Status
                                        </div>

                                        <div class="col-md-2">
                                            Date/Time Last Updated
                                        </div>
                                    </div>

                                    @foreach($students_ojt as $ojt_details)
                                        @foreach($students as $student_details)
                                            @if ($student_details->id == $ojt_details->student_id)

                                            <div class="row" style = "border-bottom: solid 1px #E7E1E1;">
                                                <div class="col-md-1">
                                                    {{  $count_row_employed += 1 }}
                                                </div>
                                                <div class="col-md-2">
                                                    <small>
                                                        {{ $student_details->first_name }}
                                                        {{ $student_details->middle_name }}
                                                        {{ $student_details->last_name }}
                                                    </small>
                                                </div>

                                                <div class="col-md-3">
                                                    <small>
                                                            {{ $student_details->program }}                                                         
                                                    </small>
                                                </div>
                                                <div class="col-md-1">
                                                    <small>                                                            
                                                            {{ $student_details->year }}                                                            
                                                    </small>
                                                </div>
                                                <div class="col-md-1">
                                                    <small>
                                                            {{ $student_details->section }}
                                                    </small>
                                                </div>

                                                <div class="col-md-1">
                                                    <small>
                                                            {{ $ojt_details->evaluation }}
                                                    </small>
                                                </div>

                                                <div class="col-md-1">
                                                    <small>
                                                            {{ $ojt_details->status }}
                                                    </small>
                                                </div>

                                                <div class="col-md-2">
                                                    <small>
                                                            {{ $ojt_details->updated_at}}
                                                    </small>     
                                                </div>
                                            </div>
                                               
                                            
                                                
                                            @endif
                                        @endforeach
                                    @endforeach

                                </div>
                                  

                                          
                                  

                                
                            </div>
                        </div>
                      </div>

                    @endif
                  @endforeach
                </tbody>
            </table>
        </div>

@endsection
@section('script')
    <script>
        function password_reset(id){
            console.log("ID:", id);
            var conf = confirm("Are you sure to reset the password?");
            if(conf == true) window.open('/coor/password/reset/partner/'+id,'_parent');
        }

        function user_update(id){
            window.open('/coor/user/account/update/'+id,'_parent');
        }
        function user_archive(id,status,role){
            if(status == 'Active'){
                var conf = confirm('Are you sure to archive this account?');
                if(conf == true) window.open('/coor/user/account/archive/'+role+'/'+id,'_parent');
            }
            else if(status == 'Archived'){
                var conf = confirm('Are you sure to restore this account?');
                if(conf == true) window.open('/coor/user/account/active/'+role+'/'+id,'_parent');
            }

        }

        
    </script>
@endsection
