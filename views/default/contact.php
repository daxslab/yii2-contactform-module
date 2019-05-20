<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

if (!$renderPartial) {
    $this->title = 'Contact';
    $this->params['breadcrumbs'][] = $this->title;
}

?>
<div class="site-contact">

    <?php if (!$renderPartial): ?>
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">

            <?php endif; ?>

            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'name')->textInput(['placeholder' => $model->getAttributeLabel('name')])->label(false) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'email')->textInput(['placeholder' => $model->getAttributeLabel('email')])->label(false) ?>
                </div>
            </div>

            <?= $form->field($model, 'body')->textarea(['rows' => 6, 'placeholder' => $model->getAttributeLabel('body')])->label(false) ?>

            <div class="hidden">
                <?= $form->field($model, 'lastname') ?>
            </div>

            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>

            <?php if (!$renderPartial): ?>
        </div>
    </div>

<?php endif; ?>

</div>



