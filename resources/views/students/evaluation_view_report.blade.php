<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">
                <tr>
                    <th rowspan="2">Factors</th>
                    <th colspan="5" class="selections">Ratings</th>
                </tr>
                <tr>

                    <th class="selections">5</th>
                    <th class="selections">4</th>
                    <th class="selections">3</th>
                    <th class="selections">2</th>
                    <th class="selections">1</th>
                </tr>
                <tr>
                    <td colspan="6"><strong>I.	COMPETENCE & PRODUCTIVITY</strong></td>
                </tr>
                <tr>
                    <td colspan="6"><strong>A.	Quality of Work</strong></td>
                </tr>
                <tr>
                    <td style="text-indent: 15px">Work Performance</td>

                    <td align="center"> @if ($evaluation->rating_1 == '5')  <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_1 == '4') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_1 == '3') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_1 == '2') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_1 == '1') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                </tr>
                <tr>
                    <td style="text-indent: 15px">Work Output</td>
                    <td align="center"> @if ($evaluation->rating_2 == '5')  <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_2 == '4') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_2 == '3') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_2 == '2') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_2 == '1') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                </tr>
                <tr>
                    <td colspan="6"><strong>B.	Quality of Work</strong></td>
                </tr>
                <tr>
                    <td style="text-indent: 15px">Volume of Output</td>
                    <td align="center"> @if ($evaluation->rating_3 == '5')  <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_3 == '4') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_3 == '3') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_3 == '2') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_3 == '1') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                </tr>
                <tr>
                    <td style="text-indent: 15px">Promptness (with which work is completed)</td>
                    <td align="center"> @if ($evaluation->rating_4 == '5')  <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_4 == '4') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_4 == '3') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_4 == '2') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_4 == '1') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                </tr>
                <tr>
                    <td colspan="6"><strong>C.	Conservation of Resources</strong></td>
                </tr>
                <tr>
                    <td style="text-indent: 15px">Use of Company Resources</td>
                    <td align="center"> @if ($evaluation->rating_5 == '5')  <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_5 == '4') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_5 == '3') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_5 == '2') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_5 == '1') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                </tr>
                <tr>
                    <td style="text-indent: 15px">Optimum Use of Facilities & Equipment</td>
                    <td align="center"> @if ($evaluation->rating_6 == '5')  <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_6 == '4') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_6 == '3') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_6 == '2') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_6 == '1') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                </tr>

                <tr>
                    <td colspan="6"><strong>II.	WORK ATTITUUDE</strong></td>
                </tr>
                <tr>
                    <td colspan="6"><strong>A.	Dependability</strong></td>
                </tr>
                <tr>
                    <td style="text-indent: 15px">Reliability in Assigned Task</td>
                    <td align="center"> @if ($evaluation->rating_7 == '5')  <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_7 == '4') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_7 == '3') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_7 == '2') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_7 == '1') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                </tr>
                <tr>
                    <td style="text-indent: 15px">Keeping Confidentiality of Information</td>
                    <td align="center"> @if ($evaluation->rating_8 == '5')  <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_8 == '4') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_8 == '3') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_8 == '2') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_8 == '1') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                </tr>
                <tr>
                    <td colspan="6"><strong>B.	Initiative, Creativity & Enthusiasm</strong></td>
                </tr>
                <tr>
                    <td style="text-indent: 15px">Development of Ideas</td>
                    <td align="center"> @if ($evaluation->rating_9 == '5')  <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_9 == '4') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_9 == '3') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_9 == '2') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_9 == '1') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                </tr>
                <tr>
                    <td style="text-indent: 15px">Interest In Work</td>
                    <td align="center"> @if ($evaluation->rating_10 == '5')  <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_10 == '4') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_10 == '3') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_10 == '2') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_10 == '1') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                </tr>
                <tr>
                    <td colspan="6"><strong>C.	Professionalism & Courtesy</strong></td>
                </tr>
                <tr>
                    <td style="text-indent: 15px">Regard to Authority</td>
                    <td align="center"> @if ($evaluation->rating_11 == '5')  <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_11 == '4') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_11 == '3') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_11 == '2') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_11 == '1') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                </tr>
                <tr>
                    <td style="text-indent: 15px">Public Relations</td>
                    <td align="center"> @if ($evaluation->rating_12 == '5')  <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_12 == '4') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_12 == '3') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_12 == '2') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_12 == '1') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                </tr>
                <tr>
                    <td style="text-indent: 15px">Courtesy with Peers</td>
                    <td align="center"> @if ($evaluation->rating_13 == '5')  <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_13 == '4') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_13 == '3') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_13 == '2') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_13 == '1') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                </tr>
                <tr>
                    <td style="text-indent: 15px">Personal Conduct</td>
                    <td align="center"> @if ($evaluation->rating_14 == '5')  <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_14 == '4') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_14 == '3') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_14 == '2') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_14 == '1') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                </tr>
                <tr>
                    <td colspan=""><strong>D.	Cooperation</strong></td>
                    <td align="center"> @if ($evaluation->rating_15 == '5')  <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_15 == '4') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_15 == '3') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_15 == '2') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_15 == '1') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                </tr>
                <tr>
                    <td colspan=""><strong>E.	Openness to Suggestions & New Ideas</strong></td>
                    <td align="center"> @if ($evaluation->rating_16 == '5')  <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_16 == '4') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_16 == '3') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_16 == '2') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_16 == '1') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                </tr>
                <tr>
                    <td colspan=""><strong>F.	Interpersonal Relationship</strong></td>
                    <td align="center"> @if ($evaluation->rating_17 == '5')  <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_17 == '4') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_17 == '3') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_17 == '2') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_17 == '1') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                </tr>
                <tr>
                    <td colspan="6"><strong>G.	Health & Grooming</strong></td>
                </tr>
                <tr>
                    <td style="text-indent: 15px">Vitality & Energy</td>
                    <td align="center"> @if ($evaluation->rating_18 == '5')  <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_18 == '4') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_18 == '3') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_18 == '2') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_18 == '1') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                </tr>
                <tr>
                    <td style="text-indent: 15px">Grooming</td>
                    <td align="center"> @if ($evaluation->rating_19 == '5')  <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_19 == '4') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_19 == '3') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_19 == '2') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_19 == '1') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                </tr>
                <tr>
                    <td colspan="6"><strong>III.	COMMITMENT TO & COMPLIANCE TO COMPANY RULES</strong></td>
                </tr>
                <tr>
                    <td style="text-indent: 15px">Attendance</td>
                    <td align="center"> @if ($evaluation->rating_20 == '5')  <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_20 == '4') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_20 == '3') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_20 == '2') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_20 == '1') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                </tr>
                <tr>
                    <td style="text-indent: 15px">Punctuality</td>
                    <td align="center"> @if ($evaluation->rating_21 == '5')  <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_21 == '4') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_21 == '3') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_21 == '2') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_21 == '1') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                </tr>
                <tr>
                    <td style="text-indent: 15px">Observance oof Rules & Procedures</td>
                    <td align="center"> @if ($evaluation->rating_22 == '5')  <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_22 == '4') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_22 == '3') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_22 == '2') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_22 == '1') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                </tr>
                <tr>
                    <td style="text-indent: 15px">Housekeeping</td>
                    <td align="center"> @if ($evaluation->rating_23 == '5')  <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_23 == '4') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_23 == '3') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_23 == '2') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                    <td align="center"> @if ($evaluation->rating_23 == '1') <i class="fas fa-fw fa-check"></i> @else @endif </td>
                </tr>
            </table>
        </div>
        <div class="col-md-12">
            <label for="remarks">Remarks/Comments/Suggestions: </label>
            <p>{{$evaluation->remarks}}</p>
        </div>
        <div class="col-md-12">
            <label for="remarks">Total Evaluation: </label>
            <p>
                @php
                    $total_eval =   ($evaluation->rating_1 +
                                    $evaluation->rating_2 +
                                    $evaluation->rating_3 +
                                    $evaluation->rating_4 +
                                    $evaluation->rating_5 +
                                    $evaluation->rating_6 +
                                    $evaluation->rating_7 +
                                    $evaluation->rating_8 +
                                    $evaluation->rating_9 +
                                    $evaluation->rating_10 +
                                    $evaluation->rating_11 +
                                    $evaluation->rating_12 +
                                    $evaluation->rating_13 +
                                    $evaluation->rating_14 +
                                    $evaluation->rating_15 +
                                    $evaluation->rating_16 +
                                    $evaluation->rating_17 +
                                    $evaluation->rating_18 +
                                    $evaluation->rating_19 +
                                    $evaluation->rating_20 +
                                    $evaluation->rating_21 +
                                    $evaluation->rating_22 +
                                    $evaluation->rating_23 ) / 23;
                @endphp
                {{number_format($total_eval,2,".",",")}}
            </p>
        </div>
    </div>
</div>
</body>
</html>
