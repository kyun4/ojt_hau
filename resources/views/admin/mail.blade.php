<!DOCTYPE html>
<html>
<head>
    <title>Hau OJT System</title>
    <style>
        body{
            margin: 0;
            font-family: calibri;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <img src="{{asset('img/banner.jpg')}}">
    <div style="padding-left: 20px">
        <p>
            Greetings,
        </p>
        <p>
            Your Account Access was updated.<br />
            Please Login in your account using the following credentials:<br />

            Username:{{ $details['username'] }}<br />
            Password:{{ $details['password'] }}<br />

            <br />
            <br />
            Note: Upon accessing your account you need to change your Password.<br />

            <br />
            Thank you
            <br />
            <br />
            - HAU OJT SYSTEM 

        </p>
    </div>
</body>
</html>