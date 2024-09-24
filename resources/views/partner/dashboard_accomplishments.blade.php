<div class="card">
    <div class="card-header text-white" style="background-color: #600;"><strong>STUDENT WEEKLY ACCOMPLSIHMENTS</strong></div>
    <div class="card-body">

        @if (count($accomplishments) != 0)
            <table class="table table-hover">
                <tr>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Date Start</th>
                    <th>Date End</th>
                    <th>Accomplishment</th>
                    <th>Hours Rendered</th>
                    <th>Action</th>
                </tr>
                @foreach ($accomplishments as $accomplishment)
                    <tr>
                        @php
                            $student = App\Student::find($accomplishment->student_id);
                        @endphp
                        <td>{{ $student->last_name }}</td>
                        <td>{{ $student->first_name }}</td>
                        <td>{{ $accomplishment->date_start }}</td>
                        <td>{{ $accomplishment->date_end }}</td>
                        <td><?= urldecode($accomplishment->accomplishment) ?></td>
                        <td>{{ $accomplishment->hours_rendered }}</td>
                        <td>
                            <script>
                                function approve(id){
                                    var conf = confirm("Are you sure to Approve this accomplishment?");
                                    if(conf == true) window.open('/partners/approve/accomplishments/'+id,'_parent');
                                }
                            </script>
                            @if($accomplishment->status == null && $accomplishment->hours_rendered != null)
                                <button title="Approve" class="btn btn-sm btn-success" style="color: #000" onclick="approve('{{base64_encode($accomplishment->id)}}')"><i class="fas fa-fw fa-check"></i></button>
                            @else
                                <button title="Approve" class="btn btn-sm btn-danger" style="color: #000" disabled><i class="fas fa-fw fa-check"></i></button>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        @else
            <center><small><strong>No accomplishments for approval</strong></small></center>
        @endif
    </div>
</div>
