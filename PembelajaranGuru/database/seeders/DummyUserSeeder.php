<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=>'Alif',
                'nis'=>'222310254',
                'role'=>'kepsek',
                'password'=>bcrypt('12345678')
            ],
            [
                'name'=>'Miftah',
                'nis'=>'222310256',
                'role'=>'wakasek',
                'password'=>bcrypt('12345678')
            ],
            [
                'name'=>'Fauzan',
                'nis'=>'222310282',
                'role'=>'guru',
                'password'=>bcrypt('12345678')
            ],
        ];

        foreach ($userData as $key =>$val) {
            User::create($val);
        }
    }
}
