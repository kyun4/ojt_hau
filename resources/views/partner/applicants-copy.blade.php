@extends('layouts.partner_ui')
@section('title')
Applicant List ({{$job->title}})
@endsection

@section('content')
    @php
    require app_path('PHPW2V/src/Word2Vec.php');
    require app_path('PHPW2V/src/SoftmaxApproximators/NegativeSampling.php');

    use PHPW2V\Word2Vec;
    use PHPW2V\SoftmaxApproximators\NegativeSampling;

    $job_skills_w2v = array();

    foreach ($job->job_skills as $skill) {
        $job_skills_w2v[] = strtolower($skill->skill);
    }

    $remove = array('without', 'of', 'or', 'in', 'like', 'and', 'a', 'an', 'the', 'is', 'in', 'at', 'to', 'from', 'by', 'on', 'with', 'for', 'about', 'as', 'like', 'this', 'that', 'these', 'and', 'a', 'an', 'the', 'is', 'in', 'at', 'to', 'from', 'by', 'on', 'with', 'for', 'about', 'as', 'we', 'our', 'us', 'they', 'and', 'a', 'an', 'the', "is", "it's", 'its', 'he\'s', 'she\'s', 'they\'re', 'we\'ve', 'i\'m', 'you\'re', 'one', 'in', 'for', 'on', 'with', 'about', 'above', "is", "am", 'are', 'was', 'were', "have", "had", 'without', 'and', 'but', 'or', 'nor', 'for', 'yet', 'so', 'because', 'although', 'while', 'since', 'unless', 'until', 'whether', 'since', 'after', 'before', 'once', 'whenever', 'wherever', 'am', 'is', 'are', 'was', 'were', 'be', 'being', 'been', 'become', 'seem', 'look', 'feel', 'sound', 'taste', 'smell', 'appear', 'remain', 'grow', 'stay', 'turn');

    $dimensions     = 100; //vector dimension size
    $sampling       = new NegativeSampling; //Softmax Approximator
    $minWordCount   = 1; //minimum word count
    $alpha          = 0.01; //the learning rate
    $window         = 3; //window for skip-gram
    $epochs         = 500; //how many epochs to run
    $subsample      = 0.05; //the subsampling rate

    $word2vec = new Word2Vec($dimensions, $sampling, $window, $subsample,  $alpha, $epochs, $minWordCount);
    $word2vec->train($job_skills_w2v);
    $word2vec->save('my_word2vec_model');
    $word2vec = new Word2Vec();
    $word2vec = $word2vec->load('my_word2vec_model');
    @endphp

    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th width='25%'>Full Name</th>
                    <th>Total Ratings</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $job_skill = count($job->job_skills);
                    $job_skill_indicator = 100 / $job_skill;
                @endphp

                @foreach ($applicants as $applicant)
                    @php
                        $total_rating = 0;
                        $student_skill_indicator = 0;
                    @endphp

                    @if ($applicant->status != "Approved")
                        <tr>
                            <td>{{ $applicant->student->last_name }}, {{ $applicant->student->first_name }}</td>

                            <td>
                                @php
                                    $total = 0;
                                @endphp
                                @foreach ($applicant->student->skill_tbl as $skill)
                                    @php
                                        try {
                                            echo "Processing Skill: '".$skill->skill."'<br>";
                                            $skill_to_match = explode(" ", strtolower($skill->skill));
                                            $total_distance = 0;
                                            foreach ($skill_to_match as $word) {
                                                $mostSimilar = $word2vec->mostSimilar([$word]);
                                                // Check if the word has similar words
                                                if (count($mostSimilar) > 0) {
                                                    // Accumulate the cosine distances
                                                    foreach ($mostSimilar as $similarWord => $cosineDistance) {
                                                        $total_distance += $cosineDistance;
                                                    }
                                                }
                                            }
                                            // Calculate average cosine distance
                                            $average_distance = count($skill_to_match) > 0 ? $total_distance / count($skill_to_match) : 0;
                                            // Display the average cosine distance
                                            echo "Average Cosine Distance for Skill '".$skill->skill."': ".$average_distance."<br>";
                                        } catch (\Throwable $th) {
                                            // Log the error message
                                            echo "Error processing skill '".$skill->skill."': ".$th->getMessage()."<br>";
                                        }
                                    @endphp
                                @endforeach



                            </td>

                            <td>{{ $applicant->status }}</td>

                            <td>
                                <a href="/partners/student/profile/{{ base64_encode($applicant->student->id) }}/{{ base64_encode($applicant->job_id) }}"><button class="btn btn-primary btn-sm">Profile</button></a>

                                @if ($applicant->status != "Recruited")
                                    <button class="btn btn-success btn-sm" onclick="recruit('{{ base64_encode($applicant->student->id) }}','{{ base64_encode($applicant->job_id) }}')">Recruit</button>
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
            $('#dataTable_2').DataTable( {
                "aaSorting": [[2,'desc']]
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
