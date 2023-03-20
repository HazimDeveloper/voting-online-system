<?php 

include ('../config.php');
$candidate_id = $_GET['id'];

$sql_candidate = mysqli_query($db_conn,"SELECT * FROM candidates WHERE candidate_id = $candidate_id");
$data_candidate = mysqli_fetch_assoc($sql_candidate);
$select_user_vote = mysqli_query($db_conn,"SELECT * FROM users JOIN votes on users.user_id = votes.user_id WHERE votes.candidate_id = $candidate_id");
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
    <div class="container">
        <div class="row">
            <div class="col-6">

                <div class="card shadow-lg mx-auto mt-4" style="width: 18rem;">
                  <img src="../img/<?= $data_candidate['candidate_image'] ?>" class="card-img-top" alt="<?= $data_candidate['candidate_name'] ?>">
                  <div class="card-body">
                    <h5 class="card-title">Detail For Candidate <?= $data_candidate['candidate_name'] ?></h5>
                    <p class="card-text">Course :  <?= $data_candidate['candidate_course'] ?></p>
                    <hr>
                    <p class="card-text">Total Get Vote :  <?php 
                
                $select_tot_vote = mysqli_query($db_conn,"SELECT COUNT(*) as total_vote FROM votes WHERE candidate_id = $candidate_id");
                $total_vote = mysqli_fetch_assoc($select_tot_vote);
                echo $total_vote['total_vote'];
                
                
                ?></p>
                  </div>
                </div>
            </div>
            <div class="col-6">

            <div class="container mt-5 mb-5">
<table id="example" class="table table-striped text-center" style="width:100%">
        <thead>
            <tr>
                <th>People Vote</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($select_user_vote)) : ?>
            <tr>
                <td><?= $row['user_name'] ?></td>

            </tr>
            <?php endwhile; ?>
     
    </table>
    </div>
            </div>
        </div>
    </div>
    <div class="d-flex align-items-center justify-content-center" >
        <a href="dashboard.php" class="btn btn-primary align-items-center mt-3">Back To Dashboard</a>

</div>

<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</body>
</html>