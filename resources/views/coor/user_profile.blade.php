@extends('layouts.ui')
@section('title')
Coordinator's Profile
@endsection
@section('content')
<div class="row my-2">
    <div class="col-md-3 text-center">
        @if (Auth::user()->profile->banner == '' || Auth::user()->profile->banner == null)
            <img src="{{asset('admin/img/undraw_profile.svg')}}" class="w-100" alt="">
        @else
            <img src="{{asset('coor_img/'.Auth::user()->profile->banner)}}" class="w-100" alt="">
        @endif
        <br><br>
        <a href="/coor/profile/banner">
            <button class="btn btn-primary">Update Banner</button>
        </a>
    </div>

    <div class="col-md-9">
        <div class="col-md-12" style="text-transform:uppercase">
            <div class="card my-1">
                <div class="card-header">
                    <div style="float: right;">
                        <a href="/coor/profile/update/basic/info">
                            <button class="btn btn-sm btn-primary">Update</button>
                        </a>
                    </div>
                    <strong>Basic Information</strong>
                </div>
                <div class="card-body d-flex align-items-center">
                    <div>
                        <table>
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
            <hr>
            <div class="card my-1">
                <div class="card-header">
                    <div style="float: right;">
                        <a href="/coor/profile/update/signatory">
                            <button class="btn btn-sm btn-primary">Update</button>
                        </a>
                    </div>
                    <strong>School Signatories</strong>
                </div>
                <div class="card-body">
                    @if (isset(Auth::user()->profile->signatory->first_name))
                        <table>
                            <tr>
                                <td><strong>Name:</strong></td>
                                <td>{{ Auth::user()->profile->signatory->first_name }} {{ Auth::user()->profile->signatory->middle_name }} {{ Auth::user()->profile->signatory->last_name }}</td>
                            </tr>
                            <tr>
                                <td><strong>Position:</strong></td>
                                <td>{{ Auth::user()->profile->signatory->position }}</td>
                            </tr>
                        </table>
                    @else
                        <small class="text-warning">PLEASE UPDATE FROM YOUR PANEL</small>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
