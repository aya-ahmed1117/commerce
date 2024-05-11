<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;


class ProductsTableSee extends Seeder
{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {

        $products = [
            //Product::all()
            [

                'name' => 'LG V10 H800',

                'description' => 'LG Brand',

                'image' => 'https://dummyimage.com/200x300/000/fff&text=LG',

                'price' => 200

            ]

        ];



        foreach ($products as $key => $value) {

            Product::create($value);

        }

    }

}
