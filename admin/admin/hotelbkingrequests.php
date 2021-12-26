<?php include 'includes/session.php'; ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hotel booking Requests</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header" >
    <!-- Logo -->
    <a href="home.php" class="logo" style="height: 70px; background-color: #222d32" >
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b></b>HRM System</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="height: 70px">
      <!-- Sidebar toggle button-->
      <!-- <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a> -->

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          
        </ul>
      </div>
    </nav>
  </header>
  <?php include 'includes/profile_modal.php'; ?>

  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Hotel Booking Requests
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Pending Hunt Appointments</li>
        <li class="active">Pending Appointments List</li>
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
      <div class="container">
  <div class="row">
    <div class="col-sm-4" >
      <?php
      $sql = "SELECT hotl_booking.bk_id, hotl_booking.bk_date, hotl_booking.bk_time, hotl_booking.bk_noofdays, hotl_booking.bk_floorno, hotl_booking.bk_bedsize, hotels.ht_id, customer.id, hotels.ht_name, customer.username FROM hotl_booking INNER JOIN hotels ON hotl_booking.ht_id = hotels.ht_id INNER JOIN customer ON hotl_booking.id = customer.id";
      $query = $conn->query($sql);
      if($query->num_rows > 0 ){
        while ($row = $query->fetch_assoc()) {
          ?>
          <div class="card border-primary mb-3" style="max-width: 20rem; height: 250px">
  <div class="card-header">Booking Id: <?php echo $row['bk_id'];?></div>
  <div class="card-body">
    <h4 class="card-title"><?php echo $row['ht_name'];?> for <?php echo $row['bk_noofdays'];?>.</h4>
    <p class="card-text"><?php echo $row['username'];?> wants to book&nbsp;<?php echo $row['ht_id'];?> Hotel for <?php echo $row['bk_noofdays'];?> days on <?php echo $row['bk_floorno'];?> Booking Time : <?php echo $row['bk_time'];?>, Booking Date : <?php echo $row['bk_date'];?></p>

    <form action="" method="POST" class="d-inline">
   <input type="hidden" name="id" value="<?php echo $row['bk_id'];?>"><button type="submit" class="btn btn-danger float-right" name="btndel"><i class="fa fa-trash"></i></button>
</form>
    <!-- <button type="button" class="btn btn-primary">Appointment</button> -->
    <form action="" method="POST" class="d-inline">
   <input type="hidden" name="id" value="<?php echo $row['bk_id'];?>"><button type="submit" style="margin-right: 10px" class="btn btn-warning float-right" name="apnview" value="Car items">
     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
</svg>
   </button>
</form>

    
  </div>
</div>
          <?php
        }
      }

       ?>
        
    </div>
    <div class="col-sm-8">
      <form action="" method="post" style="padding-left: 25px; padding-top: 50px; padding-right: 25px; padding-bottom: 100px; background: #ECF0F5">
        <?php
        if (isset($_REQUEST['apnview'])) {
          $sql = "SELECT hotl_booking.bk_id, hotl_booking.bk_date, hotl_booking.bk_time, hotl_booking.bk_noofdays, hotl_booking.bk_floorno, hotl_booking.bk_bedsize, hotl_booking.datecreated, hotels.ht_id, customer.id, hotels.ht_name, customer.username, customer.email, customer.phooneno, customer.city, customer.address, customer.cnic_no, customer.c_file FROM hotl_booking INNER JOIN hotels ON hotl_booking.ht_id = hotels.ht_id INNER JOIN customer ON hotl_booking.id = customer.id WHERE hotl_booking.bk_id = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        }
        
        if (isset($_REQUEST['btndel'])) {
          $sql = "DELETE FROM hotl_booking WHERE bk_id = {$_REQUEST['id']}";
          if ($conn->query($sql) == TRUE) {
            echo '<meta http-equiv="refresh" content= "0;URL=?closed"/>';
          }
          else{
            echo "Unable to Delete";
          }
        }


         ?>
    
    <h2>Hotel Booking Approve Form</h2><br>
    <label>Hotel Booking ID</label>
    <input type="text" class="form-control" name="bkng_id1" value="<?php if(isset($row['bk_id'])) echo $row['bk_id']; ?>" readonly><br>
    <input type="hidden" class="form-control" name="htlid1" value="<?php if(isset($row['ht_id'])) echo $row['ht_id']; ?>">
    <input type="hidden" class="form-control" name="usrid1" value="<?php if(isset($row['id'])) echo $row['id']; ?>">
    
    
  <div class="form-row">
    <div class="form-group col-md-6">
        <label>User Name</label>
        <input type="text" class="form-control" name="usrnme1" value="<?php if(isset($row['username'])) echo $row['username']; ?>" readonly>
   </div>
   <div class="form-group col-md-6">
        <label>Email</label>
        <input type="text" class="form-control" name="eml1" value="<?php if(isset($row['email'])) echo $row['email']; ?>" readonly>
   </div>
</div>
<label>Address</label>
  <input type="text" class="form-control" rows="3" name="adrs1" value="<?php if(isset($row['address'])) echo $row['address']; ?>" readonly><br>
  <div class="form-row">
    <div class="form-group col-md-6">
        <label>Phone no</label>
        <input type="text" class="form-control" name="phn1" value="<?php if(isset($row['phooneno'])) echo $row['phooneno']; ?>" readonly>
   </div>
   <div class="form-group col-md-6">
        <label>City</label>
        <input type="text" class="form-control" name="cty1" value="<?php if(isset($row['city'])) echo $row['city']; ?>" readonly>
   </div>
</div>
<label>Hotel Name</label>
  <!-- <input type="text" class="form-control" name="carprob" placeholder="Oil Leakage"> -->
  <input type="text" class="form-control" name="htlnme1" value="<?php if(isset($row['ht_name'])) echo $row['ht_name']; ?>" readonly><br>
<div class="form-row">
    <div class="form-group col-md-6">
        <label>Booking Days</label>
        <input type="text" class="form-control" name="bkngdys1" value="<?php if(isset($row['bk_noofdays'])) echo $row['bk_noofdays']; ?>" value="">
   </div>
   <div class="form-group col-md-6">
        <label>No of beds</label>
        <input type="text" class="form-control" name="bkngbds1" value="<?php if(isset($row['bk_bedsize'])) echo $row['bk_bedsize']; ?>" value="">
   </div>
</div>
<label>Room at Floor</label>
  <!-- <input type="text" class="form-control" name="carprob" placeholder="Oil Leakage"> -->
  <input type="text" class="form-control" name="bkngflr1" value="<?php if(isset($row['bk_floorno'])) echo $row['bk_floorno']; ?>"><br>

  <div class="form-row">
    <div class="form-group col-md-6">
        <label>Booking Date</label>
        <input type="text" class="form-control" name="bkngdte1" value="<?php if(isset($row['bk_date'])) echo $row['bk_date']; ?>" value="">
   </div>
   <div class="form-group col-md-6">
        <label>Booking Time</label>
        <input type="text" class="form-control" name="bkngtme1" value="<?php if(isset($row['bk_time'])) echo $row['bk_time']; ?>" value="">
   </div>
</div>
<label>Booking Created at</label>
  <!-- <input type="text" class="form-control" name=""> -->
  <input class="form-control" rows="3" name="cdtecrt1" value="<?php if(isset($row['datecreated'])) echo $row['datecreated']; ?>"><br>

<br>
<input type="hidden" name="usr_id2" value="<?php if(isset($row['id'])) echo $row['id']; ?>">



    <div class="btn-block">
          <button type="submit" class="btn btn-primary btn-md" name="btnaprv">Approve Appointment</button>
        </div>
        
  </form>
  <?php
  if(isset($_REQUEST['btnaprv'])){
    if(($_REQUEST['bkng_id1'] =="") || ($_REQUEST['usrnme1'] == "") || ($_REQUEST['eml1'] == "") || ($_REQUEST['phn1'] == "") || ($_REQUEST['cty1'] == "") || ($_REQUEST['htlnme1'] == "") || ($_REQUEST['bkngdys1'] == "") || ($_REQUEST['bkngbds1'] == "") || ($_REQUEST['bkngflr1'] == "") || ($_REQUEST['bkngdte1'] == "") || ($_REQUEST['bkngtme1'] == "") || ($_REQUEST['cdtecrt1'] == "")  ) {
      $msg = "<div class'alert alert-warning col-sm-6 ml-5 mt-2'>Fill all Fields to submit </div>";
    }
    else {

       $bkng_dys2 = $_REQUEST['bkngdys1'];
       $bkng_tme2 = $_REQUEST['bkngtme1'];
       $bkng_dte2 = $_REQUEST['bkngdte1'];
       $bkng_bds2 = $_REQUEST['bkngbds1'];
       $bkng_flr2 = $_REQUEST['bkngflr1'];
       $create_datetime = date("Y-m-d H:i:s");
       $bkng_id2 = $_REQUEST['bkng_id1'];
       $htl_id2 = $_REQUEST['htlid1'];
       $usr_id2 = $_REQUEST['usrid1'];

       


  
       $insert = "INSERT INTO `aproved_htlbooking`(`apr_bknodays`, `apr_bkingtme`, `apr_bkingdte`, `apr_beds`, `apr_flr`, `datecreated`, `booking_id`, `ht_id`, `id`) VALUES ('$bkng_dys2','$bkng_tme2','$bkng_dte2','$bkng_bds2','$bkng_flr2','$create_datetime','$bkng_id2','$htl_id2','$usr_id2')";
  
       // if(mysqli_query($db,$insert))      //you can also use this instead of below 
       if($conn->query($insert) == TRUE)        
       {
        // $genid = mysqli_insert_id($con);
         echo "<script>alert('Appointment Approved Successfully')</script>";
         // $_SESSION['myid'] = $genid;
         // echo "<script> location.href='tappointments.php'</script>";
       }
       else
       {
         echo "<script>alert('Appointmen could not Approved')</script>";
       }

    }
  }

   ?>

    </div>
    
  </div>
</div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/employee_modal.php'; ?>
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
    url: 'employee_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.empid').val(response.empid);
      $('.employee_id').html(response.employee_id);
      $('.del_employee_name').html(response.firstname+' '+response.lastname);
      $('#employee_name').html(response.firstname+' '+response.lastname);
      $('#edit_firstname').val(response.firstname);
      $('#edit_lastname').val(response.lastname);
      $('#edit_address').val(response.address);
      $('#datepicker_edit').val(response.birthdate);
      $('#edit_contact').val(response.contact_info);
      $('#gender_val').val(response.gender).html(response.gender);
      $('#position_val').val(response.position_id).html(response.description);
      $('#schedule_val').val(response.schedule_id).html(response.time_in+' - '+response.time_out);
    }
  });
}
</script>
</body>
</html>
