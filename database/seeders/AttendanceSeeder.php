<?php

namespace Database\Seeders;

use App\Models\Attendance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 50; $i++) {
            $today = date('Y-m-d', strtotime((49 - $i) . " days ago"));
            $a = new Attendance();
            $a->date = $today;
            $hourin = rand(7, 10);
            $hourout = rand(17, 18);
            $minutesin = rand(0, 59);
            $minutesout = rand(0, 59);
            $a->clock_in = $today . " " . ($hourin < 10 ? '0' . $hourin : $hourin) . ":" . ($minutesin < 10 ? '0' . $minutesin : $minutesin) . ":00";
            $a->clock_out = $today . " " . ($hourout < 10 ? '0' . $hourout : $hourout) . ":" . ($minutesout < 10 ? '0' . $minutesout : $minutesout) . ":00";
            $a->user_id = 1;
            $a->save();
        }
    }
}
