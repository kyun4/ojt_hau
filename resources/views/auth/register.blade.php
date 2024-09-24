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
    <div class="px-4 py-5 px-md-5 text-lg-start">
      <div class="container">
        <div class="row gx-lg-5">
          <div class="col-lg-3 mb-5 mb-lg-0">
           
          </div>
  
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="card">
              <div class="card-body py-5 px-md-5">
                <form method="POST" action="/student/register">
                    @csrf
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <img src="{{asset('img/logo-login.png')}}" style="width: 100%" alt="">
                    @if(session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                    @endif
                    <label class="form-label" for="form3Example3">Student Token </label>
                    <input type="text" name="student_token" id="form3Example3" class="form-control" />
                  </div>
  
                  <!-- Submit button -->
  
                  <button type="submit" class="btn btn-success btn-block mb-4">
                    Sign up
                </button>
                  <!-- Register buttons -->
                  <div class="text-center">
                    <p>or Login with this button:</p>
                    <a href="/login">
                        <button type="button" class="btn btn-primary btn-block mb-4">
                        Login
                        </button>
                    </a>
                  </div>
                </form>
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