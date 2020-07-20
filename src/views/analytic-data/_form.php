<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var eluhr\analytics\ui\models\AnalyticData $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="analytic-data-form">

    <?php $form = ActiveForm::begin([
    'id' => 'AnalyticData',
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-danger',
    'fieldConfig' => [
             'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
             'horizontalCssClasses' => [
                 'label' => 'col-sm-2',
                 #'offset' => 'col-sm-offset-4',
                 'wrapper' => 'col-sm-8',
                 'error' => '',
                 'hint' => '',
             ],
         ],
    ]
    );
    ?>

    <div class="">
        <?php $this->beginBlock('main'); ?>

        <p>
            

<!-- attribute id -->

<!-- attribute type -->
			<?=                     $form->field($model, 'type')->widget(\kartik\select2\Select2::classname(), [
                        'name' => 'class_name',
                        'model' => $model,
                        'attribute' => 'type',
                        'data' => eluhr\analytics\ui\models\AnalyticData::optstype(),
                        'options' => [
                            'placeholder' => Yii::t('analytics', 'Type to autocomplete'),
                            'multiple' => false,
                        ]
                    ]); ?>

<!-- attribute data -->
			<?= $form->field($model, 'data')->textarea(['rows' => 5]); ?>

<!-- attribute created_at -->

<!-- attribute updated_at -->
        </p>
        <?php $this->endBlock(); ?>
        
        <?=
    Tabs::widget(
                 [
                    'encodeLabels' => false,
                    'items' => [ 
                        [
    'label'   => Yii::t('analytics', 'AnalyticData'),
    'content' => $this->blocks['main'],
    'active'  => true,
],
                    ]
                 ]
    );
    ?>
        <hr/>

        <?php echo $form->errorSummary($model); ?>

        <?= Html::submitButton(
        '<span class="glyphicon glyphicon-check"></span> ' .
        ($model->isNewRecord ? Yii::t('analytics', 'Create') : Yii::t('analytics', 'Save')),
        [
        'id' => 'save-' . $model->formName(),
        'class' => 'btn btn-success'
        ]
        );
        ?>

        <?php ActiveForm::end(); ?>

    </div>

</div>

