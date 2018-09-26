<?php
// For use in AJAX app for adding a task to a list in DB based on that lists id
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

// Prepare user input
$listId = mysqli_real_escape_string($connect, $_POST['id']);
$taskName = mysqli_real_escape_string($connect, $_POST['name']);
$dueDate = mysqli_real_escape_string($connect, $_POST['dueDate']);
$dueTime = mysqli_real_escape_string($connect, $_POST['dueTime']);
$table = "Tasks";

// Input data into table
$stmt = mysqli_prepare($connect, "insert into $table (lId, task, dueDate, dueTime) values (?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, 'isss', $listId,$taskName, $dueDate, $dueTime);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
