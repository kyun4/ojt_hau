@extends('layouts.partner_ui')
@section('title')
Applicant List ({{$job->title}})
@endsection
@section('content')
  
@php
    $jobskill_required = "";
@endphp



    <div class="table-responsive">

        <h6 class = "alert alert-secondary">
            <b>Required Skills</b><br/>
            @foreach ($jobskill as $job_skill)
                @php
                    $jobskill_required .= $job_skill->skill."\n";
                @endphp
            
                    {{ strtoupper($job_skill->skill) }}<br/>    
            
            @endforeach
        </h6>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th width='25%'>Full Name</th>
                    <th width='10%'>Skills</th>
                    <th>Job Match Percentage</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applicants as $applicant)
                @php
                    $total_rating = 0;
                    $student_skill_indicator = 0;
                @endphp
                @if ($applicant->status == "Approved")
                @else
                    <tr>
                        <td>{{$applicant->student->last_name}}, {{$applicant->student->first_name}}</td>

                            @php

                                $totalScore = 0;
                                $maxPossibleScore = 0;
                                $job_skill_indicator = 10;
                                $percentage = 0;

                                $skill_array = array();
                                $ndx = 0;

                                $skillset_string = "";                            

                                $job_desc = $job->job_descriptions;
                            

                            @endphp

                     

                            @foreach ($applicant->student->skill_tbl as $skill)

                                @php
                                
                                    $skill_item_value = $skill['skill'];                                
                                
                                    $skillset_string .= " ".$skill_item_value;                            

                                @endphp

                            @endforeach


                        <td>{{ $skillset_string }}</td>
                        <td>
                          

                            @php

                                $python_file = asset('python_files/identify_similarity.py');
                                $python_file_directory = getcwd()."\python_files\identify_similarity.py";
                                $python_file_sample_directory = getcwd()."\python_files\index.py";
                                $model_directory = getcwd()."\python_files\job_skills_word2vec.model";

                           
                                //$output = $python_file;
                                //$output = system("python ".$python_file_directory." 'mechanical engineer' 'mechanical engineer flowsimulation' 'hands-on experience' 'expert'");
                                //$output = system("python http://127.0.0.1:8000/python_files/index.py");
                                $output = system("python ".$python_file_directory." ".$model_directory." '".trim($jobskill_required)."' 'expert' '".$skillset_string."' 'expert'");
                                

                               
                             
                            @endphp

                            
                        </td>

                        <td>{{$applicant->status}}</td>
                        <td width='25%'>
                            <a href="/partners/student/profile/{{base64_encode($applicant->student->id)}}/{{base64_encode($applicant->job_id)}}"><button class="btn btn-primary btn-sm">Profile</button> </a>
                            @if ($applicant->status == "Recruited")
                                <button class="btn btn-success btn-sm" disabled>Recruited</button>
                                <button class="btn btn-success btn-sm" style="color: #ffffff" onclick="requirments('{{base64_encode($applicant->id)}}')">Requirements</button>
                            @elseif ($applicant->status == "Approved")
                                <button class="btn btn-success btn-sm" disabled>Recruited</button>
                                <button class="btn btn-success btn-sm" style="color: #ffffff" onclick="requirments('{{base64_encode($applicant->id)}}')">Requirements</button>
                            @else
                                <button class="btn btn-success btn-sm" onclick="recruit('{{base64_encode($applicant->student->id)}}','{{base64_encode($applicant->job_id)}}')">Recruit</button>
                            @endif
                        </td>
                    </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#dataTable_2').DataTable({
                "aaSorting": [[2, 'desc']]
            });
        });

        function recruit(applicant, job) {
            var conf = confirm('Are you sure to recruit this applicant?');
            if (conf == true) {
                location.replace('/partner/recruit/applicant/' + applicant + '/' + job);
            }
        }

        function requirments(id) {
            window.open('/partners/student/for/requirements/' + id, '_parent');
        }
    </script>
@endsection
