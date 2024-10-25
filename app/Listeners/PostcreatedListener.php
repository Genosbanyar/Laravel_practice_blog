<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\PostCreatedEvent;
use Illuminate\Support\Facades\Mail;
use App\Mail\StoreMail;

class PostcreatedListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(PostCreatedEvent $event): void
    {
        
        Mail::to("banyar@gmail.com")->send(new StoreMail($event->post));
    }
}
