@extends('layouts.student_ui')
@section('title') Profile Image @endsection
@section('content')    
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            
            @if (Auth::user()->student->image == '' || Auth::user()->student->image == null)
                <img src="{{asset('admin/img/undraw_profile.svg')}}" class="w-100"  alt="">
            @else
                <img src="{{asset('img/profile_img/'.Auth::user()->student->image)}}" class="w-100"  alt="">                        
            @endif

            <form action="" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-12 my-1">
                        <label for="">Upload New Image</label>
                        <input type="file" name="image" class="form-control"  id="">
                    </div>
                    <div class="col-md-12 my-1">
                        <button type="submit" class="btn btn-primary ">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>    
@endsection