<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Welcome, {{ $data->student_lastname }} {{ $data->student_firstname }}!</h1>
    <p>Thank you for registering. Here are your account details:</p>
    <ul>
        <li>Tài khoản: {{ $data->student_username }}</li>
        <li>Mật khẩu: {{ $data->student_password }}</li> <!-- Không bao giờ gửi mật khẩu thực tế qua email -->
    </ul>
</body>
</html>