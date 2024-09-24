<div class="card">
    <div class="card-header text-white" style="background-color: #600;"><strong>Applicants</strong></div>
    <div class="card-body">

        @if (count($applications) != 0)
            <table class="table table-hover">
                <tr>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Applying For</th>
                    <th>Status</th>
                </tr>
                @foreach ($applications as $application)
                <tr>
                    @php
                        $student = App\Student::find($application->student_id);
                        $job = App\Job::find($application->job_id);
                    @endphp
                    <td>{{ $student->last_name }}</td>
                    <td>{{ $student->first_name }}</td>
                    <td>{{ $job->position }}</td>
                    <td>{{ $application->status }}</td>
                </tr>
                @endforeach
            </table>
        @else
            <center><small><strong>No Applicants</strong></small></center>
        @endif
    </div>
</div>
