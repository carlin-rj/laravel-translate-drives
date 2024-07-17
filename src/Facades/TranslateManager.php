<?php

namespace Carlin\LaravelTranslateDrivers\Facades;

use Carlin\TranslateDrivers\Providers\AbstractProvider;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \Carlin\TranslateDrivers\TranslateManager extend(string $driver, \Closure $callback)
 * @method static AbstractProvider driver(string $driver = null)
 * @method static \Carlin\TranslateDrivers\TranslateManager config(array $config)
 * @method static array getDrivers()
 * @method static AbstractProvider buildProvider(string $provider, array $config = [])
 *
 * @see \Carlin\TranslateDrivers\TranslateManager
 */
class TranslateManager extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return \Carlin\TranslateDrivers\TranslateManager::class;
    }
}
