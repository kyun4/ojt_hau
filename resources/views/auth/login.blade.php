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
                <form action="{{ route('login') }}" method="POST">
                  @csrf
                  <!-- Email input -->
                  <div class="form-outline mb-4">

                    <div class="container my-4">
                      <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                        <img src="{{asset('img/logo-login.png')}}" class = "text-center" style="width: 100%" alt="">
                        </div>
                      </div>
                    </div>
                    
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                    @elseif(session('error'))
                    <div class="alert alert-danger">
                        {{session('error')}}
                    </div>
                    @endif

                    <div class = "form-group">
                      <label class="form-label" for="form3Example3">Username</label>
                      <input type="text" name="username" id="form3Example3" class="form-control" />
                    </div>
                  
                    <div class="form-outline mb-4">
                      <label class="form-label" for="form3Example4">Password</label>
                      <input type="password" name="password" id="form3Example4" class="form-control" />
                    </div>

                  </div>
  
                  <!-- Password input -->
                  
  
                  <!-- Checkbox -->
  
                  <!-- Submit button -->
                  <button type="submit" class="btn btn-primary btn-block ">
                    Login
                  </button>
                  <div style="text-align:right;">
                    <small ><a href="/user/account/forget/password">Forgot Password</a></small>
                    <br />
                    <br />
                  </div>
                  <!-- Register buttons -->
                  <div class="text-center">
                    <p>or sign up here</p>
  
                    <a href="/register">
                        <button type="button" class="btn btn-success btn-block mb-4">
                            Sign up
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