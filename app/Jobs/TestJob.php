<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class TestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
   public $data;
   public $customer;
   public $carts;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data ,$customer, $carts)
    {
        $this->data = $data;
        $this->customer = $customer;
        $this->carts = $carts;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->customer->email)->send(new TestMail($this->data, $this->carts, $this->customer));

    }
}
