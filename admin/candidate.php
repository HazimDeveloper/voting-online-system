<?php 
include '../config.php';
$id = $_GET['id'];
$sql_candidate = mysqli_query($db_conn,"SELECT * FROM candidates WHERE candidate_id = $id");
$row = mysqli_fetch_assoc($sql_candidate);



if(isset($_POST['submit'])){
    $name = $_POST['candidate_name'];
    $desc = $_POST['candidate_desc'];
    $course = $_POST['candidate_course'];
    // $img = $_POST['file'];
    
    
    // Get file information
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];

    // Set upload folder path
    $target_dir = "../img/";

    // Move the uploaded file to the target directory
    if(move_uploaded_file($file_tmp, $target_dir.$file_name)) {
        echo "File uploaded successfully.";
        
    $update_candidate = mysqli_query($db_conn,"UPDATE `candidates` SET `candidate_name`='$name',`candidate_description`='$desc',`candidate_image`='$file_name',`candidate_course` = '$course' WHERE candidate_id = $id");

    header("location: dashboard.php");
    $_SESSION['success'] = 'Edit Successfull'; 

    } else{
        echo "Error uploading file.";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Smart Form</title>
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap"
      rel="stylesheet"
    />
  </head>
  <style>
    * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
  }
  body {
    background-color: #8754ff;
  }
  .container {
    width: 32.25em;
    background-color: #efefef;
    padding: 5em 2.75em;
    position: absolute;
    transform: translate(-50%, -50%);
    top: 50%;
    left: 50%;
    border-radius: 0.7em;
    box-shadow: 0 1em 4em rgba(71, 50, 4, 0.3);
  }
  input,
  #submit {
    border: none;
    outline: none;
    display: block;
    cursor: pointer;
  }

  a{
text-decoration: none;

  }
  input {
    width: 100%;
    background-color: transparent;
    margin-bottom: 2em;
    padding: 1em 0 0.5em 0.5em;
    border-bottom: 2px solid #888;
  }
  #submit {
    position: relative;
    left: 0;
    font-size: 1.1em;
    width: 7em;
    background-color: #8754ff;
    color: #efefef;
    padding: 0.8em 0;
    margin-top: 2em;
    border-radius: 0.3em;
  }
  #message-ref {
    font-size: 0.9em;
    margin-top: 1.5em;
    color: #34bd34;
    visibility: hidden;
  }
  </style>
  <body>
      <div class="container">
      <form action="" method="post" enctype="multipart/form-data">
      <input type="text" placeholder="Candidate Name" id="candidate_name" name="candidate_name" value="<?= $row['candidate_name'] ?>" />
      <input type="text" placeholder="Candidate Description" value="<?=$row['candidate_description'] ?>" id="candidate_desc" name="candidate_desc" >
      <input type="text" placeholder="Candidate Course" value="<?=$row['candidate_course'] ?>" id="candidate_course" name="candidate_course" >
      <input type="file"  id="file" name="file" >
      <p style="color:red">Must Uploaded One File!!! </p>
      <button id="submit" name="submit">Submit</button>
      <a  href="dashboard.php">Cancel</a>
      
      </form>
    </div>
  </body>
</html>