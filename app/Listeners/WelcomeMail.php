<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class WelcomeMail
{
    private $user;
    
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct($user)
    {
        $user = $user;
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        Mail::to($event->user->email)->send(new WelcomeMail($event->user));
    }
}
