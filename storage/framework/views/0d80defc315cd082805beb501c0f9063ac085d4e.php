<html>

<head>
    <title>Business Profile updated | <?php echo e(config('app.name')); ?></title>
</head>

<body>
    <table>
        <tr>
            <td>Dear <?php echo e($name); ?>,</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Your profile details updated successfully.
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Name:</td>
            <td><?php echo e($name); ?></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><?php echo e($email); ?></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>Thanks & Regards,</td>
        </tr>
        <tr>
            <td><?php echo e(config('app.name')); ?></td>
        </tr>
    </table>
</body>

</html><?php /**PATH D:\GITHUB\LIT\resources\views/emails/user_profile_update.blade.php ENDPATH**/ ?>