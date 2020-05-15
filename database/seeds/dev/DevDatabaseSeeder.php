<?php

use App\Models\Comment;
use App\Models\NewsletterSubscription;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Company;
use Illuminate\Database\Seeder;

class DevDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProductType::class, 10)->create();
        factory(Product::class, 20)
            ->create()
            ->each(function ($product) {
                factory(Comment::class, 5)
                    ->create([
                        'product_id' => $product->id
                    ]);
            });

        $this->call(LocationCountriesSeeder::class);
        $this->call(LocationCitiesSeeder::class);

        factory(Company::class, 20)->create();
        factory(User::class, 5)->create();
        factory(NewsletterSubscription::class, 5)->create();
    }
}
