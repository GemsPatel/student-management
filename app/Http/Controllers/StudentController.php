<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::latest()->paginate(10);
        return view('students.index',compact('students'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'roll_number' => 'required',
            'name' => 'required',
            'class' => 'required',
            // 'subject' => 'required|array|min:5',
            // 'mark' => 'required|array|min:5',
            'subject_0' => 'required',
            'mark_0' => 'required',
            'subject_1' => 'required',
            'mark_1' => 'required',
            'subject_2' => 'required',
            'mark_2' => 'required',
            'subject_3' => 'required',
            'mark_3' => 'required',
            'subject_4' => 'required',
            'mark_4' => 'required',
            'score' => 'required',
        ]);

        // save student information
        $student = new Student();
        $student->roll_number = $request->roll_number;
        $student->name = $request->name;
        $student->class = $request->class;
        $student->score = $request->score;
        $student->save();

        //save student subject information
        // if( $request->subject ){
        //     foreach( $request->subject as $k=>$ar ){
                for( $k=0;$k<5;$k++ ){
                    $mark = new Mark();
                    $mark->student_id = $student->id;
                    $subject = "subject_".$k;
                    $marks = "mark_".$k;
                    $mark->subject_id = $request->$subject;
                    $mark->mark = $request->$marks;
                    $mark->save();
                }
        //     }
        // }

        // Student::create($request->all());
        return redirect()->route('students.index')->with('success','Student created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
        return view('students.show',compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
        return view('students.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'age' => 'required',
        ]);
        $student->update($request->all());
        return redirect()->route('students.index')->with('success','Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
        $student->delete();
        return redirect()->route('students.index')->with('success','Student deleted successfully');
    }
}
