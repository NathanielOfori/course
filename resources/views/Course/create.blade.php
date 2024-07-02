@extends('Course.shell')

@section('content')
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Add Course</h3>
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

            <form method="POST" action="{{ route('course.store') }}" enctype="multipart/form-data">
                @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Course Title</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Enter course title" required>
                </div>
                <div class="form-group">
                    <label for="course_code">Course Code</label>
                    <input type="course_code" name="course_code" class="form-control" id="course_code" placeholder="Enter course code" required>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="description" name="description" class="form-control" id="description" placeholder="Enter description" required>
                </div>
                <div class="form-group">
                    <label for="credithours">Credit Hours</label>
                    <input type="credithours" name="credithours" class="form-control" id="credithours" placeholder="Enter credit hours" required>
                    @error('credithours')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="program_id">Programs</label>
                    <select id="program_id" name="program_id" class="form-control" required>
                        @foreach ($programs as $program)
                            <option value="{{ $program->id }}">{{ $program->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="lecturers">Lecturers</label>
                    <select name="lecturers[]" class="form-control" multiple required>
                        @foreach ($lecturers as $lecturer)
                            <option value="{{ $lecturer->id }}">{{ $lecturer->name }}</option>
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
