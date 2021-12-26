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
  <title>Hotel Booking Slip</title>
</head>
<body>
  <?php include 'assets/header.php'; ?>
  
  <main class="cd-main-content">
    <?php include 'assets/navbar.php'; ?>

    <?php 
      $usertest = $_SESSION["username"];
        // echo $usertest;
        // $query = mysql_query("select * from users where username ='$usertest'");
        // $row = mysql_fetch_array($query);
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

         $sql="SELECT bk_id, bk_date, bk_time, bk_noofdays, bk_bedsize, ht_name, ht_location, ht_charges, ht_standard, ht_floor, username, email, phooneno, city, address, cnic_no FROM hotels h INNER JOIN hotl_booking b ON h.ht_id = b.ht_id INNER JOIN customer c ON b. id = c. id WHERE b.bk_id = {$_SESSION['myid']}";

$result = $con->query($sql);
if ($result !== false && $result->num_rows > 0){
  $row = $result->fetch_assoc();
  echo "<div class='ml-5 mt-5' style='padding-left: 100px; padding-top: 20px; padding-right: 300px'>
      <h1>Hotel Booking Slip</h1><br>
    <table class='table'>
      <tbody>
      <tr>
          <th>Booking ID:</th>
          <td>".$row['bk_id']."</td>
        </tr>
        <tr>
          <th>User Name:</th>
          <td>".$row['username']."</td>
        </tr>
        <tr>
          <th>Hotel Name:</th>
          <td>". $row['ht_name']."</td>
        </tr>
        <tr>
          <th>Hotel Staandard:</th>
          <td>".$row['ht_standard']."</td>
        </tr> 
        <tr>
          <th>Room Type:</th>
          <td>".$row['bk_bedsize']."</td>
        </tr>       
        <tr>
          <th>Booking Time:</th>
          <td>".$row['bk_time']."</td>
        </tr>
        <tr>
          <th>Booking Date:</th>
          <td>".$row['bk_date']."</td>
        </tr>
        <tr>
          <th>Booking Days:</th>
          <td>".$row['bk_noofdays']."</td>
        </tr>
        <tr>
          <th>Room Charger per/day:</th>
          <td>".$row['ht_charges']."</td>
        </tr>
        
      </tbody>
    </table><br>
    <form class='d-print-non'><input class='btn btn-danger' type='submit' value='Print' onClick='window.print()'></form><br><br>
  </div>";
}
  ?>


  
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