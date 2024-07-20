<?php

namespace Carlin\LaravelTranslateDrives;

use Carlin\TranslateDrives\TranslateManager;
use Illuminate\Config\Repository;
use Illuminate\Support\ServiceProvider;

class TranslateDrivesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot(): void
    {
		$this->registerPublishing();
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
		$configPath = __DIR__.'/../config/translate-drives.php';
		$this->mergeConfigFrom($configPath, 'translate-drives');


		$this->app->bind(TranslateManager::class, function ($app) {
			/** @var Repository $config */
			$config = $app->make('config');
			return new TranslateManager($config->get('translate-drives') ?? []);
		});
	}

	private function registerPublishing(): void
	{
		if ($this->app->runningInConsole()) {
			$this->publishes([
				__DIR__.'/../config/translate-drives.php' => config_path('translate-drives.php'),
			], 'translate-drives');
		}
	}

}
