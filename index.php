<?php

require 'config.php';
$sql_ipaddr  =mysqli_query($db_conn,"SELECT * FROM ip_address");
$data_ip = mysqli_fetch_assoc($sql_ipaddr);
// require 'ZKLibrary/zklibrary.php';

// $zk = new ZKLibrary($data_ip['ip_addr'],  $data_ip['port']);
// $zk->connect();
// $zk->disableDevice();

// foreach($users as $key => $user){
    
//      echo "Name : " .$user[1]; 
// }
// if($users = $zk->getUser()){
 
// $name = $user[1];

// $_SESSION['name'] = $name;
// $zk->enableDevice();
// $zk->disconnect();
// header("location: vote.php"); 
// }
if(isset($_POST['submit'])){

  $name = $_POST['user_name'];
  $course = $_POST['course'];
$select_user = mysqli_query($db_conn,"SELECT * FROM users JOIN votes ON users.user_id = votes.user_id WHERE users.user_name = '$name'");
if(mysqli_num_rows($select_user) == 0){
  $_SESSION['name'] = $name;
  $insert_user = mysqli_query($db_conn,"INSERT INTO `users`( `user_name`,`course`) VALUES ('$name','$course')");
  header("location: vote.php");
}else{
  echo "<script>alert('User Already Voted')</script>";
  echo"<script>window.location = 'index.php'</script>";
}
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<style>
    *,html{

font-family: 'Poppins', sans-serif;
}
 
</style>
<body>

<div class="container mt-5 shadow-lg">
  <div class="row">
    <div class="col" style="background-image: url('https://images.unsplash.com/photo-1597701548622-cf60627fd70a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Nnx8dm90aW5nfGVufDB8MHwwfHw%3D&auto=format&fit=crop&w=700&q=60');object-fit:fill;"></div>
    <div class="col text-center" >

      <h4 class="mt-4">Login With Fingerprint </h4>
      <i class="material-icons" style="font-size:90px;color:red">fingerprint</i>
  <hr>
  <small><p>Or</p></small>
  <form action="" method="post" class="mx-4">
    <label for="user_name" class="ml-3">Enter Your Full Name : </label>
    <input type="text" name="user_name" placeholder="Ali Bin Abu" class="form-control mt-3" required  id=""  >
    <label for="user_name" class="ml-3 mt-3">Enter Your Course : </label>
  <input type="text" name="course" placeholder="Information Technology" required class="form-control mt-4"  id=""  >
  <input type="submit" value="Submit" class="btn btn-primary mt-3 mb-4" name="submit">
  </form>
    </div>
  </div>
    <!-- <table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
<thead>
  <tr>
    <td width="25">No</td>
    <td>UID</td>
    <td>ID</td>
    <td>Name</td>
    <td>Role</td>
    <td>Password</td>
  </tr>
</thead>
<tbody> -->
<?php
// $no = 0;
// foreach($users as $key => $user)
// {
  // $no++;
  ?>
  <!-- <tr>
    <td align="right"><?php echo $no; ?></td>
    <td><?php echo $key; ?></td>
    <td><?php echo $user[0]; ?></td>
    <td><?php echo $user[1]; ?></td>
    <td><?php echo $user[2]; ?></td>
    <td><?php echo $user[3]; ?></td>
  </tr> -->
  <?php
// }
?>
 <!-- </tbody> -->
<!-- </table> -->
</div>


<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
</body>
</html>
