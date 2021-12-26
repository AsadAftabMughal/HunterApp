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
        Team
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
            <div class="box-header with-border">
               <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New Team</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Username</th>
                  <!-- <th>Photo</th> -->
                  <th>Email</th>
                  <th>Phone no</th>
                  <th>City</th>
                  <th>CNIC no</th>
                  <th>Account created</th>
                  
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM `customer`";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                          <td><?php echo $row['username']; ?></td>                          
                          <td><?php echo $row['email']; ?></td>
                          <td><?php echo $row['phooneno']; ?></td>
                          <td><?php echo $row['city']; ?></td>
                          <td><?php echo $row['cnic_no']; ?></td>
                          <td><?php echo $row['create_datetime']; ?></td>
                          
                        </tr>
                      <?php
                    }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>   
  </div>
    
  <?php include 'includes/footer.php'; ?>
  <?php include 'includes/team_modal.php'; ?>
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
