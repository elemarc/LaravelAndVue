<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeNewUserMail;

class WelcomeNewCustomerListener implements ShouldQueue //implemento esto para ponerlo en queue
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event) //el link entre event y listeners esta en EventServiceProvider
    {   //pillo el customer del evento y el mail del customer, y hago un send instanciando la clase del mail
        Mail::to($event->customer->email)->send(new WelcomeNewUserMail()); 
    }
    
}
