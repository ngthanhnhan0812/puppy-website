<!doctype html>
<html lang="en">

<head>
    <title>Contact with us</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <h1 class="text-dark">{{ $subject }}</h1>

        <h3>{{ $message }}</h3>

        <p>If you are free, maybe you can reply to me via {{ $email }} or {{ $phone_number }}</p>

        <p>Thanks, <strong>{{ $fullname }}</strong></p>

    </div>
</body>

</html>
