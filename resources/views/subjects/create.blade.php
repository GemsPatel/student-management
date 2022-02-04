@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left pt-3 pb-3">
                <h2>Create new Subject</h2>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
        <strong>Whoops!</strong> something we are problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
    @endif
    <form action="{{ route('subjects.store') }}" method="POST">
    @csrf
    <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Subject Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Subject Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select name="status" id="status" class="form-control">
                        <option value="1">Active</option>
                        <option value="0">De-Active</option>
                    </select>
                </div>
            </div>
            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-primary" href="{{ route('subjects.index') }}"> Back</a>
            <a class="btn btn-warning" href="{{ route('students.index') }}"> Home</a>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
    </form>
@endsection