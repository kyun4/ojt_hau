@extends('layouts.ui')

@section('title') Student List <button type = "button" data-toggle = "modal" data-target = "#import_csv" class = "btn btn-secondary float-right">Import from CSV</button>@endsection
@section('content')

    <div class = "modal" id = "import_csv">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        Import CSV File
                    </h5>
                </div>
                <div class="modal-body">
                    <form method = "post" action = "/coor/student/list/upload_csv" enctype="multipart/form-data">
                    @csrf
                        <input type = "file" id = "upload_csv_file" name = "csv_filename" style = "display:none;" accept = "application/csv">

                        <p>
                            <b>File Name: </b> <span id = "file_selected_filename"> (No File Selected) </span>
                        </p>
                        <p>
                            <b>File Size: </b> <span id = "file_selected_filesize"> -- </span>
                        </p>

                        <button type = "button" id = "choose_csv_file" class = "btn btn-secondary btn-block">Choose CSV File</button>
                        <button type = "submit" id = "upload_csv" class = "d-none btn btn-success btn-block">Upload CSV File</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

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

                        @if ($student->stat == "7")
                            <tr class = "bg bg-success text-white">
                        @else
                            <tr>
                        @endif

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

    <script>
        $('#choose_csv_file').on('click',function(){

          $('#upload_csv_file').click();
          

        });

        $('#upload_csv_file').on('change',function(){

            if($(this)[0].files.length > 0){


                $.each($(this)[0].files,function(index, file){

                    var fileName = file.name;
                    var fileSize = (file.size / 1024).toFixed(2);

                    $('#file_selected_filename').html(fileName);
                    $('#file_selected_filesize').html(fileSize+' KB');

                });

                $('#upload_csv').removeClass('d-none')
            }else{
                $('#upload_csv').addClass('d-none')
            }

        });
    </script>
@endsection
