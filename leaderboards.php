<?php
session_start(); 
$currentuser=$_SESSION['currentuser'];
$loggedin=$_SESSION['logged_in'];
   
if(!$currentuser)
{
header("Location:loginerror.php");
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Fertilizers</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel="stylesheet" href="./styletable.css">

</head>
<body>
<!-- partial:index.partial.html -->
<section>
<?php
   
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "farm";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
        if (mysqli_connect_error()) {
         die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
        } else {
        $SELECT = "SELECT name,credit from farmers order by credit desc";
        /*

        $SELECT = "UPDATE crop SET crop_name = '$crop_name1' WHERE crop_id = $crop_id1";
        if ($conn->query($SELECT) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }*/
        $result = $conn->query($SELECT);
     

        if ($result->num_rows > 0) {
            
        echo "<h1>Leaderboards</h1>
          <div class='tbl-header'>
          <table cellpadding='0' cellspacing='0' border='0'>
          <thead>
        <tr>
         
        <th>Name</th>
        <th>Credit</th>
       

        </tr>
      </thead>
      </table>
      </div>";
       echo "<div class='tbl-content'>
    <table cellpadding='0' cellspacing='0' border='0'>
      <tbody>";
            while($row = $result->fetch_assoc()) {
                //echo print_r($row); 
               
        
                echo "<tr>";
                /* echo "<td><a target='_blank' href=\"cropinfo.php?Id=".$row['crop_id']."&Name=".$row['crop_name']."\">". $row['crop_id'] ."</a></td>";
               /* echo "<td><a href='#0'>" . $row['crop_id'] ."</a></td>";*/
                echo "<td>" . $row['name'] ."</td>";
                echo "<td>" . $row['credit']."</td>";
                
       echo "</tr>";
 
            }
            echo  "</tbody>";   
    echo "</table>
  </div>
  ";
           
        }
     else {
            echo "Something went wrong";
        }
         $conn->close();
        }
        ?>
         </section>
<div class="made-with-love">
 Leaderboard is based on the contribution of particular user. Come on provide some tips and hike up!!!!!
  </div>

<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./scripttable.js"></script>

</body>
</html>