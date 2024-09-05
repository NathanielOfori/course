
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AdminLTE 3 | Registration Page (v2)</title>

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
<!-- icheck bootstrap -->
<link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
<div class="card card-outline card-primary">
    <div class="text-center card-header">
    <a href="student/register" class="h1"><b>Student Registration</b></a>
    </div>
    <div class="card-body">
    <p class="login-box-msg">Register a new Student</p>

    @if(Auth::guard('admin')->check())
    <form method="POST" action="{{ route('stud.register') }}">
        @csrf

        <div class="form-group">
            <label for="indexnumber">Index Number:</label>
            <input type="text" class="form-control" id="indexnumber" name="indexnumber" required>
        </div>

        <div class="form-group">
            <label for="level">Level:</label>
            <select class="form-control" id="level" name="level" required>
                <option value="">Select Level</option>
                <option value="100">100</option>
                <option value="200">200</option>
                <option value="300">300</option>
                <option value="400">400</option>
            </select>
        </div>

        <div class="form-group">
            <label for="department_id">Department:</label>
            <select class="form-control" id="department_id" name="department_id" required>
                <option value="">Select Department</option>
                @foreach($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="program_id">Program:</label>
            <select class="form-control" id="program_id" name="program_id" required>
                <option value="">Select Program</option>
                @foreach($programs as $program)
                    <option value="{{ $program->id }}">{{ $program->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="firstname">First Name:</label>
            <input type="text" class="form-control" id="firstname" name="firstname" required>
        </div>

        <div class="form-group">
            <label for="othernames">Other Names:</label>
            <input type="text" class="form-control" id="othernames" name="othernames">
        </div>

        <div class="form-group">
            <label for="lastname">Last Name:</label>
            <input type="text" class="form-control" id="lastname" name="lastname" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" class="form-control" id="phone" name="phone">
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
    @else
    <p>You do not have access to this page.</p>
    @endif

    {{-- <div class="text-center social-auth-links">
        <a href="#" class="btn btn-block btn-primary">
        <i class="mr-2 fab fa-facebook"></i>
        Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
        <i class="mr-2 fab fa-google-plus"></i>
        Sign up using Google+
        </a>
    </div> --}}

    <a href="student/login" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
</div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
