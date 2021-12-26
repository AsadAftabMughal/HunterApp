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
  <title>Approved Appointments Full detail</title>
</head>
<body>
  <?php include 'assets/header.php'; ?>
  
  <main class="cd-main-content">
    <?php include 'assets/navbar.php'; ?>

    <?php 
        
$sql = "SELECT * FROM `huntappointment_approved` WHERE aprappoint_id = {$_REQUEST['id']}";
$result = $con->query($sql);
// if($result->num_rows == 1){
// if ($result !== false && $result->num_rows > 0){
if ( !empty($result->num_rows) && $result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo "<div class='ml-5 mt-5' style='padding-left: 100px; padding-top: 20px; padding-right: 300px; padding-bottom:100px'>
  <h1>Approved Appointment User Full Details</h1><br>
    <table class='table'>
      <tbody>
        <tr>
          <th>Appointment ID</th>
          <td>".$row['huntapn_id']."</td>
        </tr>
        
        <tr>
          <th>User Name</th>
          <td>".$row['c_user']."</td>
        </tr>
        <tr>
          <th>Email</th>
          <td>".$row['c_eml']."</td>
        </tr>
        <tr>
          <th>Address</th>
          <td>".$row['c_address']."</td>
        </tr>
        <tr>
          <th>Phone no</th>
          <td>".$row['c_phoneno']."</td>
        </tr>
        <tr>
          <th>City</th>
          <td>".$row['c_city']."</td>
        </tr>
        <tr>
          <th>Animal to Hunt</th>
          <td>".$row['hnt_anml']."</td>
        </tr>
        <tr>
          <th>No of Hunters</th>
          <td>".$row['hnt_noprsn']."</td>
        </tr>
        <tr>
          <th>Hunt Area</th>
          <td>".$row['hnt_area']."&nbsp;". $row['hnt_prvnce']."</td>
        </tr>
        <tr>
          <th>Hunting Date</th>
          <td>".$row['hnt_date']."</td>
        </tr>
        <tr>
          <th>Hunting Time</th>
          <td>".$row['hnt_time']."</td>
        </tr>
        
      </tbody>
    </table>
  </div>";
}
  ?>
    
    
  </main> <!-- .cd-main-content -->
  <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="assets/js/menu-aim.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>