<?php 
include '../config.php';
$sql_candidate = mysqli_query($db_conn,"SELECT * FROM candidates");
$i = 1;

$sql_ipaddr  =mysqli_query($db_conn,"SELECT * FROM ip_address");
$data_ip = mysqli_fetch_assoc($sql_ipaddr);

if(isset($_POST['submit'])){
    $ip_addr = $_POST['ip_addr'];
    $port = $_POST['port'];
    $update_ip_addr = mysqli_query($db_conn,"UPDATE `ip_address` SET `ip_addr`='$ip_addr' , port = $port");
    if($update_ip_addr){
        echo "<script>alert('update ip address successfull')</script>";
        echo "<script>window.location = 'dashboard.php'</script>";
        
    }else{
        echo "<script>alert('update ip address failed')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.3/css/dataTables.bootstrap5.min.css">
<!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
            crossorigin="anonymous"></script>
    <title>Dashboard</title>
</head>
<style>
    *{
        font-family: Arial, Helvetica, sans-serif;
    }
</style>
<body>
    
    <!-- <div class="container mb-5">
    <h1 style="text-align: center;" class="mt-5 mb-3">Dasboard Candidate</h1>
    <div class="mx-auto text-center">
       
    </div>
    </div> -->

    <!-- Button trigger modal -->

    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">IP Address Fingerprint</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="" method="post">
            <label for="">IP ADDRESS : </label>
            <input type="text" class="form-control text-center mb-2" name="ip_addr" id="" value="<?= $data_ip['ip_addr'] ?>">
            <label for="">PORT : </label>
            <input type="text"  name="port" id="" class="form-control text-center mt-2" value="<?= $data_ip['port'] ?>">
            <input type="submit" class="btn btn-primary mt-3" value="Submit" name="submit">
      </div>
      <div class="modal-footer">
   
            
        </form>
      </div>
    </div>
  </div>
</div>
    <hr>
    <div class="container mb-3">
        <a href="create_candidate.php" class="btn btn-success mb-4 ">Add Candidate</a>
        <button type="button" class="btn btn-primary mb-4 " data-bs-toggle="modal" data-bs-target="#exampleModal">
  Change IP Address
</button>
        <a href="leaderboard.php" class="btn btn-info mb-4 ">Leaderboard</a>
        <a href="index.php" class="btn btn-secondary mb-4 ">Logout</a>
<table id="example" class="table table-hover  table-striped text-center">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Manifesto</th>
                <th>Image</th>
                <th colspan="3">Action</th>
                <th>Total Vote</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($sql_candidate)) {?>
                <tr>
                <td><?= $i ?></td>
                <td><?= $row['candidate_name']?></td>
                <td><?= $row['candidate_description']?></td>
                <td><img src="../img/<?= $row['candidate_image']?>" alt="" height="150px" width="200px"> </td>
                <td>
                    <a href="candidate.php?id=<?= $row['candidate_id'] ?>" class="btn btn-warning btn-sm ">Edit</a>
                </td>
                <td>
                    <a href="deletecandidate.php?id=<?= $row['candidate_id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('are you sure want to delete this candidate?')">Delete</a>
                </td>
                <td>
                    <a href="people_vote.php?id=<?= $row['candidate_id'] ?>" class="btn btn-secondary btn-sm">Detail</a>
                </td>
                <td>
                    <?php 

                    $select_tot_vote = mysqli_query($db_conn,"SELECT COUNT(*) as total_vote FROM votes WHERE candidate_id = ". $row['candidate_id'] ."");
                    $total_vote = mysqli_fetch_assoc($select_tot_vote);
                    echo $total_vote['total_vote'];


                    ?>
                </td>
           
        </tr>
           <?php
            $i++;
        }?>
        </tbody>
    </table>
</div>
<!-- jQuery -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- DataTables JS -->
<script type="text/javascript" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</body>
</html>