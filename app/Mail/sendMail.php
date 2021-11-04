<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use app\hoadon;
use app\chitiethd;
class sendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $orderDetail = [];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(hoadon $order, $orderDetail)
    {
        //
        $this->order = $order;
        $this->orderDetail = $orderDetail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Mail từ MinhHienShop')->view('backend.mail.mail');
    }
}
