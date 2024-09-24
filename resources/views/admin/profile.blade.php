@extends('layouts.super_ui')

@section('title')
    Admin Profile
@endsection
@section('content')
<div class="row my-2">
    <div class="col-md-3 text-center">

        @if (Auth::user()->profile->banner == '' || Auth::user()->profile->banner == null)
            <img src="{{asset('admin/img/undraw_profile.svg')}}" class="w-100"  alt="">
        @else
            <img src="{{asset('admin/img/'.Auth::user()->profile->banner)}}" class="rounded-circle my-3" height = "50%"  alt="">
        @endif


        <a href="/admin/profile/banner">
            <button class="btn btn-primary mt-2">Update Banner</button>
        </a>
    </div>
    <div class="col-md-9" style="text-transform:uppercase">
            <div class="card my-1">
                <div class="card-header">
                    <div style="float: right;">
                        <a href="/admin/profile/update/basic/info">
                        <button class="btn btn-sm btn-primary">Update</button>
                        </a>
                    </div>
                    <strong>Basic Information</strong>
                </div>
                <div class="card-body d-flex align-items-center">
                    <table class="">
                        <tr>
                            <td><strong>Name:</strong></td>
                            <td>{{ Auth::user()->profile->first_name }} {{ Auth::user()->profile->middle_name }} {{ Auth::user()->profile->last_name }}</td>
                        </tr>
                        <tr>
                            <td><strong>Email:</strong></td>
                            <td style="text-transform:lowercase !important;">{{ Auth::user()->email }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
