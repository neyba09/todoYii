<?php

namespace app\modules\api;

class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\api\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        \Yii::$app->urlManager->addRules($this->getUrlRules(), false);
    }

    /**
     * UrlManager rules for module
     */
    public function getUrlRules()
    {
        return [
            'OPTIONS <action>' => 'options',
        ];
    }
}