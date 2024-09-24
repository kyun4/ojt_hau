@extends('layouts.student_ui')
@section('title')
downloadable Forms
@endsection
@section('content')
    <div class="row">
        @php
            // Check if the user is authenticated and has student_id
            $studentId = Auth::check() ? Auth::user()->student_id : null;
            // Ensure $student is not null before accessing its properties
            $student = $studentId ? \App\Student::find($studentId) : null;
            // If $student is not null, fetch the student requirement
            $student_requirement = $student ? \App\StudentRequirement::where('student_id', $student->id)->first() : null;
            $student_ojt = $student ? \App\StudentOjt::where('student_id', $student->id)->first() : null;
        @endphp
        @if (Auth::user()->student->ojt == '')
            <div class="col-md-12">
                <h3>School Initial Requirements</h3>
            </div>
            <div class="col-md-3 m-1 p-3" style="border: 1px solid #ccc; border-radius: 8px">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Memorandum of Agreement</h4>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-primary" onclick="window.open('/student/form/moa/{{base64_encode(Auth::user()->student->id)}}/preview','')">View</button>
                        <button class="btn btn-sm btn-success" onclick="window.open('/student/form/moa/{{base64_encode(Auth::user()->student->id)}}','')">Download</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3 m-1 p-3" style="border: 1px solid #ccc; border-radius: 8px">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Acceptance Letter</h4>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-primary" onclick="window.open('/student/form/letter/acceptance/{{base64_encode(Auth::user()->student->id)}}/preview','')">View</button>
                        <button class="btn btn-sm btn-success" onclick="window.open('/student/form/letter/acceptance/{{base64_encode(Auth::user()->student->id)}}','')">Download</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3 m-1 p-3" style="border: 1px solid #ccc; border-radius: 8px">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Practicum Training Agreement</h4>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-primary" onclick="window.open('/student/form/letter/pta/{{base64_encode(Auth::user()->student->id)}}/preview','')">View</button>
                        <button class="btn btn-sm btn-success" onclick="window.open('/student/form/letter/pta/{{base64_encode(Auth::user()->student->id)}}','')">Download</button>
                </div>
                </div>
            </div>
            <div class="col-md-3 m-1 p-3" style="border: 1px solid #ccc; border-radius: 8px">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Parental Concent</h4>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-primary" onclick="window.open('/student/form/letter/pc/{{base64_encode(Auth::user()->student->id)}}/preview','')">View</button>
                        <button class="btn btn-sm btn-success" onclick="window.open('/student/form/letter/pc/{{base64_encode(Auth::user()->student->id)}}','')">Download</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3 m-1 p-3" style="border: 1px solid #ccc; border-radius: 8px">
                <div class="row">
                    <div class="col-md-12">
                        <h4>Waiver</h4>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-sm btn-primary" onclick="window.open('/student/form/letter/waiver/{{base64_encode(Auth::user()->student->id)}}/preview','')">View</button>
                        <button class="btn btn-sm btn-success" onclick="window.open('/student/form/letter/waiver/{{base64_encode(Auth::user()->student->id)}}','')">Download</button>
                    </div>
                </div>
            </div>
        @else
            {{-- On-Going OJT  --}}
            <div class="col-xl-4 col-md-6 mb-4"  >
                <div class="card border-left-danger shadow h-100 py-2 hoverable">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                    Evaluation
                                </div>
                                {{-- @if ($student->evaluation == 'COMPLETED') --}}
                                    <a href='/student/view/evaluation/{{base64_encode($student->student_id)}}' class="btn btn-sm btn-primary" target="_blank">View</a>
                                {{-- @else
                                    <small class="text-warning">Not Yet Evaluated</small>
                                @endif --}}
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6 mb-4"  >
                <div class="card border-left-danger shadow h-100 py-2 hoverable">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                    Reflection
                                </div>
                                @if ($student_ojt->reflection == null)
                                    <button class="btn btn-primary" onclick="openModal()">Upload</button>
                                @else
                                    <button class="btn btn-sm btn-primary" onclick="openModal()">Reupload</button>
                                    <a class="btn btn-sm btn-success" href="{{ asset('student_completion/' . $student_ojt->reflection) }}" download="{{ $student_ojt->reflection }}">
                                        Download
                                    </a>
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
                                                        <input type="hidden" name="student_id" value="{{ $student->stundent_id }}">
                                                        <div class="form-group">
                                                            <input type="file" class="form-control-file" name="or" accept=".doc,.docx,.pdf" required>
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

            <div class="col-xl-4 col-md-6 mb-4"  >
                <div class="card border-left-danger shadow h-100 py-2 hoverable">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                    Certificate
                                </div>
                                @if ($student_ojt->certificate !== null)
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
        @endif
    </div>
@endsection
@section('script')
<script>
    function openModal() {
        $('#reflectionModal').modal('show');
    }
</script>
@endsection

