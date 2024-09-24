@extends('layouts.partner_ui')
@section('title')
Trainee List
@endsection
@section('content')


        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Job</th>
                        <th>Full Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr>
                            @php
                                $student_requirement = \App\StudentOjt::where('student_id', $student->student_id)->first();
                            @endphp

                            <th>{{$student->job->title}}</th>
                            <th>{{$student->student->first_name}} {{$student->student->middle_name}} {{$student->student->last_name}}</th>
                            <th>
                                @if ($student_requirement->certificate !== null)
                                    COMPLETE
                                @elseif ($student->status == 'FOR COOR APPROVAL' && $student_requirement->certificate === null)
                                    For COC upload
                                @else
                                    {{$student->status}}
                                @endif
                            </th>
                            <th width="20%">
                                @if ($student->status == 'ON-GOING')
                                    <a href="/partners/student/profile/{{base64_encode($student->student->id)}}/{{base64_encode($student->job_id)}}">
                                        <button title="Student Profile" class="btn btn-primary btn-sm">
                                            <i class="fas fa-user" title="Applicants"></i>
                                        </button>
                                    </a>
                                    <a href="/partners/student/monitoring/{{base64_encode($student->student->id)}}">
                                        <button title="DTR" class="btn btn-sm btn-success">
                                            <i class="fas fa-user-clock" title="DTR"></i>
                                        </button>
                                    </a>
                                    <a href="/partners/student/weekly/report/{{base64_encode($student->student->id)}}">
                                        <button title="Accomplishments" class="btn btn-sm btn-success">
                                            <i class="fas fa-book-open" title="Accomplishments"></i>
                                        </button>
                                    </a>

                                    <button title="Archive" class="btn btn-danger btn-sm" onclick="archive('{{base64_encode($student->id)}}')">
                                        <i class="fas fa-fw fa-box-open" title="Archive"></i>
                                    </button>
                                @elseif ($student->status == 'FOR COOR APPROVAL' && $student_requirement !== null && $student_requirement->certificate === null)
                                    <!-- Display Upload COC button -->
                                    <button title="Upload COC" class="btn btn-primary btn-sm" onclick="openModal()"><i class="fas fa-upload"></i></button>
                                    <!-- Modal for uploading certificate of completion -->
                                    <div class="modal" id="certificateModal" tabindex="-1" role="dialog" aria-labelledby="certificateModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="certificateModalLabel">Upload Certificate of Completion</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" enctype="multipart/form-data" id="certificateForm" action="{{ route('certificate.upload', ['id' => base64_encode($student->student_id)]) }}">
                                                        @csrf
                                                        <input type="hidden" name="student_id" value="{{ $student->student_id }}">
                                                        <div class="form-group">
                                                            <label for="certificate_upload" class="font-weight-bold">
                                                                CERTIFICATE OF COMPLETION OF {{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}
                                                            </label>
                                                            <input type="file" class="form-control-file" accept=".doc,.docx,.pdf" name="coc" id="certificate_upload" required>
                                                            <small class="form-text text-muted">Please upload a DOC, DOCX, or PDF file.</small>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <button class="btn btn-warning btn-sm" onclick="restore('{{base64_encode($student->id)}}')" style="color: black !important">Restore</button>
                                @endif
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
@endsection
@section('script')
<script>
    function archive(id){
        var conf = confirm("Are you sure to archive this student?");
        if(conf==true){
            location.replace('/partners/student/archive/'+id);
        }
    }
</script>
<script>
    function restore(id){
        var conf = confirm("Are you sure to restore this student?");
        if(conf==true){
            location.replace('/partners/student/restore/'+id);
        }
    }
</script>
<script>
    function openModal() {
        $('#certificateModal').modal('show');
    }
</script>
@endsection
