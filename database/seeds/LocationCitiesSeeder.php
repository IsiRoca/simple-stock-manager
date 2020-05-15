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
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Álava",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Ávila",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Albacete",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' =>  "Alicante",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Almería",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' =>  "Asturias",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Badajoz",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Baleares",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Barcelona",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Bilbao",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Burgos",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Cantabria",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Castellón",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Ceuta",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Ciudad Real",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Coruña",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Cuenca",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Cáceres",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Cádiz",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Córdoba",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Donostia",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Gerona",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Granada",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Huelva",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Huesca",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Jaén",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Las Palmas",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "León",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Lleida",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Lugo",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Madrid",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Melilla",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Murcia",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Málaga",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Navarra",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Orense",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Palencia",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Pontevedra",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Rioja",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Salamanca",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Segovia",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Sevilla",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Soria",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Tarragona",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Tenerife",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Teruel",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Toledo",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Valencia",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Valladolid",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Zamora",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
            [
                'name' => "Zaragoza",
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ],
        ];

        LocationCity::insert($cities);
    }
}
