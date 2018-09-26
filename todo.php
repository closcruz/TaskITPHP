<?php
session_start();
$username = $_SESSION["logged"];

// Set up DB for populating list and tasks
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

// Get ID of user currently logged in
$table = "Users";
$result = mysqli_query($connect, "select userId from $table where user = '$username'");
while ($row = $result->fetch_row()) {
    $_SESSION["uId"] = $row[0];
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TaskIT - ToDo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/master.css">
    <link rel="stylesheet" href="./css/todo.css">
</head>
<body>
<div class="container-fluid">
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
                echo "<a href='./todo.php' class='nav-link active'>To-Do</a>";
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
    <div class="row">
        <div class="col-2 center">
            <button class="btn btn-primary" type="button" id="clpList"
                    data-toggle="collapse" data-target="#addList">Add List</button>
        </div>
        <div class="col-md-2">
            <button class=" btn btn-primary" type="button" id="clpTask"
                    data-toggle="collapse" data-target="#addTask">Add Task</button>
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <form class="collapse" id="addList">
                <div class="card card-body">
                    <div class="form-row">
                        <input type="hidden"
                        <?php echo (isset($_SESSION["uId"])) ? "value=".$_SESSION["uId"] : "value=\"\""; ?>
                               name="id" id="userId">
                        <div class="form-group col-6">
                            <label for="listName">Name</label>
                            <input type="text" name="name" class="form-control" id="listName">
                        </div>
                        <div class="form-group col-3">
                            <label for="listDueDate">Date Due</label>
                            <input type="date" name="dueDate" id="listDueDate" class="form-control">
                        </div>
                        <div class="form-group col-3">
                            <label for="listDueTime">Time Due</label>
                            <input type="time" name="dueTime" id="listDueTime" class="form-control">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="listSubmit">Submit</button>
                </div>
            </form>
        </div>
        <div class="col-6">
            <form class="collapse" id="addTask">
                <div class="card card-body">
                    <div class="form-row">
                        <input type="hidden" value="" name="id" id="listId">
                        <div class="form-group col-6">
                            <label for="taskName">Name</label>
                            <input type="text" name="name" class="form-control" id="taskName">
                        </div>
                        <div class="form-group col-3">
                            <label for="taskDueDate">Date Due</label>
                            <input type="date" name="dueDate" id="taskDueDate" class="form-control">
                        </div>
                        <div class="form-group col-3">
                            <label for="taskDueTime">Time Due</label>
                            <input type="time" name="dueTime" id="taskDueTime" class="form-control">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="taskSubmit">Submit</button>
                </div>
            </form>
        </div>
    </div><br>
    <div class="row">
        <div class="col-2">
            <p class="text-center font-weight-bold">Your Lists</p><hr>
            <div class="list-group" id="todoLists">
                <?php
                // Generate lists dependent on the user who is logged in
                $id = $_SESSION["uId"];
                $listTable = "Lists";
                $result = mysqli_query($connect, "select lId, name from $listTable where userId = $id");
                while ($row = $result->fetch_row()):
                    echo "<button class='list-group-item  list-group-item-action text-center' value='$row[0]'>$row[1]</button>";
                endwhile;
                ?>
            </div>
        </div>
        <div class="col-10">
            <p class="text-center font-weight-bold">List Tasks</p><hr>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Task</th>
                        <th scope="col">Due Date</th>
                        <th scope="col">Due Time</th>
                    </tr>
                </thead>
                <tbody id="taskListBody">

                </tbody>
            </table>
        </div>
    </div>
</div>
<script
    src="https://code.jquery.com/jquery-3.3.1.js"
    integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
<script src="./js/addList.js"></script>
<script src="./js/addTask.js"></script>
<script src="./js/genTasks.js"></script>
</body>
</html>


