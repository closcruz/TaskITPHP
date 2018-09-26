<?php
// For use in generating all the tasks in a certain list
// Connect to DB
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

// Get input for query
$listId = $_POST["id"];
$table = "Tasks";

// Get data from DB
$result = mysqli_query($connect, "select task, dueDate, dueTime from $table where lId = $listId");
$num = 1;
while ($row = $result->fetch_row()) {
    echo "<tr><th scope='row'>";
    echo $num++;
    echo "</th><td>";
    echo $row[0];
    echo "</td><td>";
    echo $row[1];
    echo "</td><td>";
    echo $row[2];
    echo "</td></tr>";
}

$num = 1;

$result->free();