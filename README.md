## Baidu, Alibaba Cloud Translate, and Google Translate driver package, ready to use out of the box

[**简体中文 🇨🇳**](README_cn.md)

### Translate driver package usage tutorial
#### Environmental requirements
- `PHP` >= 8.0

## install
```
composer require carlin/laravel-translate-drivers
```

```php
php artisan vendor:publish --provider="Carlin\LaravelTranslateDrivers\TranslateDriversServiceProvider" --tag=translate-driver
```

## Usage
### Baidu

```php
use Carlin\LaravelTranslateDrivers\Facades\TranslateManager;

$query = '我喜欢你的冷态度 :test';
$res = TranslateManager::driver(Provider::BAIDU)->translate($query, LangCode::EN);
$res->getDst(); //translate text
$res->getSrc(); //origin text
$res->getOriginal(); //original result
```


### Google

```php
use Carlin\LaravelTranslateDrivers\Facades\TranslateManager;

$query = '我喜欢你的冷态度 :test';
$res = TranslateManager::driver(Provider::GOOGLE)->translate($query, LangCode::EN);
```

### Alibaba cloud

```php
use Carlin\LaravelTranslateDrivers\Facades\TranslateManager;

$query = '我喜欢你的冷态度 :test';
$res = TranslateManager::driver(Provider::ALIBABA_CLOUD)->translate($query, LangCode::EN);
```

## Custom driver
```php

use Carlin\TranslateDrivers\Providers\AbstractProvider;
use Carlin\LaravelTranslateDrivers\Facades\TranslateManager;
class MyTranslateDriver extends AbstractProvider
{
    public function __construct(?string $app_id = null, ?string $app_key = null, array $config = [])
    {
        parent::__construct($app_id, $app_key, $config);
        
        //you code
    }

    protected function handlerTranslate(string $query, string $from = LangCode::Auto, string $to = LangCode::EN): Translate
    {
        //you translation code
        return new Translate([
            'src'=>'',
            'dst'=>'',
        ]);
    }
    protected function mapTranslateResult(array $translateResult): array
    {
        //you translate Result code
        return [

        ];
    }
}

$query = '我喜欢你的冷态度 :test';
$res = TranslateManager::extend('my_driver', function ($allConfig) {
    $config = $allConfig['drivers']['my_driver'] ?? [];
    //you configuration code
    return new MyTranslateDriver(config:$config);
})->driver('my_driver')->translate($query);
```

## Preserving Parameters

The ```preserveParameters()``` method allows you to preserve certain parameters in strings while performing translations. This is particularly useful when dealing with localization files or templating engines where specific placeholders need to be excluded from translation.

Default regex is ```/:(\w+)/``` which covers parameters starting with :. Useful for translating language files of Laravel and other frameworks. You can also pass your custom regex to modify the parameter syntax.
```php
use Carlin\LaravelTranslateDrivers\Facades\TranslateManager;
use Carlin\TranslateDrivers\Supports\Provider;
use Carlin\TranslateDrivers\Supports\LangCode;

$query = '我喜欢你的冷态度 :test';
$res = TranslateManager::driver(Provider::GOOGLE)->preserveParameters()->translate($query, LangCode::EN); //I like your cold attitude :test
```

Or use custom regex:

```php
use Carlin\LaravelTranslateDrivers\Facades\TranslateManager;
use Carlin\TranslateDrivers\Supports\Provider;
use Carlin\TranslateDrivers\Supports\LangCode;

$query = '我喜欢你的冷态度 {{test}}';
$res = TranslateManager::driver(Provider::GOOGLE)->preserveParameters('/\{\{([^}]+)\}\}/')->translate($query, LangCode::EN); //I like your cold attitude :test
```

## If you have a better translation driver, please feel free to submit a PR
