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
  <title>Update Hunts</title>
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



     $select = "SELECT * FROM myhunts WHERE hunt_id='$ss'";
        $result = mysqli_query($con,$select);
        $checkcar = mysqli_num_rows($result) > 0;
        if($checkcar)
        {
          while ($row = mysqli_fetch_array($result))
           {
            ?>


  <form action="updatehunt.php" method="post" style="padding-left: 100px; padding-top: 50px; padding-right: 300px">        
    <h2>Update My Hunt </h2><br>

    <div class="form-row">
    <label>Hunt ID:</label>
    <input type="text" class="form-control" name="h_id" value="<?php echo $row['hunt_id'];?>" readonly>
</div><br>
  
          <div class="form-row">
    <div class="form-group col-md-6">
        <label>Hunt Animal</label>
        <input type="text" class="form-control" name="h_animal" value="<?php echo $row['hunt_animal'];?>" onkeypress="validateString(event)" maxlength="50">
   </div>
   <div class="form-group col-md-6">
        <label>No of animals hunted</label>
        <input type="text" class="form-control" name="h_noanimal" value="<?php echo $row['huntanimal_count'];?>" onkeypress="validateNumber(event)" maxlength="5">
   </div>
</div>
<div class="form-row">
    <label>Hunt Area:</label>
    <input type="text" class="form-control" name="h_area" value="<?php echo $row['hunt_area'];?>" onkeypress="validateString(event)" maxlength="50">
</div><br>
  <div class="form-row">
    <label>Hunt Province:</label>
    <input type="text" class="form-control" name="h_province" value="<?php echo $row['hunt_province'];?>" onkeypress="validateString(event)" maxlength="50">
</div><br>
  
  <!-- <label>Car Registration:</label>
  <input type="text" class="form-control" name="carregis1" placeholder="Punjab, Sindh" onkeypress="validateString(event)" maxlength="10"><br> -->
  <div class="form-row">
    <div class="form-group col-md-6">
        <label>Hunt Date</label>
        <input type="Date" class="form-control" value="<?php echo $row['hunt_date'];?>" name="h_dte">
   </div>
   <div class="form-group col-md-6">
        <label>Hunt Time</label>
        <input type="Time" class="form-control" value="<?php echo $row['hunt_time'];?>" name="h_tme">
   </div>
</div>

<div class="btn-block">
          <button type="submit" class="btn btn-primary btn-md" name="btnupdterec">Update Hunt Record</button>
        </div>            
  </form>

  <?php
            

            # code...
          }
        }
        else
        {
          echo "No Result Found";

        }


        if(isset($_POST['btnupdterec'])) //isset alwasy return TRUE
    {
      if(($_REQUEST['h_id'] =="") || ($_REQUEST['h_animal'] == "") || ($_REQUEST['h_noanimal'] == "") || ($_REQUEST['h_area'] == "") || ($_REQUEST['h_province'] == "") || ($_REQUEST['h_dte'] == "") || ($_REQUEST['h_tme'] == "")  ) {
      $msg = "<div class'alert alert-warning col-sm-6 ml-5 mt-2'>Fill all Fields to submit </div>";
    }
    else{
        $hnt_id = $_POST['h_id'];
        $hnt_anml = $_POST['h_animal'];      
        $hnt_anmlcunt = $_POST['h_noanimal'];
        $hnt_area = $_POST['h_area'];
        $hnt_prvnc = $_POST['h_province'];
        $hnt_dte = $_POST['h_dte'];
        $hnt_tme = $_POST['h_tme'];
        

  
        $insert = "UPDATE myhunts SET hunt_animal = '$hnt_anml', huntanimal_count = '$hnt_anmlcunt', hunt_area = '$hnt_area', hunt_province = '$hnt_prvnc', hunt_date = '$hnt_dte',  hunt_time = '$hnt_tme' WHERE hunt_id='$hnt_id'";
  
        if(mysqli_query($con,$insert))
        {
          echo "<script>alert('Hunt Update Successfully')</script>";
          echo "<script> location.href='myhunts.php'</script>";
        }
        else
        {
          echo "<script>alert('could not update Hunt')</script>";
          echo "<script> location.href='updatehunt.php'</script>";
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