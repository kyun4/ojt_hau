@extends('layouts.student_ui')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/ui/trumbowyg.css" integrity="sha512-eZWK2hdD8LD0FEjqGxdAn7ND0xJz5oykJvM5CteCL4pWqfwy4yjhSdA5cahGo37c0Q5lGOoFudm6HOh7WeoAgQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('title')
    Update Accomplishment
@endsection

@section('content')
    {{-- <form method="POST" action="{{ url('/student/accomplishment/update/'.$accomplishment->id) }}"> --}}
    <form method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="date_start">Date Start</label>
                    <?php $date_start = \Carbon\Carbon::createFromFormat('m-d-Y', $accomplishment->date_start)->format('Y-m-d');?>
                    <input type="date" name='date_start' class="form-control" id="date_start" value="{{ $date_start }}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="date_end">Date End</label>
                    <?php $date_end = \Carbon\Carbon::createFromFormat('m-d-Y', $accomplishment->date_end)->format('Y-m-d');?>
                    <input type="date" name='date_end' class="form-control" id="date_end" value="{{ $date_end }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="accomplishment">Actual Accomplishment</label>
                    <textarea id="editor1" name="accomplishment" class="form-control">{{ urldecode($accomplishment->accomplishment) }}</textarea>
                </div>
            </div>
        </div>

        <br>
        <button type="submit" class="btn btn-primary">Update Accomplishment</button>
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
