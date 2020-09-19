<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Crops</title>
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
        $SELECT = "SELECT * from cropview";
        /*

        $SELECT = "UPDATE crop SET crop_name = '$crop_name1' WHERE crop_id = $crop_id1";
        if ($conn->query($SELECT) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }*/
        $result = $conn->query($SELECT);
     

        if ($result->num_rows > 0) {
            
        echo "<h1>Crops</h1>
          <div class='tbl-header'>
          <table cellpadding='0' cellspacing='0' border='0'>
          <thead>
        <tr>
         <th>id</th>
        <th>name</th>
        <th>Category</th>
        <th>Type</th>
        
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
                echo "<td><a target='_blank' href=\"cropinfo.php?Id=".$row['crop_id']."&Name=".$row['crop_name']."\"style='color:#FF0000;'>". $row['crop_id'] ."</a></td>";
               /* echo "<td><a href='#0'>" . $row['crop_id'] ."</a></td>";*/
                echo "<td>" . $row['crop_name'] ."</td>";
                echo "<td>" . $row['crop_category']."</td>";
                echo "<td>" . $row['crop_type']."</td>";
                /*echo "<td>" . $row['crop_req']. "</td>";*/
       echo "</tr>";
 
            }
            echo  "</tbody>";   
    echo "</table>
  </div>
  ";
           
        }
     else {
            echo "No crops available";
        }
         $conn->close();
        }
        ?>
  <!--for demo wrap-->
 
  </section>
<div class="made-with-love">
 Press crop id for more information
  </div>
 <!-- <a target="_blank" href="#0"></a>

 follow me template -->

<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./scripttable.js"></script>

</body>
</html>