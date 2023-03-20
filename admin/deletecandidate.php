<?php 

include '../config.php';

$candidate_id = $_GET['id'];

mysqli_query($db_conn,"DELETE FROM candidates WHERE candidate_id = $candidate_id");
mysqli_query($db_conn,"DELETE FROM votes WHERE candidate_id = $candidate_id");

header('location:dashboard.php');