@extends('layouts.student_ui')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/ui/trumbowyg.css" integrity="sha512-eZWK2hdD8LD0FEjqGxdAn7ND0xJz5oykJvM5CteCL4pWqfwy4yjhSdA5cahGo37c0Q5lGOoFudm6HOh7WeoAgQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('title')
New Accomplishment
@endsection
@section('content')
    <form method="POST">
    @csrf

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="jobtitle">Date Start</label>
                <input type="date" name='date_start' class="form-control" id="jobtitle">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="jobtitle">Date End</label>
                <input type="date" name='date_end' class="form-control" id="jobtitle">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="jobtitle">Actual Accomplishment</label>
                <textarea  id="editor1"  name="accomplishment" id="" class="form-control"></textarea>
            </div>
        </div>
    </div>

   
    <br>
  <button type="submit" class="btn btn-primary">Save Accomplishment</button>
</form>       

@endsection
@section('script')

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/trumbowyg.min.js" integrity="sha512-t4CFex/T+ioTF5y0QZnCY9r5fkE8bMf9uoNH2HNSwsiTaMQMO0C9KbKPMvwWNdVaEO51nDL3pAzg4ydjWXaqbg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function () {
        $('#editor1').trumbowyg();
    });
</script>
@endsection