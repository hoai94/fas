<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
class MailOrder extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    public $data;
    public $carts;
    public $customer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data , $carts , $customer)
    {
        $this->data =  $data;
        $this->carts =  $carts;
        $this->customer =  $customer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


        return $this->view('frontend.mail.success',
        [
            'products' =>  $this->data,
            'carts'    =>  $this->carts
        ]
        );
        // return $this->view('frontend.mail.test');
    }
}
