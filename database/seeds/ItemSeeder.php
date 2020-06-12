<?php

use App\Item;
use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Item::truncate();
        Schema::enableForeignKeyConstraints();
        
        factory(Item::class, 5)->create();
    }
}
