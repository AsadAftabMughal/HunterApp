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
  <title>View Status</title>
</head>
<body>
  <?php include 'assets/header.php'; ?>
  
  <main class="cd-main-content">
    <?php include 'assets/navbar.php'; ?>

    <div class="col-sm-6 mt-5  mx-3">
  <form action="" class="mt-3 form-inline d-print-none">
    <center><h1>Search Status of Hunt Appointment</h1></center><br><br><br><br><br><br><br><br>
    <div class="form-group mr-3">
      <label for="checkid">Enter Request ID: </label>
      <input type="text" class="form-control ml-3" id="checkid" name="checkid" onkeypress="isInputNumber(event)">
    </div>
    <button type="submit" class="btn btn-danger">Search</button>
  </form>
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


  if(isset($_REQUEST['checkid'])){
    $sql = "SELECT * FROM `huntappointment_approved` WHERE huntapn_id = {$_REQUEST['checkid']} AND id = '$id'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    if(($row['huntapn_id']) == $_REQUEST['checkid']){ ?>

      <br><div class="alert alert-dismissible alert-danger">  
  <h4 class="alert-heading">Appointment Approved</h4>  
</div>

  <h3 class="text-center mt-5" style="margin-left: 300px">Assigned Work Details</h3>
  <table class="table table-bordered" style="margin-left: 175px">
    <tbody>
      <tr>
        <td>Appointment ID</td>
        <td>
          <?php if(isset($row['huntapn_id'])) {echo $row['huntapn_id']; } ?>
        </td>
      </tr>
      <tr>
        <td>User Name</td>
        <td>
          <?php if(isset($row['c_user'])) {echo $row['c_user']; } ?>
        </td>
      </tr>
      <tr>
        <td>Email</td>
        <td>
          <?php if(isset($row['c_eml'])) {echo $row['c_eml']; } ?>
        </td>
      </tr>
      <tr>
        <td>Address</td>
        <td>
          <?php if(isset($row['c_address'])) {echo $row['c_address']; } ?>
        </td>
      </tr>
      <tr>
        <td>Phone no</td>
        <td>
          <?php if(isset($row['c_phoneno'])) {echo $row['c_phoneno']; } ?>
        </td>
      </tr>
      <tr>
        <td>City</td>
        <td>
          <?php if(isset($row['c_city'])) {echo $row['c_city']; } ?>
        </td>
      </tr>
      <tr>
        <td>Animal to Hunt</td>
        <td>
          <?php if(isset($row['hnt_anml'])) {echo $row['hnt_anml']; } ?>
        </td>
      </tr>
      <tr>
        <td>No of Hunters</td>
        <td>
          <?php if(isset($row['hnt_noprsn'])) {echo $row['hnt_noprsn']; } ?>
        </td>
      </tr>
      <tr>
        <td>Hunt Area</td>
        <td>
          <?php if(isset($row['hnt_area'])) {echo $row['hnt_area']; } ?>
        </td>
      </tr>
      <tr>
        <td>Hunt Province</td>
        <td>
          <?php if(isset($row['hnt_prvnce'])) {echo $row['hnt_prvnce']; } ?>
        </td>
      </tr>
      <tr>
        <td>Hunting Date</td>
        <td>
          <?php if(isset($row['hnt_date'])) {echo $row['hnt_date']; } ?>
        </td>
      </tr>
      <tr>
        <td>Hunting Time</td>
        <td>
          <?php if(isset($row['hnt_time'])) {echo $row['hnt_time']; } ?>
        </td>
      </tr>
      
    </tbody>
  </table>
  <div class="text-center" style="margin-left: 325px; margin-bottom: 30px">
    <form class="d-print-none d-inline mr-3"><input class="btn btn-danger" type="submit" value="Print" onClick="window.print()"></form>
    <form class="d-print-none d-inline" action="work.php"><input class="btn btn-secondary" type="submit" value="Close"></form>
  </div>
  <?php } else {
      // echo '<div class="alert alert-dark mt-4" role="alert">
      // Your Request is Still Pending </div>';
    $sql = "SELECT * FROM `huntappointment` WHERE huntapn_id = {$_REQUEST['checkid']} AND id = '$id'";
    $result = $con->query($sql);
    $row = $result->fetch_assoc();
    if(($row['huntapn_id']) == $_REQUEST['checkid']){
      echo "<script>alert('Your Request is Still pending')</script>";
      echo "<script> location.href='viewstatus.php'</script>";
    }
    else{
      echo "<script>alert('You don't have any appointment with this ID)</script>";
      echo "<script> location.href='viewstatus.php'</script>";
    }
 }
}

 ?>

</div>
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>
    
    
  </main> <!-- .cd-main-content -->
  <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="assets/js/menu-aim.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>