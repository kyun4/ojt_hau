@extends('layouts.super_ui')

@section('title') Academic Year @endsection
@section('content')
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4" >
        <div class="card border-left-danger shadow h-100 py-2 hoverable">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                            Academic Year</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{isset($acads->academic_year) ? $acads->academic_year : 'Please Set from your panel'}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4" >
        <div class="card border-left-danger shadow h-100 py-2 hoverable">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-black text-uppercase mb-1">
                            Semester</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{isset($acads->semester) ? $acads->semester : 'Please Set from your panel'}}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection