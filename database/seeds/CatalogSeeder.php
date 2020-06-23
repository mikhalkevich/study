<?php

use Illuminate\Database\Seeder;
use App\Catalog;
class CatalogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Catalog::create([
            'name'=>'Бытовая техника',
            'parent_id' => 0
        ]);
        Catalog::create([
            'name'=>'Комбайны',
            'parent_id' => 11
        ]);
    }
}
