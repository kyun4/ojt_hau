@extends('layouts.ui')
@section('title')
<div style="float: right">
        <a href='{{asset('downloadables/Student-Uploading-Format.xlsx')}}' download class="btn btn-sm btn-success text-black" style="color:white !important">Download Format</a>

</div>
Uploading New Students

@endsection
@section('content')
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <label for="File">File Upload for New Student:</label>
                <input type="file" name="file" class="form-control" id="file" required>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <br />
                <button class="btn btn-primary" type="submit">Upload</button>
            </div>
        </div>
    </form>
@endsection
