@extends('layouts.student_ui')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" style="text-transform: uppercase"></h6>
    </div>
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
    <form action="" method="POST">
    @csrf
    
    <label for="jobtitle">Work Experience</label>
    
    <div class="row" style="border:1px solid #CCC;padding:10px">
        <div class="col-md-12">
            <div class="form-group">
                <div class="row" >
                    <div class="col-md-12 ">
                        Position:
                        <input type="text" name="position" class="form-control" id="" value="{{$we->work_exp_position}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 ">
                        Company:
                        <input type="text" name="company" class="form-control" id="" value="{{$we->work_exp_company}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 ">
                        Address
                        <input type="text" name="address" class="form-control" id="" value="{{$we->work_exp_address}}">
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-12 ">
                    Work Dates
                    </div>
                    <div class="col-md-6 ">
                        <input type="text" name="workdates_s" class="form-control" id="" value="{{$we->work_exp_s_year}}">
                    </div>
                    <div class="col-md-6 ">
                        <input type="text" name="workdates_e" class="form-control" id="" value="{{$we->work_exp_e_year}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br />
  <button type="submit" class="btn btn-primary">Update</button>
</form>          
    </div>
</div>

@endsection


@section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
<script>
    $(".chosen-select").chosen({
    no_results_text: "Oops, nothing found!"
    })
</script>
@endsection