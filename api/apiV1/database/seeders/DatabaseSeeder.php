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

        $products = [
            [
                "name" => "Black&Decker A7062 40 Parça Cırcırlı Tornavida Seti",
                "category" => 1,
                "price" => "120.75",
                "stock" =>10
            ],
        ];


        \App\Models\Customer::factory()->create([
            'name' => 'Ufuk Uçar',
            'password' => Hash::make('password'),
            'email' => 'ufuk.ucar@customer.com',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'since' => fake()->dateTime(),
            'revenue' => fake()->randomFloat(10, 2),



        ]);
        \App\Models\Customer::factory()->create([
            'name' => 'Türker Jöntürk',
            'email' => 'turker.jonturk@customer.com',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'since' => fake()->dateTime(),
            'revenue' => fake()->randomFloat(10, 2),

        ]);
        \App\Models\Customer::factory()->create([
            'name' => 'Kaptan Devopuz',
            'email' => 'kaptan.devopuz@customer.com',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'since' => fake()->dateTime(),
            'revenue' => fake()->randomFloat(10, 2),

        ]);
        \App\Models\Customer::factory()->create([
            'name' => 'İsa Sonuyumaz',
            'email' => 'isa.sonuyumaz@customer.com',
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
            'email' => 'ufuk.ucar@admin.com',
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);


        \App\Models\Category::factory(10)->create();

        \App\Models\Product::factory()->create([
            'name' => "Black&Decker A7062 40 Parça Cırcırlı Tornavida Seti",
            "categoryId" => 1,
            "unitPrice" => 120.75,
            "stock" =>10
        ]);
        \App\Models\Product::factory()->create([
            'name' => "Reko Mini Tamir Hassas Tornavida Seti 32'li",
            "categoryId" => 1,
            "unitPrice" => 49.50,
            "stock" =>10
        ]);
        \App\Models\Product::factory()->create([
            'name' => "Viko Karre Anahtar - Beyaz",
            "categoryId" => 2,
            "unitPrice" => 11.28,
            "stock" =>10
        ]);
       \App\Models\Product::factory()->create([
            'name' => "Schneider Asfora Beyaz Komütatör",
            "categoryId" => 2,
            "unitPrice" => 12.95,
            "stock" =>10
        ]);



    }
}
