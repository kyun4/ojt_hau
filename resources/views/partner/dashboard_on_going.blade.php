<div class="card">
    <div class="card-header text-white" style="background-color: #600;"><strong>ON-GOING TRAINEE</strong></div>
    <div class="card-body">
        <table class="table table-hover">
            <tr>
                <th>Student Number</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Hours Rendereds</th>
            </tr>
            <tr>

                @foreach ($students as $students)
                <tr>
                    {{-- <td>{{$students->student->student_number}}</td>
                    <td>{{$students->student->last_name}}</td>
                    <td>{{$students->student->first_name}}</td>
                    <td>{{$students->student->middle_name}}</td>
                    <td>{{ $student->total_times }}</td> --}}

                    <td>{{$students->student->student_number}}</td>
                    <td>{{$students->student->last_name}}</td>
                    <td>{{$students->student->first_name}}</td>
                    <td>{{$students->student->middle_name}}</td>
                    <td>{{$total_times }}</td>
                </tr>
                @endforeach
            </tr>
        </table>
    </div>
</div>

