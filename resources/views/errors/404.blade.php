@extends('layouts.login')
@section('css')
    <style>
      body{
        background-attachment:fixed;
        background-size: 100%  100%;
        background-image: url('{{asset('img/login-bg.jpg')}}');
        background-repeat:no-repeat;
      }
    </style>
@endsection
@section('content')
<!-- Section: Design Block -->
<section class="" >
    <!-- Jumbotron -->
    <div class="px-4 py-5 px-md-5 text-lg-start " >
      <div class="container">
        <div class="row gx-lg-5">
          <div class="col-lg-3 mb-5 mb-lg-0">
           
          </div>
  
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="card">
              <div class="card-body py-5 px-md-5 ">
                <img src="{{asset('img/logo-login.png')}}" style="width: 100%" alt="">
                <div style="text-align: center;font-size:40px">
                    404 ERROR
                    <div style="border-bottom:1px dotted #600"></div>
                    PAGE NOT FOUND
                </div>
                <br />
                <br />
                <br />

                <center>
                <a style="cursor: pointer;color:#00F" onclick="history.back()">Back to the last page you visited </a>
                </center>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Jumbotron -->
  </section>
  <!-- Section: Design Block -->
    
@endsection