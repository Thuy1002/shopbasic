<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\categories;
use App\Models\products;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        products::factory(10)->create();
        Cart::factory(10)->create();
        categories::factory(10)->create();
        CartItem::factory(10)->create();
        User::factory(10)->create();
    }
}
