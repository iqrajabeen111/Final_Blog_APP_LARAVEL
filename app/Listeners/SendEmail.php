<?php

namespace App\Listeners;

use App\Events\UserEmailEventCreated;
use App\Models\UserVerify;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmail
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
     * @param  \App\Events\UserEmailEventCreated  $event
     * @return void
     */
    public function handle(UserEmailEventCreated $event)
    {
  
        UserVerify::create([
            'user_id' =>$event->user['id'],
            'token' => $event->user['token'],
        ]);
        $request=$event->user['email'];
        Mail::send('Auth/emailVerificationEmail', ['token' => $event->user['token']], function ($message) use ($request) {
            $message->to($request);
            $message->subject('Email Verification Mail');
        });

    }
}
