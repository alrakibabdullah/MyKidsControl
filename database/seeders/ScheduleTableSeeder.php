<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Database\Factories\ScheduleFactory;
use Illuminate\Database\Seeder;

class ScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ScheduleFactory::times('10')->create();
        Schedule::create([
            'user_id'=>"1",
            'title'=>"Reading",
            'from_time'=>'10:53:44',
            'to_time'=>'06:52:49',
            'saturday'=>'1',
            'sunday'=>'0',
            'monday'=>'1',
            'tuesday'=>'1',
            'wednesday'=>'0',
            'thursday'=>'1',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"1",
            'title'=>"Writing",
            'from_time'=>'07:53:44',
            'to_time'=>'08:52:49',
            'saturday'=>'1',
            'sunday'=>'1',
            'monday'=>'0',
            'tuesday'=>'0',
            'wednesday'=>'1',
            'thursday'=>'1',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"1",
            'title'=>"Playing",
            'from_time'=>'09:53:44',
            'to_time'=>'14:52:49',
            'saturday'=>'1',
            'sunday'=>'1',
            'monday'=>'1',
            'tuesday'=>'1',
            'wednesday'=>'0',
            'thursday'=>'0',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"2",
            'title'=>"Reading",
            'from_time'=>'10:53:44',
            'to_time'=>'06:52:49',
            'saturday'=>'1',
            'sunday'=>'0',
            'monday'=>'1',
            'tuesday'=>'1',
            'wednesday'=>'0',
            'thursday'=>'1',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"2",
            'title'=>"Writing",
            'from_time'=>'07:53:44',
            'to_time'=>'08:52:49',
            'saturday'=>'1',
            'sunday'=>'1',
            'monday'=>'0',
            'tuesday'=>'0',
            'wednesday'=>'1',
            'thursday'=>'1',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"2",
            'title'=>"Playing",
            'from_time'=>'09:53:44',
            'to_time'=>'14:52:49',
            'saturday'=>'1',
            'sunday'=>'1',
            'monday'=>'1',
            'tuesday'=>'1',
            'wednesday'=>'0',
            'thursday'=>'0',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"3",
            'title'=>"Reading",
            'from_time'=>'10:53:44',
            'to_time'=>'06:52:49',
            'saturday'=>'1',
            'sunday'=>'0',
            'monday'=>'1',
            'tuesday'=>'1',
            'wednesday'=>'0',
            'thursday'=>'1',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"3",
            'title'=>"Writing",
            'from_time'=>'07:53:44',
            'to_time'=>'08:52:49',
            'saturday'=>'1',
            'sunday'=>'1',
            'monday'=>'0',
            'tuesday'=>'0',
            'wednesday'=>'1',
            'thursday'=>'1',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"3",
            'title'=>"Playing",
            'from_time'=>'09:53:44',
            'to_time'=>'14:52:49',
            'saturday'=>'1',
            'sunday'=>'1',
            'monday'=>'1',
            'tuesday'=>'1',
            'wednesday'=>'0',
            'thursday'=>'0',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"4",
            'title'=>"Reading",
            'from_time'=>'10:53:44',
            'to_time'=>'06:52:49',
            'saturday'=>'1',
            'sunday'=>'0',
            'monday'=>'1',
            'tuesday'=>'1',
            'wednesday'=>'0',
            'thursday'=>'1',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"4",
            'title'=>"Writing",
            'from_time'=>'07:53:44',
            'to_time'=>'08:52:49',
            'saturday'=>'1',
            'sunday'=>'1',
            'monday'=>'0',
            'tuesday'=>'0',
            'wednesday'=>'1',
            'thursday'=>'1',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"4",
            'title'=>"Playing",
            'from_time'=>'09:53:44',
            'to_time'=>'14:52:49',
            'saturday'=>'1',
            'sunday'=>'1',
            'monday'=>'1',
            'tuesday'=>'1',
            'wednesday'=>'0',
            'thursday'=>'0',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"5",
            'title'=>"Reading",
            'from_time'=>'10:53:44',
            'to_time'=>'06:52:49',
            'saturday'=>'1',
            'sunday'=>'0',
            'monday'=>'1',
            'tuesday'=>'1',
            'wednesday'=>'0',
            'thursday'=>'1',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"5",
            'title'=>"Writing",
            'from_time'=>'07:53:44',
            'to_time'=>'08:52:49',
            'saturday'=>'1',
            'sunday'=>'1',
            'monday'=>'0',
            'tuesday'=>'0',
            'wednesday'=>'1',
            'thursday'=>'1',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"5",
            'title'=>"Playing",
            'from_time'=>'09:53:44',
            'to_time'=>'14:52:49',
            'saturday'=>'1',
            'sunday'=>'1',
            'monday'=>'1',
            'tuesday'=>'1',
            'wednesday'=>'0',
            'thursday'=>'0',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"6",
            'title'=>"Reading",
            'from_time'=>'10:53:44',
            'to_time'=>'06:52:49',
            'saturday'=>'1',
            'sunday'=>'0',
            'monday'=>'1',
            'tuesday'=>'1',
            'wednesday'=>'0',
            'thursday'=>'1',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"6",
            'title'=>"Writing",
            'from_time'=>'07:53:44',
            'to_time'=>'08:52:49',
            'saturday'=>'1',
            'sunday'=>'1',
            'monday'=>'0',
            'tuesday'=>'0',
            'wednesday'=>'1',
            'thursday'=>'1',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"6",
            'title'=>"Playing",
            'from_time'=>'09:53:44',
            'to_time'=>'14:52:49',
            'saturday'=>'1',
            'sunday'=>'1',
            'monday'=>'1',
            'tuesday'=>'1',
            'wednesday'=>'0',
            'thursday'=>'0',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"7",
            'title'=>"Reading",
            'from_time'=>'10:53:44',
            'to_time'=>'06:52:49',
            'saturday'=>'1',
            'sunday'=>'0',
            'monday'=>'1',
            'tuesday'=>'1',
            'wednesday'=>'0',
            'thursday'=>'1',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"7",
            'title'=>"Writing",
            'from_time'=>'07:53:44',
            'to_time'=>'08:52:49',
            'saturday'=>'1',
            'sunday'=>'1',
            'monday'=>'0',
            'tuesday'=>'0',
            'wednesday'=>'1',
            'thursday'=>'1',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"7",
            'title'=>"Playing",
            'from_time'=>'09:53:44',
            'to_time'=>'14:52:49',
            'saturday'=>'1',
            'sunday'=>'1',
            'monday'=>'1',
            'tuesday'=>'1',
            'wednesday'=>'0',
            'thursday'=>'0',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"8",
            'title'=>"Reading",
            'from_time'=>'10:53:44',
            'to_time'=>'06:52:49',
            'saturday'=>'1',
            'sunday'=>'0',
            'monday'=>'1',
            'tuesday'=>'1',
            'wednesday'=>'0',
            'thursday'=>'1',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"8",
            'title'=>"Writing",
            'from_time'=>'07:53:44',
            'to_time'=>'08:52:49',
            'saturday'=>'1',
            'sunday'=>'1',
            'monday'=>'0',
            'tuesday'=>'0',
            'wednesday'=>'1',
            'thursday'=>'1',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"8",
            'title'=>"Playing",
            'from_time'=>'09:53:44',
            'to_time'=>'14:52:49',
            'saturday'=>'1',
            'sunday'=>'1',
            'monday'=>'1',
            'tuesday'=>'1',
            'wednesday'=>'0',
            'thursday'=>'0',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"9",
            'title'=>"Reading",
            'from_time'=>'10:53:44',
            'to_time'=>'06:52:49',
            'saturday'=>'1',
            'sunday'=>'0',
            'monday'=>'1',
            'tuesday'=>'1',
            'wednesday'=>'0',
            'thursday'=>'1',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"9",
            'title'=>"Writing",
            'from_time'=>'07:53:44',
            'to_time'=>'08:52:49',
            'saturday'=>'1',
            'sunday'=>'1',
            'monday'=>'0',
            'tuesday'=>'0',
            'wednesday'=>'1',
            'thursday'=>'1',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"9",
            'title'=>"Playing",
            'from_time'=>'09:53:44',
            'to_time'=>'14:52:49',
            'saturday'=>'1',
            'sunday'=>'1',
            'monday'=>'1',
            'tuesday'=>'1',
            'wednesday'=>'0',
            'thursday'=>'0',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"10",
            'title'=>"Reading",
            'from_time'=>'10:53:44',
            'to_time'=>'06:52:49',
            'saturday'=>'1',
            'sunday'=>'0',
            'monday'=>'1',
            'tuesday'=>'1',
            'wednesday'=>'0',
            'thursday'=>'1',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"10",
            'title'=>"Writing",
            'from_time'=>'07:53:44',
            'to_time'=>'08:52:49',
            'saturday'=>'1',
            'sunday'=>'1',
            'monday'=>'0',
            'tuesday'=>'0',
            'wednesday'=>'1',
            'thursday'=>'1',
            'friday'=>'1',
        ]);
        Schedule::create([
            'user_id'=>"10",
            'title'=>"Playing",
            'from_time'=>'09:53:44',
            'to_time'=>'14:52:49',
            'saturday'=>'1',
            'sunday'=>'1',
            'monday'=>'1',
            'tuesday'=>'1',
            'wednesday'=>'0',
            'thursday'=>'0',
            'friday'=>'1',
        ]);
    }
}
