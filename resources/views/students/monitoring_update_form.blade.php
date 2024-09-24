@extends('layouts.student_ui')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/ui/trumbowyg.css" integrity="sha512-eZWK2hdD8LD0FEjqGxdAn7ND0xJz5oykJvM5CteCL4pWqfwy4yjhSdA5cahGo37c0Q5lGOoFudm6HOh7WeoAgQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('title')
Update Log
@endsection
@section('content')
<form method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="date">Date</label>
                <?php $date_log = \Carbon\Carbon::createFromFormat('m-d-Y', $monitoring->date_log)->format('Y-m-d');?>
                <input type="date" name="date" class="form-control" id="date" max="{{ date('Y-m-d') }}" value="{{ $date_log }}" required>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label for="time_in">Time-In</label>
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="time_in_hour" class="form-control" id="time_in_hour" placeholder="Hour" value="{{ date('h', strtotime($monitoring->time_in)) }}" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="time_in_minutes" class="form-control" id="time_in_minutes" placeholder="Minutes" value="{{ date('i', strtotime($monitoring->time_in)) }}">
                    </div>
                    <div class="col-md-4">
                        <select name="time_in_designation" class="form-control" id="time_in_designation">
                            <option value="AM" @if(date('A', strtotime($monitoring->time_in)) == 'AM') selected @endif>AM</option>
                            <option value="PM" @if(date('A', strtotime($monitoring->time_in)) == 'PM') selected @endif>PM</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="time_out">Time-Out</label>
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="time_out_hour" class="form-control" id="time_out_hour" placeholder="Hour" value="{{ date('h', strtotime($monitoring->time_out)) }}" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="time_out_minutes" class="form-control" id="time_out_minutes" placeholder="Minutes" value="{{ date('i', strtotime($monitoring->time_out)) }}">
                    </div>
                    <div class="col-md-4">
                        <select name="time_out_designation" class="form-control" id="time_out_designation">
                            <option value="AM" @if(date('A', strtotime($monitoring->time_out)) == 'AM') selected @endif>AM</option>
                            <option value="PM" @if(date('A', strtotime($monitoring->time_out)) == 'PM') selected @endif>PM</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <button type="submit" class="btn btn-primary">Update Log</button>
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
