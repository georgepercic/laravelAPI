<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Reset Your Password</h2>

<div>
    To reset your password click the bellow link
    {{ url('password/reset/'.$token) }}.<br/>
</div>

</body>
</html>