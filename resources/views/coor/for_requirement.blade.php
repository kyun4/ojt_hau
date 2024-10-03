@extends('layouts.ui')

@section('title') For Requirements @endsection
@section('content')
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Student Number</th>
                        <th>Student Name</th>
                        <th>Company</th>
                        {{-- <th>MOA</th> --}}
                        <th>Endorsement</th>
                        <th>Training Agreement</th>
                        <th>Concent</th>
                        <th>Waiver</th>
                        {{-- <th>Dole</th>
                        <th>Med Cert</th> --}}
                        <th>Other Files</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{$student->student->student_number}}</td>
                            <td>{{$student->student->first_name}} {{$student->student->middle_name}} {{$student->student->last_name}}</td>
                            <td>{{$student->job->user->profile->company_name}}</td>
                            <td>
                                
                                @if (isset($student->requirement->initial_req_1))
                                    <a href='{{asset('student_forms/'.$student->requirement->initial_req_1)}}' target="_blank">{{$student->requirement->initial_req_1}}</a>
                                    
                                @else
                                    <small class="text-warning"><em>Not Yet Uploaded</em></small> @endif
                            </td>
                            <td>
                                @if (isset($student->requirement->initial_req_2))
                                    <a href='{{asset('student_forms/'.$student->requirement->initial_req_2)}}' target="_blank">{{$student->requirement->initial_req_2}}</a>
                                @else
                                    <small class="text-warning"><em>Not Yet Uploaded</em></small> @endif
                            </td>
                            <td>
                                @if (isset($student->requirement->initial_req_3))
                                    <a href='{{asset('student_forms/'.$student->requirement->initial_req_3)}}' target="_blank">{{$student->requirement->initial_req_3}}</a>
                                @else
                                    <small class="text-warning"><em>Not Yet Uploaded</em></small> @endif
                            </td>
                            <td>
                                @if (isset($student->requirement->initial_req_4))
                                    <a href='{{asset('student_forms/'.$student->requirement->initial_req_4)}}' target="_blank">{{$student->requirement->initial_req_4}}</a>
                                @else
                                    <small class="text-warning"><em>Not Yet Uploaded</em></small> @endif
                            </td>
                            {{-- <td>
                                @if (isset($student->requirement->initial_req_5))
                                    <a href='{{asset('student_forms/'.$student->requirement->initial_req_5)}}' target="_blank">{{$student->requirement->initial_req_5}}</a>
                                @else
                                    <small class="text-warning"><em>Not Yet Uploaded</em></small> @endif
                            </td> --}}
                            <td>
                                @if (!isset($student->requirement->other_file_1) &&
                                     !isset($student->requirement->other_file_2) &&
                                     !isset($student->requirement->other_file_3))
                                    <small class="text-warning"><em>No Uploads</em></small>
                                @else
                                    @if (isset($student->requirement->other_file_1))
                                        <a href='{{asset('student_forms/'.$student->requirement->other_file_1)}}' target="_blank">Other File 1</a>
                                    @endif
                                    @if (isset($student->requirement->other_file_2))
                                        <a href='{{asset('student_forms/'.$student->requirement->other_file_2)}}' target="_blank">Other File 2</a>
                                    @endif
                                    @if (isset($student->requirement->other_file_3))
                                        <a href='{{asset('student_forms/'.$student->requirement->other_file_3)}}' target="_blank">Other File 3</a>
                                    @endif
                                @endif
                            </td>
                            {{-- <td>
                                @if (isset($student->requirement->initial_req_5))
                                    <a href='{{asset('student_forms/'.$student->requirement->medcert)}}' target="_blank">{{$student->requirement->medcert}}</a>
                                @else
                                    <small class="text-warning"><em>Not Yet Uploaded</em></small> @endif
                            </td> --}}
                            <td>{{$student->status}}</td>
                            @if ($student->status == "Active")
                                <td>

                                </td>
                            @else
                                <td>
                                    @if(isset($student->requirement->initial_req_1) &&
                                        isset($student->requirement->initial_req_2) &&
                                        isset($student->requirement->initial_req_3) &&
                                        isset($student->requirement->initial_req_4))
                                        <button title="Approve" class="btn btn-sm btn-success" style="color: #000" onclick="approve('{{base64_encode($student->id)}}')"><i class="fas fa-fw fa-check"></i></button>
                                    @else
                                        <button title="Approve" class="btn btn-sm btn-secondary" style="color: #000" onclick="approve('{{base64_encode($student->id)}}')" disabled><i class="fas fa-fw fa-check"></i></button>
                                    @endif
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

@endsection
@section('script')
    <script>
        function approve(id){
            var conf = confirm("Are you sure to Approve this appication?");
            if(conf == true) window.open('/coor/approve/application/'+id,'_parent');
        }
    </script>
@endsection
