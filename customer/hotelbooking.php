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
  <title>Hotel Booking</title>
</head>
<body>
  <?php include 'assets/header.php'; ?>
  
  <main class="cd-main-content">
    <?php include 'assets/navbar.php'; 



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

         $ss = $_POST['id1'];    

         $select = "SELECT * FROM hotels WHERE ht_id ='$ss'";
        $result = mysqli_query($con,$select);
        $checkcar = mysqli_num_rows($result) > 0;
        if($checkcar)
        {
          while ($row = mysqli_fetch_array($result))
           {     

     ?>
    

    <form action="hotelbooking.php" method="post" style="padding-left: 100px; padding-top: 50px; padding-right: 300px">   
      <div class="alert alert-dismissible alert-danger">  
  <h4 class="alert-heading">Important Note!</h4>
  <p class="mb-0">User must complete your profile first otherwise the appointment will b lost or will not accepted <a href="updateprofile.php" class="alert-link">Complete your Profile</a>.</p>
</div>
    
    <h2>Hotel Booking</h2><br>    
    <input type="hidden" class="form-control" name="htlid" value="<?php echo $row['ht_id'];?>">
    
  <div class="form-row">
    <div class="form-group col-md-12">
        <label>Hotel Name</label>
        <input type="text" class="form-control" name="htl_name" value="<?php echo $row['ht_name'];?>" readonly>
   </div>   
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label>Bedroom type</label>
        <!-- <input type="text" class="form-control" name="carprob" > -->
        <select class="form-control" name="bdrm_type">
          <option value="2 beds">2 beds</option>
          <option value="3 beds">3 beds</option>
          <option value="4 beds">4 beds</option>          
  </select>
   </div>
   <div class="form-group col-md-6">
        <label>Number of Days for booking</label>
        <!-- <input type="text" class="form-control" name="carprob" > -->
        <select class="form-control" name="bk_days">
          <option value="1 day">1 day</option>
          <option value="2 days">2 days</option>
          <option value="3 days">3 days</option>
          <option value="4 days">4 days</option>
          <option value="5 days">5 days</option>
          <option value="6 days">6 days</option>
          <option value="7 days">7 days</option>
          <option value="2 weeks">2 weeks</option>
          <option value="3 weeks">3 weeks</option>
          <option value="4 weeks">4 weeks</option>
  </select>
   </div>
</div>

  <div class="form-row">
    <div class="form-group col-md-12">
        <label>Room on Floor</label>
        <!-- <input type="text" class="form-control" name="carprob" > -->
        <select class="form-control" name="rm_flr">
          <option value="Ground Floor">Ground Floor</option>
          <option value="1st Floor">1st Floor</option>
          <option value="2nd Floor">2nd Floor</option>
          <option value="3rd Floor">3rd Floor</option>          
  </select>
   </div>   
</div>
  
  <!-- <label>Hunt Area</label>
  <input type="text" class="form-control" name="huntarea" id="huntarea" placeholder="Chitral etc" onkeypress="isInputCharacter(event)"><br>
  <label>province</label>
  <input type="text" class="form-control" name="hprovince" id="hprovince" placeholder="West Punjab, Gilgit Baltistan etc" onkeypress="isInputCharacter(event)"><br> -->
  <div class="form-row">
    <div class="form-group col-md-6">
        <label>Booking date</label>
        <input type="date" class="form-control" name="bk_dte">
   </div>
   <div class="form-group col-md-6">
        <label>Booking Time</label>
        <input type="time" class="form-control" name="bk_tme">
   </div>
</div>

    <div class="btn-block">
          <button type="submit" class="btn btn-primary btn-md" name="btnbook">Cofirm Booking</button>
        </div>
        <?php if(isset($msg)){echo $msg;} ?>
  </form>

  <?php
           }
        }
        else
        {
          echo "No Result Found";

        }   


        if(isset($_REQUEST['btnbook'])){
    if(($_REQUEST['htl_name'] =="") || ($_REQUEST['bdrm_type'] == "") || ($_REQUEST['bk_days'] == "") || ($_REQUEST['rm_flr'] == "") || ($_REQUEST['bk_dte'] == "") || ($_REQUEST['bk_tme'] == "")  ) {
      $msg = "<div class'alert alert-warning col-sm-6 ml-5 mt-2'>Fill all Fields to submit </div>";
    }
    else { 
       $hotel_idd = $_POST['htlid'];       
       $bed_tpe = $_POST['bdrm_type'];
       $bok_dys = $_POST['bk_days'];
       $room_flr = $_POST['rm_flr'];
       $book_dte = $_POST['bk_dte'];
       $book_tme = $_POST['bk_tme'];
       $create_datetime = date("Y-m-d H:i:s");


  
       $insert = "INSERT INTO `hotl_booking`(`bk_date`, `bk_time`, `bk_noofdays`, `bk_floorno`, `bk_bedsize`, `datecreated`,`ht_id`, `id`) VALUES ('$book_dte','$book_tme','$bok_dys','$room_flr','$bed_tpe','$create_datetime','$hotel_idd','$id')";
  
       // if(mysqli_query($db,$insert))      //you can also use this instead of below 
       if($con->query($insert) == TRUE)        
       {
        $genid = mysqli_insert_id($con);
         echo "<script>alert('Booking is Requested Successfully')</script>";
         $_SESSION['myid'] = $genid;
         echo "<script> location.href='hotelbookingsuccess.php'</script>";
       }
       else
       {
         echo "<script>alert('Booking couldn't requested')</script>";
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