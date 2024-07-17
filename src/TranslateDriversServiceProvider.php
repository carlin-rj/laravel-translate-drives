<?php

namespace Carlin\LaravelTranslateDrivers;

use Carlin\TranslateDrivers\TranslateManager;
use Illuminate\Config\Repository;
use Illuminate\Support\ServiceProvider;

class TranslateDriversServiceProvider extends ServiceProvider
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
		$configPath = __DIR__.'/../config/translate-drivers.php';
		$this->mergeConfigFrom($configPath, 'translate-drivers');


		$this->app->bind(TranslateManager::class, function ($app) {
			/** @var Repository $config */
			$config = $app->make('config');
			return new TranslateManager($config->get('translate-drivers') ?? []);
		});
	}

	private function registerPublishing(): void
	{
		if ($this->app->runningInConsole()) {
			$this->publishes([
				__DIR__.'/../config/translate-drivers.php' => config_path('translate-drivers.php'),
			], 'translate-drivers');
		}
	}

}
