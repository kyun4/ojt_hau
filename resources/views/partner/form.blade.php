@extends('layouts.partner_ui')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/ui/trumbowyg.css" integrity="sha512-eZWK2hdD8LD0FEjqGxdAn7ND0xJz5oykJvM5CteCL4pWqfwy4yjhSdA5cahGo37c0Q5lGOoFudm6HOh7WeoAgQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('title')
Post New Job
@endsection
@section('content')
    <form method="POST">
    @csrf

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="jobtitle">Specialization</label>
                <select name="specialization[]" multiple class="form-control chosen-select" id="" style="background-color: #FFF !important;padding:8px !important" required>
                    @foreach ($specializations as $specialization)
                        <option value="{{$specialization->id}}">{{$specialization->specialization}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="jobtitle">Job Title</label>
                <input type="text" name='title' class="form-control" id="jobtitle" required>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="jobtitle">Position</label>
                <input type="text" name='postion' class="form-control" id="jobtitle" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="jobtitle">Location</label>
                <input type="text" name='location' class="form-control" id="jobtitle" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="jobtitle">Job Description</label>
                <textarea  id="editor1"  name="description" id="" class="form-control" required></textarea>
            </div>
        </div>
    </div>

    {{-- <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="jobtitle">Work Experience Length</label>
                <input type="text" name="we_length" class="form-control" id="">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="jobtitle">Position Level</label>
                <input type="text" name="p_level" class="form-control" id="">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="jobtitle">Salary</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="number" name="salary_s" class="form-control" id="">
                    </div>
                    <div class="col-md-6">
                        <input type="number" name="salary_e" class="form-control" id="">
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="row">
        <div class="col-md-11">
            <div class="form-group">
                <label for="jobtitle">Applicant Qualification</label>
                <div class="row">
                    <div class="col-md-12 ">
                        <input type="text" name="skills[]" class="form-control" id="" required>
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
    {{-- <div class="row">
        <div class="col-md-12">
            <strong>Percentage Indicator for Ranking</strong>
        </div>
        <div class="col-md-4">
            Work Experience
            <input type="text" name="work_exp_per" class="form-control" id="">
        </div>
        <div class="col-md-4">
            Skills
            <input type="text" name="skill_per" class="form-control" id="">
        </div>
        <div class="col-md-4">
            Education
            <input type="text" name="education_per" class="form-control" id="">
        </div>
    </div> --}}
    <br>
  <button type="submit" class="btn btn-primary">Post Job</button>
</form>

@endsection
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
@endsection
