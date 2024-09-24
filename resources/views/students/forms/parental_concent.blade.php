<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PARENTAL CONSENT</title>
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
            PARENTAL CONSENT
        </h4>
    </center>
    
    @if (isset(Auth::user()->student->parent_middle_name[0]))
    @php
        $middle_name_sp = Auth::user()->student->parent_middle_name[0].".";
    @endphp
@else
    @php
        $middle_name_sp = '';
    @endphp
@endif
    <p align="justify" >
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;This is to certify that I, <strong>{{Auth::user()->student->parent_first_name}} {{Auth::user()->student->parent_middle_name}} {{Auth::user()->student->parent_last_name}}</strong>, parent/guardian of <strong>{{Auth::user()->student->first_name}} {{Auth::user()->student->middle_name}} {{Auth::user()->student->last_name}}</strong>, a student of Holy Angel University and with residence and postal address at <strong>{{Auth::user()->student->address}}</strong>, and who is undergoing on-the-job training at the &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; from &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; to &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;.   
    </p>
    <p align="justify">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I understand that this training is necessary as well as important in the implementation and continuation of the <strong>{{Auth::user()->student->program}}</strong> course being taken in the said school  
    </p>
   <p>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I further allow my son/daughter to <br />
_____ work beyond the regular working hours or have an overtime work<br />
_____ work on a rotational shift specifically graveyard shift from <br />
_____ work onsite provided the company secures and implement safety protocol <br />
_____ work on Saturday to compensate the loss OJT hours due to absences<br />
on (Date) from (Start Time) to (End Time) and I agree to it provided my son/daughter is under the close supervision of the immediate supervisor even in a work from home setup.

   </p>
   <table width='100%'>
    <tr>
        <td width='50%'  align="center" style="text-transform: uppercase"><br />
            <small><u>&nbsp;&nbsp;{{Auth::user()->student->parent_first_name}} {{$middle_name_sp}} {{Auth::user()->student->parent_last_name}}&nbsp;&nbsp;</u></small>
        </td>
        <td  align="center">
            <br />
            <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{date("F d, Y")}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
        </td>
    </tr>
    <tr>
        <td align="center">
            
                Signature of Parent/Guardian
                <br />
                over Printed Name
           
        </td>
        <td align="center"  valign="top">
           Date Signed
        </td>
    </tr>
</table>
    <br />
    <br />
    <center>
        <strong>CONFORME</strong>
    </center>

    <br />


    <table width='100%' >
        <tr>
            <td  align="center" width="50%" style="text-transform: uppercase">
                <br />
                <br />
                <br />
                @if (isset($job->user->profile->middle_name[0]))
                    @php
                        $middle_name = $job->user->profile->middle_name[0].".";
                    @endphp
                @else
                    @php
                        $middle_name = '';
                    @endphp
                @endif
                <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$job->user->profile->first_name}} {{$middle_name}} {{$job->user->profile->last_name}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
            </td>
            <td  align="center" style="text-transform: uppercase">
                <br />
                <br />
                <br />
                <u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{date("F d, Y")}}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u>
            </td>
        </tr>
        <tr>
            <td align="center">
                    Signature of Company
                    
                    Representative  <br /> over Printed Name
            </td>
            <td align="center" valign="top">
                Date Signed
    
            </td>
        </tr>
    </table>

</body>
</html>