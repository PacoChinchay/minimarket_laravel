<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Cerveza Tres Cruces Lager Six Pack Lata 355ml',
                'description' => 'Producto exclusivo para mayores de edad (+18)',
                'price' => 15.90,
                'buy' => 12.99,
                'stock' => 36,
                'image' => '/cerveza/tres_cruces.webp'
            ],
            [
                'name' => 'Cerveza De Malta y Maiz Dragenburg Sixpack 310ml',
                'description' => 'Producto exclusivo para mayores de edad (+18)',
                'price' => 16.90,
                'buy' => 14.90,
                'stock' => 70,
                'image' => '/cerveza/dragenburg.webp'
            ],
            [
                'name' => 'Cerveza Coronita Six Pack Botella 210 ml',
                'description' => 'Producto exclusivo para mayores de edad (+18)',
                'price' => 16.90,
                'buy' => 13.99,
                'stock' => 50,
                'image' => '/cerveza/coronita.webp'
            ],
            [
                'name' => 'Cerveza Heineken Fourpack Lata 473 ml',
                'description' => 'Llévate un fourpack Heineken en' .
                    ' su presentación de lata 473 ml a precio' .
                    'oferta. Compra en Tambo.pe y recibe tu pedido en 30 min.' .
                    'Producto exclusivo para mayores de edad (+18)',
                'price' => 19.90,
                'buy' => 17.90,
                'stock' => 74,
                'image' => '/cerveza/heineken.webp'
            ],
            [
                'name' => 'Cerveza Tres Cruces Light Six Pack Lata X 310ml',
                'description' => 'Producto exclusivo para mayores de edad (+18).',
                'price' => 20.90,
                'buy'=> 15.90,
                'stock' => 43,
                'image' => '/cerveza/tres_cruces_light.webp'
            ],
            [
                'name' => 'Cerveza Pilsen Callao Six Pack Lata 355 ml',
                'description' => 'Llévate un sixpack Pilsen en su presentación de 355 ml a precio oferta y disfruta con tus patas. Compra en Tambo.pe y recibe tu pedido en 30 min.Producto exclusivo para mayores de edad (+18).',
                'price' => 26.90,
                'buy' => 22.00,
                'stock' => 43,
                'image' => '/cerveza/pilsen.webp'
            ],
            [
                'name' => 'Pizza Familiar Premium Selección Chorizos',
                'description' => 'Enim at sint animi ea. Placeat dicta ex possimus dolores aut modi recusandae.',
                'price' => 18.90,
                'buy' => 9.90,
                'stock' => 88,
                'image' => '/comida/pizza.webp'
            ],
            [
                'name' => 'Sandwich Prime Pulled Pork',
                'description' => 'Sed vel quis dolor architecto mollitia. Assumenda maiores dolorum dolorem qui voluptatem. Atque consectetur qui libero corrupti. Ea dolorem consequatur qui qui. Dolor veritatis in aspernatur eaque.',
                'price' => 12.90,
                'buy' => 7.90,
                'stock' => 28,
                'image' => '/comida/sandwich_pulled_pork.webp'
            ],
            [
                'name' => 'Pack (3 Empanada De Carne + 3 Empanada De Pollo + 1 Coca Cola x 1 Lt)',
                'description' => 'Aut magni numquam voluptatem consectetur quis officia tempora. Repellat non accusamus eum quibusdam omnis corporis. Commodi eum repellendus ex minus quaerat eveniet dolorem sint.',
                'price' => 15.90,
                'buy' => 8.90,
                'stock' => 41,
                'image' => '/comida/pack_empanada.webp'
            ],
            [
                'name' => 'Pack (2 Huevo Pardo La Calera x 15 Und)',
                'description' => 'Este producto está limitado a 2 unidades por compra.',
                'price' => 23.80,
                'buy' => 15.90,
                'stock' => 41,
                'image' => '/despensa/huevos.webp'
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
