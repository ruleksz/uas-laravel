<?php

namespace Database\Seeders;

use App\Models\User;
use GuzzleHttp\Promise\Create;
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
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
                'role' => 'admin'
            ],
            [
                'name' => 'Dosen1',
                'email' => 'dosen@gmail.com',
                'password' => bcrypt('dosen123'),
                'role' => 'dosen'
            ],
            [
                'name' => 'Heru Nur cahyono',
                'email' => 'heru@gmail.com',
                'password' => bcrypt('heru123'),
                'role' => 'mahasiswa'
            ],
        ];
        foreach ($userData as $key => $value) {
            User::create($value);
        }
    }
}
