<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Account Created </h1>
    <p>
        Hello {{$data['name']}} !,

        Welcome to Brand In India. We have created your business profile as below.
        <table width=100% border=1>
            <tr>
                <th>Company Name</th>
                <th>Created By</th>
                <th>Email</th>
                <th>Password</th>
            </tr>
            <tr>
                <td>{{$data['companyName']}}</td>
                <td>{{$data['name']}}</td>
                <td>{{$data['email']}}</td>
                <td>{{$data['password']}}</td>
            </tr>
        </table>

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