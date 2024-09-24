@extends('layouts.partner_ui')
@section('css')
    <style>
        .selections{
            text-align: center
        }
    </style>
@endsection
@section('title')
Evaluation Form: {{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}
@endsection
@section('content')
   <div class="row">
        <form action="" method="post">
            @csrf
            <div class="col-md-12">
                <h4>Instructions: Please rate the student according to the given scale. Indicate your answer by the column that corresponds to your observation.</h4>
            </div>
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
                        <td class="selections"><input type="radio" name="rating_1" value="5" /></td>
                        <td class="selections"><input type="radio" name="rating_1" value="4" /></td>
                        <td class="selections"><input type="radio" name="rating_1" value="3" /></td>
                        <td class="selections"><input type="radio" name="rating_1" value="2" /></td>
                        <td class="selections"><input type="radio" name="rating_1" value="1" /></td>
                    </tr>
                    <tr>
                        <td style="text-indent: 15px">Work Output</td>
                        <td class="selections"><input type="radio" name="rating_2" value="5"  /></td>
                        <td class="selections"><input type="radio" name="rating_2" value="4" /></td>
                        <td class="selections"><input type="radio" name="rating_2" value="3" /></td>
                        <td class="selections"><input type="radio" name="rating_2" value="2" /></td>
                        <td class="selections"><input type="radio" name="rating_2" value="1" /></td>
                    </tr>
                    <tr>
                        <td colspan="6"><strong>B.	Quality of Work</strong></td>
                    </tr>
                    <tr>
                        <td style="text-indent: 15px">Volume of Output</td>
                        <td class="selections"><input type="radio" name="rating_3" value="5"  /></td>
                        <td class="selections"><input type="radio" name="rating_3" value="4" /></td>
                        <td class="selections"><input type="radio" name="rating_3" value="3" /></td>
                        <td class="selections"><input type="radio" name="rating_3" value="2" /></td>
                        <td class="selections"><input type="radio" name="rating_3" value="1" /></td>
                    </tr>
                    <tr>
                        <td style="text-indent: 15px">Promptness (with which work is completed)</td>
                        <td class="selections"><input type="radio" name="rating_4" value="5"  /></td>
                        <td class="selections"><input type="radio" name="rating_4" value="4" /></td>
                        <td class="selections"><input type="radio" name="rating_4" value="3" /></td>
                        <td class="selections"><input type="radio" name="rating_4" value="2" /></td>
                        <td class="selections"><input type="radio" name="rating_4" value="1" /></td>
                    </tr>
                    <tr>
                        <td colspan="6"><strong>C.	Conservation of Resources</strong></td>
                    </tr>
                    <tr>
                        <td style="text-indent: 15px">Use of Company Resources</td>
                        <td class="selections"><input type="radio" name="rating_5" value="5"  /></td>
                        <td class="selections"><input type="radio" name="rating_5" value="4" /></td>
                        <td class="selections"><input type="radio" name="rating_5" value="3" /></td>
                        <td class="selections"><input type="radio" name="rating_5" value="2" /></td>
                        <td class="selections"><input type="radio" name="rating_5" value="1" /></td>
                    </tr>
                    <tr>
                        <td style="text-indent: 15px">Optimum Use of Facilities & Equipment</td>
                        <td class="selections"><input type="radio" name="rating_6" value="5"  /></td>
                        <td class="selections"><input type="radio" name="rating_6" value="4" /></td>
                        <td class="selections"><input type="radio" name="rating_6" value="3" /></td>
                        <td class="selections"><input type="radio" name="rating_6" value="2" /></td>
                        <td class="selections"><input type="radio" name="rating_6" value="1" /></td>
                    </tr>
                    
                    <tr>
                        <td colspan="6"><strong>II.	WORK ATTITUUDE</strong></td>
                    </tr>
                    <tr>
                        <td colspan="6"><strong>A.	Dependability</strong></td>
                    </tr>
                    <tr>
                        <td style="text-indent: 15px">Reliability in Assigned Task</td>
                        <td class="selections"><input type="radio" name="rating_7" value="5"  /></td>
                        <td class="selections"><input type="radio" name="rating_7" value="4" /></td>
                        <td class="selections"><input type="radio" name="rating_7" value="3" /></td>
                        <td class="selections"><input type="radio" name="rating_7" value="2" /></td>
                        <td class="selections"><input type="radio" name="rating_7" value="1" /></td>
                    </tr>
                    <tr>
                        <td style="text-indent: 15px">Keeping Confidentiality of Information</td>
                        <td class="selections"><input type="radio" name="rating_8" value="5"  /></td>
                        <td class="selections"><input type="radio" name="rating_8" value="4" /></td>
                        <td class="selections"><input type="radio" name="rating_8" value="3" /></td>
                        <td class="selections"><input type="radio" name="rating_8" value="2" /></td>
                        <td class="selections"><input type="radio" name="rating_8" value="1" /></td>
                    </tr>
                    <tr>
                        <td colspan="6"><strong>B.	Initiative, Creativity & Enthusiasm</strong></td>
                    </tr>
                    <tr>
                        <td style="text-indent: 15px">Development of Ideas</td>
                        <td class="selections"><input type="radio" name="rating_9" value="5"  /></td>
                        <td class="selections"><input type="radio" name="rating_9" value="4" /></td>
                        <td class="selections"><input type="radio" name="rating_9" value="3" /></td>
                        <td class="selections"><input type="radio" name="rating_9" value="2" /></td>
                        <td class="selections"><input type="radio" name="rating_9" value="1" /></td>
                    </tr>
                    <tr>
                        <td style="text-indent: 15px">Interest In Work</td>
                        <td class="selections"><input type="radio" name="rating_10" value="5"  /></td>
                        <td class="selections"><input type="radio" name="rating_10" value="4" /></td>
                        <td class="selections"><input type="radio" name="rating_10" value="3" /></td>
                        <td class="selections"><input type="radio" name="rating_10" value="2" /></td>
                        <td class="selections"><input type="radio" name="rating_10" value="1" /></td>
                    </tr>
                    <tr>
                        <td colspan="6"><strong>C.	Professionalism & Courtesy</strong></td>
                    </tr>
                    <tr>
                        <td style="text-indent: 15px">Regard to Authority</td>
                        <td class="selections"><input type="radio" name="rating_11" value="5"  /></td>
                        <td class="selections"><input type="radio" name="rating_11" value="4" /></td>
                        <td class="selections"><input type="radio" name="rating_11" value="3" /></td>
                        <td class="selections"><input type="radio" name="rating_11" value="2" /></td>
                        <td class="selections"><input type="radio" name="rating_11" value="1" /></td>
                    </tr>
                    <tr>
                        <td style="text-indent: 15px">Public Relations</td>
                        <td class="selections"><input type="radio" name="rating_12" value="5"  /></td>
                        <td class="selections"><input type="radio" name="rating_12" value="4" /></td>
                        <td class="selections"><input type="radio" name="rating_12" value="3" /></td>
                        <td class="selections"><input type="radio" name="rating_12" value="2" /></td>
                        <td class="selections"><input type="radio" name="rating_12" value="1" /></td>
                    </tr>
                    <tr>
                        <td style="text-indent: 15px">Courtesy with Peers</td>
                        <td class="selections"><input type="radio" name="rating_13" value="5"  /></td>
                        <td class="selections"><input type="radio" name="rating_13" value="4" /></td>
                        <td class="selections"><input type="radio" name="rating_13" value="3" /></td>
                        <td class="selections"><input type="radio" name="rating_13" value="2" /></td>
                        <td class="selections"><input type="radio" name="rating_13" value="1" /></td>
                    </tr>
                    <tr>
                        <td style="text-indent: 15px">Personal Conduct</td>
                        <td class="selections"><input type="radio" name="rating_14" value="5"  /></td>
                        <td class="selections"><input type="radio" name="rating_14" value="4" /></td>
                        <td class="selections"><input type="radio" name="rating_14" value="3" /></td>
                        <td class="selections"><input type="radio" name="rating_14" value="2" /></td>
                        <td class="selections"><input type="radio" name="rating_14" value="1" /></td>
                    </tr>
                    <tr>
                        <td colspan=""><strong>D.	Cooperation</strong></td>
                        <td class="selections"><input type="radio" name="rating_15" value="5"  /></td>
                        <td class="selections"><input type="radio" name="rating_15" value="4" /></td>
                        <td class="selections"><input type="radio" name="rating_15" value="3" /></td>
                        <td class="selections"><input type="radio" name="rating_15" value="2" /></td>
                        <td class="selections"><input type="radio" name="rating_15" value="1" /></td>
                    </tr>
                    <tr>
                        <td colspan=""><strong>E.	Openness to Suggestions & New Ideas</strong></td>
                        <td class="selections"><input type="radio" name="rating_16" value="5"  /></td>
                        <td class="selections"><input type="radio" name="rating_16" value="4" /></td>
                        <td class="selections"><input type="radio" name="rating_16" value="3" /></td>
                        <td class="selections"><input type="radio" name="rating_16" value="2" /></td>
                        <td class="selections"><input type="radio" name="rating_16" value="1" /></td>
                    </tr>
                    <tr>
                        <td colspan=""><strong>F.	Interpersonal Relationship</strong></td>
                        <td class="selections"><input type="radio" name="rating_17" value="5"  /></td>
                        <td class="selections"><input type="radio" name="rating_17" value="4" /></td>
                        <td class="selections"><input type="radio" name="rating_17" value="3" /></td>
                        <td class="selections"><input type="radio" name="rating_17" value="2" /></td>
                        <td class="selections"><input type="radio" name="rating_17" value="1" /></td>
                    </tr>
                    <tr>
                        <td colspan="6"><strong>G.	Health & Grooming</strong></td>
                    </tr>
                    <tr>
                        <td style="text-indent: 15px">Vitality & Energy</td>
                        <td class="selections"><input type="radio" name="rating_18" value="5"  /></td>
                        <td class="selections"><input type="radio" name="rating_18" value="4" /></td>
                        <td class="selections"><input type="radio" name="rating_18" value="3" /></td>
                        <td class="selections"><input type="radio" name="rating_18" value="2" /></td>
                        <td class="selections"><input type="radio" name="rating_18" value="1" /></td>
                    </tr>
                    <tr>
                        <td style="text-indent: 15px">Grooming</td>
                        <td class="selections"><input type="radio" name="rating_19" value="5"  /></td>
                        <td class="selections"><input type="radio" name="rating_19" value="4" /></td>
                        <td class="selections"><input type="radio" name="rating_19" value="3" /></td>
                        <td class="selections"><input type="radio" name="rating_19" value="2" /></td>
                        <td class="selections"><input type="radio" name="rating_19" value="1" /></td>
                    </tr>
                    <tr>
                        <td colspan="6"><strong>III.	COMMITMENT TO & COMPLIANCE TO COMPANY RULES</strong></td>
                    </tr>
                    <tr>
                        <td style="text-indent: 15px">Attendance</td>
                        <td class="selections"><input type="radio" name="rating_20" value="5"  /></td>
                        <td class="selections"><input type="radio" name="rating_20" value="4" /></td>
                        <td class="selections"><input type="radio" name="rating_20" value="3" /></td>
                        <td class="selections"><input type="radio" name="rating_20" value="2" /></td>
                        <td class="selections"><input type="radio" name="rating_20" value="1" /></td>
                    </tr>
                    <tr>
                        <td style="text-indent: 15px">Punctuality</td>
                        <td class="selections"><input type="radio" name="rating_21" value="5"  /></td>
                        <td class="selections"><input type="radio" name="rating_21" value="4" /></td>
                        <td class="selections"><input type="radio" name="rating_21" value="3" /></td>
                        <td class="selections"><input type="radio" name="rating_21" value="2" /></td>
                        <td class="selections"><input type="radio" name="rating_21" value="1" /></td>
                    </tr>
                    <tr>
                        <td style="text-indent: 15px">Observance oof Rules & Procedures</td>
                        <td class="selections"><input type="radio" name="rating_22" value="5"  /></td>
                        <td class="selections"><input type="radio" name="rating_22" value="4" /></td>
                        <td class="selections"><input type="radio" name="rating_22" value="3" /></td>
                        <td class="selections"><input type="radio" name="rating_22" value="2" /></td>
                        <td class="selections"><input type="radio" name="rating_22" value="1" /></td>
                    </tr>
                    <tr>
                        <td style="text-indent: 15px">Housekeeping</td>
                        <td class="selections"><input type="radio" name="rating_23" value="5"  /></td>
                        <td class="selections"><input type="radio" name="rating_23" value="4" /></td>
                        <td class="selections"><input type="radio" name="rating_23" value="3" /></td>
                        <td class="selections"><input type="radio" name="rating_23" value="2" /></td>
                        <td class="selections"><input type="radio" name="rating_23" value="1" /></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-12">
                <label for="remarks">Remarks/Comments/Suggestions: </label>
                <textarea name="remarks" id="remarks" class="form-control" rows="3"></textarea>
            </div>
            <div class="col-md-12 my-4">
                <button class="btn btn-primary" type="submit">Submit Evaluation</button>
            </div>
        </form>
    </div>
@endsection
