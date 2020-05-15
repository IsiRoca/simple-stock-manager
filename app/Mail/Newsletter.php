<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Newsletter extends Mailable
{
    use Queueable, SerializesModels;

    protected $products;
    protected $email;

    /**
     * Create a new message instance.
     */
    public function __construct($products, $email)
    {
        $this->products = $products;
        $this->email = $email;
    }

    /**
     * Build the message.
     */
    public function build(): Newsletter
    {
        return $this->from('hello@app.com', config('app.name', 'Laravel'))
                    ->subject(__('newsletter.email.subject'))
                    ->view('emails.newsletter')
                    ->with([
                        'products' => $this->products,
                        'email' => $this->email
                    ]);
    }
}
