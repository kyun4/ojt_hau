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
    
    @if (isset(Auth::user()->student->parent_middle_name[0]))
    @php
        $middle_name_sp = Auth::user()->student->parent_middle_name[0].".";
    @endphp
@else
    @php
        $middle_name_sp = '';
    @endphp
@endif

<p>

<table width = "100%">

    <tr>
        <td>
            <b>Educational Objective:</b>
        </td>
        <td>
        </td>
    </tr>

    <tr>
        <td>
            <b>Student:</b>
        </td>
        <td>
            <p style = "border-bottom: solid 1px #000;margin-right:5;text-align:center;">
                {{Auth::user()->student->first_name}} {{Auth::user()->student->middle_name}} {{Auth::user()->student->last_name}}
            </p>
        </td>
        <td>
            <b>Age:</b>
        </td>
        <td>
        </td>
    </tr>



    <tr>
        <td>
            <b>School Coordinator:</b>
        </td>
        <td>
        </td>
        <td>
            <b>Contact Number:</b>
        </td>
        <td>
        </td>
    </tr>

    <tr>
        <td>
            <b>Employer/Agency</b>
        </td>
        <td>
        </td>
        <td>
            <b>Contact Number:</b>
        </td>
        <td>
        </td>
    </tr>


    <tr>
        <td>
            <b>Employer/Agency Contact Person:</b>
        </td>
        <td>
        </td>
    </tr>

    <tr>
        <td>
            <b>Dates:</b>
        </td>
        <td>
            The work-based learning will begin on and end on . 
        </td>
        <td>
           ____
        </td>
        <td>
            and end on
        </td>
        <td>
           ____
        </td>
    </tr>

    <tr>
        <td>
            <b>Hours:</b>
        </td>
        <td>
            The hours of work will be from to on (days of the week).
        </td>
        <td>
           ____
        </td>
        <td>
           to
        </td>
        <td>
           ____
        </td>
        <td>
           on
        </td>
        <td>
           ____
        </td>
        <td>
           (days of the week)
        </td>
    </tr>

    <tr>
        <td>
            <b>Wages:</b>
        </td>
        <td>
            Starting wages for the student will be 
        </td>
        <td>
           ____
        </td>
        <td>
            PHP per day.
        </td>        
    </tr>

</table>


<p>The employer will determine incremental increases. 
A probationary period of days from the date of initial employment will exist. Continued employment will be based on a 
performance review. Effective July 22, 2016, vocational rehabilitation pre-employment transition services and other 
requirements (detailed in WIOA, 511(397)) must be provided before a student can receive sub-minimum wage.
This agreement may be terminated for any reason during the probationary period by showing good cause by the student, 
school district or employer. Copies of this agreement should be distributed to the student, parent/guardian, employer and 
the original kept on file at the school. (Attach copy of Individual Training Plan.) </p>

Participants also agree to the following responsibilities in the implementation of this agreement:<br/><br/>
<b>Student Agrees to:</b><br/><br/>
• Meet the academic and attendance requirements established by the School District and employer.<br/>
• Abide by the employer’s policies and procedures (e.g., attendance, confidentiality, accountability, safety, rules of 
conduct, etc.).<br/>
• Maintain acceptable performance at school and on the job.<br/>
• Participate in progress reviews scheduled with mentors, school personnel and/or parent/guardian; and share 
information of events or facts relevant to your progress in this program.<br/>
• The release of information (e.g., progress reports, grades, work-related evaluations, and attendance reports) 
between school and employer while this agreement is in effect.<br/><br/>
<b>Student’s Signature:</b> ____________________________________________ <b>Date:</b>__________________<br/><br/><br/><br/><br/><br/>

