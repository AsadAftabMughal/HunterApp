<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Add Hotel
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Teams</li>
        <li class="active">Team List</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <div class="box-body">
              <form action="addhotel.php" method="post" style="padding-left: 100px; padding-top: 50px; padding-right: 300px">    
  
<div class="form-row">
    <div class="form-group col-md-12">
      <label>Hotel Name</label>
      <input type="text" class="form-control" name="hotel_name" id="hotel_name" onkeypress="isInputCharacter(event)" maxlength="25">        
   </div>   
</div>
<div class="form-row">
    <div class="form-group col-md-12">
      <label>Hotel Location</label>
      <input type="text" class="form-control" name="hotel_loc" id="hotel_loc" onkeypress="isInputCharacter(event)" maxlength="30">        
   </div>   
</div>
<div class="form-row">
    <div class="form-group col-md-12">
      <label>Hotel standard</label>
      <input type="text" class="form-control" name="hotel_stand" id="hotel_stand" onkeypress="isInputCharacter(event)" maxlength="7">        
   </div>   
</div>
<div class="form-row">
    <div class="form-group col-md-12">
      <label>No of Floors</label>
      <input type="text" class="form-control" name="hotel_flr" id="hotel_flr" onkeypress="isInputCharacter(event)" maxlength="2">        
   </div>   
</div>
<div class="form-row">
    <div class="form-group col-md-12">
      <label>Charges per/day</label>
      <input type="text" class="form-control" name="hotel_chrg" id="hotel_chrg" onkeypress="isInputCharacter(event)" maxlength="5"><br>        
   </div>   
</div>
  
  
  
  <!-- <div class="form-row">
    <div class="form-group col-md-6">
        <label>Date of Hunting</label>
        <input type="date" class="form-control" name="appointdate">
   </div>
   <div class="form-group col-md-6">
        <label>Time of Hunting</label>
        <input type="time" class="form-control" name="appointtime">
   </div>
</div> -->

    <div class="btn-block">
          <button type="submit" class="btn btn-primary btn-md" name="btnsub">Cofirm Appointment</button>
        </div><br>
        <?php if(isset($msg)){echo $msg;} ?>
  </form>

   <?php
  $usertest = $_SESSION["username"];
        // echo $usertest;
        $sql = "SELECT * FROM customer WHERE username='$usertest'";
        $result = mysqli_query($conn,$sql);        
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
    if(($_REQUEST['hotel_name'] =="") || ($_REQUEST['hotel_loc'] == "") || ($_REQUEST['hotel_stand'] == "") || ($_REQUEST['hotel_flr'] == "") || ($_REQUEST['hotel_chrg'] == "") ) {
      $msg = "<div class'alert alert-warning col-sm-6 ml-5 mt-2'>Fill all Fields to submit </div>";
    }
    else {

        $htl_nme = $_POST['hotel_name'];
       $htl_lc = $_POST['hotel_loc'];
       $htl_stnd = $_POST['hotel_stand'];
       $htl_flr = $_POST['hotel_flr'];
       $htl_chrg = $_POST['hotel_chrg'];
       
       


  
       $insert = "INSERT INTO `hotels`(`ht_name`, `ht_location`, `ht_charges`, `ht_standard`, `ht_floor`) VALUES ('$htl_nme', '$htl_lc', '$htl_chrg', '$htl_stnd', '$htl_flr')";
  
       // if(mysqli_query($db,$insert))      //you can also use this instead of below 
       if($conn->query($insert) == TRUE)        
       {
        // $genid = mysqli_insert_id($conn);
         echo "<script>alert('Hotel Added Successfully')</script>";
         // $_SESSION['myid'] = $genid;
         // echo "<script> location.href='submitrequestsuccess.php'</script>";
       }
       else
       {
         echo "<script>alert('Couldn't add hotel)</script>";
       }

    }
  }
  
  
  ?>


              

            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
</div>
<?php include 'includes/scripts.php'; ?>
<script>
$(function(){
  $('.edit').click(function(e){
    e.preventDefault();
    $('#edit').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.delete').click(function(e){
    e.preventDefault();
    $('#delete').modal('show');
    var id = $(this).data('id');
    getRow(id);
  });

  $('.photo').click(function(e){
    e.preventDefault();
    var id = $(this).data('id');
    getRow(id);
  });

});

function getRow(id){
  
  $.ajax({
    type: 'POST',
    url: 'team_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      // $('.teamId').val(response.teamId);
      // $('.teamName').html(response.teamName);
      // $('.teamShop').html(response.teamShop);
      // $('#employee_name').html(response.firstname+' '+response.lastname);
      // $('#edit_firstname').val(response.firstname);
      // $('#edit_lastname').val(response.lastname);
      // $('#edit_address').val(response.address);
      // $('#datepicker_edit').val(response.birthdate);
      // $('#edit_contact').val(response.contact_info);
      // $('#gender_val').val(response.gender).html(response.gender);
      // $('#position_val').val(response.position_id).html(response.description);
      // $('#schedule_val').val(response.schedule_id).html(response.time_in+' - '+response.time_out);
    }
  });
}
</script>
</body>
</html>
