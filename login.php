<?php
session_start();
    $phone = $_POST['mobile'];
    $password = $_POST['password'];
    $_SESSION['logged_in']=false;
    if (!empty($phone) || !empty($password)) {
     $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "farm";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
        if (mysqli_connect_error()) {
         die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
        } else {
        $SELECT = "SELECT * From farmers Where phone = $phone";
            
        $result = $conn->query($SELECT);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if($row['password'] == $password)
            {
                    $_SESSION['currentuser'] = $row['phone'];
                    $_SESSION['logged_in'] = true;
                    header("Location:home.html");

            }
            else{
                echo "Wrong password";
            }
            /* output data of each row
            while($row = $result->fetch_assoc()) {
                //echo print_r($row); 
                echo $row['name'];
            }*/
        } else {
            echo "Accounts associated with $phone is not found";
        }
         $conn->close();
        }
    } else {
     echo "All field are required";
     die();
    }
?>