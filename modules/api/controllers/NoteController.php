<?php
/**
 * User: TheCodeholic
 * Date: 3/7/2020
 * Time: 9:35 AM
 */

namespace app\modules\api\controllers;


use app\modules\api\resources\NoteResource;
use yii\data\ActiveDataProvider;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\Cors;
use yii\rest\ActiveController;

class NoteController extends ActiveController
{
    public $modelClass = NoteResource::class;

    public function behaviors()
    {
        $behaviors = parent::behaviors();
//        $auth = $behaviors['authenticator'];
//        $auth['authMethods'] = [
//            HttpBearerAuth::class
//        ];
//        unset($behaviors['authenticator']);
//        $behaviors['cors'] = [
//            'class' => Cors::class
//        ];
        $behaviors['corsFilter'] = [
            'class' => Cors::class,
            'cors' => [
                'Access-Control-Allow-Origin' => ['*'],
                'Access-Control-Allow-Methods' => ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],
                'Origin' => ['*'],
                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'DELETE', 'OPTIONS'],
                'Access-Control-Request-Headers' => [
                    'Origin',
                    'X-Requested-With',
                    'Content-Type',
                    'accept',
                    'Authorization'
                ],
            ],
        ];
//        $behaviors['authenticator'] = $auth;

        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        return $actions;
    }

    public function prepareDataProvider()
    {
        return new ActiveDataProvider([
            'query' => $this->modelClass::find()->andWhere(['created_by' => \Yii::$app->user->id])
        ]);
    }
}