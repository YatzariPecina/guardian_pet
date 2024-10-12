<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nombre' => 'Yatzari Eduve Pecina Vidales',
            'correo' => 'yatzarieduve@gmail.com', 
            'telefono' => '8341683456',
            'password' => Hash::make('12345678'),
        ]);
    }
}
