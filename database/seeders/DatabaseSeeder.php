<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Andhika Dwi Khalisyahputra',
            'username' => 'andhika',
            'email' => 'andhika@gmail.com',
            'password' => bcrypt('12345678'),
            'balance' => 8790213,
            'is_admin' => true,
        ]);

        User::factory()->create([
            'name' => 'Jriff',
            'username' => 'jriff',
            'email' => 'jriff@gmail.com',
            'password' => bcrypt('12345678'),
            'balance' => 0,
            'is_admin' => false,
        ]);

        // Expense Category
        Category::factory()->create([
            'name' => 'Consumption',
            'type' => 'expense'
        ]);

        Category::factory()->create([
            'name' => 'Transportation',
            'type' => 'expense'
        ]);

        Category::factory()->create([
            'name' => 'Stuff',
            'type' => 'expense'
        ]);

        Category::factory()->create([
            'name' => 'Other',
            'type' => 'expense'
        ]);

        // Income Category
        Category::factory()->create([
            'name' => 'Salary',
            'type' => 'income'
        ]);

        Category::factory()->create([
            'name' => 'Bonus',
            'type' => 'income'
        ]);

        Category::factory()->create([
            'name' => 'Gift',
            'type' => 'income'
        ]);

        Category::factory()->create([
            'name' => 'Other',
            'type' => 'income'
        ]);

        Transaction::factory(15)->create();
    }
}
