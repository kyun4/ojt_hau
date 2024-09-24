@extends('layouts.ui')

@section('title') Student List @endsection
@section('content')
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Student Number</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Year Level</th>
                    <th>Section</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{isset($student->user->username) ? $student->user->username:"Unregistered"}}</td>
                        <td>{{$student->student_number}}</td>
                        <td>{{$student->last_name}}</td>
                        <td>{{$student->first_name}}</td>
                        <td>{{$student->middle_name}}</td>
                        <td>{{$student->year}}</td>
                        <td>{{$student->section}}</td>
                        <td>{{$student->status}}</td>
                        <td>
                            @if ($student->status == "Active")
                                <button title="Password Reset" class="btn btn-sm btn-success" style="color:#ffffff !important" onclick="password_reset('{{base64_encode($student->id)}}')"><i class="fas fa-fw fa-sync"></i></button>
                                <a href="/coor/student/update/{{base64_encode($student->id)}}">
                                    <button title="Update" class="btn btn-sm btn-warning" style="color:#ffffff !important"><i class="fas fa-fw fa-pen"></i></button>
                                </a>
                                <a href="/coor/student/monitoring/{{base64_encode($student->id)}}">
                                    <button title="Monitoring" class="btn btn-sm btn-info" style="color:#ffffff !important"><i class="fas fa-fw fa-calendar-check"></i></button>
                                </a>
                                @php
                                    $studentOjt = App\StudentOjt::where('student_id', $student->id)->first();
                                @endphp
                                @if ($studentOjt && $studentOjt->status == 'COMPLETED')
                                    <button title="Archive" class="btn btn-sm btn-danger" style="color:#000 !important">
                                        <i class="fas fa-fw fa-box"></i>
                                    </button>
                                @endif
                            @else
                                <button
                                    title="View Token"
                                    data-toggle="modal"
                                    data-student_number="{{$student->student_number}}"
                                    data-name="{{$student->last_name}} {{$student->first_name}} {{$student->middle_name}}"
                                    data-id="{{$student->student_token}}"
                                    data-target="#exampleModal"
                                    class="btn btn-sm btn-primary"
                                >
                                    <i class="fas fa-fw fa-eye"></i>
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body" id="modal_body" >

                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        function password_reset(id){
            var conf = confirm("Are you sure to reset the password?");
            if(conf == true) window.open('/coor/password/reset/student/'+id,'_parent');
        }
    </script>


    <script>
        $('#exampleModal').on('show.bs.modal', function (e) {
            var id = $(e.relatedTarget).data('id');
            var name = $(e.relatedTarget).data('name');
            $("#exampleModalLabel").html("Student Token of: "+name);
            $("#modal_body").html("<center>"+id+"</center>");

        })
    </script>
@endsection
