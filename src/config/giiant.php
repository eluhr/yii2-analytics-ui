<?php
/**
 * @link http://www.diemeisterei.de/
 * @copyright Copyright (c) 2020 diemeisterei GmbH, Stuttgart
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace eluhr\analytics\ui;

use schmunk42\giiant\commands\BatchController;
use schmunk42\giiant\generators\crud\callbacks\base\Callback;
use schmunk42\giiant\generators\crud\providers\core\CallbackProvider;
use schmunk42\giiant\generators\crud\providers\core\OptsProvider;
use schmunk42\giiant\generators\crud\providers\core\RelationProvider;

$config = require dirname(__DIR__, 5) . '/config/main.php';

\Yii::$container->set(
    CallbackProvider::class,
    [
        'activeFields' => [
            'id|created_at|updated_at' => Callback::false(),
            'data' => function ($attribute) {
                return <<<PHP
\$form->field(\$model, '{$attribute}')->textarea(['rows' => 5]);
PHP;
            }
        ],
        'columnFormats' => [
            'id|_at' => Callback::false(),
            'type' => function ($attribute) {
        return <<<PHP
[
    'attribute' => '{$attribute}',
    'filter' => eluhr\analytics\ui\models\AnalyticData::optsType(),
    'value' => function (\$model) {
        return \$model->typeLabel;
    },
    'format' => 'html'
]
PHP;

            }
        ],
        'attributeFormats' => [
            '_at' => function ($attribute) {
                return "'{$attribute}:datetime'";
            }
        ]
    ]
);

\Yii::$container->set(
    OptsProvider::class,
    [
        'columnNames' => [
            'type' => 'select2'
        ],
    ]
);


$config['controllerMap']['analytics-ui-gii'] = [
    'class' => BatchController::class,
    'overwrite' => true,
    'interactive' => false,
    'modelNamespace' => __NAMESPACE__ . '\\models',
    'modelBaseClass' => __NAMESPACE__ . '\\models\\ActiveRecord',
    'modelQueryNamespace' => __NAMESPACE__ . '\\models\\query',
    'crudControllerNamespace' => __NAMESPACE__ . '\\controllers',
    'crudSearchModelNamespace' => __NAMESPACE__ . '\\models\\search',
    'crudViewPath' => '@' . str_replace('\\', '/', __NAMESPACE__) . '/views',
    'crudPathPrefix' => '/crud/',
    'crudTidyOutput' => false,
    'crudAccessFilter' => false,
    'useTimestampBehavior' => false,
    'singularEntities' => false,
    'tablePrefix' => 'app_dmstr_',
    'crudMessageCategory' => 'analytics',
    'modelMessageCategory' => 'analytics',
    'tables' => [
        'app_dmstr_analytic_data'
    ],
    'crudProviders' => [
        CallbackProvider::class,
        OptsProvider::class,
        RelationProvider::class,
    ]
];

return $config;
