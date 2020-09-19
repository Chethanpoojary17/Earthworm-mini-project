<?php
 session_start();
   
    $operation=$_POST['operation'];
    $cropname= $_POST['cropname'];
    $category = $_POST['category'];
    $type = $_POST['type'];
    $req = $_POST['req'];
    $id="14";
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "farm";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
    die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
        if($operation=="insert")
        {
     $INSERT = "INSERT Into crops (crop_id,crop_name,crop_req,crop_type,crop_category) values(?,?, ?, ?, ?)";
    $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("issss",$id,$cropname, $req, $type, $category);
    $stmt->execute();
    header("Location:login.html");
    }}
    /*{
  $SELECT = "UPDATE farmers SET name = '$name',age='$age',password='$password',interested='$interested',experience='$experience' WHERE phone= $phone1";
        if ($conn->query($SELECT) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }

    }
    }*/
        $conn->close();
?>