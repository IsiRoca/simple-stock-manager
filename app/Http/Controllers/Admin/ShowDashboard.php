<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;
use Illuminate\View\View;

class ShowDashboard extends Controller
{
    /**
     * Show the application admin dashboard.
     */
    public function __invoke(): View
    {
        return view('admin.dashboard.index', [
            'comments' =>  Comment::lastWeek()->get(),
            'products' => Product::lastWeek()->get(),
            'users' => User::lastWeek()->get(),
        ]);
    }
}
