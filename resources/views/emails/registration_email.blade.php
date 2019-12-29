<html>

<head>
    <title>Thank you for registration with us | LIT</title>
</head>

<body>
    <table>
        <tr>
            <td>Dear {{ $name }},</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Welcome! You have successfully created your LIT Account. <br>Kindly click on link given below to verify your account. </td>
        </tr>
        <tr>
            <td><a href="{{ url('/verify/token='.$token.'/code='.$code) }}">Verify Account</a></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Name:</td>
            <td>{{ $name }}</td>
        </tr>
        <tr>
            <td>Email:</td>
            <td>{{ $email }}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Thanks & Regards,</td>
        </tr>
        <tr>
            <td>LIT</td>
        </tr>
    </table>
</body>

</html>