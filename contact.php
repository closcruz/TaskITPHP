<?php
session_start();
$user = $_SESSION["logged"];
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TaskIT - Contact Us</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/master.css">
</head>
<body>
<div class="container">
    <?php
    if (!isset($_SESSION["logged"])):
        echo "<h1><a href='./home.html'><img src='./taskiticon.png' alt='TaskIt Icon'></a> TaskIT </h1>";
    else:
        echo "<h1><a href='./home.php'><img src='./taskiticon.png' alt='TaskIt Icon'></a> TaskIT </h1>";
    endif;
    ?>
    <ul class="nav nav-tabs nav-stacked" id="navigation">
        <li class="nav-item">
            <?php
            if (!isset($user)):
                echo "<a href='./login.html' class='nav-link'>To-Do</a>";
            else:
                echo "<a href='./todo.php' class='nav-link'>To-Do</a>";
            endif;
            ?>
        </li>
        <li class="nav-item">
            <?php
            if (!isset($user)):
                echo "<a href='./news.html' class='nav-link'>To-Do</a>";
            else:
                echo "<a href='./news.php' class='nav-link'>To-Do</a>";
            endif;
            ?>
        </li>
        <li class="nav-item">
            <?php
            if (!isset($user)):
                echo "<a href='./contact.html' class='nav-link active'>To-Do</a>";
            else:
                echo "<a href='./contact.php' class='nav-link active'>To-Do</a>";
            endif;
            ?>
        </li>
        <li class="nav-item">
            <?php
            if (!isset($user)):
                echo "<a href='./login.html' class='nav-link'>Log In</a>";
            else:
                echo "<a href='./php/logout.php' class='nav-link'>Log Out</a>";
            endif;
            ?>
        </li>
    </ul><br>
    <h3 class="text-center font-weight-bold">About Us</h3>
    <p>
        The genesis of this website was from the desire to have a dedicated place to organize your tasks so as to help
        with better time management. With this website we hope that it will make it easier for people to manage different
        tasks and projects in their lived or work with ease of use and simplistic design. This website will be
        continuously built upon and hope to add features and usability to it as time goes on.
    </p>
    <p class="text-center">If you have any questions, comments, or suggestions please contact me:</p>
    <address>
        Carlos Cruz Ramos<br>
        713-724-3190<br>
        <a href="mailto:clos.cruzr95@gmail.com">clos.cruzr95@gmail.com</a>
    </address>
    <div class="footer">
        <p class="text-center text-muted">&copy; Carlos Cruz Ramos 8/20/2018</p>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>
