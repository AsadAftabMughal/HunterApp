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
  <title>Take Hunt Appointment</title>
</head>
<body>
  <?php include 'assets/header.php'; ?>
  
  <main class="cd-main-content">
    <?php include 'assets/navbar.php'; ?>

    <form action="takehuntappointment.php" method="post" style="padding-left: 100px; padding-top: 50px; padding-right: 250px">
  <div class="alert alert-dismissible alert-danger">  
  <h4 class="alert-heading">Important Note!</h4>
  <p class="mb-0">User must complete your profile first otherwise the appointment will b lost or will not accepted <a href="updateprofile.php" class="alert-link">Complete your Profile</a>.</p>
</div>
    
    <h2>Appointment Form</h2><br>    
  <div class="form-row">
    <div class="form-group col-md-6">
        <label>Animal to hunt</label>
        <input type="text" class="form-control" name="animlhunt" placeholder="deer, Rabbit, wolf">
   </div>
   <div class="form-group col-md-6">
        <label>person include in huntingt</label>
        <!-- <input type="text" class="form-control" name="carprob" > -->
        <select class="form-control" name="hperson">
          <option value="just me">just me</option>
          <option value="2 person">2 person</option>
          <option value="3 person">3 person</option>
          <option value="4 person">4 person</option>
          <option value="5 person">5 person</option>
  </select>
   </div>
</div>
  
  <label>Hunt Area</label>
  <input type="text" class="form-control" name="huntarea" id="huntarea" placeholder="Chitral etc" onkeypress="isInputCharacter(event)"><br>
  <label>province</label>
  <input type="text" class="form-control" name="hprovince" id="hprovince" placeholder="West Punjab, Gilgit Baltistan etc" onkeypress="isInputCharacter(event)"><br>
  <div class="form-row">
    <div class="form-group col-md-6">
        <label>Date of Hunting</label>
        <input type="date" class="form-control" name="appointdate">
   </div>
   <div class="form-group col-md-6">
        <label>Time of Hunting</label>
        <input type="time" class="form-control" name="appointtime">
   </div>
</div>

    <div class="btn-block">
          <button type="submit" class="btn btn-primary btn-md" name="btnsub">Cofirm Appointment</button>
        </div>
        <?php if(isset($msg)){echo $msg;} ?>

        <div style="width: 190px; height: 190px; margin-left: 850px">
  <a href="../chat/index.php"><img src="../assets/img/live-chat-button.png"></a>
</div>
  </form>

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

         // echo $id;

  if(isset($_REQUEST['btnsub'])){
    if(($_REQUEST['animlhunt'] =="") || ($_REQUEST['hperson'] == "") || ($_REQUEST['huntarea'] == "") || ($_REQUEST['hprovince'] == "") || ($_REQUEST['appointdate'] == "") || ($_REQUEST['appointtime'] == "")  ) {
      $msg = "<div class'alert alert-warning col-sm-6 ml-5 mt-2'>Fill all Fields to submit </div>";
    }
    else {

        $hnt_animal = $_POST['animlhunt'];
       $h_incperson = $_POST['hperson'];
       $hnt_area = $_POST['huntarea'];
       $hnt_prnc = $_POST['hprovince'];
       $h_apdte = $_POST['appointdate'];
       $h_aptme = $_POST['appointtime'];
       $create_datetime = date("Y-m-d H:i:s");


  
       $insert = "INSERT INTO huntappointment(hunt_animall,hunt_incperson,hunt_area,hunt_province,hunt_date,hunt_time,datecreated,id) VALUES ('$hnt_animal', '$h_incperson', '$hnt_area', '$hnt_prnc', '$h_apdte', '$h_aptme', '$create_datetime', '$id')";
  
       // if(mysqli_query($db,$insert))      //you can also use this instead of below 
       if($con->query($insert) == TRUE)        
       {
        $genid = mysqli_insert_id($con);
         echo "<script>alert('Appointment is Requested Successfully')</script>";
         $_SESSION['myid'] = $genid;
         echo "<script> location.href='submitrequestsuccess.php'</script>";
       }
       else
       {
         echo "<script>alert('Appointment couldn't requested')</script>";
       }

    }
  }
  
  
  ?>
  
    <!-- <div class="cd-content-wrapper">
      <div class="text-component text-center">
        <h1>Responsive Sidebar Navigation</h1>
        <p>👈<a href="https://codyhouse.co/gem/responsive-sidebar-navigation">Article &amp; Download</a></p>
      </div>
    </div> --> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->
  <script>
    function isInputCharacter(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[a-zA-Z ]/.test(ch))) {
      evt.preventDefault();
    }
  }
  </script>
  <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="assets/js/menu-aim.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>