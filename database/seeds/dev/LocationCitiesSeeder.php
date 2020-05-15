<?php

use App\Models\Token;
use App\Models\LocationCity;
use Illuminate\Database\Seeder;

class LocationCitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            [
                'name' => 'Madrid',
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Álava",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Ávila",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Albacete",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' =>  "Alicante",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Almería",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' =>  "Asturias",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Badajoz",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Baleares",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Barcelona",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Bilbao",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Burgos",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Cantabria",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Castellón",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Ceuta",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Ciudad Real",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Coruña",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Cuenca",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Cáceres",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Cádiz",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Córdoba",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Donostia",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Gerona",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Granada",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Huelva",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Huesca",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Jaén",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Las Palmas",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "León",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Lleida",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Lugo",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Madrid",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Melilla",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Murcia",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Málaga",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Navarra",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Orense",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Palencia",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Pontevedra",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Rioja",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Salamanca",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Segovia",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Sevilla",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Soria",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Tarragona",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Tenerife",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Teruel",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Toledo",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Valencia",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Valladolid",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Zamora",
                'description' => '',
                'country_id' => 48,
            ],
            [
                'name' => "Zaragoza",
                'description' => '',
                'country_id' => 48,
            ],
        ];

        LocationCity::insert($cities);
    }
}
