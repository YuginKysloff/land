<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class CallBackFromStudioSite extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The request instance
     *
     * @var Request
     */
    public $request;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Сообщение с сайта Yugin Kysloff Studio')->view('mail.callback');
    }
}
