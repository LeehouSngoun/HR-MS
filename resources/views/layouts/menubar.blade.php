{{-- @include('layouts.header') --}}
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('images/profile.jpg') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p></p>
          <a><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">REPORTS</li>
        <li class=""><a href="/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <li class="header">MANAGE</li>
        
        <li><a href="/attendance"><i class="fa fa-calendar"></i> <span>Attendance</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Cadidate</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/cadidate"><i class="fa fa-circle-o"></i> Cadidate List</a></li>
            <li><a href="/interview"><i class="fa fa-circle-o"></i> Interview List</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Employees</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/employee"><i class="fa fa-circle-o"></i> Employee List</a></li>
            {{-- <li><a href="/birthday"><i class="fa fa-circle-o"></i> BirthDay</a></li> --}}
            <li><a href="/overtime"><i class="fa fa-circle-o"></i> Overtime</a></li>
            <li><a href="/salary"><i class="fa fa-circle-o"></i> Salary List</a></li>
            <li><a href="/schedule"><i class="fa fa-circle-o"></i> Schedules</a></li>
          </ul>
        </li>
        <!-- <li><a href="deduction.php"><i class="fa fa-file-text"></i> Deductions</a></li> -->
        <li><a href="/position"><i class="fa fa-suitcase"></i> Positions</a></li>
        <li class="header">SETTING</li>
        <li><a href="/user"><i class="fa fa-user-plus"></i> <span>Add User</span></a></li>
        <li><a href="/role"><i class="fa fa-shield"></i> <span>Add Role</span></a></li>
        <li><a href="/department"><i class="fa fa-shield"></i> <span>Department</span></a></li>
        <li><a href="/pwd"><i class="fa fa-lock"></i> <span>Change Password</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>