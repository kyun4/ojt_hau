<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Acceptance Letter</title>
</head>
<body>
    <strong>HOLY ANGEL UNIVERSITY</strong> <br />
    <strong>SCHOOL OF COMPUTING</strong> <br />
    Sto. Rosario St., Angeles City
    <br />
    <br />
    <br />
    <table>
        <tr>
            <td valign="top">
                <strong>FOR: </strong>
            </td>
            <td>
                <strong>DR. FRANCISCO D. NAPALIT</strong>
                <br />
                <small>Dean, SOC</small>
                <br />
                <br />
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <strong>THRU:	MS. JEHAN D. BULANADI</strong>
                <br />
                <small>Practicum Coordinator, SOC</small>
            </td>
        </tr>
    </table>


    <p><strong>RE: CERTIFICATE OF INTERNSHIP ACCEPTANCE</strong></p>

    <p><strong>Dear Dr. Napalit,</strong></p>
    <p align="justify">
        This is to certify that <u>{{Auth::user()->student->first_name}} {{Auth::user()->student->middle_name}} {{Auth::user()->student->last_name}}</u> is hereby accepted as an intern at _____________________________________ for four hundred eighty-six (486) hours or a duration of three months which shall commence from _____________________ with the following terms:
    </p>

    <p>
        <strong> REPORTING SCHEDULE:</strong><br/>
        Monday to Friday – 8AM to 5PM (May change depending on the setup or arrangement with the company)
    </p>
    <p>
        <strong>REPORTING TO:</strong><br />
        Name: <br/>
        Designation:<br/>
        Email Address:<br/>

    </p>

    <p>
        <strong>LOCATION OF INTERNSHIP:</strong><br />
        <mark>Work from Home Arrangement</mark>
    </p>
    <p>
        <strong>JOB DESCRIPTION:</strong><br />
    </p>
    <br />
    <br />
    <table width='100%' cellspacing='15px'>
        <tr>
            <td width='50%'><strong>ISSUED BY:</strong></td>
            <td width='50%'><strong>CONFORME:</strong></td>
        </tr>
        <tr>
            <td><br /><u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></td>
            <td><br /><u>{{Auth::user()->student->first_name}} {{Auth::user()->student->middle_name}} {{Auth::user()->student->last_name}}</u></td>
        </tr>
        <tr>
            <td>Name and Signature</td>
            <td>Student Name and Signature</td>
        </tr>
    </table>	
</body>
</html>