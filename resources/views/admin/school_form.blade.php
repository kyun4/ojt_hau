@extends('layouts.super_ui')

@section('title') New School @endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post">
                @csrf
                <div class="row my-2">
                    <div class="col-md-12">
                        <label style='font-weight:bold'  for="academic_year">School Name</label>
                        <input required type="text" name="school" style="text-transform: uppercase" placeholder="Enter School or College Name" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label style='font-weight:bold'  for="academic_year">Internship Duration(Hours)</label>
                        <input required type="text" name="internship_duration" style="text-transform: uppercase" placeholder="Enter Internship Duration in Hours" class="form-control">
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-md-12">
                        <button class="btn btn-primary">Save School</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        function password_reset(id){
            var conf = confirm("Are you sure to reset the password?");
            if(conf == true) window.open('/coor/password/reset/'+id,'_parent');
        }
    </script>
@endsection
