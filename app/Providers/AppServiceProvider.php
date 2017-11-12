<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		// boot model relationships
		Relation::morphMap([
			'user' => \App\User::class,
			'ticket' => \App\Ticket::class,
			'post' => \App\Post::class,
			'comment' => \App\Comment::class,

		]);

        Schema::defaultStringLength(191);

		// IDE helper
		if ($this->app->environment() !== 'production') {
			$this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
		}
	}


	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//

	}
}
