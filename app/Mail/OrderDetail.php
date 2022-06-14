<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderDetail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order)
    {
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->order['email'])->to('admin@admin.com')->subject('Order Confirmation')->markdown('emails.orderdetail-email');
    }
}
