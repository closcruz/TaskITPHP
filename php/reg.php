<?php
// Connect to DB
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

// Set up input for DB
$user = mysqli_real_escape_string($connect, $_POST['username']);
$pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
$pass_hashed = mysqli_real_escape_string($connect, $pass);
$table = "Users";

// Check if attempting to register using already taken username
$userCheck = array();
$result = mysqli_query($connect, "select * from $table where user = '$user'");
while ($row = $result->fetch_row()) {
    array_push($userCheck, $row[1]);
}

// Username is in use
if (in_array($user, $userCheck)) {
    print <<<FAIL
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Failure</title>
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
                <a href="../login.html" class="nav-link">Log In</a>
            </li>
            <li class="nav-item">
                <a href="../register.html" class="nav-link active">Register</a>
            </li>
        </ul><br>
    <h4 class="text-center">Username: $user is in use</h4>
    <p class="text-center font-weight-bold">Please sign up with a different username.</p>
    <p class="text-center"><a class="btn btn-primary" href="../register.html">Go back</a></p>
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
// Register account with username and hashed password
else {
    $stmt = mysqli_prepare($connect, "insert into $table (user, pass) values (?, ?)");
    mysqli_stmt_bind_param($stmt, 'ss', $user, $pass_hashed);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    print <<<THANKS
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Successful</title>
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
                <a href="../login.html" class="nav-link">Log In</a>
            </li>
            <li class="nav-item">
                <a href="../register.html" class="nav-link active">Register</a>
            </li>
        </ul><br>
    <h4 class="text-center">Registered with username: $user</h4>
    <p class="text-center">Now you can log in and start organizing you tasks!</p>
    <p class="text-center"><a class="btn btn-primary" href="../home.html">Back to Home Page</a></p>
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
THANKS;
}
