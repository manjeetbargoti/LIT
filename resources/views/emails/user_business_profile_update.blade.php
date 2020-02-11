<html>

<head>
    <title>Business Profile updated | {{ config('app.name') }}</title>
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
            <td>Your business details updated successfully.
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
            <td>{{ config('app.name') }}</td>
        </tr>
    </table>
</body>

</html>