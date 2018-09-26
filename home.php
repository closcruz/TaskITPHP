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
    <title>TaskIT - Home</title>
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
                echo "<a href='./news.html' class='nav-link'>News</a>";
            else:
                echo "<a href='./news.php' class='nav-link'>News</a>";
            endif;
            ?>
        </li>
        <li class="nav-item">
            <?php
            if (!isset($user)):
                echo "<a href='./contact.html' class='nav-link'>Contact Us</a>";
            else:
                echo "<a href='./contact.php' class='nav-link'>Contact Us</a>";
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
    <h3>Welcome to TaskIT</h3>
    <p>
        Where keeping up with multiple task is made easier by our todo list management system.
        Register and account and see how easy it is to create multiple todo or task list and have them be for
        distinctly different things such as:
    </p>
    <ul class="list-unstyled">
        <li>Errands</li>
        <li>Shopping Lists</li>
        <li>Project Tasks and Deadlines</li>
    </ul>
    <p>
        Set due dates on individual task and/or todo lists which will show a color depending on how close the due date is
        getting. We also offer an overview to see all the tasks you have spread it out the different lists and organizing and
        searching them as you please.
    </p>
    <p class="font-weight-bold"><em>You will need an account before you can access the To-Do section of this site!</em></p>
    <p class="h4 text-center"><u>So go ahead, get organized today!</u></p>
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