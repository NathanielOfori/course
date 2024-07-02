@extends('Student.shell')

@section('content')
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Student</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->


            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('student.update', $student->id) }}">
                @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="name" name="name" class="form-control" id="name" value="{{ $student->name }}" placeholder="Enter name">
                </div>
                <div class="form-group">
                    <label for="level">Level</label>
                    <input type="level" name="level" class="form-control" id="level" value="{{ $student->level }}" placeholder="Enter level">
                    @error('level')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="department_id">Department</label>
                        <select name="department_id" id="department_id" class="form-control" required>
                            @foreach ($departments as $department )
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                    <label for="program_id">Department</label>
                        <select name="program_id" id="program_id" class="form-control" required>
                            @foreach ($programs as $program )
                                <option value="{{ $program->id }}">{{ $program->name }}</option>
                            @endforeach
                        </select>
                </div>
            </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
        <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
        <div class="col-md-6">

        </div>
        <!--/.col (right) -->
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
@endsection
