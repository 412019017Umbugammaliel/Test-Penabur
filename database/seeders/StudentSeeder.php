<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            Student::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'phone_number' => $faker->phoneNumber,
                'address' => $faker->address,
            ]);
        }
    }
}
