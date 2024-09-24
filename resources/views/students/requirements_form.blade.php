@extends('layouts.student_ui')
@section('title')
Requirements
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <h3>Submission of Requirements</h3>
                    </div>
                    {{-- <div class="col-md-12 my-1">
                        <label for="moa">
                            <strong>MEMORANDUN OF AGREEMENT</strong>
                        </label>
                        <input type="file" name="moa" id="moa" class="form-control" accept="application/pdf">
                    </div> --}}
                    <div class="col-md-12 my-1">
                        <label for="al">
                            <strong>ACCEPTANCE LETTER</strong>
                        </label>
                        <input type="file" name="al" id="al" class="form-control" accept="application/pdf" required>
                    </div>
                    <div class="col-md-12 my-1">
                        <label for="moa">
                            <strong>PRACTICUM TRAINING AGREEMENT</strong>
                        </label>
                        <input type="file" name="pta" id="moa" class="form-control" accept="application/pdf" required>
                    </div>
                    <div class="col-md-12 my-1">
                        <label for="moa">
                            <strong>PARENTAL CONSENT</strong>
                        </label>
                        <input type="file" name="pc" id="moa" class="form-control" accept="application/pdf" required>
                    </div>
                    <div class="col-md-12 my-1">
                        <label for="moa">
                            <strong>WAIVER</strong>
                        </label>
                        <input type="file" name="w" id="moa" class="form-control" accept="application/pdf" required>
                    </div>
                    <div class="other-file-inputs col-md-12 my-1">
                        <!-- Additional file inputs will be appended here -->
                    </div>
                    {{-- <div class="col-md-12 my-1">
                        <label for="moa">
                            <strong>DOLE PICTURE</strong>
                        </label>
                        <input type="file" name="dole" id="moa" class="form-control" accept="application/pdf, image/png, image/gif, image/jpeg">
                    </div> --}}
                    {{-- <div class="col-md-12 my-1">
                        <label for="moa">
                            <strong>MEDICAL CERT</strong>
                        </label>
                        <input type="file" name="medcert" id="moa" class="form-control" accept="application/pdf, image/png, image/gif, image/jpeg">
                    </div> --}}
                    <div class="col-md-12 my-3">
                        <button type="button" class="btn btn-primary" id="addFileInput">Upload Other File</button>
                    </div>
                    <div class="col-md-12 my-3">
                        <button type="submit" class="btn btn-success">Upload</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <h3>Downloadable Requirements
                        </h3>
                </div>



                {{-- <div class="col-xl-4 col-md-6 mb-4"  >
                    <div class="card border-left-danger shadow h-100 py-2 hoverable">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                        Memorandum of Agreement</div>
                                        <button class="btn btn-sm btn-primary" onclick="window.open('/student/form/moa/{{base64_encode(Auth::user()->student->id)}}/{{base64_encode($job->id)}}/preview','')">View</button>
                                        <button class="btn btn-sm btn-success" onclick="window.open('/student/form/moa/{{base64_encode(Auth::user()->student->id)}}/{{base64_encode($job->id)}}','')">Download</button>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-file fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <div class="col-xl-4 col-md-6 mb-4"  >
                    <div class="card border-left-danger shadow h-100 py-2 hoverable">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                                        Acceptance Letter</div>
                                        <button class="btn btn-sm btn-primary" onclick="window.open('/student/form/letter/acceptance/{{base64_encode(Auth::user()->student->id)}}/{{base64_encode($job->id)}}/preview','')">View</button>
                                        <button class="btn btn-sm btn-success" onclick="window.open('/student/form/letter/acceptance/{{base64_encode(Auth::user()->student->id)}}/{{base64_encode($job->id)}}','')">Download</button>
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
                                        <button class="btn btn-sm btn-primary" onclick="window.open('/student/form/letter/pta/{{base64_encode(Auth::user()->student->id)}}/{{base64_encode($job->id)}}/preview','')">View</button>
                                        <button class="btn btn-sm btn-success" onclick="window.open('/student/form/letter/pta/{{base64_encode(Auth::user()->student->id)}}/{{base64_encode($job->id)}}','')">Download</button>
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
                                        Parental Concent</div>
                                        <button class="btn btn-sm btn-primary" onclick="window.open('/student/form/letter/pc/{{base64_encode(Auth::user()->student->id)}}/{{base64_encode($job->id)}}/preview','')">View</button>
                            <button class="btn btn-sm btn-success" onclick="window.open('/student/form/letter/pc/{{base64_encode(Auth::user()->student->id)}}/{{base64_encode($job->id)}}','')">Download</button>
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
                                        <button class="btn btn-sm btn-primary" onclick="window.open('/student/form/letter/waiver/{{base64_encode(Auth::user()->student->id)}}/{{base64_encode($job->id)}}/preview','')">View</button>
                                        <button class="btn btn-sm btn-success" onclick="window.open('/student/form/letter/waiver/{{base64_encode(Auth::user()->student->id)}}/{{base64_encode($job->id)}}','')">Download</button>
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
    </script>
@endsection
