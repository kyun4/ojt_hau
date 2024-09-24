@extends('layouts.partner_ui')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/ui/trumbowyg.css" integrity="sha512-eZWK2hdD8LD0FEjqGxdAn7ND0xJz5oykJvM5CteCL4pWqfwy4yjhSdA5cahGo37c0Q5lGOoFudm6HOh7WeoAgQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('title') Update Job ({{$job->title}}) @endsection

@section('content')
<form method="POST" action="">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="jobtitle">Specialization</label>
                @php
                    $jobSpecializationIds = $job_specializations->pluck('specialization_id')->toArray();
                @endphp

                <select name="specialization[]" multiple class="form-control chosen-select" id="" style="background-color: #FFF !important;padding:8px !important" required>
                    @foreach ($specializations as $specialization)
                        <option value="{{ $specialization->id }}"
                            @if (in_array($specialization->id, $jobSpecializationIds)) selected @endif>
                            {{ $specialization->specialization }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="jobtitle">Job Title</label>
                <input type="text" name='title' class="form-control" value="{{$job->title}}" id="jobtitle" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="jobtitle">Position</label>
                <input type="text" name='postion' class="form-control" value="{{$job->position}}" id="jobtitle" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="jobtitle">Location</label>
                <input type="text" name='location' class="form-control" value="{{$job->location}}" id="jobtitle" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="jobtitle">Job Description</label>
                <textarea name="description" id="editor1"  class="form-control" required>@php echo urldecode($job->job_descriptions) @endphp</textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-11">
            <div class="form-group">
                <label for="jobtitle" class="d-flex justify-content-between align-items-center">
                    Applicant Qualification
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editSkillsModal">
                        Edit Skills
                    </button>
                </label>
                <div class="row">
                    <table class="table table-hover">
                        @foreach ($job->job_skills as $skill_item)
                        <tr>
                            <td>
                                {{ $skill_item->skill }}
                            </td>
                            <td>
                                <div class="row">
                                    <button type="button" class="btn btn-danger" onclick="deleteSkill('{{ base64_encode($skill_item->id) }}')">
                                        <i class="fas fa-fw fa-minus"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-11">
            <div class="form-group">
                <label for="jobtitle">New Applicant Qualification</label>
                <div class="row">
                    <div class="col-md-12 ">
                        <input type="text" name="skills[]" class="form-control" id="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <label for="jobtitle">&nbsp;</label>
                <div class="row">
                    <button type="button" class="btn btn-info" id="repeatDivBtn" data-increment="1"> <i class="fas fa-fw fa-plus"></i></button>
                </div>
            </div>
        </div>
    </div>
    <div id="repeatDiv"></div>
    <br>
    <button type="submit" class="btn btn-success">Update Job</button>
</form>

@endsection

<!-- Modal -->
<div class="modal fade" id="editSkillsModal" tabindex="-1" role="dialog" aria-labelledby="editSkillsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="{{ route('update_skill', ['id' => base64_encode($skill_item->id)]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title" id="editSkillsModalLabel">Edit Skills</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="jobtitle">Applicant Qualification</label>
                                <table class="table table-hover">
                                    @foreach ($job->job_skills as $skill_item)
                                    <tr>
                                        <td>
                                            <input type="text" name="skill" class="form-control" value="{{ $skill_item->skill }}">
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>


@section('script')
<script type="text/javascript">
    $(document).ready(function () {

        $("#repeatDivBtn").click(function () {


            $newid = $(this).data("increment");
            $(".repeatDiv").last().attr('id',   "repeatDiv" + '_' + $newid);

            var append_input = '';
            append_input += '<div id="repeatDiv'+'_'+ $newid+'">';
            append_input += '<div class="row">';
                append_input += '<div class="col-md-11">';
                    append_input += '<div class="form-group">';
                        append_input += '<div class="col-md-12">';
                            append_input += ' <input type="text" name="skills[]" class="form-control" id="" required>';
                        append_input += '</div>';
                    append_input += '</div>';
                append_input += '</div>';
                    append_input += '<div class="col-md-1">';
                append_input += '<div class="form-group">';
                         append_input += '<div class="row">';
                            append_input += '<button type="button" class="btn btn-danger removeDivBtn" data-id="repeatDiv'+'_'+ $newid+'" > <i class="fas fa-fw fa-minus"></i></button>';
                        append_input += '</div>';
                    append_input += '</div>';
                append_input += '</div>';
                append_input += '</div>';
           $("#repeatDiv").append(append_input);
            $newid++;
            $(this).data("increment", $newid);

        });


        $(document).on('click', '.removeDivBtn', function () {

            $divId = $(this).data("id");
            $("#"+$divId).remove();
            $inc = $("#repeatDivBtn").data("increment");
            $("#repeatDivBtn").data("increment", $inc-1);

        });

        });
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
<script>
    $(".chosen-select").chosen({
    no_results_text: "Oops, nothing found!"
    })
</script>




<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/trumbowyg.min.js" integrity="sha512-t4CFex/T+ioTF5y0QZnCY9r5fkE8bMf9uoNH2HNSwsiTaMQMO0C9KbKPMvwWNdVaEO51nDL3pAzg4ydjWXaqbg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function () {
        $('#editor1').trumbowyg();
    });
</script>

<script>
    function deleteSkill(id) {
        var conf = confirm("Are you sure to delete this skill?");
        if (conf == true) {
            fetch('/job/skill/delete/' + id, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
            })
        }
        window.location.reload();
    }
</script>

<!-- Add this script at the end of your HTML body -->
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script>
    $(document).ready(function() {
        // Function to handle editing a single skill via modal
        $('.btn-edit-skill').click(function() {
            var skillId = $(this).closest('tr').find('input[type="text"]').attr('name').match(/\[(.*?)\]/)[1]; // Extract skill ID from input name
            var skillValue = $(this).closest('tr').find('input[type="text"]').val(); // Get current skill value
            var newSkillValue = prompt('Enter new skill value:', skillValue); // Prompt user to enter new skill value
            if (newSkillValue !== null) { // If user entered a new value
                // Send AJAX request to update skill
                $.ajax({
                    type: 'PUT',
                    url: '/job/skill/update/' + skillId,
                    data: { skill: newSkillValue },
                    success: function(response) {
                        // Handle success response (e.g., show success message)
                        alert(response.success); // Show success message
                    },
                    error: function(xhr, status, error) {
                        // Handle error response (e.g., show error message)
                        console.error(xhr.responseText);
                        // Additional error handling if needed
                        alert('Error occurred while updating skill'); // Show error message
                    }
                });
            }
        });
    });
</script>


@endsection
