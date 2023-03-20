<?php

include 'config.php';

// Get the user ID from the session or from a form input
$user_name = $_SESSION['name'];
$sql_user = mysqli_query($db_conn,"SELECT * FROM users WHERE user_name = '$user_name'");
$data_user = mysqli_fetch_assoc($sql_user);
$user_id = $data_user['user_id'];
// Get the list of selected candidates from the form
if($_POST['candidate'] != 0){
    $selected_candidates = $_POST['candidate'];
    
// Insert a record into the vote table for each selected candidate
foreach ($selected_candidates as $candidate_id) {
    $query = "INSERT INTO votes (user_id, candidate_id) VALUES ('$user_id', '$candidate_id')";
    mysqli_query($db_conn, $query);
    }
    
    mysqli_close($db_conn);
    
    // echo 'Thank you for voting!';
    // header("location: index.php");
    
    echo "<script>alert('Thank You for voting!')</script>";
    echo "<script>window.location.href = 'index.php'</script>";
}else{
    echo "<script>alert('please select at least one candidate')</script>";
    echo "<script>window.location.href = 'vote.php'</script>";
    

}
    ?>