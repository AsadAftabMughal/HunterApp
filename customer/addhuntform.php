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
  <title>Add Hunt</title>
</head>
<body>
  <?php include 'assets/header.php'; ?>
   <!-- .cd-main-header -->
  
  <main class="cd-main-content">
    <?php include 'assets/navbar.php'; ?>

    <form action="addhuntform.php" method="post" style="padding-left: 100px; padding-top: 50px; padding-right: 300px">        
    <h2>Add New Hunt </h2><br>
  
          <div class="form-row">
    <div class="form-group col-md-6">
        <label>Hunt Animal</label>
        <input type="text" class="form-control" name="h_animal" placeholder="deer, Rabbit, wolf" onkeypress="validateString(event)" maxlength="50">
   </div>
   <div class="form-group col-md-6">
        <label>No of animals hunted</label>
        <input type="text" class="form-control" name="h_noanimal" onkeypress="validateNumber(event)" maxlength="5">
   </div>
</div>
<div class="form-row">
    <label>Hunt Area:</label>
    <input type="text" class="form-control" name="h_area" placeholder="Chitral etc" onkeypress="validateString(event)" maxlength="50">
</div><br>
  <div class="form-row">
    <label>Hunt Province:</label>
    <input type="text" class="form-control" name="h_province" placeholder="West Punjab, Gilgit Baltistan etc" onkeypress="validateString(event)" maxlength="50">
</div><br>
  
  <!-- <label>Car Registration:</label>
  <input type="text" class="form-control" name="carregis1" placeholder="Punjab, Sindh" onkeypress="validateString(event)" maxlength="10"><br> -->
  <div class="form-row">
    <div class="form-group col-md-6">
        <label>Hunt Date</label>
        <input type="Date" class="form-control" name="h_dte">
   </div>
   <div class="form-group col-md-6">
        <label>Hunt Time</label>
        <input type="Time" class="form-control" name="h_tme">
   </div>
</div>
  
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







  
  if(isset($_POST['btnsub'])) //isset alwasy return TRUE
    {
      if(($_REQUEST['h_animal'] =="") || ($_REQUEST['h_noanimal'] == "") || ($_REQUEST['h_area'] == "") || ($_REQUEST['h_province'] == "") || ($_REQUEST['h_dte'] == "") || ($_REQUEST['h_tme'] == "") ) {
      $msg = "<div class'alert alert-warning col-sm-6 ml-5 mt-2'>Fill all Fields to submit </div>";
    }
    else{
              
        $hnt_anml = $_POST['h_animal'];
        $hnt_anmlno = $_POST['h_noanimal'];
        $hnt_area = $_POST['h_area'];
        $hnt_prvnc = $_POST['h_province'];
        $hnt_dte = $_POST['h_dte'];
        $hnt_tme = $_POST['h_tme'];
        $create_datetime = date("Y-m-d H:i:s");

  
        $insert = "INSERT INTO myhunts (hunt_animal, huntanimal_count, hunt_area, hunt_province, hunt_date, hunt_time, date_created, id) VALUES ('$hnt_anml','$hnt_anmlno','$hnt_area','$hnt_prvnc','$hnt_dte','$hnt_tme','$create_datetime','$id')";
  
        if(mysqli_query($con,$insert))
        {
          echo "<script>alert('New Hunt Added Successfully')</script>";
          echo "<script> location.href='myhunts.php'</script>";
        }
        else
        {
          echo "<script>alert('Couldn't add new Hunt)</script>";
        }
      }
  }
  ?>

    <div class="btn-block">
          <button type="submit" class="btn btn-primary btn-md" name="btnsub">Insert Hunt Record</button>
        </div>
        <div style="width: 190px; height: 190px; margin-left: 850px ">
  <a href="../chat/index.php"><img src="../assets/img/live-chat-button.png"></a>
</div>            
  </form>


  
    <!-- <div class="cd-content-wrapper">
      <div class="text-component text-center">
        <h1>Responsive Sidebar Navigation</h1>
        <p>👈<a href="https://codyhouse.co/gem/responsive-sidebar-navigation">Article &amp; Download</a></p>
      </div>
    </div> --> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->
      <script>
  function validateNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }

  function validateString(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[a-zA-Z ]/.test(ch))) {
      evt.preventDefault();
    }
  }

  function validateAdress(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[a-zA-Z0-9, ]/.test(ch))) {
      evt.preventDefault();
    }
  }

  

  
</script>
  <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="assets/js/menu-aim.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>