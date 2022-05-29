<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;
use Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'	=> 'Kadek Deksy Dextiro',
            'username'	=> 'dedekxxx',
            'password'	=> bcrypt('dedek123'),
            'phone' => '08123456789'
            ]);
    }
}
