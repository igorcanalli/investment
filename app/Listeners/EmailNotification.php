<?php

namespace App\Listeners;

use App\Events\InvestmentWasMade;
use App\Mail\SendMailUser;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class EmailNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  InvestmentWasMade  $event
     * @return void
     */
    public function handle(InvestmentWasMade $event)
    {
        Mail::to($event->email)->send(new SendMailUser($event->data, $event->email));
    }
}
