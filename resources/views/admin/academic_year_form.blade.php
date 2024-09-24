@extends('layouts.super_ui')

@section('title') Academic Year @endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="" method="post">
                @csrf
                <div class="row my-2">
                    <div class="col-md-12">
                        <label style='font-weight:bold'  for="academic_year">Academic Year</label>
                        <select name="a_year" id="academic_year" required class="form-control">
                            <option value="">-- Select Academic Year --</option>
                            @for ($i = date('Y'); $i > date('Y')-5; $i--)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="row my-2">
                    <div class="col-md-12">
                        <label style='font-weight:bold'  for="semester">Semester</label>
                        <select name="sem" id="semester" required class="form-control">
                            <option value="">-- Select Semester --</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>
                
                <div class="row my-2">
                    <div class="col-md-12">
                        <button class="btn btn-primary">Update Academic Settings</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection