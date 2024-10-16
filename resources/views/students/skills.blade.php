@extends('layouts.student_ui')
@section('title') New Skills @endsection
@section('content')
    <form action="" method="POST">
    @csrf


    <div class="row">
        <div class="col-md-11">
            <div class="form-group">
                <h5>
                    <div class="row">

                        <div class="col-md-10">
                            <b>Skillset</b>
                        </div>

                        <div class="col-md-2">

                            <button type="button" class="btn btn-info float-right" id="repeatDivBtn" data-increment="1"> <i class="fas fa-fw fa-plus"></i> Add Skillset</button>

                        </div>

                    </div>
                
                </h5>

               
                <div class="row">
                    <div class="col-md-12 ">
                        <div class="form-group">
                            <label for = "expertise">Level of Expertise</label>
                            <select id = "expertise" class = "form-control" name = "level_of_expertise[]" required>
                                <option value = ""> -- Select Level of Expertise -- </option>
                                <option value = "familiar">Familiar with</option>
                                <option value = "working">Working knowledge with</option>
                                <option value = "expert">Expert with</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 ">

                        <div class="form-group">
                            <label for = "skill">Skill</label>
                            <input type="text" name="skills[]" placeholder = "Type your skill here" class="form-control" id="skill" required>
                        </div>
                    
                    </div>
                </div>
              
            </div>
        </div>
        <div class="col-md-1">
            <div class="form-group">
                <label for="jobtitle">&nbsp;</label>
                <div class="row">
                   
                </div>
            </div>
        </div>
    </div>
    <div id="repeatDiv"></div>

  <button type="submit" class="btn btn-primary">Update</button>
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
                    append_input += '<div class="col-md-12 ">';
                        append_input += '<div class="form-group">';
                            append_input += '<label for = "expertise">Level of Expertise</label>';
                            append_input += '<select id = "expertise" class = "form-control" name = "level_of_expertise[]" required>';
                                append_input += '<option value = ""> -- Select Level of Expertise -- </option>';
                                append_input += '<option value = "familiar">Familiar with</option>';
                                append_input += '<option value = "working">Working knowledge with</option>';
                                append_input += '<option value = "expert">Expert with</option>';
                            append_input += '</select>';
                        append_input += '</div>';
                    append_input += '</div>';
             append_input += '</div>';

            append_input += '<div class="row">';

                append_input += '<div class="col-md-12">';
                    append_input += '<div class="form-group">';
                        append_input += '<div class="col-md-12">';
                            append_input += ' <label>Skill</label>';
                            append_input += ' <input type="text" name="skills[]" placeholder = "Type your skill here" class="form-control" id="" required>';
                        append_input += '</div>';
                    append_input += '</div>';
                append_input += '</div>';

                append_input += '<div class="col-md-12">';
                append_input += '<div class="form-group">';
                         append_input += '<div class="row">';
                            append_input += '<button type="button" class="btn btn-danger removeDivBtn float-right" data-id="repeatDiv'+'_'+ $newid+'" > <i class="fas fa-fw fa-minus"></i>Remove Skill</button>';
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
@endsection
