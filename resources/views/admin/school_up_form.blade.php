@extends('layouts.super_ui')

@section('title') Update School: {{$school->school}} @endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post">
                @csrf
                <div class="row my-2">
                    <div class="col-md-12">
                        <label style='font-weight:bold;text-transform:uppercase'  for="academic_year">School Name</label>
                        <input type="text" style='text-transform:uppercase' value="{{$school->school}}" name="school" required placeholder="Enter School or Institute Name" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label style='font-weight:bold;text-transform:uppercase'  for="academic_year">Internship Duration(Hours)</label>
                        <?php
                        $duration = explode(":", $school->internship_duration)[0];
                        ?>
                        <input type="text" style='text-transform:uppercase' value="{{ $duration }}" name="internship_duration" required placeholder="Enter Internship Duration in Hours" class="form-control">
                    </div>

                </div>

                <div class="row my-2">
                    <div class="col-md-12">
                        <button class="btn btn-primary">Update School</button>
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
