@extends('layout')
@section('content')
<?php
use App\Models\Mark;
?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left text-center p-3">
                <h3>Student Management with API</h3>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('students.index') }}"> Student</a>
                <a class="btn btn-warning" href="{{ route('subjects.index') }}"> Subject</a>
            </div>
        </div>
        <div class="col-lg-12 margin-tb">
            <div class="text-right pt-3">
                <a class="btn btn-primary" href="{{ route('students.create') }}"> New Student</a>
            </div>
            <br>
        </div>
    </div>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <span>{{ $message }}</span>
    </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Roll Number</th>
            <th>Name</th>
            <th>Class</th>
            <th>Subject 1</th>
            <th>Subject 2</th>
            <th>Subject 3</th>
            <th>Subject 4</th>
            <th>Subject 5</th>
            <th>Score</th>
            <th>Action</th>
        </tr>
        @forelse ($students as $ar)
            <?php
            $subjectArr = Mark::with('subject')->where('student_id', $ar->id)->get();//DB::table('marks')->with( 'subject' )->where('student_id', $ar->id )->get();
            ?>
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{$ar->roll_number}}</td>
                <td>{{$ar->name}}</td>
                <td>{{$ar->class}}</td>
                <td>{{$subjectArr[0]->subject->name.": ".$subjectArr[0]->mark}}</td>
                <td>{{$subjectArr[1]->subject->name.": ".$subjectArr[1]->mark}}</td>
                <td>{{$subjectArr[2]->subject->name.": ".$subjectArr[2]->mark}}</td>
                <td>{{$subjectArr[3]->subject->name.": ".$subjectArr[3]->mark}}</td>
                <td>{{$subjectArr[4]->subject->name.": ".$subjectArr[4]->mark}}</td>
                <td>{{$ar->score}}</td>
                <td>
                    <form action="{{ route('students.destroy',$ar->id) }}" method="POST">
                        @csrf
                        <a class="btn btn-info" href="{{ route('students.show',$ar->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('students.edit',$ar->id) }}">Edit</a>
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Do you really want to delete student!')" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr class="text-center">
                <td colspan="11">There were no results found.</td>
            </tr>
        @endforelse
    </table>
{!! $students->links() !!}
@endsection