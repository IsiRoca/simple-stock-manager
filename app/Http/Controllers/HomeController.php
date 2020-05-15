<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\User;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return view('home.index');
        return view('admin.dashboard.index', [
            'comments' =>  Comment::lastWeek()->get(),
            'products' => Product::lastWeek()->get(),
            'users' => User::lastWeek()->get(),
        ]);
    }

    public function contact(Request $request): View
    {
        return view('contact.contact');
    }
}

