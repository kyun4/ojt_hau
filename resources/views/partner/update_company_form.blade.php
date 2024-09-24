@extends('layouts.partner_ui')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.25.1/ui/trumbowyg.css" integrity="sha512-eZWK2hdD8LD0FEjqGxdAn7ND0xJz5oykJvM5CteCL4pWqfwy4yjhSdA5cahGo37c0Q5lGOoFudm6HOh7WeoAgQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('title') Update Company Information @endsection

@section('content')
<form method="POST" action="" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="name"><strong>Company Name</strong></label>
                <input type="text" name='name' class="form-control" value="{{Auth::user()->profile->company_name}}" id="name">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="add"><strong>Company Address</strong></label>
                <input type="text" name='add' class="form-control" value="{{Auth::user()->profile->company_address}}" id="add">
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update Company Information</button>
</form>          

@endsection