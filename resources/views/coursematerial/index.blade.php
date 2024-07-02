
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../../index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="ml-auto navbar-nav">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/dashboard" class="brand-link">
        {{-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
        <span class="brand-text font-weight-light">Course Management System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="pb-3 mt-3 mb-3 user-panel d-flex">
        <div class="image">
            <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="/profile" class="d-block">{{ Auth::user()->name }}</a>
        </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
            <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
            </button>
            </div>
        </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
            <a href="dashboard" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                Dashboard
                </p>
            </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                    Courses
                    <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                    <a href="/course" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Available Courses</p>
                    </a>
                    </li>
                    <li class="nav-item">
                    <a href="../examples/profile.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Accessed Courses</p>
                    </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-building"></i>
                    <p>
                        Departments
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a class="nav-link" href="/department">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Departments</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/department/create">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Department</p>
                            </a>
                        </li>
                </ul>
            </li>

            <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                Progress Charts
                </p>
            </a>
            </li>

            <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                Forms
                <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/department/create" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Department</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/program/create" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Program</p>
                    </a>
                </li>
                <li class="nav-item">
                <a href="/lecturer/create" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Lecturer</p>
                </a>
                </li>
                <li class="nav-item">
                    <a href="/student/create" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Student</p>
                    </a>
                </li>
                <li class="nav-item">
                <a href="/course/create" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Add Course</p>
                </a>
                </li>
                <li class="nav-item">
                    <a href="/assignment/create" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Assignment</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/exam/create" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Add Exam</p>
                    </a>
                </li>
            </ul>
            </li>
            <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                Tables
                <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="../tables/simple.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Simple Tables</p>
                </a>
                </li>
                <li class="nav-item">
                <a href="../tables/data.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>DataTables</p>
                </a>
                </li>
                <li class="nav-item">
                <a href="../tables/jsgrid.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>jsGrid</p>
                </a>
                </li>
            </ul>
            </li>

            <li class="nav-item">
            <a href="../calendar.html" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                Calendar
                <span class="badge badge-info right">2</span>
                </p>
            </a>
            </li>
        </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
        <div class="col-sm-6">
            <h1>Course Material</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Course Material</li>
            </ol>
        </div>
        </div>
    </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
        <div class="col-12">
            <div class="card">
            <div class="card-header">

                <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="float-right form-control" placeholder="Search">

                    <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                        <i class="fas fa-search"></i>
                    </button>
                    </div>
                </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="p-0 card-body table-responsive">
                <table class="table table-hover text-nowrap">
                <thead>
                    <tr>
                    <th>Course Name</th>
                    <th>Course Code</th>
                    <th>Download</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($coursematerials as $coursematerial)
                    <tr>
                    <td>{{ $coursematerial->course->name }}</td>
                    <td>{{ $coursematerial->course->course_code }}</td>
                    <td>
                        @if ($coursematerial->files && Storage::exists('public/' . $coursematerial->files))
                    <a href="{{ Storage::url($coursematerial->files) }}" download>Download</a>
                        @else
                            No file
                        @endif
                    </td>
                     <!-- Displaying the lecturer department name -->
                    {{-- <td>{{ $coursematerial->program->name }}</td> <!-- Displaying the lecturer program name --> --}}
                    {{-- <td>
                        @foreach ($lecturer->courses as $course)
                            {{ $course->name }}
                        @endforeach
                    </td> <!-- Displaying the lecturer course name --> --}}

                    <td><a href="{{ route('coursematerial.edit', $coursematerial->id) }}" class='btn btn-primary'>Edit</a></95td>
                        <td>
                            <form action="{{ route('coursematerial.destroy', $coursematerial->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Lecturer?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        </div>
        <!-- /.row -->

    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
    <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
