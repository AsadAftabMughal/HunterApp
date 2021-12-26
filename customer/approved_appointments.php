<?php
       include('db.php');
       include("auth_session.php");
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>document.getElementsByTagName("html")[0].className += " js";</script>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>Approved Appointments</title>
</head>
<body>
  <?php include 'assets/header.php'; ?>
  
  <main class="cd-main-content">
    <?php include 'assets/navbar.php'; ?>

    <div class="container" style="margin-top: 40px">
  

<div class="row">
    <div class="col"><br><br>
      <h1>Approved Appointments</h1>
    </div>
  </div>
    
    <div class="row">
    <div class="col">
    <table class="table" style="margin-top: 50px">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Appointment ID</th>
      <th scope="col">Hunt Animal</th>
      <th scope="col">Hunters</th>
      <th scope="col">Hunt Area</th>
      <th scope="col">Hunt Province</th>
      <th scope="col">Hunting Date</th>
      <th scope="col">Hunting Time</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
    <?php
    $usertest = $_SESSION["username"];
        // echo $usertest;
        $sql = "SELECT * FROM customer WHERE username='$usertest'";
        $result = mysqli_query($con,$sql);        
        // print_r($result);
        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        // echo "id: " . $row["id"]. " - Name: " . $row["username"]. "Email: " . $row["email"]. "<br>";
        $id=$row["id"];
        }
        } else {
         echo "0 results";
         }

    
    // $select = "SELECT * FROM appointment_tbl WHERE id='$id'";
    $select = "SELECT * FROM `huntappointment_approved` WHERE id = '$id' ORDER BY aprappoint_id DESC";
    //      $select = "SELECT appoint_id, car_prob, prob_desc, appoint_date, appoint_time from appointment_tbl WHERE id='$id'";
    $result = mysqli_query($con,$select);
    
    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>". $row['huntapn_id']."</td>";
      echo "<td>". $row['hnt_anml']."</td>";
      echo "<td>". $row['hnt_noprsn']."</td>";
      echo "<td>". $row['hnt_area']."</td>";
      echo "<td>". $row['hnt_prvnce']."</td>";
      echo "<td>". $row['hnt_date']."</td>";
      echo "<td>". $row['hnt_time']."</td>";
      echo "<td>";
      echo "<form Action='approved_appointments1.php' method='POST'>";
       echo "<input type='hidden' name='id' value=".$row['aprappoint_id']."><button type='submit' class='btn btn-info mr-3' name='edit' value='Edit'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'>
  <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z'/>
  <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z'/>
</svg></button>";
       // echo "</form>";
       // echo "<form Action='' method='POST' class='d-inline'>";
       // echo "<input type='hidden' name='id' value=".$row['appoint_id']."><button type='submit' class='btn btn-danger mr-3' name='btndel' value='Delete'><i class='fa fa-trash'></i></button>";
       // echo "</form>";
       echo "</td>";
       echo "</tr>";
    }
    
    ?>
  
  </table>
  <div style="width: 190px; height: 190px; margin-left: 950px; margin-top: 100px">
  <a href="../chat/index.php"><img src="../assets/img/live-chat-button.png"></a>
</div>
</div>
</div>

</div>
    
    
  </main> <!-- .cd-main-content -->
  <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="assets/js/menu-aim.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>