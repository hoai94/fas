<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
class TestMail extends Mailable
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
        //$carts = Session::get('carts');
        // if (is_null($carts)) return [];

        // $productId = array_keys($carts);
        return $this->view('frontend.mail.test',
        [
            'products' =>  $this->data,
            'carts'    =>  $this->carts
        ]
    );
    }
}
