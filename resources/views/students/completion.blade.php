@extends('layouts.student_ui')
@section('title')
@if ($ojt->status == 'COMPLETED')

@else
    <a href="/student/completion/upload" class="btn btn-sm btn-success" style="float: right">UPLOAD</a>
@endif
Student Completion Requirement @endsection
@section('css')

@endsection
@section('content')
    @php
        // Check if the user is authenticated and has student_id
        $studentId = Auth::check() ? Auth::user()->student_id : null;
        // Ensure $student is not null before accessing its properties
        $student = $studentId ? \App\Student::find($studentId) : null;
        // If $student is not null, fetch the student requirement
        $student_ojt = \App\StudentOjt::where('student_id', $studentId)->first();
    @endphp
    @if ($ojt->status == 'COMPLETED')
        <div class="row">
            <div class="col-md-12">
                <div class="mt-4 p-5 rounded bg-success text-black" style="color: black !important" >
                    <h1>Congrats!</h1>
                    <p>You completed your On Job Training.</p>
                </div>
            </div>
        </div>
    @endif
<div class="row my-3">
    <div class="col-md-12">
        <div class="row">
            <div class="col-xl-4 col-md-6 mb-4" style="cursor: pointer;">
                <div class="card border-left-danger shadow h-100 py-2 ">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                    Evaluation</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Completed</div>
                                <a href='/student/view/evaluation/{{base64_encode($studentId)}}' class="btn btn-sm btn-primary" target="_blank">View</a>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-xl-4 col-md-6 mb-4" style="cursor: pointer;">
                <div class="card border-left-danger shadow h-100 py-2 ">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                    Certificate
                                </div>
                                @if ($student_ojt->certificate !== null)
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">Completed</div>
                                    <a class="btn btn-sm btn-success" href="{{ asset('student_completion/'.$student_ojt->certificate) }}" download>Download</a>
                                @else
                                    <a class="btn btn-sm btn-success disabled" href="#" aria-disabled="true">Download</a>
                                @endif
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-xl-4 col-md-6 mb-4" style="cursor: pointer;">
                <div class="card border-left-danger shadow h-100 py-2 ">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                    Reflection
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Completed</div>
                                @if ($student_ojt->reflection == null)
                                    <button class="btn btn-primary" onclick="openModal()">Upload</button>
                                @else
                                    <a class="btn btn-sm btn-success" href="{{ asset('student_completion/'.$student_ojt->reflection) }}" download>Download</a>
                                @endif
                                    <!-- Modal for uploading certificate of completion -->
                                    <div class="modal" id="reflectionModal" tabindex="-1" role="dialog" aria-labelledby="reflectionModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="reflectionModalLabel">Upload Overall Reflection</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" enctype="multipart/form-data" id="certificateForm" action="{{ route('reflection.upload')}}">
                                                        @csrf
                                                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                                                        <div class="form-group">
                                                            <input type="file" class="form-control-file" name="or" id="certificate_upload" required>
                                                            <small class="form-text text-muted">Please upload a PDF or image file.</small>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
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
            $("#show_table").load('/coor/dashboard/table/'+content);
            // document.getElementById('show_table').
        }
    </script>

@endsection
