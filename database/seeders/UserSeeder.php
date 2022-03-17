<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Abraham',
            'email' => 'abrahamalvarado@devarana.mx',
            'last_name' => 'Alvarado',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('abraham'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        User::create([
            'name' => 'Test',
            'email' => 'test@devarana.mx',
            'email_verified_at' => Carbon::now(),
            'last_name' => 'Pruebas',
            'password' => Hash::make('test'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
