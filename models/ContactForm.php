<?php

namespace daxslab\contactform\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    public $name;
    public $email;
    public $subject;
    public $body;
    public $lastname;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // lastname needs to be entered correctly
            ['lastname', 'compare', 'compareValue' => ''],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('contact', 'Name'),
            'email' => Yii::t('contact', 'Email'),
            'subject' => Yii::t('contact', 'Subject'),
            'body' => Yii::t('contact', 'Body'),
            'lastname' => Yii::t('contact', 'Lastname'),
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     *
     * @param string $email the target and source email address
     * @return bool whether the email was sent
     */
    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom([$email => Yii::$app->name])
            ->setReplyTo([$this->email => $this->name])
            ->setSubject($this->subject ?: Yii::t('contact', '{name} in {website}', [
                'name' => $this->name,
                'website' => Yii::$app->name
            ]))
            ->setTextBody($this->body)
            ->send();
    }
}
