<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Waiver</title>
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
            WAIVER
        </h4>
    </center>

    <p align="justify">
        I, <u>{{Auth::user()->student->first_name}} {{Auth::user()->student->middle_name}} {{Auth::user()->student->last_name}}</u>, do hereby, in compliance to the requirements of the Practicum/Internship Program of the School of Computing voluntarily undergo actual office practice in a work from home arrangements and agree with the following terms and conditions:
    </p>
    <ol type="1">
        <li>That Holy Angel University and the abovementioned establishment will not be held liable for any injury/illness/damages as a result of my negligence that may occur during my Practicum Training period.</li>
        <li>I will observe the rules of etiquette at all times.  I will follow the rules and regulations pertinent to practicum training as discussed by the practicum coordinator and by the supervisor during orientation.</li>
        <li>I am aware that any violation of the rules and regulation and any form of misdemeanor may result to disciplinary action depending upon the gravity of the said misdemeanor.</li>
        <li>I will be responsible for my acts during my training in a work from home setup and deliver the outputs expected from me given by my supervisor</li>
    </ol>
    <br />
    <br />
    <center>
        <strong>CONFORME</strong>
    </center>
                @if (isset($student->school->signatory->middle_name[0]))
                    @php
                        $school_sig_middle = $student->school->signatory->middle_name[0].".";
                    @endphp
                @else
                    @php
                        $school_sig_middle = '';
                    @endphp
                @endif
    <br />
    <table width='100%'>
        <tr>
            <td width='50%'  align="center" style="text-transform: uppercase"><br />

                @if (isset(Auth::user()->student->middle_name[0]))
                    @php
                        $middle_name_student = Auth::user()->student->middle_name[0].".";
                    @endphp
                @else
                    @php
                        $middle_name_student = '';
                    @endphp
                @endif


                @if (isset(Auth::user()->student->parent_middle_name[0]))
                    @php
                        $middle_name_parent = Auth::user()->student->parent_middle_name[0].".";
                    @endphp
                @else
                    @php
                        $middle_name_parent = '';
                    @endphp
                @endif

                <small><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Auth::user()->student->first_name}} {{$middle_name_student}}. {{Auth::user()->student->last_name}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></small>
            </td>
            <td  align="center">
                <br />
                <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
            </td>
        </tr>
        <tr>
            <td align="center">
                STUDENT TRAINEE<br />
                <small><em>Printed Name, Signature & Date</em></small>

            </td>
            <td align="center">
                SUPERVISOR<br />
                <small><em>Printed Name, Signature & Date</em></small>

            </td>
        </tr>
    </table>

    <br />
    <br />
    <center>
        <strong>APPROVALS</strong>
    </center>


    <table width='100%' >
        <tr>
            <td width='50%'  align="center" style="text-transform: uppercase"><br />
                <br />
                <br />
                <small><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Auth::user()->student->parent_first_name}} {{$middle_name_parent}} {{Auth::user()->student->parent_last_name}},  (__/__/__)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></small>
            </td>
            <td  align="center">
                <br />
                <br />
                <br />
               
               
                    @php
                        $signatory_firstname = "";
                        $signatory_middlename = "";
                        $signatory_lastname = "";
                        $signatory_position = "";
                    @endphp

                    @if(isset($student->school->signatory->first_name))

                       @php
                            $signatory_position = $student->school->signatory->position;
                            $signatory_firstname = $student->school->signatory->first_name;
                       @endphp
                        
                    @endif

                    @if(isset($student->school->signatory->middle_name))

                        @php
                            $signatory_middlename = $student->school->signatory->middle_name;
                        @endphp
                    
                    @endif

                    @if(isset($student->school->signatory->last_name))

                        @php
                            $signatory_lastname = $student->school->signatory->last_name;
                        @endphp
                        
                    @endif
               
                @if($signatory_firstname != "")

                    @if($signatory_position == "Coordinator")
                     <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$signatory_firstname}} {{$signatory_middlename}} {{$signatory_lastname}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
                    @endif

                @else

                    <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
              
                @endif
               
            </td>
        </tr>
        <tr>
            <td align="center">
                STUDENT’S PARENTS<br />
                <small><em>Printed Name, Signature & Date</em></small>

            </td>
            <td align="center">
                PRACTICUM COORDINATOR<br />
                <small><em>Printed Name, Signature & Date</em></small>

            </td>
        </tr>
        <tr>
            <td  align="center">
                <br />
                <br />
                <br />
                <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (__/__/__)&nbsp;&nbsp;</u>
            </td>
            <td  align="center">
                <br />
                <br />
                <br />
                <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; (__/__/__)&nbsp;&nbsp;</u>
            </td>
        </tr>
        <tr>
            <td align="center">
                SCHOOL DEAN<br />
                <small><em>Printed Name, Signature & Date</em></small>

            </td>
            <td align="center">
                DIRECTOR (COMPANY)<br />
                <small><em>Printed Name, Signature & Date</em></small>

            </td>
        </tr>
    </table>

</body>
</html>
