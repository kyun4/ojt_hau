@extends('layouts.ui')

@section('title') For Completion @endsection
@section('content')
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Student Number</th>
                        <th>Student Name</th>
                        <th>Accomplishments</th>
                        <th>Evaluation</th>
                        <th>Reflection</th>
                        <th>Certificate</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td>{{$student->student->student_number}}</td>
                            <td>{{$student->student->first_name}} {{$student->student->middle_name}} {{$student->student->last_name}}</td>
                            <td>
                                <a href='javascript:void(0)' data-toggle="modal" data-id="{{base64_encode($student->student->id)}}" data-target="#exampleModal" title="Approved">Weekly Accomplishments</a>
                            </td>
                            <td>
                                @if ($student->evaluation == 'COMPLETED')
                                    <a href='/coor/student/view/evaluation/{{base64_encode($student->student_id)}}'>View Evaluation</a>
                                @else
                                    <small class="text-warning">Not Yet Evaluated</small>
                                @endif
                            </td>
                            <td>
                                @if ($student->reflection)
                                    <a target='_blank' href='{{asset('student_completion/'.$student->reflection)}}'>{{$student->reflection}}</a>
                                @else
                                    <small class="text-warning">Not Yet Uploaded</small>
                                @endif
                            </td>
                            <td>
                                @if ($student->certificate)
                                    <a target='_blank' href='{{asset('student_completion/'.$student->certificate)}}'>{{$student->certificate}}</a>
                                @else
                                    <small class="text-warning">Not Yet Uploaded</small>
                                @endif
                            </td>
                            <td>{{$student->status}}</td>
                            <td>
                                @if ($student->evaluation != 'COMPLETED' || $student->reflection === null || $student->certificate === null || $student->evaluation == 'COMPLETED')
                                    <button title="Approve" class="btn btn-sm btn-warning" style="color: #000" disabled><i class="fas fa-fw fa-check"></i></button>
                                @else
                                    <button title="Approve" class="btn btn-sm btn-success" style="color: #000" onclick="approve('{{base64_encode($student->student_id)}}')"><i class="fas fa-fw fa-check"></i></button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>



  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
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
        function approve(id){
            var conf = confirm('Are you sure?');
            if(conf==true){
                location.replace('/coor/student/ojt/completion/'+id);
            }
        }
    </script>



    <script>
        $('#exampleModal').on('show.bs.modal', function (e) {
            var id = $(e.relatedTarget).data('id');
            $("#exampleModalLabel").html("Weekly Accomplishment");
            $("#modal_body").load('/coor/student/view/accomplishment/'+id);
        })
    </script>

@endsection
