<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Advisor;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Advisor::factory()
            ->count(20)
            ->has(User::factory()
                ->has(Order::factory()->count(10))
                ->count(15))
            ->create();


        $users = User::with('orders')->get();
        $users->each(function($user) {
            $user->update(['last_order_id' => $user->orders->sortByDesc('created_at')->first()->id]);
        });
    }
}
