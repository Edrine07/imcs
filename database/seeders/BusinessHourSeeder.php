<?php

namespace Database\Seeders;

use App\Models\BusinessHour;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessHourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = config('appoint.days');

        foreach ($days as $day) {
            BusinessHour::query()->updateOrCreate([
                'day' => $day,
            ], [
                'from' => "09:00",
                'to' => '18:00',
                'step' => 30
            ]);
        }
    }
}
