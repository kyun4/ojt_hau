@extends('layouts.student_ui')
@section('title') New Work Experience @endsection
@section('content')
    <form action="" method="POST">
    @csrf

    <label for="jobtitle"><strong>Work Experience</strong></label>

    <div class="row" style="border:1px solid #CCC;padding:10px">
        <div class="col-md-11">
            <div class="form-group">
                <div class="row" >
                    <div class="col-md-12 ">
                        Position:
                        <input type="text" name="position[]" class="form-control" id="" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 ">
                        Company:
                        <input type="text" name="company[]" class="form-control" id="" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 ">
                        Address
                        <input type="text" name="address[]" class="form-control" id="" required>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-12 ">
                    Work Dates
                    </div>
                    <div class="col-md-6 ">
                        Start Date
                        <input type="date" name="workdates_s[]" class="form-control" id="" required>
                    </div>
                    <div class="col-md-6 ">
                        End Date
                        <input type="date" name="workdates_e[]" class="form-control" id="" required>
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
    <br />
  <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection


@section('script')

<script type="text/javascript">
    $(document).ready(function () {

        $("#repeatDivBtn").click(function () {


            $newid = $(this).data("increment");
            $(".repeatDiv").last().attr('id',   "repeatDiv" + '_' + $newid);

            var append_input = '';
            append_input += '<br /><div id="repeatDiv'+'_'+ $newid+'">';
            append_input += '<div class="row" style="border:1px solid #CCC;padding:10px">';
                append_input += '<div class="col-md-11">';
                    append_input += '<div class="form-group">';

                        append_input += '<div class="row">';
                            append_input += '<div class="col-md-12">Position';
                                append_input += ' <input type="text" name="position[]" class="form-control" id="" required>';
                            append_input += '</div>';
                        append_input += '</div>';

                        append_input += '<div class="row">';
                            append_input += '<div class="col-md-12">Company';
                                append_input += ' <input type="text" name="company[]" class="form-control" id="" required>';
                            append_input += '</div>';
                        append_input += '</div>';


                        append_input += '<div class="row">';
                            append_input += '<div class="col-md-12">Address';
                                append_input += ' <input type="text" name="address[]" class="form-control" id="" required>';
                            append_input += '</div>';
                        append_input += '</div>';

                        append_input += '<div class="row">';
                        append_input += '<div class="col-md-12">Work Dates</div>';
                        append_input += '<div class="col-md-6">Start Date:';
                            append_input += ' <input type="date" name="workdates_s[]" class="form-control" id="" required>';
                        append_input += '</div>';
                        append_input += '<div class="col-md-6">End Date';
                            append_input += ' <input type="date" name="workdates_e[]" class="form-control" id="" required>';
                        append_input += '</div>';
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
