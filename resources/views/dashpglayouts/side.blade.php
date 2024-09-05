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
        <a href="stud/logout" class="d-block">Logout</a>
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
            <a href="https://adminlte.io/docs/3.1/" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>Course Materials
                <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="/coursematerial" class="nav-link">
                    {{-- <i class="far fa-circle nav-icon"></i> --}}
                    <p>Available Course Materials</p>
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
            <a href="/course/create" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Add Course</p>
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
        <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="nav-icon far fa-envelope"></i>
            <p>
            Mailbox
            <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
            <a href="../mailbox/mailbox.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Inbox</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="../mailbox/compose.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Compose</p>
            </a>
            </li>
            <li class="nav-item">
            <a href="../mailbox/read-mail.html" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Read</p>
            </a>
            </li>
        </ul>
        </li>





    </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
