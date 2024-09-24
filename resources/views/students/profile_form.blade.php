@extends('layouts.student_ui')
@section('title') Update basic information @endsection
@section('content')
    <form action="" method="post">
        @csrf
        <div class="row my-4" style="text-transform: uppercase">
            <div class="col-md-12">           
                <div class="row">
                    <div class="col-md-3">
                        <strong>Student information </strong>
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <strong>First Name</strong>
                        <input style='text-transform:uppercase;' type="text" disabled name="first_name" value="{{$student->first_name}}" class="form-control" id="">
                    </div>
                    <div class="col-md-4">
                        <strong>Middle Name</strong>
                        <input style='text-transform:uppercase;' type="text" disabled name="middle_name" value="{{$student->middle_name}}" class="form-control" id="">
                    </div>
                    <div class="col-md-4">
                        <strong>Last Name</strong>
                        <input style='text-transform:uppercase;' type="text" disabled name="last_name" value="{{$student->last_name}}" class="form-control" id="">
                    </div>
                </div>
                         
                <div class="row">
                    <div class="col-md-4">
                        <strong>Year and Section </strong>
                        <div class="row">
                            <div class="col-md-6">
                                <input style='text-transform:uppercase;' type="text" disabled name="year" value="{{$student->year}}" class="form-control" id="">
                            </div>
                            <div class="col-md-6">
                                <input style='text-transform:uppercase;' type="text" disabled name="section" value="{{$student->section}}" class="form-control" id="">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <strong>school </strong>
                        <input style='text-transform:uppercase;' disabled type="text" name="school" value="{{$student->school->school}}" class="form-control" id="">
                    </div>
                    <div class="col-md-4">
                        <strong>program </strong>
                        <input style='text-transform:uppercase;' type="text" name="program" value="{{$student->program}}" class="form-control" id="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <strong>Email </strong>
                        <input style='text-transform:uppercase;' type="email" name="email" value="{{$student->user->email}}" class="form-control" id="">
                    </div>
                    <div class="col-md-6">
                        <strong>Contact Number </strong>
                        <input style='text-transform:uppercase;' type="number" name="contact" value="{{$student->contact}}" class="form-control" id="">
                    </div>
                </div>
            </div>
        </div>

        <hr />
        
        <div class="row my-4" style="text-transform: uppercase">
            <div class="col-md-12">           
                <div class="row">
                    <div class="col-md-3">
                        <strong>Guardian information </strong>
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <strong>First Name</strong>
                        <input style='text-transform:uppercase;' type="text" name="parent_first_name" value="{{$student->parent_first_name}}" class="form-control" id="">
                    </div>
                    <div class="col-md-4">
                        <strong>Middle Name</strong>
                        <input style='text-transform:uppercase;' type="text" name="parent_middle_name" value="{{$student->parent_middle_name}}" class="form-control" id="">
                    </div>
                    <div class="col-md-4">
                        <strong>Last Name</strong>
                        <input style='text-transform:uppercase;' type="text" name="parent_last_name" value="{{$student->parent_last_name}}" class="form-control" id="">
                    </div>
                </div>
            </div>
        </div>
        <hr />
        <div class="row" style="text-transform: uppercase">
            <div class="col-md-12">  
                <div class="row">
                    <div class="col-md-3">
                        <strong>Address: </strong>
                        <hr />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <strong>Houst No. Street </strong>
                        <input style='text-transform:uppercase;' type="text" name="house" placeholder="Houst No. Street" class="form-control" id="">
                    </div>
                    <div class="col-md-3">
                        <strong>Barangay</strong>
                        <input style='text-transform:uppercase;' type="text" name="barangay" placeholder="Barangay" class="form-control" id="">
                    </div>
                    <div class="col-md-3">
                        <strong>City/Municipality</strong>
                        <input style='text-transform:uppercase;' type="text" name="city" placeholder="City/Municipality" class="form-control" id="">
                    </div>
                    <div class="col-md-3">
                        <strong>Province</strong>
                        <input style='text-transform:uppercase;' type="text" name="province" placeholder="Province" class="form-control" id="">
                    </div>
                </div>           
                <div class="row">
                    <div class="col-md-12">
                        <strong>Current Address:</strong> {{$student->address}}
                    </div>
                </div>
            </div>   
        </div>
        
        <hr />
        <div class="row my-3">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">
                    Update
                </button>
            </div>
        </div>
    </form>
@endsection