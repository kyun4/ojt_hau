<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Evaluation</title>
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
        <strong>HOLY ANGEL UNIVERSITY</strong><br />
        <small>Angeles City, Philippines</small
    </center>
    
    <p align="justify">
        Instructions:  Please rate the student according to the given scale.  Indicate your answer by checking the column that corresponds to your observation.
    </p>
    <p align="justify">
        Name of On-the-job trainee:  <u>&nbsp;{{Auth::user()->student->first_name}} {{Auth::user()->student->middle_name}} {{Auth::user()->student->last_name}}&nbsp;</u>
    </p>
	
    <table>
        <tr>
            <td>Company Name:_____________________________ </td>
            <td>Department:_____________________________ </td>
        </tr>
    </table>
    <br />
    
    <table border="" width="100%" style="border-collapse: collapse">
        <tr>
            <td rowspan="2">FACTORS</td>
            <td colspan="5">
               RATINGS
            </td>
        </tr>
        <tr>
            <td>EXCELLENT</td>
            <td>VERY GOOD</td>
            <td>GOOD</td>
            <td>FAIR</td>
            <td>POOR</td>
        </tr>
        <tr>
            <td colspan="6">
                <strong>
                    <em>I.  COMPETENCE & PRODUCTIVITY</em>
                    <br />
                    <br />			
                    A.  QUALITY of WORK
                </strong>
            </td>
        </tr>
        <tr>
            <td>Work Performance</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Work Output</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="6">
                <strong>
                    B.  QUANTITY of WORK
                </strong>
            </td>
        </tr>
        <tr>
            <td>Volume of Output</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Promptness (with which work is completed)</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="6">
                <strong>
                    C.  RESOURCEFULLNESS
                </strong>
            </td>
        </tr>
        <tr>
            <td>Ability to find ways to deliver and/or complete the assigned tasks</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Ability to cope with difficult and unforeseen situation</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="6">
                <strong>
                    <em>II.  WORK ATTITUDE</em>
                    <br />
                    <br />			
                    A.  DEPENDABILITY					
                </strong>
            </td>
        </tr>
        <tr>
            <td>Reliability in Assigned Tasks</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Keeping Confidentiality of Information</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="6">
                <strong>
                    B.  INITIATIVE, CREATIVITY, AND ENTHUSIASM
                </strong>
            </td>
        </tr>
        <tr>
            <td>Development of Ideas</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Interest in Work</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="6">
                <strong>
                    C.  PROFESSIONALISM & COURTESY
                </strong>
            </td>
        </tr>
        <tr>
            <td>Regard to Authority</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Openness to suggestions and new ideas</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Courtesy with Peers</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Personal Conduct</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td colspan="6">
                <strong>
                    D.  INTERPERSONAL WORK ATTRIBUTES					
                </strong>
            </td>
        </tr>
        <tr>
            <td>Pleasant and amiable character</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Respect for diversity (ie. People’s views)</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Effective in group and teamwork</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <br />
    <table border="" width="100%" style="border-collapse: collapse">
        <tr>
            <td rowspan="2">FACTORS</td>
            <td colspan="5">
               RATINGS
            </td>
        </tr>
        <tr>
            <td>EXCELLENT</td>
            <td>VERY GOOD</td>
            <td>GOOD</td>
            <td>FAIR</td>
            <td>POOR</td>
        </tr>
        <tr>
            <td colspan="6">
                <strong>
                    <em>III.  COMMITMENT to & COMPLIANCE to COMPANY RULES</em>					
                </strong>
            </td>
        </tr>
        <tr>
            <td>Attendance </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Punctuality</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Observance of rules, procedures, and work    policies</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <br />
    <p align='left'>
        Remarks/Comments/Suggestions:
    </p>
    <table width='100%'>
        <tr>
            <td style="border-bottom:1px solid #171717">&nbsp;</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #171717">&nbsp;</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #171717">&nbsp;</td>
        </tr>
        <tr>
            <td style="border-bottom:1px solid #171717">&nbsp;</td>
        </tr>
    </table>
    <br />
    <br />
    <br />
    <table width='100%'>
        <tr>
            <td>Evaluation Performed by:</td>
            <td>________________________________________</td>
        </tr>
        <tr>
            <td></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Signature over Printed Name)</td>
        </tr>
        
        <tr>
            <td>Position / Department:</td>
            <td>________________________________________</td>
        </tr>
        <tr>
            <td>Company/Establishment Name:</td>
            <td>________________________________________</td>
        </tr>
        <tr>
            <td>Contact Number:</td>
            <td>________________________________________</td>
        </tr>
        <tr>
            <td>E-mail address:</td>
            <td>________________________________________</td>
        </tr>
        <tr>
            <td>Date:</td>
            <td>________________________________________</td>
        </tr>
    </table>

</body>
</html>