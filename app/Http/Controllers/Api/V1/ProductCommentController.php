<?php

namespace App\Http\Controllers\Api\V1;

use App\Events\CommentPosted;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CommentsRequest;
use App\Http\Resources\Comment as CommentResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Auth;

class ProductCommentController extends Controller
{
    /**
     * Return the product's comments.
     */
    public function index(Request $request, Product $product): ResourceCollection
    {
        return CommentResource::collection(
            $product->comments()->with('author')->latest()->paginate($request->input('limit', 50))
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentsRequest $request, Product $product): CommentResource
    {
        $comment = new CommentResource(
            Auth::user()->comments()->create([
                'product_id' => $product->id,
                'content' => $request->input('content')
            ])
        );

        broadcast(new CommentPosted($comment, $product))->toOthers();

        return $comment;
    }
}
