<?php

namespace daxslab\contactform\controllers;

use daxslab\contactform\models\ContactForm;
use Yii;

/**
 * Created by WebStorm.
 * User: glpz
 * Date: 4/07/17
 * Time: 17:21
 */
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
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('contact-success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('contact-error', 'There was an error sending email.');
            }
        }

        $renderMethod = $renderPartial ? 'renderPartial' : 'render';
        return $this->$renderMethod('contact', [
            'model' => $model,
            'renderPartial' => $renderPartial,
        ]);

    }

}