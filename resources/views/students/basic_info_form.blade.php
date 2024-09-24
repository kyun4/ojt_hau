@extends('layouts.student_ui')
@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary" style="text-transform: uppercase">Basic Information</h6>
    </div>
    <div class="card-body">
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
    <form action="" method="POST">
    @csrf

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="jobtitle">Specialization</label>
                <select name="specialization[]" multiple class="form-control chosen-select" id="" style="background-color: #FFF !important;padding:8px !important">
                    @foreach ($specializations as $specialization)
                        <option value="{{$specialization->id}}">{{$specialization->specialization}}</option>
                    @endforeach

                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="jobtitle">Program</label>
                <input type="text" name='program' class="form-control" id="jobtitle">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <label for="jobtitle">Year Graduated</label>
                <input type="number" name='year_grad' class="form-control" id="jobtitle">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="jobtitle">Location</label>
                <input type="text" name='location' class="form-control" id="jobtitle">
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label for="jobtitle">Salary Start Range</label>
                        <input type="number" name="salary_s" class="form-control" id="">
                    </div>
                    <div class="col-md-6">
                        <label for="jobtitle">Salary End Range</label>
                        <input type="number" name="salary_e" class="form-control" id="">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
<script>
    $(".chosen-select").chosen({
    no_results_text: "Oops, nothing found!"
    })
</script>
@endsection