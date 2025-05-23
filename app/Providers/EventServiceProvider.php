<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use App\Events\UserRegistered;
use App\Listeners\WelcomeMail;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
          UserRegistered::class => [
            WelcomeMail::class,
          ],
        UserVerified::class => [
            VerifyMail::class,
        ],
        UserPasswordReset::class => [
            PasswordResetMail::class,
        ],
        UserPasswordChanged::class => [
            PasswordChangedMail::class,
        ],
        UserProfileUpdated::class => [
            ProfileUpdatedMail::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
