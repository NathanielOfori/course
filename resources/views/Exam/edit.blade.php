@extends('Exam.shell')

@section('content')
<section class="content">
    <div class="container-fluid">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
            <div class="card-header">
            <h3 class="card-title">Exam</h3>
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

            <form method="POST" action="{{ route('exam.update', $exam->id) }}" enctype="multipart/form-data">
                @csrf

                @method('PUT')
            <div class="card-body">
                <div class="form-group">
                <label for="title">Title</label>
                <input type="title" name="title" class="form-control" id="title" value="{{ $exam->title }}" placeholder="Enter title">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="description" name="description" class="form-control" id="description" value="{{ $exam->description }}" placeholder="Enter description">
                </div>
                <div class="form-group">
                    <label for="date">Date</label>
                    <input type="date" name="date" class="form-control" id="date" value="{{ $exam->date }}" placeholder="Enter date (dd/mm/yyyy)">
                    @error('date')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="file">Upload File</label>
                    <input type="file" name="file" class="form-control" id="file">
                    @error('file')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="grade">Grade</label>
                    <input type="grade" name="grade" class="form-control" id="grade" value="{{ $exam->grade }}" placeholder="Enter grade">
                </div>
                <div class="form-group">
                    <label for="score">Score</label>
                    <input type="score" name="score" class="form-control" id="score" value="{{ $exam->score }}" placeholder="Enter score">
                    @error('score')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
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
