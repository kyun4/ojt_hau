@extends('layouts.student_ui')
@section('title') New Skills @endsection
@section('content')
    <form action="" method="POST">
    @csrf


    <div class="row">
        <div class="col-md-11">
            <div class="form-group">
                <label for="jobtitle">Skills</label>
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
@endsection
