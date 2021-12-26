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
  <title>My Profile</title>
</head>
<body>

  <?php include 'assets/header.php'; ?>
   <!-- .cd-main-header -->
  
  <main class="cd-main-content">
    <?php include 'assets/navbar.php'; ?>

    <?php 
 $user = $_SESSION["username"];        
$sql = "SELECT * FROM customer WHERE username='$user'";
$result = $con->query($sql);
// if($result->num_rows == 1){
// if ($result !== false && $result->num_rows > 0){
if ( !empty($result->num_rows) && $result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo "<div class='ml-5 mt-5' style='padding-left: 100px; padding-top: 20px; padding-right: 300px'>
  <h1>My Profile</h1><br>
    <table class='table'>
      <tbody>
        <tr>
          <th>User ID</th>
          <td>".$row['id']."</td>
        </tr>
        <tr>
          <th>User Name</th>
          <td>".$row['username']."</td>
        </tr>
        <tr>
          <th>Email Address</th>
          <td>".$row['email']."</td>
        </tr>
        <tr>
          <th>Phone Number</th>
          <td>".$row['phooneno']."</td>
        </tr>
        <tr>
          <th>City</th>
          <td>".$row['city']."</td>
        </tr>
        <tr>
          <th>Address</th>
          <td>".$row['address']."</td>
        </tr>
        <tr>
          <th>CNIC no</th>
          <td>".$row['cnic_no']."</td>
        </tr>
      </tbody>
    </table>
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