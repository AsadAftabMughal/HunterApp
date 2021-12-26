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
  <title>Update Appointment</title>
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

         $ss = $_POST['id'];


        if (isset($_REQUEST['edit'])) {
            

        $select = "SELECT huntapn_id, hunt_animall, hunt_incperson, hunt_area,  hunt_province, hunt_date, hunt_time from huntappointment WHERE huntapn_id='$ss'";
        $result = mysqli_query($con,$select);

        $checkcar = mysqli_num_rows($result) > 0;
        if($checkcar)
        {
          while ($row = mysqli_fetch_array($result))
           {
            ?>

    

     <form action="updateappointment.php" method="post" style="padding-left: 100px; padding-top: 50px; padding-right: 300px">
  <div class="alert alert-dismissible alert-danger">  
  <h4 class="alert-heading">Important Note!</h4>
  <p class="mb-0">User must complete your profile first otherwise the appointment will b lost or will not accepted <a href="updateprofile.php" class="alert-link">Complete your Profile</a>.</p>
</div>
    
    <h2>Update Appointment Form</h2><br>   
    <label>Hunt Appointment ID</label>
  <input type="text" class="form-control" name="hntapn_id" id="hntapn_id" value="<?php echo $row['huntapn_id'];?>" readonly ><br> 
  <div class="form-row">
    <div class="form-group col-md-6">
        <label>Animal to hunt</label>
        <input type="text" class="form-control" name="animlhunt" value="<?php echo $row['hunt_animall'];?>">
   </div>
   <div class="form-group col-md-6">
        <label>person include in huntingt</label>
        <!-- <input type="text" class="form-control" name="carprob" > -->
        <select class="form-control" name="hperson">
          <option ><?php echo $row['hunt_incperson'];?></option>
          <option value="just me">just me</option>
          <option value="2 person">2 person</option>
          <option value="3 person">3 person</option>
          <option value="4 person">4 person</option>
          <option value="5 person">5 person</option>
  </select>
   </div>
</div>
  
  <label>Hunt Area</label>
  <input type="text" class="form-control" name="huntarea" id="huntarea" value="<?php echo $row['hunt_area'];?>" onkeypress="isInputCharacter(event)"><br>
  <label>province</label>
  <input type="text" class="form-control" name="hprovince" id="hprovince" value="<?php echo $row['hunt_province'];?>" onkeypress="isInputCharacter(event)"><br>
  <div class="form-row">
    <div class="form-group col-md-6">
        <label>Date of Hunting</label>
        <input type="date" class="form-control" name="appointdate" value="<?php echo $row['hunt_date'];?>">
   </div>
   <div class="form-group col-md-6">
        <label>Time of Hunting</label>
        <input type="time" class="form-control" name="appointtime" value="<?php echo $row['hunt_time'];?>">
   </div>
</div>

    <div class="btn-block">
          <button type="submit" class="btn btn-primary btn-md" name="btnsub">Update Hunt Appointment</button>
        </div><br><br>
        <?php if(isset($msg)){echo $msg;} ?>
  </form>

  <?php
            

            # code...
          }
        }
        else
        {
          echo "No Result Found";

        }

         }

      if (isset($_REQUEST['btnsub'])) {
          if (($_REQUEST['hntapn_id'] == "") || ($_REQUEST['animlhunt'] == "") || ($_REQUEST['hperson'] == "") || ($_REQUEST['huntarea'] == "") || ($_REQUEST['hprovince'] == "") || ($_REQUEST['appointdate'] == "") || ($_REQUEST['appointtime'] == "")) {            
            echo "<script>alert('All Field are Required ')</script>";
          }
          else{
            $idd = $_REQUEST['hntapn_id'];
            $hntanml = $_REQUEST['animlhunt'];
            $hntprs = $_REQUEST['hperson'];
            $hntarea = $_REQUEST['huntarea'];
            $hntprov = $_REQUEST['hprovince'];
            $hnttdte = $_REQUEST['appointdate'];
            $hnttme = $_REQUEST['appointtime'];
            
            $sql = "UPDATE huntappointment SET hunt_animall = '$hntanml', hunt_incperson = '$hntprs', hunt_area = '$hntarea', hunt_province = '$hntprov', hunt_date = '$hnttdte', hunt_time='$hnttme' WHERE huntapn_id='$idd'";
            if(mysqli_query($con,$sql))
        {
          echo "<script>alert('Appointment Update Successfully')</script>";
          echo "<script> location.href='viewappointments.php'</script>";
        }
        else
        {
          echo "<script>alert('could not update Appointment')</script>";
        }
          }
          # code...
        }

        ?>

        


    
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
    if (!(/[a-zA-Z]/.test(ch))) {
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