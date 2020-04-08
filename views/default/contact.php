<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

if (!$renderPartial) {
    $this->title = Yii::t('contact', 'Contact us!');
    $this->params['breadcrumbs'][] = $this->title;
}

?>
<div class="default-contact">

    <?php if (!$renderPartial): ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-6">

            <?php endif; ?>

            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'name') ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'email') ?>
                </div>
            </div>

            <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

            <div class="hidden">
                <?= $form->field($model, 'lastname') ?>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

            <?php if (!$renderPartial): ?>
        </div>
    </div>

<?php endif; ?>

</div>



