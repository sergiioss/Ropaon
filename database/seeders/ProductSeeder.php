<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'Camiseta manga corta',
            'size' => 'L',
            'product_price' => 25,
            'url' => 'https://pulles-4c63.kxcdn.com/camiseta-199-2-348571.png?cultureCode=es-ES&UseBlobStorage=True&version=04d0f91b556b78bb097db47b0885fec2',
            'color' => 'roja',
            'gender' => 'M'
        ]);

        DB::table('products')->insert([
            'name' => 'Camiseta manga corta',
            'size' => 'L',
            'product_price' => 25,
            'url' => 'https://pulles-4c63.kxcdn.com/camiseta-199-2-348609.png?cultureCode=es-ES&UseBlobStorage=True&version=6e3fe4ccb643d6263305d9445aaf982c',
            'color' => 'azul',
            'gender' => 'M'
        ]);

        DB::table('products')->insert([
            'name' => 'Sudadera con capucha',
            'size' => 'M',
            'product_price' => 35,
            'url' => 'https://pulles-4c63.kxcdn.com/sudadera-con-capucha-224-2-340361.png?cultureCode=es-ES&UseBlobStorage=True&version=bad580967cb4adf74d03758774a78172',
            'color' => 'verde claro',
            'gender' => 'M'
        ]);

        DB::table('products')->insert([
            'name' => 'Pantalones pitillo',
            'size' => '40',
            'product_price' => 28,
            'url' => 'https://img01.ztat.net/article/spp-media-p1/ff9a0893fe573116905cd4e11f9ee4e7/34c247dd987a41ba9131c8c611183ee7.jpg?imwidth=1800&imformat=jpg-progressive',
            'color' => 'azul',
            'gender' => 'F'
        ]);

        DB::table('products')->insert([
            'name' => 'Camiseta basica',
            'size' => 'S',
            'product_price' => 15,
            'url' => 'https://img01.ztat.net/article/spp-media-p1/ad3ec5dccf424477801eebe66ab8978f/4c33ce820e7c40e09f00f97435eabbdb.jpg?imwidth=1800&imformat=jpg-progressive',
            'color' => 'amarillo',
            'gender' => 'F'
        ]);

        DB::table('products')->insert([
            'name' => 'Shorts vaqueros',
            'size' => '38',
            'product_price' => 19,
            'url' => 'https://img01.ztat.net/article/spp-media-p1/2870cc1429de4759b705d42d9489be1d/d59b1b9e122d4961a048f2a04abeb8f6.jpg?imwidth=1800&imformat=jpg-progressive',
            'color' => 'azul',
            'gender' => 'F'
        ]);

        DB::table('products')->insert([
            'name' => 'Pantalon chino',
            'size' => 'XL',
            'product_price' => 40,
            'url' => 'https://shop.loisjeans.com/40613-thickbox_default/pantalon-chino-twill-regular-fit.jpg',
            'color' => 'beige',
            'gender' => 'M'
        ]);

        DB::table('products')->insert([
            'name' => 'Pantalon vaquero roto',
            'size' => 'M',
            'product_price' => 50,
            'url' => 'https://img.joomcdn.net/53ecfced21315e254b2eec7311d4230aa278d131_original.jpeg',
            'color' => 'azul',
            'gender' => 'M'
        ]);

        DB::table('products')->insert([
            'name' => 'Gorra weavebreaker',
            'size' => 'M',
            'product_price' => 30,
            'url' => 'https://img01.ztat.net/article/spp-media-p1/0e9e894eb04146dd936bb2ff08f82b1b/5707554b9a4f41a387a37d2af51b3e83.jpg?imwidth=1800&filter=packshot&imformat=jpg-progressive',
            'color' => 'verde',
            'gender' => 'M'
        ]);

        DB::table('products')->insert([
            'name' => 'Pijama los increibles',
            'size' => 'S',
            'product_price' => 40,
            'url' => 'https://i.ebayimg.com/images/g/gIYAAOSw5FFgwnGW/s-l1600.jpg',
            'color' => 'rojo',
            'gender' => 'M'
        ]);
    }
}
