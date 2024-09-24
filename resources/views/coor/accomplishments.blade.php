@extends('layouts.ui')
@section('title') Student Accomplishments List @endsection

@section('content')
<div class="row mb-3">
    <div class="col-md-4">
        <select id="sortBy" class="form-control">
            <option value="recency">Sort by Recency</option>
            <option value="hours">Sort by Hours Rendered</option>
        </select>
    </div>
    <div class="col-md-4">
        <select id="filterSection" class="form-control">
            <option value="">Filter by Section</option>
            <!-- Add options dynamically -->
            @foreach ($sections as $section)
                <option value="{{ $section }}">{{ $section }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <select id="filterGrade" class="form-control">
            <option value="">Filter by Graded/Ungraded</option>
            <option value="graded">Graded</option>
            <option value="ungraded">Ungraded</option>
        </select>
    </div>
</div>
<div id="accomplishment-list" class="row">
    @if (count($accomplishments) == 0)
        <div class="col-md-12">
            <div class="alert alert-info text-center" role="alert">
                <strong>No Accomplishment Yet</strong>
            </div>
        </div>
    @else
        @foreach ($accomplishments as $accomplishment)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-header text-white" style="background-color: #710e1d;">
                        <h5 class="card-title mb-0"><strong>Name: </strong>{{ $accomplishment->student->first_name }} {{ $accomplishment->student->last_name }}</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted"><strong>Section:</strong> {{ $accomplishment->student->section }}</h6>
                        @php
                            $studentOjt = DB::table('student_ojts')->where('student_id', $accomplishment->student->id)->first();
                            $user = $studentOjt ? DB::table('users')->where('id', $studentOjt->partner_id)->first() : null;
                            $profile = $user ? DB::table('profiles')->where('id', $user->profile_id)->first() : null;

                            $companyName = $profile ? $profile->company_name : 'N/A';
                        @endphp
                        <p class="card-text"><strong>Company:</strong> {{ $companyName }}</p>
                        <p class="card-text"><strong>Date Start:</strong> {{ $accomplishment->date_start }}</p>
                        <p class="card-text"><strong>Date End:</strong> {{ $accomplishment->date_end }}</p>
                        <p class="card-text"><strong>Hours Rendered:</strong> {{ $accomplishment->hours_rendered }}</p>
                        <p style="display: none;" class="card-text"><strong>Accomplishment:</strong> {{ urldecode($accomplishment->accomplishment) }}</p>
                        @if ($accomplishment->status != '')
                            <p class="card-text"><strong>Status:</strong> {{ $accomplishment->status }}</p>
                        @endif
                        @if ($accomplishment->grade)
                            <p class="card-text"><strong>Grade:</strong> {{ $accomplishment->grade }}</p>
                        @endif
                        @if ($accomplishment->comment)
                            <p style="display: none;" class="card-text"><strong>Comment:</strong> {{ $accomplishment->comment }}</p>
                        @endif
                    </div>
                    <div class="card-footer bg-light">
                        <button type="button" class="btn btn-success btn-block showModalBtn" data-toggle="modal" data-target="#gradeModal" data-id="{{ $accomplishment->id }}">Grade Accomplishment</button>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</div>



    <div class="modal fade" id="gradeModal" tabindex="-1" role="dialog" aria-labelledby="gradeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="gradeModalLabel">Grade Accomplishment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <!-- Name of the student -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <strong>Name:</strong>
                        <span id="modalStudentName"></span><br>
                        <strong>Section:</strong>
                        <span id="modalStudentSection"></span><br>
                        <strong>Company:</strong>
                        <span id="modalStudentCompany"></span>
                        <hr>
                    </div>
                    <div class="col-md-6">
                        <strong>Date Start:</strong>
                        <span id="modalDateStart"></span>
                    </div>
                    <div class="col-md-6">
                        <strong>Date End:</strong>
                        <span id="modalDateEnd"></span>
                    </div>
                    <div class="col-md-6">
                        <strong>Hours Rendered:</strong>
                        <span id="modalHoursRendered"></span>
                    </div>
                    <div class="col-md-12">
                        <strong>Accomplishment:</strong><br>
                        <span id="modalAccomplishment"></span>
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <strong>Grade Accomplishment:</strong><br>
                        <form action="{{ route('accomplishment_grade') }}" method="POST" id="gradeForm">
                            @csrf
                            <input type="hidden" name="accomplishment_id" id="modalId">
                            <div class="form-group">
                                <label for="grade">Grade</label>
                                <input type="number" name="grade" id="grade" class="form-control" min="0" max="30" step="1" required>
                            </div>
                            <div class="form-group">
                                <label for="comment">Comment/Feedback</label>
                                <textarea name="comment" id="comment" class="form-control" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function() {
        function filterAndSortAccomplishments() {
            var sortBy = $('#sortBy').val();
            var filterSection = $('#filterSection').val();
            var filterGrade = $('#filterGrade').val();

            $('#accomplishment-list .col-md-6').each(function() {
                var section = $(this).find('.card-subtitle').text().trim().replace('Section: ', '');
                var grade = $(this).find('.card-text:contains("Grade:")').text().trim();
                var gradeValue = grade ? 'graded' : 'ungraded';
                var show = true;

                if (filterSection && section !== filterSection) {
                    show = false;
                }

                if (filterGrade && filterGrade !== gradeValue) {
                    show = false;
                }

                $(this).toggle(show);
            });

            if (sortBy === 'recency') {
                $('#accomplishment-list .col-md-6').sort(function(a, b) {
                    var dateA = new Date($(a).find('.card-text:nth-of-type(4)').text().replace('Date Start: ', ''));
                    var dateB = new Date($(b).find('.card-text:nth-of-type(4)').text().replace('Date Start: ', ''));
                    return dateB - dateA;
                }).appendTo('#accomplishment-list');
            } else if (sortBy === 'hours') {
                $('#accomplishment-list .col-md-6').sort(function(a, b) {
                    var hoursA = parseInt($(a).find('.card-text:nth-of-type(6)').text().replace('Hours Rendered: ', ''));
                    var hoursB = parseInt($(b).find('.card-text:nth-of-type(6)').text().replace('Hours Rendered: ', ''));
                    return hoursB - hoursA;
                }).appendTo('#accomplishment-list');
            }
        }

        $('#sortBy, #filterSection, #filterGrade').on('change', filterAndSortAccomplishments);

        $('.showModalBtn').click(function() {
            var accomplishmentId = $(this).data('id');
            var card = $(this).closest('.card');
            var studentName = card.find('.card-title').text().trim().replace('Name: ', '');
            var studentSection = card.find('.card-subtitle').text().trim().replace('Section: ', '');
            var studentCompany = card.find('.card-text:nth-of-type(3)').text().trim().replace('Company: ', '');
            var dateStart = card.find('.card-text:nth-of-type(4)').text().trim().replace('Date Start: ', '');
            var dateEnd = card.find('.card-text:nth-of-type(5)').text().trim().replace('Date End: ', '');
            var hoursRendered = card.find('.card-text:nth-of-type(6)').text().trim().replace('Hours Rendered: ', '');
            var accomplishment = card.find('.card-text:nth-of-type(7)').text().trim().replace('Accomplishment: ', '');
            var grade = card.find('.card-text:contains("Grade:")').text().trim().replace('Grade: ', '');
            var comment = card.find('.card-text:contains("Comment:")').text().trim().replace('Comment: ', '');

            $('#modalId').val(accomplishmentId);
            $('#modalStudentName').text(studentName);
            $('#modalStudentSection').text(studentSection);
            $('#modalStudentCompany').text(studentCompany);
            $('#modalDateStart').text(dateStart);
            $('#modalDateEnd').text(dateEnd);
            $('#modalHoursRendered').text(hoursRendered);
            $('#modalAccomplishment').text(accomplishment);
            $('#grade').val(grade);
            $('#comment').val(comment);

            $('#gradeModal').modal('show');
        });
    });
</script>
@endsection
