<div class="card">
    <div class="card-header text-white" style="background-color: #600;"><strong>COMPLETED TRAINEE</strong></div>
    <div class="card-body">

        @if (count($students) != 0)
            <table class="table table-hover">
                <tr>
                    <th>Student Number</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                </tr>
                    @foreach ($students as $students)
                    <tr>
                        <td>{{$students->student->student_number}}</td>
                        <td>{{$students->student->last_name}}</td>
                        <td>{{$students->student->first_name}}</td>
                        <td>{{$students->student->middle_name}}</td>
                    </tr>
                    @endforeach
            </table>
        @else
            <center><small><strong>No Completed Trainee</strong></small></center>
        @endif

        
    </div>
</div>