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
      <h1>Approved Hotel Bookings</h1>
    </div>
  </div>
    
    <div class="row">
    <div class="col">
    <table class="table" style="margin-top: 50px">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Booking ID</th>
      <th scope="col">Hotel Name</th>
      <th scope="col">Bedroom type</th>
      <th scope="col">Booking Days</th>
      <th scope="col">Floor</th>
      <th scope="col">Booking Time</th>
      <th scope="col">Booking Date</th>
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
    $select = "SELECT aproved_htlbooking.apr_htlbkingid, aproved_htlbooking.apr_bknodays, aproved_htlbooking.apr_bkingtme, aproved_htlbooking.apr_bkingdte, aproved_htlbooking.apr_beds, aproved_htlbooking.apr_flr, aproved_htlbooking.datecreated, aproved_htlbooking.booking_id, hotels.ht_name, customer.username FROM aproved_htlbooking INNER JOIN hotels ON aproved_htlbooking.ht_id = hotels.ht_id INNER JOIN customer ON aproved_htlbooking.id = customer.id WHERE aproved_htlbooking.id = $id";
    //      $select = "SELECT appoint_id, car_prob, prob_desc, appoint_date, appoint_time from appointment_tbl WHERE id='$id'";
    $result = mysqli_query($con,$select);
    
    while($row = mysqli_fetch_array($result))
    {
      echo "<tr>";
      echo "<td>". $row['booking_id']."</td>";
      echo "<td>". $row['ht_name']."</td>";
      echo "<td>". $row['apr_beds']."</td>";
      echo "<td>". $row['apr_bknodays']."</td>";
      echo "<td>". $row['apr_flr']."</td>";
      echo "<td>". $row['apr_bkingtme']."</td>";
      echo "<td>". $row['apr_bkingdte']."</td>";
      
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