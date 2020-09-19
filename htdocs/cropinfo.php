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
    $crop_name1= 'sunflower';
    $crop_id1 = 2;
    $crop_id12= $_GET['Id'];
    $crop_name12= $_GET['Name'];
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "farm";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
        if (mysqli_connect_error()) {
         die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
        } else {
        	$SELECT = "SELECT tips,name from usefulltips,farmers where phone=u_author and u_cropid='$crop_id12'";
        /*$SELECT = "SELECT crop_name,tips,name from crops c,usefulltips u,farmers f where crop_id=u_cropid and u_author=phone";
        

        $SELECT = "UPDATE crop SET crop_name = '$crop_name1' WHERE crop_id = $crop_id1";
        if ($conn->query($SELECT) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $conn->error;
        }*/
        $result = $conn->query($SELECT);
     

        if ($result->num_rows > 0) {
            
        echo "<h1>".$crop_name12."</h1>
          <div class='tbl-header'>
          <table cellpadding='0' cellspacing='0' border='0'>
          <thead>
        <tr>
         
       
        <th>Tips</th>
        <th>Source</th>
       
       
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
               
                echo "<td>" . $row['tips'] ."</td>";
               echo "<td>" . $row['name'] ."</td>";
 echo "</tr>";
            }
            echo  "</tbody>";   
    echo "</table>
  </div>
  ";
           
        }
     else {
            echo "<h1>No information available yet. Comming Soon!!!!!!";
        }
         $conn->close();
        }
        ?>
  <!--for demo wrap-->
 
  </section>

 <!-- <a target="_blank" href="#0"></a>

 follow me template -->

<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./scripttable.js"></script>

</body>
</html>