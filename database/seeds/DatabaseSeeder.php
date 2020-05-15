<?php

use App\Models\Comment;
use App\Models\MediaLibrary;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Company;
use App\Models\LocationCountry;
use App\Models\LocationCity;
use App\Models\Role;
use App\Models\Token;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Roles
        Role::firstOrCreate(['name' => config('values.roles.role_superadmin_name'), 'description' => config('values.roles.role_superadmin_description')]);

        $role_admin = Role::firstOrCreate(['name' => config('values.roles.role_admin_name'), 'description' => config('values.roles.role_admin_description')]);

        // MediaLibrary
        MediaLibrary::firstOrCreate([]);

        // Users
        $user = User::firstOrCreate(
            ['email' => config('values.users.user_superadmin_email')],
            [
                'name' => config('values.users.user_superadmin_name'),
                'password' => Hash::make(config('values.app_config.app_default_password')),
                'email_verified_at' => now()
            ]
        );

        $user->roles()->sync([$role_admin->id]);

        // Country
        $country = LocationCountry::firstOrCreate(
            [
                'name' => 'Spain',
                'iso_alpha_2' => 'ES',
                'iso_alpha_3' => 'ESP',
                'iso_numeric' => '724',
                'international_phone' => '34',
            ]
        );

        // City
        $city = LocationCity::firstOrCreate(
            [
                'name' => 'Barcelona',
                'description' => '',
                'country_id' => config('values.app_config.country_id_by_default'),
            ]
        );

        // Company
        $company = Company::firstOrCreate(
            [
                'name' => 'Company Test',
                'author_id' => $user->id
            ],
            [
                'posted_at' => now(),
                'description' => "I'm a company as example",
                'country_id' => $country->id,
                'city_id' => $city->id,
                'address' => "",
                'email' => "",
                'phone' => 00000,
                'contact_person' => "",
                'notes' => "",
            ]
        );

        // Product Types
        $productType = ProductType::firstOrCreate(
            [
                'title' => 'Product Type Test',
                'author_id' => $user->id
            ],
            [
                'posted_at' => now(),
                'content' => "I'm a product type as example",
            ]
        );

        // Products
        $product = Product::firstOrCreate(
            [
                'title' => 'Product Test',
                'author_id' => $user->id
            ],
            [
                'posted_at' => now(),
                'content' => "I'm a product as example",
                'product_type_id' => $productType->id,
                'company_id' => 1,
            ]
        );

        // Comments
        Comment::firstOrCreate(
            [
                'author_id' => $user->id,
                'product_id' => $product->id
            ],
            [
                'posted_at' => now(),
                'content' => "Hey ! I'm a comment as example."
            ]
        );

        // API tokens
        User::where('api_token', null)->get()->each->update([
            'api_token' => Token::generate()
        ]);

        // Other Seeders
        $this->call(UsersRolesSeeder::class);
        $this->call(LocationCountriesSeeder::class);
        $this->call(LocationCitiesSeeder::class);

        // Update Superuser Default Token
        User::where('email', config('values.users.user_superadmin_email'))->update([
            'api_token' => config('values.app_config.default_user_token')
        ]);
    }
}

