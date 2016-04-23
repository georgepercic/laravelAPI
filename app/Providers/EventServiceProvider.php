<?php

namespace App\Providers;

use App\ApiLog;
use App\Article;
use App\Block;
use App\Comment;
use App\Meta;
use App\AccountToken;
use App\ImageStyle;
use App\Image;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\UserWasRegistered' => [
            'App\Listeners\UserWasRegistered',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        ApiLog::creating(function ($api)
        {
            $api->created_at = $api->freshTimestamp();
        });

        AccountToken::creating(function ($tokens)
        {
            $tokens->created_at = $tokens->freshTimestamp();
        });

        Block::creating(function ($block)
        {
            //generate UUID for primary key
            $block->{$block->getKeyName()} = (string)$block->generateNewId();
        });

        Article::creating(function ($article)
        {
            //generate UUID for primary key
            $article->{$article->getKeyName()} = (string)$article->generateNewId();
        });

        Article::deleting(function ($article)
        {
            //delete meta on article delete
            Meta::destroy($article->{$article->getKeyName()});
        });

        Comment::creating(function ($comment)
        {
            //generate UUID for primary key
            $comment->{$comment->getKeyName()} = (string)$comment->generateNewId();
        });
    }
}
