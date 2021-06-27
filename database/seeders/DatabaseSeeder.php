<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Region;
use App\Models\Provincia;
use App\Models\Ciudad;
use App\Models\Calle;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Regiones
        $regions = [
            'Arica y Parinacota',
            'Tarapacá',
            'Antofagasta',
            'Atacama',
            'Coquimbo',
            'Valparaiso',
            'Metropolitana de Santiago',
            'Libertador General Bernardo O\'Higgins',
            'Maule',
            'Ñuble',
            'Biobío',
            'La Araucanía',
            'Los Ríos',
            'Los Lagos',
            'Aisén del General Carlos Ibáñez del Campo',
            'Magallanes y de la Antártica Chilena'
        ];

        foreach($regions as $region) {
            Region::create([
                'name' => $region,
            ]);
        };


        //Provincias
        $provincias = [
            ['Arica',1],
            ['Parinacota',1],
            ['Iquique',2],
            ['Tamarugal',2],
            ['Tocopilla',3],
            ['El Loa',3],
            ['Antofagasta',3],
            ['Chañaral',4],
            ['Copiapó',4],
            ['Huasco',4],
            ['Elqui',5],
            ['Limarí',5],
            ['Choapa',5],
            ['Petorca',6],
            ['Los Andes',6],
            ['San Felipe de Aconcagua',6],
            ['Quillota',6],
            ['Valparaíso',6],
            ['San Antonio',6],
            ['Isla de Pascua',6],
            ['Marga Marga',6],
            ['Chacabuco',7],
            ['Santiago',7],
            ['Cordillera',7],
            ['Maipo',7],
            ['Melipilla',7],
            ['Talagante',7],
            ['Cachapoal',8],
            ['Colchagua',8],
            ['Cardenal Caro',8],
            ['Curicó',9],
            ['Talca',9],
            ['Linares',9],
            ['Cauquenes',9],
            ['Diguillín',10],
            ['Itata',10],
            ['Punilla',10],
            ['Biobío',11],
            ['Concepción',11],
            ['Arauco',11],
            ['Malleco',12],
            ['Cautín',12],
            ['Valdivia',13],
            ['Ranco',13],
            ['Osorno',14],
            ['Llanquihue',14],
            ['Chiloé',14],
            ['Palena',14],
            ['Coyhaique',15],
            ['Aysén',15],
            ['General Carrera',15],
            ['Capitán Prat',15],
            ['Última Esperanza',16],
            ['Magallanes',16],
            ['Tierra del Fuego',16],
            ['Antártica Chilena',16]
        ];

        foreach($provincias as $provincia) {
            Provincia::create([
                'name' => $provincia[0],
                'id_region' => $provincia[1],
            ]);
        };


        //Ciudades
        $ciudades = [
            ['Arica',1],
            ['Camarones',1],
            ['Putre',2],
            ['General Lagos',2],
            ['Iquique',3],
            ['Alto Hospicio',3],
            ['Pozo Almonte',4],
            ['Camiña',4],
            ['Antofagasta',7],
            ['Mejillones',7],
            ['Tocopilla',5],
            ['María Elena',5],
            ['Calama',6],
            ['Ollague',6],
            ['Copiapó',9],
            ['Caldera',9],
            ['Vallenar',10],
            ['Alto del Carmen',10],
            ['Chañaral',8],
            ['Diego de Almagro',8],
            ['Illapel',13],
            ['Canela',13],
            ['La Serena',11],
            ['Coquimbo',11],
            ['Ovalle',12],
            ['Combarbalá',12],
            ['Isla de Pascua',20],
            ['Los Andes',15],
            ['Calle Larga',15],
            ['Quillota',17],
            ['La Calera',17],
            ['Valparaíso',18],
            ['Casablanca',18],
            ['La Ligua',14],
            ['Cabildo',14],
            ['San Antonio',19],
            ['Algarrobo',19],
            ['San Felipe',16],
            ['Catemu',16],
            ['Quilpué',21],
            ['Limache',21],
            ['Talagante',27],
            ['El Monte',27],
            ['La Pintana',23],
            ['La Reina',23],
            ['Colina',22],
            ['Lampa',22],
            ['Puente Alto',24],
            ['Pirque',24],
            ['San Bernardo',25],
            ['Buin',25],
            ['Melipilla',26],
            ['Alhué',26],
            ['Rancuagua',28],
            ['Codegua',28],
            ['Navidad',30],
            ['Paredones',30],
            ['San Fernando',29],
            ['Chépica',29],
            ['Parral',33],
            ['Linares',33],
            ['Curicó',31],
            ['Hualañé',31],
            ['Cauquenes',34],
            ['Chanco',34],
            ['Talca',32],
            ['Constitución',32],
            ['Quirihue',36],
            ['Cobquecura',36],
            ['San Carlos',37],
            ['Coihueco',37],
            ['Chillán',35],
            ['Bulnes',35],
            ['Concepción',39],
            ['Coronel',39],
            ['Lebu',40],
            ['Arauco',40],
            ['Los Angeles',38],
            ['Antuco',38],
            ['Angol',41],
            ['Collipulli',41],
            ['Gorbea',42],
            ['Lautaro',42],
            ['Valdivia',43],
            ['Corral',43],
            ['La Unión',44],
            ['Futrono',44],
            ['Quinchao',47],
            ['Castro',47],
            ['Río Negro',45],
            ['Osorno',45],
            ['Puerto Montt',46],
            ['Calbuco',46],
            ['Chaitén',48],
            ['Futaleufú',48],
            ['Aysén',50],
            ['Cisnes',50],
            ['Lago Verde',49],
            ['Coyhaique',49],
            ['Cochrane',52],
            ['O\'Higgins',52],
            ['Chile Chico',51],
            ['Río Ibáñez',51],
            ['Porvenir',55],
            ['Primavera',55],
            ['Punta Arenas',54],
            ['Laguna Blanca',54],
            ['Natales',53],
            ['Torres del Paine',53],
            ['Cabo de Hornos',56],
            ['Antártica',56],
        ];

        foreach($ciudades as $ciudad) {
            Ciudad::create([
                'name' => $ciudad[0],
                'id_provincia' => $ciudad[1],
            ]);
        };


        //Calles
        $calles = [
            'Calle San Martin',
            'Calle Chacabuco',
            'Calle Maipú',
            'Calle Paicaví',
            'Avenida Los Carreras',
            'Avenida Independencia',
            'Avenida Pedro de Valdivia',
            'Calle Arturo Prat',
            'Calle Manuel Rodríguez',
            'Avenida Gabriela Mistral',
            'Calle Los Aromos',
            'Calle Lautaro',
            'Avenida Anibal Pinto',
            'Avenida Barros Arana',
        ];

        foreach($ciudades as $index=>$ciudad) {
            for($i = 0; $i <= 2; $i++) {
                Calle::create([
                    'name' => $calles[rand(0, 13)],
                    'id_ciudad' => $index+1,
                ]);
            }
        };
    }
}
