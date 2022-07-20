<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reviewTags = [
            [
                'tag_id' => 1,
                'review_id' => 1,
            ],
            [
                'tag_id' => 2,
                'review_id' => 1,
            ],
        ];
        foreach ($reviewTags as $reviewTag) {
            DB::table('review_tag')->insert($reviewTag); 
        }
    }
}
