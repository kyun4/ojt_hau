

<link href="http://localhost:8000/admin/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    
<script src="http://localhost:8000/admin/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="http://localhost:8000/admin/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="http://localhost:8000/admin/js/demo/datatables-demo.js"></script>



<div class="card">
    <div class="card-header text-white" style="background-color: #600;"><strong>COMPLETED</strong></div>
    <div class="card-body">

        @if (count($students) != 0)
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
                    @foreach ($students as $students)
                    <tr onclick="window.open('/coor/student/view/evaluation/{{base64_encode($students->student->id)}}')" style="cursor: pointer">
                        <td>{{$students->student->student_number}}</td>
                        <td>{{$students->student->year}}-{{$students->student->section}}</td>
                        <td>{{$students->student->last_name}}</td>
                        <td>{{$students->student->first_name}}</td>
                        <td>{{$students->student->middle_name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <center><small><strong>No Completed OJT</strong></small></center>
        @endif

        
    </div>
</div>
