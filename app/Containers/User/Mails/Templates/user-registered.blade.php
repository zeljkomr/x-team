<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h3>Welcome {{$name}}</h3>
<div>
    Thank you for signing up, your account is ready.
    Please, confirm your mail. <br>
    <a href="{{env('APP_URL').'/confirm/'.$token}}">Confirm</a>
</div>
</body>
</html>
