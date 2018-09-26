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
    <title>TaskIT - News</title>
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
                echo "<a href='./news.html' class='nav-link active'>To-Do</a>";
            else:
                echo "<a href='./news.php' class='nav-link active'>To-Do</a>";
            endif;
            ?>
        </li>
        <li class="nav-item">
            <?php
            if (!isset($user)):
                echo "<a href='./contact.html' class='nav-link'>To-Do</a>";
            else:
                echo "<a href='./contact.php' class='nav-link'>To-Do</a>";
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
    <h3 class="text-center font-weight-bold">News</h3>
    <h5 class="font-weight-bold">First Official Welcome and News</h5>
    <p class="text-muted">Posted: 8/20/2018 @ 7:11PM</p><hr>
    <p>
        TaskIT was built out of passion and a test of the skills I have gained in my journey of web development.
        Like many passion projects, the current build is not near anywhere I would like it be and it definitely will
        be worked on as time goes on. But, for now, I am glad to report that the basic functionality is here for what I
        envisioned.
        With this post I would also like to link all visitors to sites that I think are worth a read for those that wish
        to improve in managing their time and to better organize their lives.
    </p>
    <dl class="row">
        <dt class="col-3"><a href="https://francescocirillo.com/pages/pomodoro-technique">Pomodoro Technique</a></dt>
        <dd class="col-9">
            A time management technique which advises that a task be performed in a set of 25 minute increments with short
            breaks in between the 25 minutes and a longer break in between sets.
        </dd>
        <dt class="col-3"><a href="https://www.eisenhower.me/eisenhower-matrix/">Eisenhower Matrix</a></dt>
        <dd class="col-9">
            Invented by the 34th President of the United States, this technique allows you to visualize what tasks are
            important and urgent to those that are not important or not urgent. It helps to show what you need to do first.
        </dd>
        <dt class="col-3">
            <a href="https://betterexplained.com/articles/understanding-the-pareto-principle-the-8020-rule/">Pareto Principle</a>
        </dt>
        <dd class="col-9">
            Originally thought up from economist Vilfredo Pareto, in time management terms it tells use that %80 of our
            output from work comes from %20 of the input we put into work.
        </dd>
    </dl>
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
