@extends('layouts.ui')

@section('title') UPLOADING PREVIEW @endsection
@section('content')

    <form action="/coor/student/save" method="post">
        @if (!(count($students->rows()) <= 1))

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Student Number</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Year Level</th>
                    <th>Section</th>
                    <th>Program</th>
                </tr>
            </thead>
            <tbody>
                @csrf
                @php $row = 0; @endphp
                @foreach ($students->rows() as $student_data)
                <tr>
                    @if ($row != 0)
                        <td>
                            {{strtoupper($student_data[0])}}
                            <input type="hidden" name="student_number[]" value="{{strtoupper($student_data[0])}}">
                        </td>
                        <td>
                            {{strtoupper($student_data[1])}}
                            <input type="hidden" name="last_name[]" value="{{strtoupper($student_data[1])}}">
                        </td>
                        <td>
                            {{strtoupper($student_data[2])}}
                            <input type="hidden" name="first_name[]" value="{{strtoupper($student_data[2])}}">
                        </td>
                        <td>
                            {{strtoupper($student_data[3])}}
                            <input type="hidden" name="middle_name[]" value="{{strtoupper($student_data[3])}}">
                        </td>
                        <td>
                            {{strtoupper($student_data[4])}}
                            <input type="hidden" name="year[]" value="{{strtoupper($student_data[4])}}">
                        </td>
                        <td>
                            {{strtoupper($student_data[5])}}
                            <input type="hidden" name="section[]" value="{{strtoupper($student_data[5])}}">
                        </td>
                        <td>
                            {{strtoupper($student_data[6])}}
                            <input type="hidden" name="program[]" value="{{strtoupper($student_data[6])}}">
                        </td>
                        @endif
                    </tr>
                    @php $row++; @endphp
                @endforeach
            </tbody>
        </table>
        @if ($row != 0)
            <br />
            <button type="submit" class="btn btn-primary">Save Students</button>
        @endif

        @else
        <h3>Uploaded Excel has no data!</h3>
        @endif
    </form>
@endsection
