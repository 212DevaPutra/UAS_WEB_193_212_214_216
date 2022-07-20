<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::create([
            'rumah_sakit'=>"RSUD Saiful Anwar",
            'tanggal_vaksin'=>"22/07/2022",
            'jenis_vaksin'=>"Pfizer",
            'kuota'=>"1000",
            'user_id'=> 1,
            'url_rs'=>"https://cdn.britannica.com/70/161670-050-8E5BCC80/Red-eyed-tree-frog.jpg?q=60",
            'review'=>"Rumah Sakit milik pemerintah yang sangat bagus dan pelayanan ramah",
            'Rating'=>"5",
        ]);
    }
}
