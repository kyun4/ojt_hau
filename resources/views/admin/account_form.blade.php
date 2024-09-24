@extends('layouts.super_ui')

@section('title') New Coordinator @endsection
@section('content')
<div class="row">
    <div class="col-md-6">
        <form method="post">
            @csrf
            <div class="row my-2">
                <div class="col-md-12">
                    School / Institute:
                    <select name="school_id" required class="form-control">
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
                    <input required  type="text" required name="username" class="form-control" >
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-12">
                    Email:
                    <input required  type="email" required name="email" class="form-control" >
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-12">
                    First Name:
                    <input required  style="text-transform: uppercase" type="text" required name="first_name" class="form-control" >
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-12">
                    Middle Name:
                    <input type="text" style="text-transform: uppercase"  name="middle_name" class="form-control" >
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-12">
                    Last Name:
                    <input required  style="text-transform: uppercase"  type="text" required name="last_name" class="form-control" >
                </div>
            </div>
            <div class="row my-2">
                <div class="col-md-12">
                <button  class="btn btn-primary" >Create Account</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
