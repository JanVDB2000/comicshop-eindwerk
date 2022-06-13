<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderDetail extends Mailable
{
    use Queueable, SerializesModels;

    public $orderdetail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($orderdetail)
    {
        $this->orderdetail = $orderdetail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->orderdetail['email'])
            ->attachData($this->orderdetail, 'order.pdf', [
                'mime' => 'application/pdf',
            ])
            ->subject('OrderDetail')
            ->markdown('emails.orderdetail-email');
    }
}
