@extends('layouts.super_ui')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/ui/trumbowyg.css" integrity="sha512-eZWK2hdD8LD0FEjqGxdAn7ND0xJz5oykJvM5CteCL4pWqfwy4yjhSdA5cahGo37c0Q5lGOoFudm6HOh7WeoAgQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
Update Banner
@section('title')  @endsection

@section('content')
{{-- <img src="{{asset('partner_img/'.Auth::user()->profile->banner)}}" style="width:100%"> --}}
@if (auth()->user()->image == '' || auth()->user()->image == null)
    <img src="{{asset('partner_img\undraw_profile.svg')}}" class="w-25"  alt="">
@else
    <img src="{{asset('admin/img/'.auth()->user()->image)}}" class="w-25"  alt="">
@endif
<br />
<br />
<form method="POST" action="" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="banner"><strong>Upload New Banner</strong></label>
                <input type="file" name='banner' class="form-control" value="" id="banner">
            </div>
        </div>
    </div>


  <button type="submit" class="btn btn-primary">Update Banner</button>
</form>

@endsection
