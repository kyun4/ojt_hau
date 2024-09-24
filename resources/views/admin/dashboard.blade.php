@extends('layouts.super_ui')
@section('css')
    <style>
        .hoverable{
            transition: all 0.2s ease;
            cursor: pointer;
        }
        .hoverable:hover{
            box-shadow: 5px 6px 6px 2px #e9ecef;
            transform: scale(1.1);
        }
    </style>
@endsection
@section('title') Dashboard @endsection
@section('content')
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4" >
        <div class="card border-left-danger shadow h-100 py-2 hoverable" onclick="show_table_function('1')">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                            Coordinators</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($users->where('role_id', '2')->where('status', 'Active')) }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-3 col-md-6 mb-4" >
        <div class="card border-left-danger shadow h-100 py-2 hoverable" onclick="show_table_function('2')">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                            Partner's Institution</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($users->where('role_id','3')->where('status', 'Active'))}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-3 col-md-6 mb-4" >
        <div class="card border-left-danger shadow h-100 py-2 hoverable" onclick="show_table_function('3')">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                            Registered Students</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($users->where('role_id','1')->where('status', 'Active'))}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-3 col-md-6 mb-4" >
        <div class="card border-left-danger shadow h-100 py-2 hoverable" onclick="show_table_function('4')">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                            Unregistered Students</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($students_unreg)}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12" id="show_dashboard_coordinators"  style="display:block">
        <div class="card shadow mb-4">
            <div class="card-header py-3" style="background-color: #600;">
                <h6 class="m-0 font-weight-bold text-white" >Coordinators</h6>
            </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>School</th>
                                        <th>Username</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users->where('role_id','2') as $user)
                                    <tr>
                                        <td>{{$user->profile->school->school}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->profile->first_name}}</td>
                                        <td>{{$user->profile->middle_name}}</td>
                                        <td>{{$user->profile->last_name}}</td>
                                        <td>{{$user->status}}</td>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>

    </div>


    <div class="col-md-12" id="show_dashboard_partner" style="display: none">
        <div class="card shadow mb-4">
            <div class="card-header py-3" style="background-color: #600;">
                <h6 class="m-0 font-weight-bold text-white" >Partner's Institution</h6>
            </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTablePartner" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>School</th>
                                        <th>Username</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users->where('role_id','3') as $user)
                                    <tr>
                                        <td>{{$user->profile->school->school}}</td>
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->profile->first_name}}</td>
                                        <td>{{$user->profile->middle_name}}</td>
                                        <td>{{$user->profile->last_name}}</td>
                                        <td>{{$user->status}}</td>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>


    <div class="col-md-12" id="show_dashboard_student_r" style="display: none">
        <div class="card shadow mb-4">
            <div class="card-header py-3" style="background-color: #600;">
                <h6 class="m-0 font-weight-bold text-white" >Registered Student</h6>
            </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTableStudentR" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>School</th>
                                        <th>Username</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Program</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($users->where('role_id', '1')) > 0)
                                        @foreach ($users->where('role_id', '1') as $user)
                                            <tr>
                                                <td>{{$user->student->school->school}}</td>
                                                <td>{{$user->username}}</td>
                                                <td>{{$user->student->first_name}}</td>
                                                <td>{{$user->student->middle_name}}</td>
                                                <td>{{$user->student->last_name}}</td>
                                                <td>{{$user->student->program}}</td>
                                                <td>{{$user->status}}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7">No student</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
        </div>
    </div>


    <div class="col-md-12" id="show_dashboard_student_u" style="display: none">
        <div class="card shadow mb-4">
            <div class="card-header py-3" style="background-color: #600;">
                <h6 class="m-0 font-weight-bold text-white" >Unregistered Student</h6>
            </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTableStudentU" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>School</th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Program</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students_unreg as $user)
                                <tr>
                                    <td>{{$user->school->school}}</td>
                                    <td>Unregistered</td>
                                    <td>{{$user->first_name}}</td>
                                    <td>{{$user->middle_name}}</td>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->program}}</td>
                                    <td>Unregistered</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>

@endsection
@section('script')
    <script>
        function show_table_function(content){
            // alert(content);
            if(content == 1){
                $("#show_dashboard_coordinators").css({ 'display' : 'block' });
                $("#show_dashboard_partner").css({ 'display' : 'none' });
                $("#show_dashboard_student_r").css({ 'display' : 'none' });
                $("#show_dashboard_student_u").css({ 'display' : 'none' });
            }
            if(content == 2){
                $("#show_dashboard_coordinators").css({ 'display' : 'none' });
                $("#show_dashboard_partner").css({ 'display' : 'block' });
                $("#show_dashboard_student_r").css({ 'display' : 'none' });
                $("#show_dashboard_student_u").css({ 'display' : 'none' });
            }
            if(content == 3){
                $("#show_dashboard_coordinators").css({ 'display' : 'none' });
                $("#show_dashboard_partner").css({ 'display' : 'none' });
                $("#show_dashboard_student_r").css({ 'display' : 'block' });
                $("#show_dashboard_student_u").css({ 'display' : 'none' });
            }
            if(content == 4){
                $("#show_dashboard_coordinators").css({ 'display' : 'none' });
                $("#show_dashboard_partner").css({ 'display' : 'none' });
                $("#show_dashboard_student_r").css({ 'display' : 'none' });
                $("#show_dashboard_student_u").css({ 'display' : 'block' });
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            // Initialize DataTables for the tables in other sections
            $('#dataTableCoordinators, #dataTablePartner, #dataTableStudentR, #dataTableStudentU').DataTable();
        });
    </script>
@endsection
