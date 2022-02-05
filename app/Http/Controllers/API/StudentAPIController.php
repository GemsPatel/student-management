<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Student;

class StudentAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     * Functionality: Will return a list of students ordered by the highest scoring student first combined of all subjects.
    *  Response Should Contain below data
    *   1. Student Name
    *   2. Student Roll No
    *   3. Student Photo link
    *   4. Class
    *   5. Total Score
     */
    public function index()
    {
        $students = Student::select('id', 'roll_number', 'name', 'avtar', 'class', 'score')->orderBy( 'score', 'desc' )->paginate(10);//with('mark')->
        // $resultArr = [];
        foreach( $students as $k=>$ar ){
            // $resultArr[$k] = $ar;
            // $resultArr[$k]['id']= ++$k;
            // $resultArr[$k]['roll_name']= $ar->roll_number;
            // $resultArr[$k]['student_name']= $ar->name;
            $students[$k]['avtar']= url( '../storage/app/'.$ar->avtar );
            // $resultArr[$k]['class']= $ar->class;
            // $resultArr[$k]['score']= $ar->score;
        }

        // $resultArr['first_page_url'] = $students->first_page_url;
        // $resultArr['from'] = $students->from;
        // $resultArr['last_page'] = $students->last_page;
        // $resultArr['links'] = $students->links;
        // $resultArr['next_page_url'] = $students->next_page_url;
        // $resultArr['path'] = $students->path;
        // $resultArr['per_page'] = $students->per_page;
        // $resultArr['prev_page_url'] = $students->prev_page_url;
        // $resultArr['to'] = $students->to;
        // $resultArr['total'] = $students->total;
        // $resultArr['current_page'] = $students->current_page;
        return response()->json( ['status' => true, 'message' => "Record retry successfully", 'result' => $students ], 200);
    }
}
