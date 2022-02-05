<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $subjectArr = [
            'Laravel', 'Wordpress', 'Magento', 'Prestashop', 'Codeigniter', 'Shopify', 'Cake PHP', 'Testigniter'
        ];

        foreach( $subjectArr as $subject ){
            $sub = new Subject();
            $sub->name = $sub;
            $sub->status = 1;
            $sub->save();
        }
    }
}
