<?php

namespace App\Providers;

use App\Events\ReadArticle;
use App\Events\ReadPage;
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
        ReadArticle::class=>[
            'App\Lisenter\ArticleRead',
        ],
        ReadPage::class=>[
            'App\Lisenter\PageRead',
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
