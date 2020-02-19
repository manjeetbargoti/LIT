<html>

<head>
    <title>New Initiative added | {{ config('app.name') }}</title>
</head>

<body>
    <table>
        <tr>
            <td>Hi {{ $name }},</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>An organization has requested to you Mr. {{ $name }}.</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr><h3>User Info:</h3></tr>
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