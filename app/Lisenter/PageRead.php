<?php

namespace App\Lisenter;

use App\Events\ReadPage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PageRead
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
     * @param  ReadPage  $event
     * @return void
     */
    public function handle(ReadPage $event)
    {
        //
        $event->page->addViews();
    }
}
