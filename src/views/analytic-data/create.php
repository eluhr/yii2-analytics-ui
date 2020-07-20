<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var eluhr\analytics\ui\models\AnalyticData $model
*/

$this->title = Yii::t('analytics', 'Analytic Data');
$this->params['breadcrumbs'][] = ['label' => Yii::t('analytics', 'Analytic Datas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud analytic-data-create">

    <h1>
        <?= Yii::t('analytics', 'Analytic Data') ?>
        <small>
                        <?= Html::encode($model->id) ?>
        </small>
    </h1>

    <div class="clearfix crud-navigation">
        <div class="pull-left">
            <?=             Html::a(
            Yii::t('analytics', 'Cancel'),
            \yii\helpers\Url::previous(),
            ['class' => 'btn btn-default']) ?>
        </div>
    </div>

    <hr />

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
