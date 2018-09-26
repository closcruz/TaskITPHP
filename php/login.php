<?php
// DB Access
$host = "summer-2018.cs.utexas.edu";
$user = "ccruz95";
$pwd = "Hunt6Tensor+Glare";
$dbs = "cs329e_ccruz95";
$port = "3306";

$connect = mysqli_connect ($host, $user, $pwd, $dbs, $port);

if (empty($connect))
{
    die("Connection to DB failed: " . mysqli_connect_error());
}

// User input
$username = trim($_POST['username']);
$pass = trim($_POST['pass']);

// Get user info from DB to compare user input
$table = "Users";
$db_user = '';
$db_pass = '';

$result = mysqli_query($connect, "select user, pass from $table where user = '$username'");
while ($row = $result->fetch_row()) {
    $db_user = $row[0];
    $db_pass = $row[1];
}

if ($username === $db_user && password_verify($pass, $db_pass)) {
    session_start();
    $_SESSION["logged"] = $username;
    header('Location:https://summer-2018.cs.utexas.edu/cs329e-mitra/ccruz95/finalphase/home.php');
}
else {
    print <<<FAIL
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In Fail</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
          <link rel="stylesheet" href="../css/master.css">
</head>
<body>
<div class="container">
    <h1><a href="../home.html"><img src="../taskiticon.png" alt="TaskIt Icon"></a> TaskIT </h1>
        <ul class="nav nav-tabs nav-stacked" id="navigation">
            <li class="nav-item">
                <a href="../login.html" class="nav-link">To-Do</a>
            </li>
            <li class="nav-item">
                <a href="../news.html" class="nav-link">News</a>
            </li>
            <li class="nav-item">
                <a href="../contact.html" class="nav-link">Contact Us</a>
            </li>
            <li class="nav-item">
                <a href="../login.html" class="nav-link active">Log In</a>
            </li>
            <li class="nav-item">
                <a href="../register.html" class="nav-link">Register</a>
            </li>
        </ul><br>
    <h4 class="text-center">Log In Fail</h4>
    <p class="text-center font-weight-bold">Username/Password does not match our records. Please try again.</p>
    <p class="text-center"><a class="btn btn-primary" href="../login.html">Go Back</a></p>
    <div class="footer">
        <p class="text-center text-muted">&copy; Carlos Cruz Ramos 08/20/2018</p>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>
FAIL;

}