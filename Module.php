<?php

namespace daxslab\contactform;

use yii\i18n\PhpMessageSource;

/**
 * Class Module
 * @package daxslab\contactform
 */
class Module extends yii\base\Module
{

    /**
     * @var string email to send and receive email.
     */
    public $email = null;

    /**
     * @var string message to show to set on flash when sending email.
     */
    public $successMessage = null;

    /**
     * @var string message to show to set on flash if failed when sending email.
     */
    public $errorMessage = null;

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        if (!isset($app->get('i18n')->translations['contact*'])) {
            $app->get('i18n')->translations['contact*'] = [
                'class' => PhpMessageSource::className(),
                'basePath' => __DIR__ . '/messages',
                'sourceLanguage' => 'en-US'
            ];
        }

        $this->email = isset($this->email)
            ? $this->email
            : Yii::$app->params['adminEmail'];

        $this->successMessage= isset($this->successMessage)
            ? $this->successMessage
            : Yii::t('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');

        $this->errorMessage = isset($this->errorMessage)
            ? $this->errorMessage
            : Yii::t('contact', 'There was an error sending email. Please, try again later.');
    }

}
