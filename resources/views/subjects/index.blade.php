@extends('layout')
@section('content')
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
                <a class="btn btn-primary" href="{{ route('subjects.create') }}"> New Subject</a>
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
            <th>Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @forelse ($subjects as $ar)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $ar->name }}</td>
                <td>{{ ($ar->status == 1) ? 'Active' : 'De-Actice' }}</td>
                <td>
                    <form action="{{ route('subjects.destroy',$ar->id) }}" method="POST">
                        @csrf
                        <a class="btn btn-info d-none" href="{{ route('subjects.show',$ar->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('subjects.edit',$ar->id) }}">Edit</a>
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Do you really want to delete {{$ar->name}} Subject!')" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr class="text-center">
                <td colspan="4">There were no results found.</td>
            </tr>
        @endforelse
    </table>
{!! $subjects->links() !!}
@endsection