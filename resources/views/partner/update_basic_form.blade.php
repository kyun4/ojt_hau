@extends('layouts.partner_ui')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/ui/trumbowyg.css" integrity="sha512-eZWK2hdD8LD0FEjqGxdAn7ND0xJz5oykJvM5CteCL4pWqfwy4yjhSdA5cahGo37c0Q5lGOoFudm6HOh7WeoAgQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('title') Update Basic Information @endsection

@section('content')
<form method="POST" action="" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name"><strong>Position</strong></label>
                <input style='text-transform:uppercase;' type="text" name='position' class="form-control" value="{{Auth::user()->profile->company_position}}" id="name">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="name"><strong>Email</strong></label>
                <input style='text-transform:lowercase;' type="email" name='email' class="form-control" value="{{Auth::user()->email}}" id="name">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="add"><strong>Complete Name</strong></label>
                <div class="row">
                    <div class="col-md-4">
                        First Name
                        <input style='text-transform:uppercase;' type="text" name='first_name' class="form-control" value="{{Auth::user()->profile->first_name}}" id="add">
                    </div>
                    <div class="col-md-4">
                        Middle Name
                        <input style='text-transform:uppercase;' type="text" name='middle_name' class="form-control" value="{{Auth::user()->profile->middle_name}}" id="add">
                    </div>
                    <div class="col-md-4">
                        Last Name
                        <input style='text-transform:uppercase;' type="text" name='last_name' class="form-control" value="{{Auth::user()->profile->last_name}}" id="add">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update Basic Information</button>
</form>          

@endsection