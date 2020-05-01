<?php

namespace App\Lisenter;

use App\Events\ReadArticle;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ArticleRead
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
     * @param  ReadArticle  $event
     * @return void
     */
    public function handle(ReadArticle $event)
    {
        //
        $event->article->addViews();
    }
}
