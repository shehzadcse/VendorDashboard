<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Email Verification </h1>
    <p>
        Hello {{$data['name']}} !

        Welcome to Brand In India. Please Enter The OTP mentioned Below.<br/>
        <p>{{$data['otp']}}</p>
        

    </p>
</body>
</html>


{{-- <!DOCTYPE html>
<html>
<head>
    <title>ItsolutionStuff.com</title>
</head>
<body>
    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p>
   
    <p>Thank you</p>
</body>
</html> --}}