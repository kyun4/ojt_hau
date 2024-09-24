@extends('layouts.super_ui')

@section('title') UPdate Coordinator: {{$account->profile->first_name}} {{$account->profile->middle_name}} {{$account->profile->last_name}} @endsection
@section('content')
<div class="row">
    <div class="col-md-6">
        <form action="" method="post">
            @csrf 
            <div class="row my-2">
                <div class="col-md-12"> 
                    School / Institute:
                    <select name="school_id" required class="form-control">
                        <option value="{{$account->profile->school->id}}">{{$account->profile->school->school}}</option>
                        <option value="">-- Select School / Institute --</option>
                        @foreach ($schools as $school)
                            <option value="{{$school->id}}">{{$school->school}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-12"> 
                    Username:
                    <input required  type="text" required name="username" value="{{$account->username}}" class="form-control" >
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-12">
                    First Name:
                    <input required  type="text" required name="first_name" value="{{$account->profile->first_name}}" class="form-control" >
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-12">
                    Middle Name: 
                    <input type="text" name="middle_name" class="form-control" value="{{$account->profile->middle_name}}" >
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-12">
                    Last Name:
                    <input required  type="text" required name="last_name" value="{{$account->profile->last_name}}" class="form-control" >
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-12">
                <button  class="btn btn-primary" >Update Account</button>
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
            if(conf == true) window.open('/admin/password/reset/'+id,'_parent');
        }
    </script>
@endsection