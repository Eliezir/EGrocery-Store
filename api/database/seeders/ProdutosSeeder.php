<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product; // Certifique-se de importar o modelo Produto se necessário

class ProdutosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $produtos = [
            [
                "id" => 1,
                "name" => 'Apple',
                "price" => 1.99,
                "description" => 'Fresh and juicy apples.',
                "image" => 'https://images.squarespace-cdn.com/content/v1/5b5b5824f2e6b10639fdaf09/1651599956690-0CE43F9HKEXIEK89CY0B/1.png'
            ],
            [
                "id" => 2,
                "name" => 'Banana',
                "price" => 0.99,
                "description" => 'Ripe and delicious bananas.',
                "image" => 'https://mercadoterra.s3.amazonaws.com/web/media/2020/04/banana-nanica-800x450.png'
            ],
            [
                "id" => 3,
                "name" => 'Orange',
                "price" => 1.49,
                "description" => 'Sweet and tangy oranges.',
                "image" => 'https://www.boeschbodenspies.com/wp-content/uploads/2017/08/orange.png'
            ],
            [
                "id" => 4,
                "name" => 'Milk',
                "price" => 2.99,
                "description" => 'Fresh and creamy milk.',
                "image" => 'https://www.lykki.canteencanada.com/media/catalog/product/cache/2/image/800x/9df78eab33525d08d6e5fb8d27136e95/d/a/dairyland_2__milk_1l_130301_en.png'
            ],
            [
                "id" => 5,
                "name" => 'Eggs',
                "price" => 2.49,
                "description" => 'Farm-fresh eggs.',
                "image" => 'https://gofflepoultry.com/wp-content/uploads/2020/05/JumboWhiteTray.png'
            ],
            [
                "id" => 6,
                "name" => 'Bread',
                "price" => 2.5,
                "description" => 'Soft and delicious bread.',
                "image" => 'https://t3.ftcdn.net/jpg/01/01/87/84/360_F_101878490_QabHiyhdJo9HL2AI5l2RfNblb8ylanPq.jpg'
            ],
            [
                "id" => 7,
                "name" => 'Chicken',
                "price" => 5.99,
                "description" => 'Tender and succulent chicken.',
                "image" => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSENd0KbS0hnvklrkBsovCVAuQsZVGZBLgGkw&usqp=CAU'

            ],
            [
                "id" => 8,
                "name" => 'Beef',
                "price" => 8.99,
                "description" => 'Premium quality beef.',
                "image" => 'https://res.cloudinary.com/hksqkdlah/image/upload/ar_1:1,c_fill,dpr_1.0,e_replace_color:fcf9f3:100:ffffff,f_auto,fl_lossy.progressive.strip_profile,g_faces:auto,q_auto:low,w_350/CAN_GroundBeef-MAP_6545_ijtb9o'
            ],
            [
                "id" => 9,
                "name" => 'Fettuccine pasta',
                "price" => 2.49,
                "description" => 'De Cecco Fettuccine pasta.',
                "image" => 'https://www.dececco.com/wp-content/uploads/2018/05/0UN2103-FETTUCCINE-3.png'
            ],
            [
                "id" => 10,
                "name" => 'Rice',
                "price" => 1.99,
                "description" => 'High-quality rice grains.',
                "image" => 'https://arrozeirabomjesus.com.br/wp-content/uploads/elementor/thumbs/embalagem-ouro-puro-integral-obzdn8qv9iz12p5mp28cwpfskj9s3i44w6ov41zuam.png'
            ],
            [
                "id" => 11,
                "name" => 'Tomato',
                "price" => 0.99,
                "description" => 'Fresh and ripe tomatoes.',
                "image" => 'https://cdn.pixabay.com/photo/2021/10/14/03/19/tomato-6707992_1280.png'
            ],
            [
                "id" => 12,
                "name" => 'Cucumber',
                "price" => 0.79,
                "description" => 'Crisp and refreshing cucumbers.',
                "image" => 'https://i.pinimg.com/736x/2e/73/ec/2e73ecc3e3f99a101e78fced9bf93519.jpg'
            ],
            [
                "id" => 13,
                "name" => 'Carrot',
                "price" => 0.59,
                "description" => 'Sweet and nutritious carrots.',
                "image" => 'https://static1.squarespace.com/static/5b5b5824f2e6b10639fdaf09/5b7d6ba61ae6cfa594b1932e/5b8420facd8366d1f2daf067/1657038012687/5.png?format=1500w'
            ],
            [
                "id" => 14,
                "name" => 'Potato',
                "price" => 0.89,
                "description" => 'Versatile and delicious potatoes.',
                "image" => 'https://images.squarespace-cdn.com/content/v1/5b5b5824f2e6b10639fdaf09/a277eae9-bf1a-4e66-9daf-dd2e60209073/Produce+Storage+Tips+icons+%289%29.png'
            ],
            [
                "id" => 15,
                "name" => 'Onion',
                "price" => 0.69,
                "description" => 'Flavorful and aromatic onions.',
                "image" => 'https://i5.walmartimages.com/asr/ad10f097-b720-45a4-881d-8336dfde0b1b.da769cece43bb81239c46e2b360eee78.png'
            ]
        ];

        // Loop para inserir os produtos na tabela
        foreach ($produtos as $produtoData) {
            Product::create($produtoData);
        }
    }
}
