<?php

namespace Database\Seeders;

use App\Models\Mark;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
     
        for( $i=2;$i<=60;$i++ ){
            // save student information
            $student = new Student();
            $student->roll_number = rand( 1111111, 9999999 );
            $student->name = $this->generateRandomString( rand( 5, 9 ) );
            $student->class = rand( 1, 9 );
            // $student->score = $request->score;
            $student->avtar = "avtar/16439964".$i.".jpg";
            $student->save();

            $score = 0;
            //save student subject information
            for( $k=0;$k<5;$k++ ){
                $mark = new Mark();
                $mark->student_id = $student->id;
                $mark->subject_id = rand( 1, 8 );
                $marks = rand( 11, 99 );
                $mark->mark = $marks;
                $mark->save();

                $score+= $marks;
            }

            $student->score = $score;
            $student->save();
        }
    }

    /**
     * 
     */
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
