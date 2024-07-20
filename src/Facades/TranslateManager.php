<?php

namespace Carlin\LaravelTranslateDrives\Facades;

use Carlin\TranslateDrives\Providers\AbstractProvider;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \Carlin\TranslateDrives\TranslateManager extend(string $driver, \Closure $callback)
 * @method static AbstractProvider driver(string $driver = null)
 * @method static \Carlin\TranslateDrives\TranslateManager config(array $config)
 * @method static array getDrives()
 * @method static AbstractProvider buildProvider(string $provider, array $config = [])
 *
 * @see \Carlin\TranslateDrives\TranslateManager
 */
class TranslateManager extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return \Carlin\TranslateDrives\TranslateManager::class;
    }
}
