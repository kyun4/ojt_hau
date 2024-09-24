<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PRACTICUM TRAINING AGREEMENT</title>


</head>
<body>
    <table width='100%'>
        <tr>
         <td width='20%'><img src="{{ public_path('img/letter/logo.jpg') }}" alt=""></td>
         <td>
             <center>
                 <strong>HOLY ANGEL UNIVERSITY</strong><br />
                 <small>SCHOOL OF COMPUTING</small>
             </center>
         </td>
         <td width='20%' align="right"><img src="{{ public_path('img/letter/soc-logo.jpg') }}" alt=""></td>
        </tr>
     </table>
    <center>
        <h4>
            PRACTICUM TRAINING AGREEMENT
        </h4>
    </center>
    <p>
    </p>
    <p align="justify">
        I, <u>&nbsp;{{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}&nbsp;</u>, _______ years of age, Filipino, single/married with residence and postal address at {{ucwords(strtolower($student->address))}}  is a bonafide student of Holy Angel University, Angeles City.
    </p>
	<p align="justify">
        In compliance with the curriculum requirement of my course in <u>{{$student->program}}</u>, I have to complete _______ hours of IT Training at {{$job->user->profile->company_name}}
        located at {{$job->user->profile->company_address}}
    </p>
	<p>
        The said establishment has granted me the privilege to undergo actual office practice and agree with the following terms and conditions:
        <ol type="1">
            <li>I will be responsible for my acts during my training at all times</li>
            <li>That Holy Angel University and the abovementioned establishment will not be held liable for any injury/illness/damages as a result of my negligence that may occur during my Practicum Training period.</li>
            <li>I will observe the rules of etiquette at all times.  I will follow the rules and regulations pertinent to practicum training as discussed by the practicum coordinator during orientation.</li>
            <li>I am aware that any violation of the rules and regulation and any form of misdemeanor may result to disciplinary action depending upon the gravity of the said misdemeanor.</li>
        </ol>
    </p>
    <br />
    <br />
    <table width='100%'>
        <tr>
            <td width='50%'  align="center" style="text-transform: uppercase"><br /><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$student->first_name}} {{$student->middle_name}}. {{$student->last_name}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
            <td  align="center">
                <br />
                <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{date('F d, Y')}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
            </td>
        </tr>
        <tr>
            <td align="center">Signature of Student over Printed Name</td>
            <td align="center">Date</td>
        </tr>
    </table>
    <br />
    <br />
    <center>
        CONFORME
    </center>

    <br />
    <br />
    <table width='100%'>
        <tr>
            <td width='50%'  align="center" style="text-transform: uppercase"><br /><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                @if (isset($student->parent_middle_name[0]))
                    @php
                        $middle_name = $student->parent_middle_name[0].".";
                    @endphp
                @else
                    @php
                        $middle_name = '';
                    @endphp
                @endif
                {{$student->parent_first_name}} {{$middle_name}} {{$student->parent_last_name}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>

            <td  align="center"><br />
                <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$student->school->signatory->first_name}} @if($student->school->signatory->middle_name)
                    {{$student->school->signatory->middle_name}}
                @endif
                 {{$student->school->signatory->last_name}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
            </td>
        </tr>
        <tr>
            <td align="center">Signature of Parent/Guardian over Printed Name</td>
            <td align="center">Signature of School Practicum Coordinator</td>
        </tr>
    </table>
    <br />
    <br />
    <center>
        <u style="text-transform: uppercase">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$job->user->profile->first_name}}
            @if(isset($job->user->profile->middle_name) && !empty($job->user->profile->middle_name))
                {{$job->user->profile->middle_name[0]}}.
            @endif
            {{$job->user->profile->last_name}}
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </u><br />
        {{-- <u style="text-transform: uppercase">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$job->user->profile->first_name}} {{$job->user->profile->middle_name[0]}}. {{$job->user->profile->last_name}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
        <br /> --}}
        Company Representative or Officer-in-Charge
    </center>

</body>
</html>
