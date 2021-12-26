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
  <title>Update Profile</title>
</head>
<body>
  <?php include 'assets/header.php'; ?>
   <!-- .cd-main-header -->
  
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




        $select = "SELECT * FROM customer WHERE id='$id'";
        $result = mysqli_query($con,$select);

        $checkcar = mysqli_num_rows($result) > 0;
        if($checkcar)
        {
          while ($row = mysqli_fetch_array($result))
           {
            ?>

    

<!-- Extended default form grid -->
<form style="padding-left: 100px; padding-top: 50px; padding-right: 300px">
  <div class="alert alert-dismissible alert-danger">  
  <h4 class="alert-heading">Important Note!</h4>
  <p class="mb-0">User must complete their profile first otherwise the appointment will b lost or will not accepted.</p>
</div>
  <h1>Update Profile</h1><br>
  <!-- Grid row -->
  <div class="form-row">
    <div class="form-group col-md-12">
      <label for="username">User Name</label>
      <input type="username" class="form-control" name="username" value="<?php echo $row['username'];?>" onkeypress="validateAlphanumaric(event)" readonly>
    </div>
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" name="inputEmail4" value="<?php echo $row['email'];?>" onkeypress="validateEmail(event)">
    </div>
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="phoneno">Phone Number</label>
      <input type="phoneno" class="form-control" name="phoneno" id="phoneno" value="<?php echo $row['phooneno'];?>" onkeypress="validateNumber(event)" maxlength="11">
    </div>
  </div>
  <!-- Grid row -->

  <!-- Default input -->
  <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" name="inputAddress" value="<?php echo $row['address'];?>" onkeypress="validateAdress(event)">
  </div>
  <!-- Default input -->
  <!-- <div class="form-group">
    <label for="inputAddress2">Address 2</label>
    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
  </div> -->
  <!-- Grid row -->
  <div class="form-row">
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input type="text" class="form-control" name="inputCity" value="<?php echo $row['city'];?>" onkeypress="validateString(event)">
    </div>
    <!-- Default input -->
    <div class="form-group col-md-6">
      <label for="cnicno">CNIC no</label>
      <input type="CNIC" class="form-control" name="cnicno" value="<?php echo $row['cnic_no'];?>" onkeypress="validateNumber(event)" maxlength="13">
    </div>
  </div>
  <!-- Grid row -->
  <button type="Update" name="updt" class="btn btn-primary btn-md">Update</button>
</form>
<?php
            

            # code...
          }
        }
        else
        {
          echo "No Result Found";

        }

        ?>

        <?php
        if (isset($_REQUEST['updt'])) {
          if (($_REQUEST['username'] == "") || ($_REQUEST['inputEmail4'] == "") || ($_REQUEST['phoneno'] == "") || ($_REQUEST['inputAddress'] == "") || ($_REQUEST['inputCity'] == "") || ($_REQUEST['cnicno'] == "")) {            
            echo "<script>alert('All Field are Required ')</script>";
          }
          else{
            $usrnme1 = $_REQUEST['username'];
            $inpteml = $_REQUEST['inputEmail4'];
            $phno = $_REQUEST['phoneno'];
            $inptadrs = $_REQUEST['inputAddress'];
            $inptcty = $_REQUEST['inputCity'];
            $cnno = $_REQUEST['cnicno'];

            $sql = "UPDATE customer SET username = '$usrnme1', email = '$inpteml', phooneno = '$phno', city = '$inptcty', address = '$inptadrs', cnic_no = '$cnno' WHERE id='$id'";
            if(mysqli_query($con,$sql))
        {
          echo "<script>alert('Profile update Successfully')</script>";
          echo "<script> location.href='myprofile.php'</script>";
          
        }
        else
        {
          echo "<script>alert('could not update Profile')</script>";
        }
          }
          # code...
        }
         ?>

<!-- Extended default form grid -->
  
    <!-- <div class="cd-content-wrapper">
      <div class="text-component text-center">
        <h1>Responsive Sidebar Navigation</h1>
        <p>ðŸ‘ˆ<a href="https://codyhouse.co/gem/responsive-sidebar-navigation">Article &amp; Download</a></p>
      </div>
    </div> --> <!-- .content-wrapper -->
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
    if (!(/[a-zA-Z0-9,-_ ]/.test(ch))) {
      evt.preventDefault();
    }
  }

  function validateEmail(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[a-zA-Z0-9@._]/.test(ch))) {
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