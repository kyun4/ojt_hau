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
                                        <th>Company Name</th>
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
                                        <td>{{$user->profile->company_name}}</td>
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
                <h6 class="m-0 font-weight-bold text-white">
                    
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-10">
                                <span class = "mt-5">Unregistered Student</span>
                            </div>
                            <div class="col-md-2">
                                <button type = "button" data-toggle = "modal" data-target = "#new_student_modal" class = "btn btn-secondary btn-right float-right">Add New Student</button>
                            </div>
                        </div>
                    </div>

                </h6>
               
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

<div class="modal" id = "new_student_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title">
                Add New Student
                
               </h4> 
                <button type = "button" class = "btn btn-outline-secondary" data-dismiss = "modal"><i class = "fa fa-arrow-right"></i></button>
            </div> <!-- modal-header -->
            <div class="modal-body">

            
            <small>*NOTE: Adding new student must be not already registered or exists in the database. Adding student who is not enrolled or not on the enrollment system database is a violation by database tampering.</small>

            <form method = "POST" action = "/admin/student/add_new_student">


                @csrf 
                <div class = "form-group mt-4">
                    <label for = "student_token_new">Student Token No.</label>
                    <input type = "text" id = "student_token_new" name = "student_token_no" placeholder = "Student Token No." class = "form-control" required/>
                </div> <!-- form-group Student Token -->

                <div class = "form-group">
                    <label for = "student_number">Student Number</label>
                    <input type = "text" id = "student_number" name = "student_number" placeholder = "Student Number" class = "form-control" required/>
                </div> <!-- form-group Student Number -->

                <div class = "form-group">
                    <label for = "firstname_new">First Name</label>
                    <input type = "text" id = "firstname_new" name = "first_name" placeholder = "First Name" class = "form-control" required/>
                </div> <!-- form-group First Name -->

                <div class = "form-group">
                    <label for = "middlename_new">Middle Name</label>
                    <input type = "text" id = "middlename_new" name = "middle_name" placeholder = "Middle Name" class = "form-control"/>
                </div> <!-- form-group Middle Name -->

                <div class = "form-group">
                    <label for = "lastname_new">Last Name</label>
                    <input type = "text" id = "lastname_new" name = "last_name" placeholder = "Last Name" class = "form-control" required/>
                </div> <!-- form-group Last Name -->
            
                <div class = "form-group">
                    <label for = "school_new">School</label>
                    <select name = "school_id" id = "school_new" class = "form-control" required>
                    <option value = ""> -- Select School -- </option>
                        @foreach($schools as $school_list)
                            <option value = "{{$school_list->id}}">{{ $school_list->school }}</option>
                        @endforeach
                    </select>
                </div> <!-- form-group School -->

                <div class = "form-group">
                    <label for = "program_new">Program</label>
                    <select name = "program" id = "program_new" class = "form-control" required>
                    <option value = ""> -- Select Program -- </option>
                        @foreach($schools as $school_list)
                            <option value = "{{$school_list->id}}">{{ $school_list->school }}</option>
                        @endforeach
                    </select>
                </div> <!-- form-group Program -->

                <div class = "form-group">
                    <label for = "address_new">Address</label>
                    <input type = "text" name = "address" id = "address_new" placeholder = "Address" class = "form-control" required/>
                </div> <!-- form-group Address -->

                <div class = "form-group">
                    <label for = "contact_no_new">Contact No.</label>
                    <input type = "text" name = "contact" id = "contact_no_new" placeholder = "Contact No." class = "form-control" required/>
                </div> <!-- form-group Contact No. -->

                <div class = "form-group">
                    <label for = "current_year">Current Year</label>
                    <input type = "text"  name = "current_year" id = "current_year" placeholder = "Current Year" class = "form-control" required/>
                </div> <!-- form-group Current Year -->

                <div class = "form-group">
                    <label for = "section">Current Section</label>
                    <input type = "text" name = "section" id = "section" placeholder = "Current Section" class = "form-control" required/>
                </div> <!-- form-group Current Section -->

                <div class = "form-group">
                
                    <button type = "submit" class = "btn btn-success btn-lg btn-block">Submit</button>

                </div> <!-- form-group Current Section -->
        
            </form> <!-- Add New Student Form -->

            </div> <!-- modal-body -->
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- modal -->

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
