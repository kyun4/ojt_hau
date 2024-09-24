<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<form action="/partners/student/remarks/{{base64_encode($monitoring->id)}}" method="post">
    @csrf
  
    <div class="row">
        <div class="col-md-4">
            <strong>Date:</strong><br />
            {{$monitoring->date_log}}
        </div>
        <div class="col-md-4">
            <strong>Time-in:</strong><br />
            {{$monitoring->time_in}}
        </div>
        <div class="col-md-4">
            <strong>Time-out:</strong><br />
            {{$monitoring->time_out}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12"><br />
            <strong>Remarks:</strong>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 my-3">
            <select name="remarks" class="form-control" id="">
                <option value="Approved">Approved</option>
                <option value="Disapproved">Disapproved</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <textarea name="add_remarks" class="form-control" placeholder="Additional Remarks"></textarea>
        </div>
    </div>
<hr /> 
<div class="row">
    <div class="col-md-12">
        <button class="btn btn-primary">Submit Remarks</button>
    </div>
</div>
</form>