<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Product;
use App\Models\Shop;
use App\Models\User;
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
        User::factory(100)->create();
        Shop::factory(5)->create();
        Product::factory(20)->create();

        Shop::find(1)->products()->attach(Product::find(1));
        Shop::find(1)->products()->attach(Product::find(2));

		Post::factory(100)->create([
			'user_id' => User::find(1)
		]);
    }
}
