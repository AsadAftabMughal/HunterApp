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
  <title>Customer Dashboard</title>
</head>
<body>
  <?php include 'assets/header.php'; ?>
   <!-- .cd-main-header -->
  
  <main class="cd-main-content">
    <?php include 'assets/navbar.php'; ?>
    <div class="container" style="margin-top: 50px; padding-bottom: 100px">
      <div class="row">
    <div class="col">
      <div class="alert alert-dismissible alert-danger">  
  <h4 class="alert-heading">Important Note!</h4>
  <p class="mb-0">User must complete your profile first otherwise the appointment will b lost or will not accepted <a href="updateprofile.php" class="alert-link">Complete your Profile</a>.</p>
</div><br>
      <center><h1>Customer Dashboard</h1></center><br>
    </div>
  </div><br>
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
   ?>
  <div class="row">
    <div class="col">
    <div class="card text-white bg-danger mb-3" style="max-width: 20rem;">
  <div class="card-header"><?php echo $_SESSION['username'];?>'s Hunts</div>
  <div class="card-body">
    <center><h1 class="card-title">
      <?php
      $query = "SELECT COUNT(hunt_id) AS count FROM myhunts WHERE id='$id'";
      $query_result = mysqli_query($con,$query);
      while ($row = mysqli_fetch_assoc($query_result)) {
        $output = $row['count'];
        echo $output;
      }
       ?>
    </h1></center>
    <center><p class="card-text">Total Hunts Completed</p></center>
  </div>
</div>
</div>

<div class="col">
    <div class="card text-white bg-success mb-3" style="max-width: 20rem;">
  <div class="card-header"><?php echo $_SESSION['username'];?>'s Hunts Requests</div>
  <div class="card-body">
    <center><h1 class="card-title">
      <?php
      

      $query = "SELECT COUNT(huntapn_id) AS count FROM huntappointment WHERE id='$id'";
      $query_result = mysqli_query($con,$query);
      while ($row = mysqli_fetch_assoc($query_result)) {
        $output = $row['count'];
        echo $output;
      }
       ?>
    </h1></center>
    <center><p class="card-text">Total Hunts Requested</p></center>
  </div>
</div>
</div>

<div class="col">
    <div class="card text-white bg-dark mb-3" style="max-width: 20rem;">
  <div class="card-header"><?php echo $_SESSION['username'];?>'s Approved Hunts Requests</div>
  <div class="card-body">
    <center><h1 class="card-title" style="color: white">
      <?php
      

      $query = "SELECT COUNT(aprappoint_id) AS count FROM huntappointment_approved WHERE id='$id'";
      $query_result = mysqli_query($con,$query);
      while ($row = mysqli_fetch_assoc($query_result)) {
        $output = $row['count'];
        echo $output;
      }
       ?>
    </h1></center>
    <center><p class="card-text">Total Approved Hunts Resquests</p></center>
  </div>
</div>
</div> 

</div>


<div class="row">
    <div class="col">
      <div class="card text-white bg-primary mb-3" style="max-width: 20rem;">
  <div class="card-header"><?php echo $_SESSION['username'];?>'s Hotel Booking Requests</div>
  <div class="card-body">
    <center><h1 class="card-title">
      <?php
      $query = "SELECT COUNT(bk_id) AS count FROM hotl_booking WHERE id='$id'";
      $query_result = mysqli_query($con,$query);
      while ($row = mysqli_fetch_assoc($query_result)) {
        $output = $row['count'];
        echo $output;
      }
       ?>
    </h1></center>
    <center><p class="card-text">Total Booking Requests</p></center>
  </div>
</div>
    
</div>

<div class="col">
    <div class="card text-white bg-warning mb-3" style="max-width: 20rem;">
  <div class="card-header" style="color: black"><?php echo $_SESSION['username'];?>'s Approved Hotel Requests</div>
  <div class="card-body">
    <center><h1 class="card-title" style="color: black">
      <?php
      

      $query = "SELECT COUNT(apr_htlbkingid) AS count FROM aproved_htlbooking WHERE id='$id'";
      $query_result = mysqli_query($con,$query);
      while ($row = mysqli_fetch_assoc($query_result)) {
        $output = $row['count'];
        echo $output;
      }
       ?>
    </h1></center>
    <center><p class="card-text" style="color: black">Approved Hotel Booking Resquests</p></center>
  </div>
</div>
</div>

<div class="col">
  <div style="width: 190px; height: 190px; margin-left: 100px; margin-top: 50px">
  <a href="../chat/index.php"><img src="../assets/img/live-chat-button.png"></a>
</div>
    
</div> 

</div>



<!-- <div class="row">
    <div class="col"><br><br>
      <h2>Appointments</h2>
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
      
    </tr>
  </thead>
    <?php

    
    // $select = "SELECT * FROM appointment_tbl WHERE id='$id'";
    $select = "SELECT huntapn_id, hunt_animall, hunt_incperson, hunt_area, hunt_province, hunt_date, hunt_time FROM huntappointment WHERE id = '$id' ORDER BY id DESC";
    //      $select = "SELECT appoint_id, car_prob, prob_desc, appoint_date, appoint_time from appointment_tbl WHERE id='$id'";
    $result = mysqli_query($con,$select);
    
    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>". $row['huntapn_id']."</td>";
      echo "<td>". $row['hunt_animall']."</td>";
      echo "<td>". $row['hunt_incperson']."</td>";
      echo "<td>". $row['hunt_area']."</td>";
      echo "<td>". $row['hunt_province']."</td>";
      echo "<td>". $row['hunt_date']."</td>";
      echo "<td>". $row['hunt_time']."</td>";
      
    }
    
    ?>
  
  </table>
</div>
</div>
 <br><br>
 <div class="row">
    <div class="col"><br><br>
      <h2>Approved Appointments</h2>
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
    </tr>
  </thead>
    <?php

    
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
    }
    mysqli_close($con);
    ?>
  
  </table>
</div>
</div>
  -->




</div>
  
    <!-- <div class="cd-content-wrapper">
      <div class="text-component text-center">
        <h1>Responsive Sidebar Navigation</h1>
        <p>👈<a href="https://codyhouse.co/gem/responsive-sidebar-navigation">Article &amp; Download</a></p>
      </div>
    </div> --> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->
  <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="assets/js/menu-aim.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>