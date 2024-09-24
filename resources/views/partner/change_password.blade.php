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
                <form action="" method="POST">
                  @csrf
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <img src="{{asset('img/logo-login.png')}}" style="width: 100%" alt="">
                    <div class="alert alert-warning">
                        <strong>Notice:</strong> Change Password Required
                    </div>
                  </div>
  
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4">New Password</label>
                    <input type="password"  minlength="6" required name="password" id="form3Example4" class="form-control" />
                  </div>
  
                  <!-- Checkbox -->
  
                  <!-- Submit button -->
                  <button type="submit" class="btn btn-primary btn-block mb-4">
                    Login
                  </button>
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