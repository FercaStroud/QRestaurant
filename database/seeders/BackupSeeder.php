<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\User;
use App\Menu;
use App\Category;
use App\Product;

class BackupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $backup = [
            [
                'name' => 'Puerto',
                'lastname' => 'Monti',
                'second_lastname' => null,
                'address' => null,
                'state' => 'Coah.',
                'municipality' => 'Torreón',
                'city' => 'Torreón',
                'country' => 'MX',
                'email' => 'puertomontttrc@gmail.com',
                'password' => '$2y$10$xmVNsSOA4WAbliFa2MWD7uFxhqzJ7NTIsYxEV6iCU83zoUydCND6u',
                'phone' => '8712345678',
                'restaurant_name' => 'Puerto Monti',
                'description' => null,
                'cover' => 'nocover.jpg',
                'logo' => '_1623428021.jpeg',
                'menus' => [
                    [
                        'name' => 'PUERTO MONTI',
                        'description' => null,
                        'file_src' => null,
                        'type' => 'TEXT',
                        'categories' => [
                            [
                                'name' => 'ENTRADAS',
                                'description' => null,
                                'file_src' => 'entradas_1623102605.PNG',
                                'products' => [
                                    [
                                        'name' => 'Pulpo a las brasas',
                                        'description' => 'Precio por gramo.',
                                        'price' => '1.20',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Zetas a la parrilla',
                                        'description' => null,
                                        'price' => '180.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Zetas a la parrilla c/camaron',
                                        'description' => null,
                                        'price' => '240.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Chicharrón de rib eye',
                                        'description' => null,
                                        'price' => '300.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Parrillada de vegetales',
                                        'description' => null,
                                        'price' => '220.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Queso fundido natural',
                                        'description' => null,
                                        'price' => '130.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Queso fundido',
                                        'description' => '"(Con chorizo, mollejas, champiñones o chistorra)"',
                                        'price' => '150.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Lengua',
                                        'description' => '(Salsa verde o escabeche)',
                                        'price' => '200.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Provoleta punta carreta',
                                        'description' => '"(Jamón serrano, pimiento morro, salsa napolitana, aceite de olivo y orégano)"',
                                        'price' => '240.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Provoleta napolitana',
                                        'description' => '"(Con espejo de salsa napolitana , aceite de olivo y orégano)"',
                                        'price' => '180.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Provoleta natural',
                                        'description' => '(Con aceite de olivo y orégano)',
                                        'price' => '150.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Carpaccio de res',
                                        'description' => '',
                                        'price' => '180.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Carpaccio de salmón',
                                        'description' => null,
                                        'price' => '180.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Tuétanos.',
                                        'description' => null,
                                        'price' => '200.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Chinchulines',
                                        'description' => null,
                                        'price' => '180.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Mollejas de ternera',
                                        'description' => null,
                                        'price' => '180.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Chistorra',
                                        'description' => null,
                                        'price' => '100.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Chistorra al gratin',
                                        'description' => null,
                                        'price' => '140.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Morcilla a la parrilla',
                                        'description' => '(Chile y cebolla)',
                                        'price' => '70.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Morcilla a la parrilla al sartén',
                                        'description' => '(Chile y cebolla)',
                                        'price' => '100.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Chorizo argentino',
                                        'description' => null,
                                        'price' => '80.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Portobello natural',
                                        'description' => null,
                                        'price' => '190.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Portobello Mar y Tierra',
                                        'description' => null,
                                        'price' => '250.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Pulpo a la Gallega',
                                        'description' => null,
                                        'price' => '480.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Cortadillo',
                                        'description' => '(Tuétano con filete en salsa de chile guajillo)',
                                        'price' => '220.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Betabel',
                                        'description' => '(A la parrilla con queso de cabra)',
                                        'price' => '100.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Espárragos',
                                        'description' => null,
                                        'price' => '120.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Empanadas',
                                        'description' => '"Carne, Espinaca, Elote"',
                                        'price' => '40.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Empanadas',
                                        'description' => 'Camarón',
                                        'price' => '46.00',
                                        'image_src' => 'empanadas_1623427855.PNG'
                                    ],
                                ]
                            ],
                            [
                                'name' => 'SOPAS',
                                'description' => null,
                                'file_src' => null,
                                'products' => [
                                    [
                                        'name' => 'Jugo de carne',
                                        'description' => null,
                                        'price' => '80.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Jugo de carne con camarón',
                                        'description' => null,
                                        'price' => '140.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Crema de almeja',
                                        'description' => null,
                                        'price' => '100.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Consome de pollo',
                                        'description' => null,
                                        'price' => '75.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Sopa de cebolla',
                                        'description' => null,
                                        'price' => '80.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'DEL MAR',
                                'description' => null,
                                'file_src' => 'del-mar_1623427723.PNG',
                                'products' => [
                                    [
                                        'name' => 'Langosta',
                                        'description' => null,
                                        'price' => '180.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Salmón al gusto',
                                        'description' => null,
                                        'price' => '220.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Posta de atún al gusto',
                                        'description' => null,
                                        'price' => '220.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Camarones al gusto',
                                        'description' => null,
                                        'price' => '220.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'ENSALADAS',
                                'description' => null,
                                'file_src' => null,
                                'products' => [
                                    [
                                        'name' => 'Cesar natural',
                                        'description' => null,
                                        'price' => '100.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Cesar natural c/camarón',
                                        'description' => null,
                                        'price' => '150.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Lechuga Asada',
                                        'description' => '(Lechuga orejona asada, aderezo italiano, parmesano, camarones)',
                                        'price' => '180.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Griega',
                                        'description' => '(Lechuga, palmito, alcachofa, aceituna, cebolla y queso de cabra)',
                                        'price' => '130.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Punta Carreta',
                                        'description' => 'Lechuga, palmito, alcachofa, zanahoria, cebolla morada,huevo cocido, pimiento morro, tomate)',
                                        'price' => '140.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Ensalada Chilena',
                                        'description' => '(Tomate, cebolla morada pluma, cilantro, aceite de oliva, orégano)',
                                        'price' => '120.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Ensalada Argentina',
                                        'description' => '(Lechuga, tomate, aguacate, cebolla morada, cilantro y aceite de oliva)',
                                        'price' => '130.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Capresse',
                                        'description' => 'Tomate, queso mozarella fresco y albahaca)',
                                        'price' => '120.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'PASTA',
                                'description' => null,
                                'file_src' => 'pasta_1623427558.PNG',
                                'products' => [
                                    [
                                        'name' => 'Ravioles (carne o espinacas)',
                                        'description' => null,
                                        'price' => '120.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Lasagna de carne',
                                        'description' => null,
                                        'price' => '130.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Lasagna de vegetales',
                                        'description' => null,
                                        'price' => '110.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Espagueti (elija su salsa)',
                                        'description' => null,
                                        'price' => '0.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Fetuccine (elija su salsa)',
                                        'description' => null,
                                        'price' => '0.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'SALSA',
                                'description' => null,
                                'file_src' => null,
                                'products' => [
                                    [
                                        'name' => 'Con camarones (5 pz)',
                                        'description' => null,
                                        'price' => '160.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => '4 quesos',
                                        'description' => null,
                                        'price' => '120.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Carbonara',
                                        'description' => null,
                                        'price' => '120.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Bolognesa',
                                        'description' => null,
                                        'price' => '110.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Napolitana',
                                        'description' => null,
                                        'price' => '100.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Ajo chile',
                                        'description' => null,
                                        'price' => '100.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'PIZZA',
                                'description' => null,
                                'file_src' => null,
                                'products' => [
                                    [
                                        'name' => 'Jamón Serrano',
                                        'description' => '"(Salsa de tomate, queso y jamón serrano)"',
                                        'price' => '285.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Marinera',
                                        'description' => '"(Salsa de tomate, queso, camarones, cebolla y alcachofas)"',
                                        'price' => '280.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Carnivora',
                                        'description' => '"(Salsa de tomate, queso y filete de res)"',
                                        'price' => '220.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Jamon',
                                        'description' => '"(Salsa de tomate, queso y jamón)"',
                                        'price' => '180.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Salami',
                                        'description' => '"(Salsa de tomate, queso y salami)"',
                                        'price' => '180.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Cuatro Estaciones',
                                        'description' => '"(Salsa de tomate, salami, jamón, pimiento y champiñones)"',
                                        'price' => '200.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'GUARNICIONES',
                                'description' => null,
                                'file_src' => null,
                                'products' => [
                                    [
                                        'name' => 'Pimientos asados.',
                                        'description' => null,
                                        'price' => '100.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Guacamole',
                                        'description' => null,
                                        'price' => '70.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Papa al horno punta carreta',
                                        'description' => null,
                                        'price' => '70.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Espinacas a la crema',
                                        'description' => null,
                                        'price' => '50.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Verduras a la mantequilla.',
                                        'description' => null,
                                        'price' => '60.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Tomates asados',
                                        'description' => null,
                                        'price' => '45.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Papas Saratoga',
                                        'description' => null,
                                        'price' => '45.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Pan de ajo',
                                        'description' => null,
                                        'price' => '35.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Cebolla asada',
                                        'description' => null,
                                        'price' => '35.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Chiles toreados',
                                        'description' => null,
                                        'price' => '35.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'PARRILLADA DE CARNE',
                                'description' => null,
                                'file_src' => null,
                                'products' => [
                                    [
                                        'name' => 'Sencilla',
                                        'description' => '"Bife de lomo, arrachera, costilla o pechuga de pollo, chorizo argentino, chistorra, provoleta y papas Saratoga (2 Personas)"',
                                        'price' => '800.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Sencilla Para 4 personas',
                                        'description' => '"Bife de lomo, arrachera, costilla o pechuga de pollo, chorizo argentino, chistorra, provoleta y papas Saratoga"',
                                        'price' => '1200.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Mar y Tierra (2 Personas)',
                                        'description' => '"Pulpo, bife de chorizo, camarones, langosta, Filete, arrachera y papas Saratoga"',
                                        'price' => '1200.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'CORTES',
                                'description' => null,
                                'file_src' => 'cortes_1623103108.PNG',
                                'products' => [
                                    [
                                        'name' => 'Tomahawk',
                                        'description' => 'Precio por gramo.',
                                        'price' => '1.2',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Picaña',
                                        'description' => 'Precio por gramo.',
                                        'price' => '1.0',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Asado criollo',
                                        'description' => 'Precio por gramo. (Short rib sin hueso)',
                                        'price' => '1.0',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Churrasco 700 gr',
                                        'description' => null,
                                        'price' => '490.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Bife chorizo angus nacional 350 gr.',
                                        'description' => null,
                                        'price' => '370.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Bife chorizo angus nacional 600 gr.',
                                        'description' => null,
                                        'price' => '620.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Bife chorizo angus importado 350 gr',
                                        'description' => null,
                                        'price' => '480.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Bife chorizo angus importado 600 gr',
                                        'description' => null,
                                        'price' => '720.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Asado de tira 600 gr',
                                        'description' => '',
                                        'price' => '450.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Filete mignon',
                                        'description' => null,
                                        'price' => '320.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Bife de lomo 350 gr',
                                        'description' => null,
                                        'price' => '280.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Bife de lomo 600 gr',
                                        'description' => null,
                                        'price' => '450.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => '"Con salsa pimienta, champiñón o mostaza 350 gr"',
                                        'description' => null,
                                        'price' => '340.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => '"Con salsa pimienta, champiñón o mostaza 600 gr"',
                                        'description' => null,
                                        'price' => '540.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Bife de vacío 350 g',
                                        'description' => null,
                                        'price' => '370.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Bife de vacío 600 g',
                                        'description' => null,
                                        'price' => '630.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Arrachera 350 gr',
                                        'description' => null,
                                        'price' => '280.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Arrachera 600 gr',
                                        'description' => null,
                                        'price' => '500.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'POLLO',
                                'description' => null,
                                'file_src' => null,
                                'products' => [
                                    [
                                        'name' => 'Pollo a la parrilla',
                                        'description' => '"(Al limón, ajo y chile o al orégano)"',
                                        'price' => '180.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Pechuga a la parrilla',
                                        'description' => null,
                                        'price' => '170.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Milanesa de res a la napolitana',
                                        'description' => '"(Salsa napolitana, gratin, jamón)"',
                                        'price' => '320.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Milanesa de res',
                                        'description' => null,
                                        'price' => '250.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Milanesa de pollo a la napolitana',
                                        'description' => '"(Salsa napolitana, gratin, jamón)"',
                                        'price' => '190.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Milanesa de pollo',
                                        'description' => null,
                                        'price' => '150.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'BROCHETAS',
                                'description' => null,
                                'file_src' => null,
                                'products' => [
                                    [
                                        'name' => 'Brocheta de filete con camarón',
                                        'description' => null,
                                        'price' => '280.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Brocheta de camarón',
                                        'description' => null,
                                        'price' => '280.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Brocheta de pollo con camarón',
                                        'description' => null,
                                        'price' => '250.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Brocheta de filete',
                                        'description' => null,
                                        'price' => '250.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Brocheta de pollo',
                                        'description' => null,
                                        'price' => '220.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'POSTRES',
                                'description' => null,
                                'file_src' => null,
                                'products' => [
                                    [
                                        'name' => 'Crepas punta carreta',
                                        'description' => null,
                                        'price' => '140.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Fresas jubilee',
                                        'description' => null,
                                        'price' => '140.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Crepas de cajeta.',
                                        'description' => null,
                                        'price' => '120.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Cremas suzette',
                                        'description' => null,
                                        'price' => '120.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Mangos al tequila o rompope',
                                        'description' => null,
                                        'price' => '120.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Strudel de manzana con helado',
                                        'description' => null,
                                        'price' => '80.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Brownie con helado',
                                        'description' => null,
                                        'price' => '80.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Cheesecake',
                                        'description' => null,
                                        'price' => '75.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Alfajor',
                                        'description' => null,
                                        'price' => '70.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Flan napolitano',
                                        'description' => null,
                                        'price' => '60.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Helado de vainilla.',
                                        'description' => null,
                                        'price' => '50.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Pan de elote',
                                        'description' => null,
                                        'price' => '80.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Pay de guayaba',
                                        'description' => null,
                                        'price' => '70.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'BEBIDAS',
                                'description' => null,
                                'file_src' => null,
                                'products' => [
                                    [
                                        'name' => 'Jarra de clericot 1 lt',
                                        'description' => null,
                                        'price' => '200.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Copa de vino de la casa',
                                        'description' => null,
                                        'price' => '70.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Copa de vino 3v.',
                                        'description' => null,
                                        'price' => '185.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Copa de clericot',
                                        'description' => null,
                                        'price' => '80.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Cerveza nacional',
                                        'description' => null,
                                        'price' => '40.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Cerveza importada',
                                        'description' => null,
                                        'price' => '45.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Limonada',
                                        'description' => null,
                                        'price' => '30.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Naranjada',
                                        'description' => null,
                                        'price' => '30.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Refresco',
                                        'description' => null,
                                        'price' => '35.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Agua embotellada',
                                        'description' => null,
                                        'price' => '25.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Michelada',
                                        'description' => null,
                                        'price' => '15.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Perrier',
                                        'description' => null,
                                        'price' => '45.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Carajillo',
                                        'description' => null,
                                        'price' => '120.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Capuchino con baileys',
                                        'description' => null,
                                        'price' => '85.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Capuchino',
                                        'description' => null,
                                        'price' => '40.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Expresso',
                                        'description' => null,
                                        'price' => '35.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Cafe americano',
                                        'description' => null,
                                        'price' => '35.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                        ]
                    ],
                    [
                        'name' => 'PUERTO MONTI',
                        'description' => null,
                        'file_src' => 'puerto-monti_1625856175.pdf',
                        'type' => 'PDF',
                        'categories' => [],
                    ],

                ]
            ],
            [
                'name' => 'EL',
                'lastname' => 'APERITIVO',
                'second_lastname' => null,
                'address' => null,
                'state' => 'Coah.',
                'municipality' => 'Torreón',
                'city' => 'Torreón',
                'country' => 'MX',
                'email' => 'aperitivotrc@gmail.com',
                'password' => '$2y$10$FqSVLxIae2iBUTGAJxpxpuXzC2vsoyRtYwh5n4APLbQGx.zYa7TOW',
                'phone' => '8712345678',
                'restaurant_name' => 'EL APERITIVO',
                'description' => null,
                'cover' => 'nocover.jpg',
                'logo' => '_1620773949.jpg',
                'menus' => [
                    [
                        'name' => 'EL APERITIVO',
                        'description' => null,
                        'file_src' => 'el-aperitivo_1634255540.pdf',
                        'type' => 'PDF',
                        'categories' => []
                    ],
                    [
                        'name' => 'EL APERITIVO',
                        'description' => null,
                        'file_src' => null,
                        'type' => 'NORMAL',
                        'categories' => [
                            [
                                'name' => 'Para Compartir',
                                'description' => null,
                                'file_src' => 'para-compartir_1620774661.jpgpara-compartir_1620774661.jpg',
                                'products' => [
                                    [
                                        'name' => 'Aceitunas preparadas',
                                        'description' => null,
                                        'price' => '35.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Papas a la francesa',
                                        'description' => null,
                                        'price' => '49.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Extra de queso',
                                        'description' => null,
                                        'price' => '10.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Sazonadas con Cajun',
                                        'description' => null,
                                        'price' => '20.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Pizzas El Aperitivo',
                                'description' => null,
                                'file_src' => 'pizzas-el-aperitivo_1620774688.jpegpizzas-el-aperitivo_1620774688.jpeg',
                                'products' => [
                                    [
                                        'name' => 'CLASICAS',
                                        'description' => '"Pepperoni. Salsa de tomate de la casa, queso, pepperoni."',
                                        'price' => '190.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'CLASICAS',
                                        'description' => '"Hawaiana. Salsa de tomate de la casa, queso, jamón, piña."',
                                        'price' => '190.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'CLASICAS',
                                        'description' => '"Meat lovers. Salsa de tomate de la casa, queso, pepperoni, tocino, jamon."',
                                        'price' => '190.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'CLASICAS  INDIVIDUALES',
                                        'description' => '"Pepperoni. Salsa de tomate de la casa, queso, pepperoni."',
                                        'price' => '80.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'CLASICAS  INDIVIDUALES',
                                        'description' => '"Hawaiana. Salsa de tomate de la casa, queso, jamon, piña."',
                                        'price' => '80.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'CLASICAS  INDIVIDUALES',
                                        'description' => '"Meat lovers. Salsa de tomate de la casa, queso, pepperoni, tocino, jamon."',
                                        'price' => '80.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'NACIONALES',
                                        'description' => '"Pastor. Salsa de tomate de la casa, queso, carne de puerco al pastor, pina, cebolla, cilantro."',
                                        'price' => '250.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'NACIONALES',
                                        'description' => '"Chicharrón prensado. Salsa de tomate de la casa, queso, chicharrón prensado en salsa verde."',
                                        'price' => '250.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'NACIONALES',
                                        'description' => '"Ranchera. Base de frijoles de la casa, queso, chorizo, jalapeño, cebolla morada."',
                                        'price' => '250.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'NACIONALES',
                                        'description' => '"Tequila. Queso, crema a base de tequila (receta especial)."',
                                        'price' => '250.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'NACIONALES INDIVIDUALES',
                                        'description' => '"Pastor. Salsa de tomate de la casa, queso, carne de puerco al pastor, pina, cebolla, cilantro."',
                                        'price' => '95.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'NACIONALES INDIVIDUALES',
                                        'description' => '"Chicharrón prensado :  Salsa de tomate de la casa, queso, chicharrón prensado en salsa verde."',
                                        'price' => '95.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'NACIONALES INDIVIDUALES',
                                        'description' => '"Ranchera:  Base de frijoles de la casa, queso, chorizo, jalapeño, cebolla morada."',
                                        'price' => '95.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'NACIONALES INDIVIDUALES',
                                        'description' => '"Tequila : Queso, crema a base de tequila (receta especial)"',
                                        'price' => '95.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'INTERNACIONALES',
                                        'description' => '"Burger & fries; salsa de tomate de la casa, queso cheddar, carne de hamburguesa sazonada, papas a la francesa."',
                                        'price' => '250.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'INTERNACIONALES',
                                        'description' => '"Boneless; salsa de tomate de la casa, queso, trocitos de pechuga de polio empanizado, salsa bufalo, aderezo ranch."',
                                        'price' => '250.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'INTERNACIONALES',
                                        'description' => '"Mac & cheese; queso, macarrones con queso americano."',
                                        'price' => '250.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'INTERNACIONALES',
                                        'description' => '"Bolognesa; salsa de tomate de la casa, queso, mini albóndigas."',
                                        'price' => '250.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'INTERNACIONALES INDIVIDUALES',
                                        'description' => '"Burger & fries; salsa de tomate de la casa, queso cheddar, carne de hamburguesa sazonada, papas a la francesa."',
                                        'price' => '110.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'INTERNACIONALES INDIVIDUALES',
                                        'description' => '"Boneless; salsa de tomate de la casa, queso, trocitos de pechuga de polio empanizado, salsa bufalo, aderezo ranch."',
                                        'price' => '110.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'INTERNACIONALES INDIVIDUALES',
                                        'description' => '"Mac & cheese; queso, macarrones con queso americano."',
                                        'price' => '110.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'INTERNACIONALES INDIVIDUALES',
                                        'description' => '"Bolognesa; salsa de tomate de la casa, queso, mini albóndigas."',
                                        'price' => '110.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'DEL CAMPO',
                                        'description' => '"Veggie lovers; salsa de tomate de la casa, queso, champiñones, cebolla morada, aceitunas negras, tomate deshidratado, pimiento verde y rojo."',
                                        'price' => '190.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'DEL CAMPO INDIVIDUAL',
                                        'description' => '"Veggie lovers; salsa de tomate de la casa, queso, champiñones, cebolla morada, aceitunas negras, tomate deshidratado, pimiento verde y rojo."',
                                        'price' => '80.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'CONTEMPORÁNEAS',
                                        'description' => '"Alcachofa; queso, crema especial de alcachofa, espinacas."',
                                        'price' => '230.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'CONTEMPORÁNEAS',
                                        'description' => '"Margherita; salsa de tomate de la casa, queso, albahaca."',
                                        'price' => '190.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'CONTEMPORÁNEAS INDIVIDUAL',
                                        'description' => '"Alcachofa; queso, crema especial de alcachofa, espinacas."',
                                        'price' => '95.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'CONTEMPORÁNEAS INDIVIDUAL',
                                        'description' => '"Margherita; salsa de tomate de la casa, queso, albahaca."',
                                        'price' => '80.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'ESPECIALES',
                                        'description' => '"Al ajillo; salsa de tomate de la casa, queso, camaron, chile guajillo, ajo."',
                                        'price' => '275.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'ESPECIALES',
                                        'description' => '"Pizza Ramos; salsa de tomate de la casa, queso, pica de gallo, chicharrón de ramos."',
                                        'price' => '275.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'ESPECIALES INDIVIDUAL',
                                        'description' => '"Pizza Ramos; salsa de tomate de la casa, queso, pica de gallo, chicharrón de ramos."',
                                        'price' => '130.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'ESPECIALES INDIVIDUAL',
                                        'description' => '"Al ajillo; salsa de tomate de la casa, queso, camaron, chile guajillo, ajo."',
                                        'price' => '130.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'ESPECIALES',
                                        'description' => 'Base de frijol negro - queso - cochinita pibil - cebollita morada',
                                        'price' => '285.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'ESPECIALES INDIVIDUALES',
                                        'description' => 'Base de frijol negro - queso - cochinita pibil - cebollita morada',
                                        'price' => '135.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Ensaladas',
                                'description' => null,
                                'file_src' => 'ensaladas_1620774888.pngensaladas_1620774888.png',
                                'products' => [
                                    [
                                        'name' => 'ENSALADA DE FRESA',
                                        'description' => '"Variedad de lechugas, nuez garapiñada, arándanos, queso de cabra, fresas y aderezo de fresa de la casa.  - Con pollo $20 extra"',
                                        'price' => '130.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'ENSALADA BALSÁMICA',
                                        'description' => '"Espinaca baby, lechuga francesa, pera, nuez de la india y aderezo balsámico de la casa - Con pollo $20 extra"',
                                        'price' => '130.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Panzerotti',
                                'description' => null,
                                'file_src' => 'panzerotti_1620774943.jpgpanzerotti_1620774943.jpg',
                                'products' => [
                                    [
                                        'name' => '"Mozzarella, pepperoni."',
                                        'description' => null,
                                        'price' => '75.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => '"Mozzarella, salsa de tomate de la casa."',
                                        'description' => null,
                                        'price' => '75.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => '"Mozzarella, jamon"',
                                        'description' => null,
                                        'price' => '75.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => '"Mozzarella, alcachofa"',
                                        'description' => null,
                                        'price' => '75.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => '"Mozzarella, bolognesa."',
                                        'description' => null,
                                        'price' => '75.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => '"Mozzarella, chicharrón prensado."',
                                        'description' => null,
                                        'price' => '75.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => '"Mozzarella, chistorra."',
                                        'description' => null,
                                        'price' => '75.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => '"Mozzarella, boneless."',
                                        'description' => null,
                                        'price' => '75.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => '"Mozzarella, carne al pastor."',
                                        'description' => null,
                                        'price' => '75.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Pretzel Dog',
                                'description' => null,
                                'file_src' => 'pretzel-dog_1620774954.jpgpretzel-dog_1620774954.jpg',
                                'products' => [
                                    [
                                        'name' => '"Salchicha oscar mayer, masa de pretzel."',
                                        'description' => null,
                                        'price' => '55.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => '"Salchicha oscar mayer, masa de pretzel,  queso mozzarella, pepperoni."',
                                        'description' => null,
                                        'price' => '55.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => '"Salchicha oscar mayer, masa de pretzel,  queso cheddar, jalapeño"',
                                        'description' => null,
                                        'price' => '55.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => '"Salchicha oscar mayer, masa de pretzel,   mantequilla, ajo y perejil."',
                                        'description' => null,
                                        'price' => '55.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Alitas & Boneless',
                                'description' => null,
                                'file_src' => 'alitas-boneless_1620774968.jpegalitas-boneless_1620774968.jpeg',
                                'products' => [
                                    [
                                        'name' => 'ALITAS',
                                        'description' => '"Deliciosas alitas de polio (400g) bañadas en la salsa de tu elección, acompañadas de aderezo ranch, palitos de apio y zanahoria."',
                                        'price' => '125.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'BONELESS',
                                        'description' => '"Deliciosa pechuga de polio en trozo (200g) bañados en la salsa de tu elección, acompañados de papas a la francesa, aderezo ranch y palitos de apio y zanahoria."',
                                        'price' => '115.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Postres',
                                'description' => null,
                                'file_src' => 'postres_1620774980.jpgpostres_1620774980.jpg',
                                'products' => [
                                    [
                                        'name' => 'Panzerotti',
                                        'description' => '- Nutella / - Frutos rojos / - Nutella, queso crema',
                                        'price' => '75.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Brownie con nieve',
                                        'description' => '',
                                        'price' => '110.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Pastel de zanahoria.',
                                        'description' => '',
                                        'price' => '80.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Dip',
                                'description' => null,
                                'file_src' => 'dip_1620775144.jpgdip_1620775144.jpg',
                                'products' => [
                                    [
                                        'name' => 'Queso Cheddar con jalapeño',
                                        'description' => null,
                                        'price' => '10.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Marinara',
                                        'description' => null,
                                        'price' => '10.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Honey Mustard',
                                        'description' => null,
                                        'price' => '10.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Bebidas Sin Alcohol',
                                'description' => null,
                                'file_src' => 'bebidas-sin-alcohol_1622613003.jpgbebidas-sin-alcohol_1622613003.jpg',
                                'products' => [
                                    [
                                        'name' => 'Limonada',
                                        'description' => '-Mineral -Natural',
                                        'price' => '25.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Limonada De Fresa',
                                        'description' => '-Mineral -Natural -Ginger Ale',
                                        'price' => '45.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Limonada de berrys',
                                        'description' => '-Mineral -Natural -Ginger Ale',
                                        'price' => '45.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Refrescos',
                                        'description' => '-Coca cola -Coca cola light -Fresca -Sprite -Manzanita -Fanta -Agua Mineral',
                                        'price' => '25.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Botella de agua',
                                        'description' => null,
                                        'price' => '20.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Café y Té',
                                'description' => null,
                                'file_src' => 'cafe-y-te_1622613246.jpgcafe-y-te_1622613246.jpg',
                                'products' => [
                                    [
                                        'name' => 'Espresso',
                                        'description' => null,
                                        'price' => '15.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Americano',
                                        'description' => null,
                                        'price' => '25.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Capuccino',
                                        'description' => null,
                                        'price' => '35.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Té',
                                        'description' => null,
                                        'price' => '20.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Mocktails',
                                'description' => null,
                                'file_src' => 'mocktails_1622613461.pngmocktails_1622613461.png',
                                'products' => [
                                    [
                                        'name' => 'Agua Celis',
                                        'description' => '"-Jugo de Toronja, -Jugo de Naranja, -Jugo de Limón, -Top de refresco de Toronja"',
                                        'price' => '40.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Grenade of berrys',
                                        'description' => '"-Jugo de Granada, -Jugo de limón, -Miel de agave, -Moras, zarzamora y frambuesa, -Top de refresco de toronja, -Angostura"',
                                        'price' => '65.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Black&Sour',
                                        'description' => '"-Jugo de Piña, -Jugo de Arándanos, -Jugo de Limón, -Jengibre, -Simple Syrup, -Tamborcitos, -Zarzamoras y Moras"',
                                        'price' => '60.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'The Grapes Punch',
                                        'description' => '"-Jugo de Uva, -Jugo de Manzana, -Jugo de Limón, -Agua de Jamaica, -Simple Syrup, -Top de agua mineral"',
                                        'price' => '40.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Cerveza',
                                'description' => null,
                                'file_src' => 'cerveza_1622613598.jpgcerveza_1622613598.jpg',
                                'products' => [
                                    [
                                        'name' => 'Victoria',
                                        'description' => null,
                                        'price' => '30.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Corona Extra',
                                        'description' => null,
                                        'price' => '30.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Corona Light',
                                        'description' => null,
                                        'price' => '30.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Modelo Especial',
                                        'description' => null,
                                        'price' => '35.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Ultra',
                                        'description' => null,
                                        'price' => '35.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Pacifico Suave',
                                        'description' => null,
                                        'price' => '35.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Vasos preparados',
                                'description' => null,
                                'file_src' => 'vasos-preparados_1622613673.jpgvasos-preparados_1622613673.jpg',
                                'products' => [
                                    [
                                        'name' => 'Clamato',
                                        'description' => null,
                                        'price' => '25.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Michelado',
                                        'description' => null,
                                        'price' => '20.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Chelado',
                                        'description' => null,
                                        'price' => '15.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Vasos Especiales',
                                'description' => null,
                                'file_src' => 'vasos-especiales_1622614052.pngvasos-especiales_1622614052.png',
                                'products' => [
                                    [
                                        'name' => 'Chelado de Toronja',
                                        'description' => '"Jugo de Limón, Jugo de Toronja, Top de Refresco de toronja, Sal"',
                                        'price' => '30.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Michelado de Tamarindo',
                                        'description' => '"Cointreau, Vodka de tamarindo, Jugo de Limón, Extracto de Tamarindo, Tamborcitos"',
                                        'price' => '35.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Beer Mango',
                                        'description' => '"Vodka Tamarindo, Jugo de Mango, Jugo de Limón, Simple Syrup, Tamborcitos y Fresas"',
                                        'price' => '60.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'House Cocktails',
                                'description' => null,
                                'file_src' => 'house-cocktails_1622614323.pnghouse-cocktails_1622614323.png',
                                'products' => [
                                    [
                                        'name' => 'Álvarez',
                                        'description' => '"Vodka tamarindo, Jugo de Limón, Jugo de Piña, Simple Syrup, Zarzamora y Moras."',
                                        'price' => '90.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Aube des roses',
                                        'description' => '"Ginebra, St. Germain, Cordial de Durazno y Maracuyá, Jugo de Piña, Jugo de Limón, Syrup de Rosas, Float de Vino Tinto."',
                                        'price' => '120.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Arabic Sunset',
                                        'description' => '"Ginebra, Ancho Reyes, Jengibre, Jugo de Granada, Jugo de Limón, Syrup de Rosas, Pimienta rosa, Menta"',
                                        'price' => '95.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Aztlán',
                                        'description' => '"Mezcal, Ancho Reyes, Jugo de Piña, Jugo de Limón, Jugo de Naranja, Miel de agave, Albumen"',
                                        'price' => '90.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Carajillo Horchata',
                                        'description' => '"Licor de Horchata (Con Canela o Sin Canela), Licor 43, Café Espresso"',
                                        'price' => '85.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Carajillo de Mazapán',
                                        'description' => '"Bailey’s, Licor de Cacao, Amaretto, Mazapán',
                                        'price' => '85.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'El Germano Suplicante',
                                        'description' => 'Café Espresso"',
                                        'price' => '120.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Green Roman',
                                        'description' => '"Bourbon, St. Germain, Ancho Reyes,  Cordial de Durazno, Jugo de Limón, Jugo de Piña, Miel de abeja, Angostura."',
                                        'price' => '95.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'IVANII',
                                        'description' => '"Tequila, Midori, Ancho Reyes Verde, Jugo de Piña, Jugo de Limón, Miel de maguey, Menta, Pepino."',
                                        'price' => '90.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Queen of the bongo',
                                        'description' => '"Vodka, Midori, Jugo de Manzana, Jugo de Limón, Simple Syrup, Albumen, Jamaica."',
                                        'price' => '90.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Sánchez',
                                        'description' => '"Ron Blanco, Ron Especiado, Jugo de Piña, Jugo de Arándanos, Jugo de Limón, Miel de agave, Fresas, Menta, Angostura"',
                                        'price' => '115.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Sweet Romero',
                                        'description' => '"Vodka tamarindo, Ginebra, Cointreau, Jugo de Limón, Simple Syrup, Fresas, Cerezas, Frambuesas, Albumen."',
                                        'price' => '85.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'The Madero Punch',
                                        'description' => '"Baileys, Rumchata, Amaretto, Jugo de Cerezas, Coco Rayado"',
                                        'price' => '110.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'The Orange is the new Black',
                                        'description' => '"Mezcal, St. Germain, Jugo de Toronja, Jugo de Limón, Miel de Agave, Top de Refresco de Toronja, Jamaica."',
                                        'price' => '90.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'The Witch’s Potion',
                                        'description' => '"Tequila, Blue Curaçao, Mezcal, Jugo de Granada, Jugo de Limón, Miel de agave, Moras, Zarzamoras."',
                                        'price' => '90.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Classics Cocktail',
                                'description' => null,
                                'file_src' => 'classics-cocktail_1622614405.jpgclassics-cocktail_1622614405.jpg',
                                'products' => [
                                    [
                                        'name' => 'Old Fashioned',
                                        'description' => '"Bourbon, Simple Syrup, Angostura."',
                                        'price' => '80.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Negroni',
                                        'description' => '"Ginebra, Vermouth Rosso, Campari."',
                                        'price' => '85.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'The Aviation',
                                        'description' => '"Ginebra, Luxardo Maraschino, Licor de Violetas, Jugo de Limón."',
                                        'price' => '115.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Painkiller',
                                        'description' => '"Ron Añejado, Jugo de Piña, Jugo de Naranja, Crema de coco, Nuez moscada."',
                                        'price' => '95.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Aperol Spritz',
                                        'description' => '"Aperol, Proseco, Agua Mineral,"',
                                        'price' => '90.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Moscow Mule',
                                        'description' => '"Vodka, Cerveza de Jengibre, Jugo de Limón, Simple syrup."',
                                        'price' => '85.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Mai Tai',
                                        'description' => '"Ron añejo, Cointreau, Jugo de Limón, Orgeat, Simple Syrup, Angostura."',
                                        'price' => '115.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Carajillo',
                                        'description' => '"Licor 43, Café Espresso."',
                                        'price' => '85.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Modern Classics Cocktails',
                                'description' => null,
                                'file_src' => 'modern-classics-cocktails_1622614553.jpgmodern-classics-cocktails_1622614553.jpg',
                                'products' => [
                                    [
                                        'name' => 'Cosmopolitan',
                                        'description' => '"Vodka, Cointreau, Jugo de Arándanos, Jugo de Limón,Simple Syrup."',
                                        'price' => '85.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'New York Sour',
                                        'description' => '"Bourbon, Jugo de Limón, Simple Syrup, Albumen, Float de Vino tinto."',
                                        'price' => '85.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Green Hawaiian',
                                        'description' => '"Ron blanco, Midori, Crema de Coco, Jugo de Piña"',
                                        'price' => '80.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Jungle Booby',
                                        'description' => '"Tequila, Mezcal, Campari, Jugo de Limón, Jugo de Toronja, Jugo de Piña, Orgeat, Absinthe."',
                                        'price' => '105.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Espresso Martini',
                                        'description' => '"Vodka, Kahlúa, Simple Syrup, Café Espresso"',
                                        'price' => '85.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Bramble',
                                        'description' => '"Ginebra, Crème de mure, Jugo de Limón, Simple syrup."',
                                        'price' => '90.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Copeo',
                                'description' => null,
                                'file_src' => 'copeo_1622614609.jpgcopeo_1622614609.jpg',
                                'products' => []
                            ],
                            [
                                'name' => 'Brandy',
                                'description' => null,
                                'file_src' => null,
                                'products' => [
                                    [
                                        'name' => 'Azteca de oro',
                                        'description' => null,
                                        'price' => '40.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Torres 10',
                                        'description' => null,
                                        'price' => '50.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Cognac',
                                'description' => null,
                                'file_src' => null,
                                'products' => [
                                    [
                                        'name' => 'Hennessy V.S.',
                                        'description' => null,
                                        'price' => '100.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Ginebra',
                                'description' => null,
                                'file_src' => null,
                                'products' => [
                                    [
                                        'name' => 'Beefeater',
                                        'description' => null,
                                        'price' => '70.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Bombay',
                                        'description' => null,
                                        'price' => '75.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Diega',
                                        'description' => null,
                                        'price' => '50.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Hendricks',
                                        'description' => null,
                                        'price' => '90.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Tanqueray',
                                        'description' => null,
                                        'price' => '75.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Licor',
                                'description' => null,
                                'file_src' => null,
                                'products' => [
                                    [
                                        'name' => "Ancho reyes",
                                        'description' => null,
                                        'price' => '55.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => "Bailey's",
                                        'description' => null,
                                        'price' => '60.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => "Baraima orxachata",
                                        'description' => null,
                                        'price' => '55.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => "Conti Amaretto",
                                        'description' => null,
                                        'price' => '45.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => "Flamingo  Cacao obscuro",
                                        'description' => null,
                                        'price' => '30.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => "Frangelico",
                                        'description' => null,
                                        'price' => '70.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => "Grand Marnier",
                                        'description' => null,
                                        'price' => '100.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Mezcal',
                                'description' => null,
                                'file_src' => null,
                                'products' => [
                                    [
                                        'name' => '400 Conejos joven',
                                        'description' => null,
                                        'price' => '80.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Mezcal Unión joven',
                                        'description' => null,
                                        'price' => '80.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Ron',
                                'description' => null,
                                'file_src' => null,
                                'products' => [
                                    [
                                        'name' => 'Appelton Estate Reserve Blend',
                                        'description' => null,
                                        'price' => '65.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Bacardí Blanco',
                                        'description' => null,
                                        'price' => '50.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Capitan Morgan',
                                        'description' => null,
                                        'price' => '50.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Flor de caña 7años',
                                        'description' => null,
                                        'price' => '50.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Havana Club 3 años',
                                        'description' => null,
                                        'price' => '50.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Matusalen Clásico',
                                        'description' => null,
                                        'price' => '50.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Tequila',
                                'description' => null,
                                'file_src' => null,
                                'products' => [
                                    [
                                        'name' => '1800 Blanco',
                                        'description' => null,
                                        'price' => '50.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Don Julio 70 Cristalino',
                                        'description' => null,
                                        'price' => '90.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Tradicional Reposado',
                                        'description' => null,
                                        'price' => '60.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Maestro Dobel Diamante',
                                        'description' => null,
                                        'price' => '75.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Vino',
                                'description' => null,
                                'file_src' => null,
                                'products' => [
                                    [
                                        'name' => 'Casa madero 3V',
                                        'description' => null,
                                        'price' => '130.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Casa madero V',
                                        'description' => null,
                                        'price' => '115.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Cinzano Prosseco',
                                        'description' => null,
                                        'price' => '120.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Vodka',
                                'description' => null,
                                'file_src' => null,
                                'products' => [
                                    [
                                        'name' => 'Absolute Azúl',
                                        'description' => null,
                                        'price' => '50.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Grey Goose',
                                        'description' => null,
                                        'price' => '70.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Smirnoff',
                                        'description' => null,
                                        'price' => '50.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Smirnoff Tamarindo',
                                        'description' => null,
                                        'price' => '55.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => 'Stolichnaya',
                                        'description' => null,
                                        'price' => '60.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                            [
                                'name' => 'Whisky',
                                'description' => null,
                                'file_src' => null,
                                'products' => [
                                    [
                                        'name' => "Black and White",
                                        'description' => null,
                                        'price' => '55.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => "Buchanan's 12",
                                        'description' => null,
                                        'price' => '75.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => "Chivas 12",
                                        'description' => null,
                                        'price' => '70.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => "Etiqueta negra",
                                        'description' => null,
                                        'price' => '70.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => "Etiqueta roja",
                                        'description' => null,
                                        'price' => '50.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => "Jack Daniel's",
                                        'description' => null,
                                        'price' => '55.00',
                                        'image_src' => null
                                    ],
                                    [
                                        'name' => "Jim Beam",
                                        'description' => null,
                                        'price' => '55.00',
                                        'image_src' => null
                                    ],
                                ]
                            ],
                        ],
                    ],
                ],
            ],
        ];

        foreach($backup as $_user) {
            $user = new User($_user);
            $user->type_id = 2;
            $user->save();

            foreach($_user['menus'] as $_menu) {
                $menu = new Menu($_menu);
                $menu->user_id = $user->id;
                $menu->save();

                foreach($_menu['categories'] as $_category) {
                    $category = new Category($_category);
                    $category->user_id = $user->id;
                    $category->menu_id = $menu->id;
                    $category->save();

                    foreach($_category['products'] as $_product) {
                        $product = new Product($_product);
                        $product->category_id = $category->id;
                        $product->save();

                    }
                }
            }
        }
    }
}
