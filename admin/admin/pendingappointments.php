<?php include 'includes/session.php'; ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hunt Appointment Requests</title>
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
        Appointments List
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
      $sql = "SELECT huntappointment.huntapn_id, huntappointment.hunt_animall, huntappointment.hunt_incperson, huntappointment.hunt_area, huntappointment.hunt_province, huntappointment.hunt_date, huntappointment.hunt_time, customer.id, customer.username, customer.email, customer.phooneno, customer.city, customer.address, customer.cnic_no FROM huntappointment INNER JOIN customer ON huntappointment.id=customer.id ORDER BY huntappointment.huntapn_id Asc";
      $query = $conn->query($sql);
      if($query->num_rows > 0){
        while ($row = $query->fetch_assoc()) {
          ?>
          <div class="card border-primary mb-3" style="max-width: 20rem; height: 250px">
  <div class="card-header">Appoint Id: <?php echo $row['huntapn_id'];?></div>
  <div class="card-body">
    <h4 class="card-title"><?php echo $row['hunt_incperson'];?> person for&nbsp;<?php echo $row['hunt_animall'];?> Hunt</h4>
    <p class="card-text"><?php echo $row['username'];?> including <?php echo $row['hunt_incperson'];?>  want's to hunt for&nbsp;<?php echo $row['hunt_animall'];?> at&nbsp;<?php echo $row['hunt_area'];?>&nbsp;<?php echo $row['hunt_province'];?> on <?php echo $row['hunt_date'];?>, time : <?php echo $row['hunt_time'];?></p>

    <form action="" method="POST" class="d-inline">
   <input type="hidden" name="id" value="<?php echo $row['huntapn_id'];?>"><button type="submit" class="btn btn-danger float-right" name="btndel"><i class="fa fa-trash"></i></button>
</form>
    <!-- <button type="button" class="btn btn-primary">Appointment</button> -->
    <form action="" method="POST" class="d-inline">
   <input type="hidden" name="id" value="<?php echo $row['huntapn_id'];?>"><button type="submit" style="margin-right: 10px" class="btn btn-warning float-right" name="apnview" value="Car items">
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
          $sql = "SELECT huntappointment.huntapn_id, huntappointment.hunt_animall, huntappointment.hunt_incperson, huntappointment.hunt_area, huntappointment.hunt_province, huntappointment.hunt_date, huntappointment.hunt_time, customer.id, customer.username, customer.email, customer.phooneno, customer.city, customer.address, customer.cnic_no FROM huntappointment INNER JOIN customer ON huntappointment.id=customer.id WHERE huntappointment.huntapn_id= {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        }
        
        if (isset($_REQUEST['btndel'])) {
          $sql = "DELETE FROM huntappointment WHERE huntapn_id = {$_REQUEST['id']}";
          if ($conn->query($sql) == TRUE) {
            echo '<meta http-equiv="refresh" content= "0;URL=?closed"/>';
          }
          else{
            echo "Unable to Delete";
          }
        }


         ?>
    
    <h2>Appointment Approve Form</h2><br>
    <label>Appointment ID</label>
    <input type="text" class="form-control" name="apointid2" value="<?php if(isset($row['huntapn_id'])) echo $row['huntapn_id']; ?>" readonly><br>
    
    
  <div class="form-row">
    <div class="form-group col-md-6">
        <label>User Name</label>
        <input type="text" class="form-control" name="u_name2" value="<?php if(isset($row['username'])) echo $row['username']; ?>" readonly>
   </div>
   <div class="form-group col-md-6">
        <label>Email</label>
        <input type="text" class="form-control" name="u_email2" value="<?php if(isset($row['email'])) echo $row['email']; ?>" readonly>
   </div>
</div>
<label>Address</label>
  <input class="form-control" rows="3" name="u_adress2" value="<?php if(isset($row['address'])) echo $row['address']; ?>" readonly><br>
  <div class="form-row">
    <div class="form-group col-md-6">
        <label>Phone no</label>
        <input type="text" class="form-control" name="u_phone2" value="<?php if(isset($row['phooneno'])) echo $row['phooneno']; ?>" readonly>
   </div>
   <div class="form-group col-md-6">
        <label>City</label>
        <input type="text" class="form-control" name="u_city2" value="<?php if(isset($row['city'])) echo $row['city']; ?>" readonly>
   </div>
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <label>Animal to Hunt</label>
        <input type="text" class="form-control" name="anmlhunt2" value="<?php if(isset($row['hunt_animall'])) echo $row['hunt_animall']; ?>" value="">
   </div>
   <div class="form-group col-md-6">
        <label>No of Hunters</label>
        <input type="text" class="form-control" name="nmbranml2" value="<?php if(isset($row['hunt_incperson'])) echo $row['hunt_incperson']; ?>" value="">
   </div>
</div>
<label>Hunt City</label>
  <!-- <input type="text" class="form-control" name="carprob" placeholder="Oil Leakage"> -->
  <input type="text" class="form-control" name="hntcty2" value="<?php if(isset($row['hunt_area'])) echo $row['hunt_area']; ?>"><br>
  <label>Hunt Provine</label>
  <!-- <input type="text" class="form-control" name=""> -->
  <input class="form-control" rows="3" name="hntprv2" value="<?php if(isset($row['hunt_province'])) echo $row['hunt_province']; ?>"><br>


  <div class="form-row">
    <div class="form-group col-md-6">
        <label>Hunt Date</label>
        <input type="text" class="form-control" name="hntdate2" value="<?php if(isset($row['hunt_date'])) echo $row['hunt_date']; ?>" value="">
   </div>
   <div class="form-group col-md-6">
        <label>Hunt Time</label>
        <input type="text" class="form-control" name="hnttime2" value="<?php if(isset($row['hunt_time'])) echo $row['hunt_time']; ?>" value="">
   </div>
</div>

<br>
<input type="hidden" name="usr_id2" value="<?php if(isset($row['id'])) echo $row['id']; ?>">



    <div class="btn-block">
          <button type="submit" class="btn btn-primary btn-md" name="btnaprv">Approve Appointment</button>
        </div>
        
  </form>
  <?php
  if(isset($_REQUEST['btnaprv'])){
    if(($_REQUEST['apointid2'] =="") || ($_REQUEST['u_name2'] == "") || ($_REQUEST['u_email2'] == "") || ($_REQUEST['u_adress2'] == "") || ($_REQUEST['u_phone2'] == "") || ($_REQUEST['u_city2'] == "") || ($_REQUEST['anmlhunt2'] == "") || ($_REQUEST['nmbranml2'] == "") || ($_REQUEST['hntcty2'] == "") || ($_REQUEST['hntprv2'] == "") || ($_REQUEST['hntdate2'] == "") || ($_REQUEST['hnttime2'] == "")  ) {
      $msg = "<div class'alert alert-warning col-sm-6 ml-5 mt-2'>Fill all Fields to submit </div>";
    }
    else {

       $apn_id = $_REQUEST['apointid2'];
       $usr_name = $_REQUEST['u_name2'];
       $usr_email = $_REQUEST['u_email2'];
       $usr_adress = $_REQUEST['u_adress2'];
       $usr_phone = $_REQUEST['u_phone2'];
       $usr_cty = $_REQUEST['u_city2'];
       $anml_hnt = $_REQUEST['anmlhunt2'];
       $anml_noanimal = $_REQUEST['nmbranml2'];
       $hnt_cty = $_REQUEST['hntcty2'];
       $hnt_prv = $_REQUEST['hntprv2'];
       $hnt_dte = $_REQUEST['hntdate2'];
       $hnt_tme = $_REQUEST['hnttime2'];
       // $assign_shop = $_REQUEST['asgnshop'];
       $usr_id = $_REQUEST['usr_id2'];
       // $cr_id = $_REQUEST['cid2'];
       $create_datetime = date("Y-m-d H:i:s");
       // $ap_id = $_REQUEST['apointi2'];
       


  
       $insert = "INSERT INTO `huntappointment_approved`(`hnt_anml`, `hnt_noprsn`, `hnt_area`, `hnt_prvnce`, `hnt_date`, `hnt_time`, `c_user`, `c_eml`, `c_address`, `c_phoneno`, `c_city`, `date_created`, `id`, `huntapn_id`) VALUES ('$anml_hnt', '$anml_noanimal', '$hnt_cty', '$hnt_prv', '$hnt_dte', '$hnt_tme', '$usr_name', '$usr_email', '$usr_adress', '$usr_phone', '$usr_cty', '$create_datetime', '$usr_id', '$apn_id')";
  
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
