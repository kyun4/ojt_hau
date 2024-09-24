
<link href="http://localhost:8000/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<script src="http://localhost:8000/admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="http://localhost:8000/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="http://localhost:8000/admin/js/demo/datatables-demo.js"></script>







<div class="card">
    <div class="card-header text-white" style="background-color: #600;"><strong>NOT DEPLOYED STUDENTS</strong></div>
    <div class="card-body">
        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Student Number</th>
                    <th>Yr-Section</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students_table as $student)
                <tr onclick="window.open('/coor/student/profile/{{base64_encode($student->id)}}')" style="cursor: pointer">
                        <td>{{$student->student_number}}</td>
                        <td>{{$student->year}}-{{$student->section}}</td>
                        <td>{{$student->last_name}}</td>
                        <td>{{$student->first_name}}</td>
                        <td>{{$student->middle_name}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@section('script')
    <script src="{{asset('admin/vendor/chart.js/Chart.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            // Initialize DataTables for the tables in other sections
            $('#dataTable, #dataTableDeployedStudent, #dataTableCompletedStudent').DataTable();
        });
    </script>
@endsection
