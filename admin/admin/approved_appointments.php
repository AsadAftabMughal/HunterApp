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
        Approved Appointments
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Employees</li>
        <li class="active">Approved Appointments Lists</li>
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
               <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Appointment ID</th>
                  <!-- <th>Photo</th> -->
                  <th>Hunt Animal</th>
                  <th>Hunters</th>
                  <th>Hunt Area</th>
                  <th>Hunt province</th>
                  <th>Hunt Date</th>
                  <th>Hunt Time</th>
                  <th>Tools</th>
                </thead>
                <tbody>
                  <?php
                    $sql = "SELECT * FROM `huntappointment_approved` ORDER BY  aprappoint_id DESC";
                    $query = $conn->query($sql);
                    while($row = $query->fetch_assoc()){
                      ?>
                        <tr>
                          <td><?php echo $row['huntapn_id']; ?></td>
                          
                          <td><?php echo $row['hnt_anml']; ?></td>
                          <td><?php echo $row['hnt_noprsn']; ?></td>
                          <td><?php echo $row['hnt_area']; ?></td>
                          <td><?php echo $row['hnt_prvnce']; ?></td>
                          <td><?php echo $row['hnt_date']; ?></td>
                          <td><?php echo $row['hnt_time']; ?></td>
                          <td>
                            <!-- <button class="btn btn-danger btn-sm edit btn-flat" name="btndel"> data-id="<?php echo $row['aprappoint_id']; ?>"> Delete</button> -->
                            <form action="" method="POST" class="d-inline">
                            <input type="hidden" name="id" value="<?php echo $row['aprappoint_id'];?>"><button type="submit" class="btn btn-danger float-right" name="btndel"><i class="fa fa-trash"></i></button>
                            </form>
                          </td>
                        </tr>
                      <?php
                    }
                    if (isset($_REQUEST['btndel'])) {
                            $sql = "DELETE FROM huntappointment_approved WHERE aprappoint_id = {$_REQUEST['id']}";
                     if ($conn->query($sql) == TRUE) {
                      echo '<meta http-equiv="refresh" content= "0;URL=?closed"/>';
                      }
                       else{
                            echo "Unable to Delete";
                          }
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
