<?php
// For use in AJAX app for adding a task list in DB
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
$userId = mysqli_real_escape_string($connect, $_POST['id']);
$listName = mysqli_real_escape_string($connect, $_POST['name']);
$listDueDate = mysqli_real_escape_string($connect, $_POST['dueDate']);
$listDueTime = mysqli_real_escape_string($connect, $_POST['dueTime']);
$table = "Lists";

// Input date into table
$stmt = mysqli_prepare($connect, "insert into $table (userId, name, dueDate, dueTime) values (?, ?, ?, ?)");
mysqli_stmt_bind_param($stmt, 'isss',$userId, $listName, $listDueDate, $listDueTime );
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

