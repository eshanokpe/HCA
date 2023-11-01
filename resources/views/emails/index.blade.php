<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cambo Tutorial Email Send</title>
</head>
<body>
    <h3>Registration is Successful Cambo toturial.com</h3>
    <p>Dear {{ $data['fullname']}}</p>
    <p>
        Welcome to Rabmot Licensing Agency! We are thrilled to have you as a new client and we appreciate your business. Our team is committed to providing 
        you with the highest quality of service for all your vehicle documentation needs.
    </p>
    <p>
        
    </p>
    <p>{{ $data['body'] }} </p>
</body>
</html>