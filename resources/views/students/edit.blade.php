@extends('layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Student</h2>
            </div>
        </div>
    </div>
    @if (false && $errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> something we are problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('students.update',$students->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-8 mb-3">
            <div class="row p-0">
                <div class="col-md-12 mb-3">
                    <div class="form-group mb-0">
                        <strong>Roll Number:</strong>
                        <input type="text" name="roll_number" class="form-control" placeholder="Student Roll Number" value="{{$students->roll_number}}">
                    </div>
                    @if($errors->has('roll_number'))
                        <div class="error">{{ $errors->first('roll_number') }}</div>
                    @endif
                </div>
                <div class="col-md-12 mb-3">
                    <div class="form-group mb-0">
                        <strong>Student Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Student name" value="{{$students->name}}">
                    </div>
                    @if($errors->has('name'))
                        <div class="error">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="col-md-12 mb-3">
                    <div class="form-group mb-0">
                        <strong>Class:</strong>
                        <select name="class" id="class" class="form-control">
                            @for( $i=1;$i<=12;$i++ )
                                <option value="{{$i}}" {{($students->class == $i ) ? 'selected' : '' }}>{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    @if($errors->has('class'))
                        <div class="error">{{ $errors->first('class') }}</div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="center">
                <div class="form-input">
                    <div class="preview">
                        <label for="file-ip-1">Upload Avtar</label>
                        <input type="file" id="file-ip-1" name="avtar" accept="image/*" onchange="showPreview(event);">
                        <img id="file-ip-1-preview" src="{{url( "../storage/app /".$students->avtar )}}" style="display: block;">
                    </div>
                </div>
            </div>
            @if($errors->has('avtar'))
                <div class="error">{{ $errors->first('avtar') }}</div>
            @endif
        </div>
    </div>
    <?php
    $subjectArr = DB::table('subjects')->where('status', 1)->get();
    ?>
    <div class="row mb-3 p-0">
        <div class="col-md-6">
            <div class="form-group mb-0">
                <strong>Subject:</strong>
                <select name="subject_0" id="subject_0" class="form-control">
                    <option value="">Select Subject 1</option>
                    @foreach( $subjectArr as $ar )
                        <option value="{{$ar->id}}" {{($students->mark[0]->subject->id == $ar->id ) ? 'selected' : '' }}>{{$ar->name}}</option>
                    @endforeach
                </select>
            </div>
            @if($errors->has('subject_0'))
                <div class="error">The Subject 1 field is required.</div>
            @endif
        </div>
        <div class="col-md-6">
            <div class="form-group mb-0">
                <strong>Marks:</strong>
                <input type="number" name="mark_0" class="form-control marks" placeholder="Mark" value="{{$students->mark[0]->mark}}">
            </div>
            @if($errors->has('mark_0'))
                <div class="error">The Mark 1 field is required.</div>
            @endif
        </div>
    </div>
    <div class="row mb-3 p-0">
        <div class="col-md-6">
            <div class="form-group mb-0">
                <strong>Subject:</strong>
                <select name="subject_1" id="subject_1" class="form-control">
                    <option value="">Select Subject 2</option>
                    @foreach( $subjectArr as $ar )
                        <option value="{{$ar->id}}" {{($students->mark[1]->subject->id == $ar->id ) ? 'selected' : '' }}>{{$ar->name}}</option>
                    @endforeach
                </select>
            </div>
            @if($errors->has('subject_1'))
                <div class="error">The Subject 2 field is required.</div>
            @endif
        </div>
        <div class="col-md-6">
            <div class="form-group mb-0">
                <strong>Marks:</strong>
                <input type="number" name="mark_1" class="form-control marks" placeholder="Mark" value="{{$students->mark[1]->mark}}">
            </div>
            @if($errors->has('mark_1'))
                <div class="error">The Mark 2 field is required.</div>
            @endif
        </div>
    </div>
    <div class="row mb-3 p-0">
        <div class="col-md-6">
            <div class="form-group mb-0">
                <strong>Subject:</strong>
                <select name="subject_2" id="subject_2" class="form-control">
                    <option value="">Select Subject 3</option>
                    @foreach( $subjectArr as $ar )
                        <option value="{{$ar->id}}" {{($students->mark[2]->subject->id == $ar->id ) ? 'selected' : '' }}>{{$ar->name}}</option>
                    @endforeach
                </select>
            </div>
            @if($errors->has('subject_2'))
                <div class="error">The Subject 3 field is required.</div>
            @endif
        </div>
        <div class="col-md-6">
            <div class="form-group mb-0">
                <strong>Marks:</strong>
                <input type="number" name="mark_2" class="form-control marks" placeholder="Mark" value="{{$students->mark[2]->mark}}">
            </div>
            @if($errors->has('mark_2'))
                <div class="error">The Mark 3 field is required.</div>
            @endif
        </div>
    </div>
    <div class="row mb-3 p-0">
        <div class="col-md-6">
            <div class="form-group mb-0">
                <strong>Subject:</strong>
                <select name="subject_3" id="subject_3" class="form-control">
                    <option value="">Select Subject 4</option>
                    @foreach( $subjectArr as $ar )
                        <option value="{{$ar->id}}" {{($students->mark[3]->subject->id == $ar->id ) ? 'selected' : '' }}>{{$ar->name}}</option>
                    @endforeach
                </select>
            </div>
            @if($errors->has('subject_3'))
                <div class="error">The Subject 4 field is required.</div>
            @endif
        </div>
        <div class="col-md-6">
            <div class="form-group mb-0">
                <strong>Marks:</strong>
                <input type="number" name="mark_3" class="form-control marks" placeholder="Mark" value="{{$students->mark[3]->mark}}">
            </div>
            @if($errors->has('mark_3'))
                <div class="error">The Mark 4 field is required.</div>
            @endif
        </div>
    </div>
    <div class="row mb-3 p-0">
        <div class="col-md-6">
            <div class="form-group mb-0">
                <strong>Subject:</strong>
                <select name="subject_4" id="subject_4" class="form-control">
                    <option value="">Select Subject_5</option>
                    @foreach( $subjectArr as $ar )
                        <option value="{{$ar->id}}" {{($students->mark[4]->subject->id == $ar->id ) ? 'selected' : '' }}>{{$ar->name}}</option>
                    @endforeach
                </select>
            </div>
            @if($errors->has('subject_4'))
                <div class="error">The Subject 5 field is required.</div>
            @endif
        </div>
        <div class="col-md-6">
            <div class="form-group mb-0">
                <strong>Marks:</strong>
                <input type="number" name="mark_4" class="form-control marks" placeholder="Mark" value="{{$students->mark[4]->mark}}">
            </div>
            @if($errors->has('mark_4'))
                <div class="error">The Mark 5 field is required.</div>
            @endif
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-12">
            <div class="form-group mb-0">
                <strong>Score:</strong>
                <input type="number" name="score" class="form-control" id="score" placeholder="Subject Total Score" value="{{$students->score}}">
            </div>
            @if($errors->has('score'))
                <div class="error">{{ $errors->first('score') }}</div>
            @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
        <button type="submit" class="btn btn-success">Submit</button>
    </div>
    </form>
    <script>
        $(document).ready(function() {
            calculateMarks();
        
            $(".marks").on( "keyup", function(){
                calculateMarks();
            });
        });
        /**
         * 
         */
         function calculateMarks(){
            var mark = 0;
            $('.marks').each(function() {
                mark += Number( $(this).val() );
            });
            $("#score").val(mark);
         } 
        
        function showPreview(event){
          if(event.target.files.length > 0){
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("file-ip-1-preview");
            preview.src = src;
            preview.style.display = "block";
          }
        }
        </script>
@endsection