<?php
include 'config.php';

if(isset($_SESSION['name'])){

// Query the database to get the list of candidates
$query = "SELECT * FROM candidates";
$result = mysqli_query($db_conn, $query);

// mysqli_close($db_conn);

$user_name = $_SESSION['name'];
// Get the user ID from the session or from a form input
if(isset($_POST['submit'])){

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
    
    echo "<script>alert('Thank You For Doing Your Responsibility!')</script>";
    echo "<script>window.location.href = 'index.php'</script>";
}else{
    echo "<script>alert('please select at least one candidate')</script>";
    echo "<script>window.location.href = 'vote.php'</script>";
    

}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    *,html{

        margin: 0;
        padding: 0;
        font-family: 'Poppins', sans-serif;

    }
    .card {
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
      height: auto;
   }
   
   .card input[type="checkbox"] {
     margin-top: 10px;
   }
   
   .button {
    width: 500px;
  height: 45px;
  /* font-family: 'Roboto', sans-serif; */
  font-size: 12px;
  text-transform: uppercase;
  letter-spacing: 2.5px;
  font-weight: 500;
  color: #000;
  background-color: #0B91F3;
  border: none;
  border-radius: 45px;
  box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease 0s;
  cursor: pointer;
  outline: none;
  margin-bottom: 20px;
  }

  .button.accept-btn:hover {
  background-color: #0B91F3;
  box-shadow: 0px 15px 20px rgba(11, 113, 243, 0.4);
  color: #fff;
  transform: translateY(-7px);
}
#mycheckbox {
        transform: scale(2); /* change the scale value to adjust the size */
        -webkit-transform: scale(2); /* for Safari and other WebKit browsers */
        /* overflow-x: hidden; */

    }
    a{
        position: relative;
        top:15px;
        background-color: #0B91F3;
        text-decoration: none;
        border: none;
        border-radius: 5px;
        color:#fff;
        padding: 10px;
    }
</style>
<body>
<div class=" container-fluid pb-4" >
    <div class="row">
    <div class="col-4 mr-0 pl-0 " style="padding-left: 0;">

        <img  src="https://images.unsplash.com/photo-1494172961521-33799ddd43a5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8Mnx8dm90aW5nfGVufDB8MHwwfHw%3D&auto=format&fit=crop&w=500&q=60" height="260px" width="450px" alt="">
    </div>
    <div class="col-8 pb-3 text-center  p-2 text-dark bg-opacity-8 ml-0 " style="background: linear-gradient(to top, #09203f 0%, #537895 100%);">
        <div class="wrapper  py-3 text-white" data-aos="zoom-in">
    <h1 style="margin-top: 50px;"> &nbsp;&nbsp; Keep Your Organization Great Again</h1>
    <h3 >"One Vote Can Break The Rock"</h3>
    <a href="logout.php" onclick="return confirm('Are you sure want to logout?')" class="btn btn-warning shadow"><i class="fas fa-sign-out-alt"> Log out</i>
    </a>
    </div>
    </div>
    </div>
</div>

<p class="alert alert-warning text-center"> 
    
Only 7 Candidate Can Voted!!</p>
<p class=" text-center">Voter Name : <?= $user_name ?></p>

    <form action="" method="post" >
        <div class="row text-center justify-content-center" >
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="card m-3 col-md-3 shadow" style="height: 500px;">
                <img src="img/<?= $row['candidate_image'] ?>" class="mt-3 mb-2" alt="<?= $row['candidate_name'] ?>" style="width: 100%; height: 50%;object-fit:cover; background-repeat:no-repeat">
                <label for="" class="mt-3">Candidate Name : </label>
    <h6><?= $row['candidate_name'] ?></h6>
    <label for="" class="mb-2">Manifesto : </label>
    <p ><?= $row['candidate_description'] ?></p>
    <input type="checkbox" name="candidate[]" class="mt-2" id="mycheckbox" value="<?= $row['candidate_id'] ?>" >
</div>
<?php }?>
</div>

<div class="d-flex justify-content-center">

    <input type="submit" class="button accept-btn"   value="Vote Now" name="submit">
</div>
</form>
<!-- <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" integrity="sha384-QiJDEnRs5Sp5YzVBAIiNRpe/HjHH5lQILQ/8gk+kXf+Xe0tGO+EMhMnvjyFLG+Z/" crossorigin="anonymous"></script> -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
// Limit the number of checkboxes that can be selected to 7

var checkboxes = document.querySelectorAll("input[type=\'checkbox\']");
var maxLimit = 7;
console.log(checkboxes)

for (var i = 0; i < checkboxes.length; i++) {
checkboxes[i].onclick = function() {
var count = 0;
for (var i = 0; i < checkboxes.length; i++) {
 count += checkboxes[i].checked ? 1 : 0;
}
if (count > maxLimit) {
swal("Over Voted Candidate","You can only select up to 7 candidates.","warning");
this.checked = false;
}
};
};

function logout(){
    Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})
}
    </script>
    
</body>
</html>
<?php }else{ 

header("location: index.php");
    
 } ?>