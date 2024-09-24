@extends('layouts.student_ui')
@section('title')
Initial Requirements
@endsection
@section('content')
    <div class="row">
            <div class="col-xl-4 col-md-6 mb-4"  >
                <div class="card border-left-danger shadow h-100 py-2 hoverable">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                    Acceptance Letter</div>
                                    @if (isset($student->requirement->initial_req_1))
                                        <a href='{{asset('student_forms/'.$student->requirement->initial_req_1)}}' target="_blank">{{$student->requirement->initial_req_1}}</a>
                                    @else
                                        <small class="text-warning"><em>Not Yet Uploaded</em></small>
                                    @endif
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
                                    Practicum Training Agreement</div>
                                    @if (isset($student->requirement->initial_req_2))
                                        <a href='{{asset('student_forms/'.$student->requirement->initial_req_2)}}' target="_blank">{{$student->requirement->initial_req_2}}</a>
                                    @else
                                        <small class="text-warning"><em>Not Yet Uploaded</em></small>
                                    @endif
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
                                    Parental Consent</div>
                                    @if (isset($student->requirement->initial_req_3))
                                        <a href='{{asset('student_forms/'.$student->requirement->initial_req_3)}}' target="_blank">{{$student->requirement->initial_req_3}}</a>
                                    @else
                                        <small class="text-warning"><em>Not Yet Uploaded</em></small>
                                    @endif
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
                                    Waiver</div>
                                    @if (isset($student->requirement->initial_req_4))
                                        <a href='{{asset('student_forms/'.$student->requirement->initial_req_4)}}' target="_blank">{{$student->requirement->initial_req_4}}</a>
                                    @else
                                        <small class="text-warning"><em>Not Yet Uploaded</em></small>
                                    @endif
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if ($student->requirement->other_file_1 != null)
                <div class="col-xl-4 col-md-6 mb-4"  >
                    <div class="card border-left-danger shadow h-100 py-2 hoverable">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                        Other Files</div>
                                        <a href='{{asset('student_forms/'.$student->requirement->other_file_1)}}' target="_blank">Other File 1</a>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-file fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if ($student->requirement->other_file_2 != null)
                <div class="col-xl-4 col-md-6 mb-4"  >
                    <div class="card border-left-danger shadow h-100 py-2 hoverable">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                        Other Files</div>
                                        <a href='{{asset('student_forms/'.$student->requirement->other_file_2)}}' target="_blank">Other File 2</a>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-file fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if ($student->requirement->other_file_3 != null)
                <div class="col-xl-4 col-md-6 mb-4"  >
                    <div class="card border-left-danger shadow h-100 py-2 hoverable">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                        Other Files</div>
                                        <a href='{{asset('student_forms/'.$student->requirement->other_file_3)}}' target="_blank">Other File 3</a>
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
    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {
            const addFileInputButton = document.getElementById("addFileInput");
            const fileInputsContainer = document.querySelector(".other-file-inputs");
            let fileInputIndex = 1;

            addFileInputButton.addEventListener("click", function() {
                if (fileInputIndex <= 3) {
                    const newInput = document.createElement("div");
                    newInput.innerHTML = `
                        <div class="col-md-12 my-1">
                            <label for="other_file_${fileInputIndex}">
                                <strong>Other File ${fileInputIndex}</strong>
                            </label>
                            <input type="file" name="other_file_${fileInputIndex}" id="other_file_${fileInputIndex}" class="form-control" accept="application/pdf">
                        </div>
                    `;
                    fileInputsContainer.appendChild(newInput);
                    fileInputIndex++;

                    // Hide addFileInputButton when the maximum number of file inputs is reached
                    if (fileInputIndex > 3) {
                        addFileInputButton.style.display = "none";
                    }
                }
            });
        });
    </script> --}}
@endsection
