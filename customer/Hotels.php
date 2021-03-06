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
  <title>Hotels</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
  <?php include 'assets/header.php'; ?>
  
  <main class="cd-main-content">
    <?php include 'assets/navbar.php'; ?>

    <div>
    <!-- <h1>ADD CAR</h1>
        <h5>Add your car before taking Appointment</h5>
        <p>You can simply add your car by clicking on the "Add New Car" button below</p>
        </div>
        

    <br>&emsp;&emsp;&emsp;<a href="addcarform.php" class="btn btn-secondary">Add New Car</a> -->

    <div class="container py-5" style="padding-left: 70px; padding-top: 50px;">
      <h1>Hotels</h1><br>
      <div class="row mt-4">
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




        $select = "SELECT * FROM hotels ";
        $result = mysqli_query($con,$select);

        $checkcar = mysqli_num_rows($result) > 0;
        if($checkcar)
        {
          $i=1;
          while ($row = mysqli_fetch_array($result))
           {
            ?>

            
            

<div class="card text-white bg-info mb-3" style="max-width: 20rem; height: 250px">
  <div class="card-header">Hotel Id: <?php echo $row['ht_id'];?></div>
  <div class="card-body">
    <h4 class="card-title"><?php echo $row['ht_name'];?>&nbsp;<?php echo $row['ht_location'];?>&nbsp;(<?php echo $row['ht_standard'];?>)</h4>
    <p class="card-text">We are offering <?php echo $row['ht_standard'];?>&nbsp;Hotel at <?php echo $row['ht_charges'];?> per day. Our Hotel consist of <?php echo $row['ht_floor'];?> floors</p>
    

<!-- <form action="" method="POST" class="d-inline">
   <input type="hidden" name="id" value="<?php echo $row['ht_id'];?>"><button type="submit" class="btn btn-danger" name="btndel"><i class="fa fa-trash"></i></button>
</form> -->

<form action="hotelbooking.php" method="POST" class="d-inline">
   <input type="hidden" name="id1" value="<?php echo $row['ht_id'];?>"><button type="submit" class="btn btn-warning" name="btnupdt" >
     Book Now
   </button>
</form>


    
  </div>
</div>
&emsp;&emsp;

            <?php
            

            # code...
          }
        }
        else
        {
          echo "No Result Found";

        }

        if(isset($_REQUEST['btndel'])){
        $sql = "DELETE FROM myhunts WHERE hunt_id = {$_REQUEST['id']}";
        if($con->query($sql) == TRUE){
          echo '<meta http-equiv="refresh" content="0;URL=?deleted" />';
        }else{
          
          echo "<script>alert('Delete all the appointments and Item checklists of this car then Delete again')</script>";
          echo "<script> location.href='mycars.php'</script>";
           
        }
       }

        ?>
        
    <div style="width: 190px; height: 190px; margin-left: 850px; margin-top: 50px">
  <a href="../chat/index.php"><img src="../assets/img/live-chat-button.png"></a>
</div>
    
</div>
</div>

    <!-- New Implementation Stop -->

   
  </div>
  
    <!-- <div class="cd-content-wrapper">
      <div class="text-component text-center">
        <h1>Responsive Sidebar Navigation</h1>
        <p>????<a href="https://codyhouse.co/gem/responsive-sidebar-navigation">Article &amp; Download</a></p>
      </div>
    </div> --> <!-- .content-wrapper -->
  </main> <!-- .cd-main-content -->
  <script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
  <script src="assets/js/menu-aim.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>