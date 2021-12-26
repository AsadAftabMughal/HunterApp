<aside class="main-sidebar" style="margin-top: 40px">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo (!empty($user['photo'])) ? '../images/'.$user['photo'] : '../images/profile.jpg'; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user['firstname'].' '.$user['lastname']; ?></p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">REPORTS</li>
        <li class=""><a href="home.php"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class=""><a href="../../chat/index.php"><i class="fa fa-dashboard"></i> <span>Live Chat</span></a></li>
        <li class="header">MANAGE</li>
        
        <!-- <li><a href="attendance.php"><i class="fa fa-calendar"></i> <span>Attendance</span></a></li> -->
        <!-- <li><a href="#"><i class="fa fa-calendar"></i> <span>Attendance</span></a></li> -->
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Employees</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a> -->
          <!-- <li>
            <a href="employee.php"><i class="fa fa-users"></i>Employee List</a>
          </li>
         <li>
            <a href="schedule.php"><i class="fa fa-circle-o"></i> Schedules </a>
         </li> -->
         <li>
            <a href="Users.php"><i class="fa fa-circle-o"></i>Users</a>
          </li>
        <li>
            <a href="pendingappointments.php"><i class="fa fa-circle-o"></i>Hunts Requests</a>
         </li>
         <li>
            <a href="approved_appointments.php"><i class="fa fa-circle-o"></i>Approved Hunts Requests</a>
          </li>
          <li>
            <a href="addhotel.php"><i class="fa fa-circle-o"></i>Add Hotel</a>
          </li>
          <li>
            <a href="hotelslist.php"><i class="fa fa-circle-o"></i>Hotel List</a>
          </li>
          <li>
            <a href="hotelbkingrequests.php"><i class="fa fa-circle-o"></i>Hotel booking Requests</a>
          </li>
          <li>
            <a href="approvedhtlbking.php"><i class="fa fa-circle-o"></i>Hotel Booking approved</a>
          </li>

        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Teams</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Teams</a></li>
            <li><a href="overtime.php"><i class="fa fa-circle-o"></i> Overtime</a></li>
            <li><a href="cashadvance.php"><i class="fa fa-circle-o"></i> Cash Advance</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Asigned Shops</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Schedules</a></li>
          </ul>
        </li> -->
       <!--  <li><a href="deduction.php"><i class="fa fa-file-text"></i> Deductions</a></li> -->
        <!-- <li><a href="position.php"><i class="fa fa-suitcase"></i> Positions</a></li>
        <li class="header">PRINTABLES</li> -->
        <!-- <li><a href="payroll.php"><i class="fa fa-files-o"></i> <span>Payroll</span></a></li> -->
        <!-- <li><a href="#"><i class="fa fa-files-o"></i> <span>Payroll</span></a></li> -->
        <!-- <li><a href="schedule_employee.php"><i class="fa fa-clock-o"></i> <span>Schedule</span></a></li> -->
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>





  