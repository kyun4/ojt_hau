@extends('layouts.student_ui')
@section('title') Skills Updates @endsection
@section('content')
    <form action="" method="POST">
    @csrf
    
    
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="jobtitle">Skills</label>
                <div class="row">
                    <div class="col-md-12 ">
                        <input type="text" name="skills" class="form-control" id="" value="{{$skill->skill}}">
                    </div>
                </div>
            </div>
        </div>
        
    </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>          
    </div>
</div>

@endsection


@section('script')

@endsection