Yii2 Contact Form
===============

[![Latest Stable Version](https://poser.pugx.org/daxslab/yii2-contactform-module/v/stable.svg)](https://packagist.org/packages/daxslab/yii2-contactform-module)
[![Total Downloads](https://poser.pugx.org/daxslab/yii2-contactform-module/downloads)](https://packagist.org/packages/daxslab/yii2-contactform-module)
[![Latest Unstable Version](https://poser.pugx.org/daxslab/yii2-contactform-module/v/unstable.svg)](https://packagist.org/packages/daxslab/yii2-contactform-module)
[![License](https://poser.pugx.org/daxslab/yii2-contactform-module/license.svg)](https://packagist.org/packages/daxslab/yii2-contactform-module)

Yii2 module for including contact forms

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist daxslab/yii2-contactform-module "*"
```

or add

```
"daxslab/yii2-contactform-module": "*"
```

to the require section of your `composer.json` file.

Usage
-----

Setup the module on config file

```
'modules' => [
    //...
    'contactForm' => [
        'class' => 'daxslab\contactform\Module',
        'viewPath' => '@app/views/contactForm', //you can configure the view path in order to use custom views
    ],
    //...
],
```

Partial usage
-------------

You can embed the form on any view using `Yii::$app->runAction('/contactForm/default/contact', ['renderPartial' => true])`.

Customization
-------------

- email: email to send and receive email.
- successMessage: message to show to set on flash when sending email.
- errorMessage: message to show to set on flash if failed when sending email.

