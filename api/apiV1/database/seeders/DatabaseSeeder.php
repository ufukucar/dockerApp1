<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {




        \App\Models\Customer::factory()->create([
            'name' => 'Ufuk Uçar',
            'password' => Hash::make('password'),
            'email' => 'ufuk.ucar@test.com',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'since' => fake()->dateTime(),
            'revenue' => fake()->randomFloat(10, 2),



        ]);
        \App\Models\Customer::factory()->create([
            'name' => 'Türker Jöntürk',
            'email' => 'turker.jonturk@test.com',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'since' => fake()->dateTime(),
            'revenue' => fake()->randomFloat(10, 2),

        ]);
        \App\Models\Customer::factory()->create([
            'name' => 'Kaptan Devopuz',
            'email' => 'kaptan.devopuz@test.com',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'since' => fake()->dateTime(),
            'revenue' => fake()->randomFloat(10, 2),

        ]);
        \App\Models\Customer::factory()->create([
            'name' => 'İsa Sonuyumaz',
            'email' => 'isa.sonuyumaz@test.com',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'since' => fake()->dateTime(),
            'revenue' => fake()->randomFloat(10, 2),

        ]);

        \App\Models\Customer::factory(10)->create();

        /*** ADMIN ICIN USER TABLOSU KULLANILIYOR **/
        \App\Models\User::factory()->create([
            'name' => 'Ufuk Uçar',
            'password' => Hash::make('password'),
            'email' => 'ufuk.ucar@test.com',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
