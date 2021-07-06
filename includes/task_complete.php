<?php
include "connection.php";
include "functions.php";

session_start();

$btn          = $_POST['action_btn'];
$task_id      = $_POST['hidden_btn'];
$page         = $_SESSION['page'];

status_change($con, $task_id, $btn, $page);