<?php

namespace Carlin\LaravelTranslateDrives\Facades;

use Carlin\TranslateDrives\Providers\AbstractProvider;
use Carlin\TranslateDrives\Providers\AlibabaCloudProvider;
use Carlin\TranslateDrives\Providers\BaiduProvider;
use Carlin\TranslateDrives\Providers\GoogleProvider;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \Carlin\TranslateDrives\TranslateManager extend(string $driver, \Closure $callback)
 * @method static AbstractProvider driver(string $driver = null)
 * @method static \Carlin\TranslateDrives\TranslateManager config(array $config)
 * @method static array getDrives()
 * @method static AbstractProvider buildProvider(string $provider, array $config = [])
 * @method static BaiduProvider baidu(?array $config = null)
 * @method static GoogleProvider google(?array $config = null)
 * @method static AlibabaCloudProvider alibabaCloud(?array $config = null)
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