<b>Parent/Guardian of Student Agrees to:</b><br/><br/>
• Support the student in meeting the requirements of the work-based learning program.<br/>
• Ensure transportation to and from the work site is provided when required.<br/>
• Participate in any progress reviews scheduled with mentors, school personnel, and student; and communicate 
information vital to the success and development of the student.<br/>
• The release of information (e.g., progress reports, grades, work-related evaluations, and attendance reports) 
between the school and employer while this agreement is in effect.<br/><br/>
<b>Parent/Guardian’s Signature:</b>_____________________________________ <b>Date:</b>__________________<br/><br/><br/>

<b>School Agrees to:</b><br/><br/>
• Not exclude students from participation in the work-based learning program on the basis of race, color, creed, 
religion, gender, national origin, age, disability, marital status, and status in regard to public assistance or any other 
protected groups under state, federal or local Equal Opportunity Laws.<br/>
• Support the student in meeting the requirements of the work-based learning program.<br/>
• Participate in progress reviews scheduled with mentors, student and student’s parent/guardian.<br/>
• Comply with all federal, state and local regulations.<br/>
• Place students in appropriate work-based learning programs based on tested interests, preferences, skills and needs 
(and described in Individual Education Program (IEP), when appropriate). Provide accommodations when required.<br/>
• Ensure employment is competitive and integrated, paying at least minimum wage, and not less than the customary 
wage paid by the employer. Ensure the student’s wage is paid by employer, who is not the individual’s service 
provider.<br/>
• Ensure work is performed in an integrated work setting typically found in a competitive labor market.<br/>
• Provide orientation to the activities/tasks and safety training, prior to placing students at a work site.<br/>
• Follow the curriculum provided for the program for all related instruction.<br/>
• Provide supervision of the student by an appropriately licensed work-based learning coordinator. Supervision cannot 
be outsourced to a community rehabilitation provider/agency.<br/>
• Monitor academic progress of the student to ensure high school graduation requirements are met (includes 
regularly scheduled telephone/on-site contact with the student and the experiential learning opportunity site).<br/>
• When needed, obtain an exemption permit from the Minnesota Department of Labor and Industry (in collaboration 
with the employer) for work designated as “hazardous” for employing 14- or 15-year-olds, and/or for work hours 
extending after 11 p.m. and before 5 a.m. on school days for 16- and 17-year-olds. The exemption permit must be 
obtained before the student begins work.<br/><br/>
<b>School Coordinator’s Signature:</b>__________________________________<b>Date:</b>__________________<br/><br/><br/>


<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
<b>Employer/Supervisor Agrees to:</b><br/><br/>
• Provide a work-based learning experience and supportive supervision for the length of the agreement. <br/>
• Pay at least the state minimum wage for hours worked by the student, and issue a statement of earnings to the 
student.<br/>
• Provide evidence of workers’ compensation and general liability insurance coverage for the student for all paid hours 
worked.<br/>
• Instruct the student in the competencies identified in the training plan provided and document the student’s progress.<br/>
• Conduct progress reviews with the student (which may include the parent/guardian and school personnel) and provide 
copies of those reviews to the school.<br/>
• Not exclude students from participation in the opportunity on the basis of race, color, creed, religion, gender, national 
origin, age, disability, marital status, and status in regard to public assistance or any other protected groups under 
state, federal or local Equal Opportunity Laws.<br/>
• Protect the student from sexual harassment.<br/>
• Provide student with safety training, safe equipment, and a safe and healthful workplace that conforms to all health 
and safety standards of Federal and State Law (including the Fair Labor Standards Act, Child Labor and OSHA). <br/>
• Properly train students before they operate any equipment.<br/>
• When needed, obtain an exemption permit from the Minnesota Department of Labor and Industry (in collaboration 
with work-based learning coordinator) for work designated as “hazardous” for employing 14- or 15-year-olds, and/or 
for work hours extending after 11 p.m. and before 5 a.m. on school days for 16- and 17-year-olds. The exemption 
permit must be obtained before the student begins work.<br/><br/>
<b>Employer’s Signature:</b> ________________________________________ <b>Date:</b>__________________<br/><br/>
<b>Worksite Supervisor’s Signature:</b>_______________________________ <b>Date:</b>__________________<br/>

</p>

</body>
</html>