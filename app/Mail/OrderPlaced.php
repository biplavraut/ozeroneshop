<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;


class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        //
        $this->order = $order;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->markdown('emails.orders.placed');
        return $this->from('orders@ozeroneshop.com')->markdown('emails.orders.placed', [
                    'url' => 'https://ozeroneshop.com/order-detail/',
                    'order_code' => $this->order->order_code,
                    'discount' => $this->order->discount
                ]);
    }
}
