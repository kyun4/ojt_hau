@extends('layouts.ui')

@section('title') New Partner's Institution:@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <form method="POST" action="" enctype="multipart/form-data">
            @csrf
            
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name"><strong>Username</strong></label>
                        <input style='' type="text" name='username' required  class="form-control"  id="name">
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
                                <input style='text-transform:uppercase;' required type="text" name='first_name' class="form-control"  id="add">
                            </div>
                            <div class="col-md-4">
                                Middle Name
                                <input style='text-transform:uppercase;' type="text" name='middle_name' class="form-control"  id="add">
                            </div>
                            <div class="col-md-4">
                                Last Name
                                <input style='text-transform:uppercase;' required type="text" name='last_name' class="form-control"  id="add">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name"><strong>Position</strong></label>
                        <input style='text-transform:uppercase;' type="text" name='position' class="form-control" required   id="name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name"><strong>Email</strong></label>
                        <input style='text-transform:lowercase;' type="email" name='email' class="form-control" required  id="name">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name"><strong>Company Name</strong></label>
                        <input type="text" name='name' class="form-control" required   id="name">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="add"><strong>Company Address</strong></label>
                        <input type="text" name='add' required  class="form-control" id="add">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create Partner's Information</button>
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