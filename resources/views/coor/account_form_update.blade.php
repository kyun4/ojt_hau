@extends('layouts.ui')

@section('title') UPdate Coordinator: {{$account->profile->first_name}} {{$account->profile->middle_name}} {{$account->profile->last_name}} @endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="add"><strong>Complete Name</strong></label>
                        <div class="row">
                            <div class="col-md-4">
                                First Name
                                <input style='text-transform:uppercase;' required  type="text" name='first_name' class="form-control" value="{{$account->profile->first_name}}" id="add">
                            </div>
                            <div class="col-md-4">
                                Middle Name
                                <input style='text-transform:uppercase;' type="text" name='middle_name' class="form-control" value="{{$account->profile->middle_name}}" id="add">
                            </div>
                            <div class="col-md-4">
                                Last Name
                                <input style='text-transform:uppercase;' required  type="text" name='last_name' class="form-control" value="{{$account->profile->last_name}}" id="add">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name"><strong>Position</strong></label>
                        <input style='text-transform:uppercase;' type="text" required  name='position' class="form-control" value="{{$account->profile->company_position}}" id="name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name"><strong>Email</strong></label>
                        <input style='text-transform:lowercase;' type="email" required  name='email' class="form-control" value="{{$account->email}}" id="name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name"><strong>Company Name</strong></label>
                        <input type="text" name='name' class="form-control" required  value="{{$account->profile->company_name}}" id="name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="add"><strong>Company Address</strong></label>
                        <input type="text" name='add' class="form-control" required  value="{{$account->profile->company_address}}" id="add">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Partner's Information</button>
        </form>
    </div>
</div>
@endsection
@section('script')
    <script>
        function password_reset(id){
            var conf = confirm("Are you sure to reset the password?");
            if(conf == true) window.open('/admin/password/reset/'+id,'_parent');
        }
    </script>
@endsection