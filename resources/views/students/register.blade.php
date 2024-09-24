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
    <div class="px-4 py-5 px-md-5 text-lg-start" >
      <div class="container">
        <div class="row gx-lg-5">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <h3 class="text-white">Student Information for Registration</h3>
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Student Number:</strong>
                            </div>
                            <div class="card-body">
                                {{$student->student_number}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Student Name:</strong>
                            </div>
                            <div class="card-body">
                                {{$student->first_name}}
                                {{$student->middle_name}}
                                {{$student->last_name}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Year and Section:</strong>
                            </div>
                            <div class="card-body">
                                {{$student->year}} -
                                {{$student->section}}
                            </div>
                        </div>
                    </div>
                </div>
              </div>
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="card">
              <div class="card-body py-5 px-md-5">
                <form method="POST" action="/student/register/save">
                  @csrf
                  <!-- Email input -->

                  <div class="form-outline mb-4">
                    <img src="{{asset('img/logo-login.png')}}" style="width: 100%" alt="">
                    <label class="form-label" for="form3Example3">Username</label>
                    <input type="text" name="username" required id="form3Example3" class="form-control" />
                    <input type="hidden" name="student_info" value="{{base64_encode($student->id)}}" id="form3Example3" class="form-control" />
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3">Email</label>
                    <input type="email"  required name="email" id="form3Example3" class="form-control" />
                  </div>

                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example4">Password</label>
                    <input type="password" name="password" required id="form3Example4" class="form-control" />
                  </div>

                  <!-- Checkbox -->

                  <!-- Submit button -->
                  <button type="submit" class="btn btn-primary btn-block mb-4">
                    Create Account
                  </button>
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
