# Yii2 Analytics Module Core

This is the core (business logic) for a super simple analytics api implementation

## Installation

```bash
composer require eluhr/yii2-analytics-ui
```

## Configuration

```php
use eluhr\analytics\ui\Module as AnalyticsUiModule;

[
    'modules' => [
        'analytics' => [
            'class' => AnalyticsUiModule::class
        ]
    ]
];
```

## (Re)Generating models

```bash
docker-compose run --rm -e PHP_USER_ID=0 php yii analytics-ui-gii/cruds --appconfig=/app/vendor/eluhr/yii2-analytics-core/src/config/giiant.php
```