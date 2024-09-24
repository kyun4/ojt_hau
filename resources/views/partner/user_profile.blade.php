@extends('layouts.partner_ui')
@section('title')
User's Profile
@endsection
@section('content')
    <div class="row my-2">
        <div class="col-md-3 text-center">
            @if (Auth::user()->profile->banner == '' || Auth::user()->profile->banner == null)
                <img src="{{asset('admin/img/undraw_profile.svg')}}" class="w-100"  alt="">
            @else
                <img src="{{asset('partner_img/'.Auth::user()->profile->banner)}}" class="w-100"  alt="">
            @endif
            <br>
            <br>
            <a href="/partners/profile/banner">
            <button class="btn btn-primary">Update Banner</button></a>
        </div>
        <div class="col-md-9" style="text-transform:uppercase">
            <h4 class="text-primary">User's Profile</h4>
            <hr>
            <div class="card my-1">
                <div class="card-header">
                    <div style="float: right;">
                        <a href="/partners/profile/update/company">
                        <button class="btn btn-sm btn-primary">Update</button>
                        </a>
                    </div>
                    <strong>Company Information</strong>
                </div>
                <div class="card-body">
                    {{-- <img src="{{asset('partner_img/'.Auth::user()->profile->banner)}}" style="width:100%"> --}}
                    <table class="">
                        <tr>
                            <td><strong>Company Name:</strong></td>
                            <td>{{Auth::user()->profile->company_name}}</td>
                        </tr>
                        <tr>
                            <td><strong>Company Address:</strong></td>
                            <td>{{Auth::user()->profile->company_address}}</td>
                        </tr>
                    </table>
                </div>
              </div>
              <hr>
              <div class="card my-1">
                  <div class="card-header">
                    <div style="float: right;">
                        <a href="/partners/profile/update/basic/info">
                        <button class="btn btn-sm btn-primary">Update</button>
                        </a>
                    </div>
                      <strong>Basic Information</strong>
                  </div>
                  <div class="card-body">
                      <table class="">
                          <tr>
                              <td><strong>Position: </strong></td>
                              <td>{{Auth::user()->profile->company_position}}</td>
                          </tr>
                          <tr>
                              <td><strong>Name: </strong></td>
                              <td>{{Auth::user()->profile->first_name}} {{Auth::user()->profile->middle_name}} {{Auth::user()->profile->last_name}}</td>
                          </tr>
                          <tr>
                              <td><strong>Email: </strong></td>
                              <td style="text-transform: lowercase !important">{{Auth::user()->email}}</td>
                          </tr>
                      </table>
                  </div>
                </div>
        </div>
    </div>
@endsection
