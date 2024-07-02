@extends('Assignment.shell')

@section('content')
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Assignments</h3>
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

            <form method="POST" action="{{ route('assignment.update', $assignment->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            <div class="card-body">
                <div class="form-group">
                <label for="title">Title</label>
                <input type="title" name="title" class="form-control" id="title" value="{{ $assignment->title }}" placeholder="Enter title">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="description" name="description" class="form-control" id="description" value="{{ $assignment->description }}" placeholder="Enter description">
                </div>
                <div class="form-group">
                    <label for="file">Upload File</label>
                    <input type="file" name="file" class="form-control" id="file">
                    @error('file')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deadline">Deadline</label>
                    <input type="deadline" name="deadline" class="form-control" id="deadline" value="{{ $assignment->deadline }}" placeholder="Enter deadline (dd/mm/yyyy)">
                    @error('deadline')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="grade">Grade</label>
                    <input type="grade" name="grade" class="form-control" id="grade" value="{{ $assignment->grade }}" placeholder="Enter grade">
                </div>
                <div class="form-group">
                    <label for="score">Score</label>
                    <input type="score" name="score" class="form-control" id="score" value="{{ $assignment->score }}" placeholder="Enter score">
                </div>
                <div class="form-group">
                    <label for="course_id">Course</label>
                    <select id="course_id" name="course_id" class="form-control" required>
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="lecturer_id">Lecturer</label>
                    <select id="lecturer_id" name="lecturer_id" class="form-control" required>
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
