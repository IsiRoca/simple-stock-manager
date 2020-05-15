<?php

namespace App\Events;

use App\Http\Resources\Comment as CommentResource;
use App\Models\Product;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CommentPosted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Comment details
     *
     * @var CommentResource
     */
    public $comment;

    /**
     * Product details
     *
     * @var Product
     */
    private $product;

    /**
     * Create a new event instance.
     */
    public function __construct(CommentResource $comment, Product $product)
    {
        $this->comment = $comment;
        $this->product = $product;
    }

    /**
     * Get the channels the event should broadcast on.
     */
    public function broadcastOn(): Channel
    {
        return new Channel('product.' . $this->product->id);
    }

    /**
     * The event's broadcast name.
     */
    public function broadcastAs(): string
    {
        return 'comment.posted';
    }
}
