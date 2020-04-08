<?php

namespace daxslab\contactform\controllers;

use daxslab\contactform\models\ContactForm;
use Yii;

class DefaultController extends \yii\web\Controller
{

    public function init()
    {
        if ($this->module->viewPath) {
            $this->viewPath = $this->module->viewPath . '/' . $this->id;
        }
    }

    public function actionContact($renderPartial = false)
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail($this->module->email)) {
                Yii::$app->session->setFlash('contact-success', $this->module->successMessage);
            } else {
                Yii::$app->session->setFlash('contact-error', $this->module->errorMessage);
            }
        }

        $renderMethod = $renderPartial ? 'renderPartial' : 'render';
        return $this->$renderMethod('contact', [
            'model' => $model,
            'renderPartial' => $renderPartial,
        ]);

    }

}
