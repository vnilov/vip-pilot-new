<?php

namespace App\Mail;

use \Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Order extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $phone;
    protected $time;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->phone = htmlspecialchars(strip_tags($request->input("phone")));
        $this->name = htmlspecialchars(strip_tags($request->input("name")));
        $this->time = htmlspecialchars(strip_tags($request->input("time")));
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('postmaster@vip-pilot.ru')
                    ->view('emails.order')
                    ->subject('Новое сообщение отправленное с сайта')
                    ->with([
                        'name' => $this->name,
                        'time' => $this->time,
                        'phone'=> $this->phone
                    ]);
    }
}
