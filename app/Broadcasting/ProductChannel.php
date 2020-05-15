<?php

namespace App\Broadcasting;

use App\Models\Product;
use App\Models\User;

class ProductChannel
{
    /**
     * Authenticate the user's access to the channel.
     */
    public function join(User $user, Product $product): bool
    {
        return true;
    }
}
