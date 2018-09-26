<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\api\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\web\Response;
###
use app\modules\api\models\Location;
use yii\data\ActiveDataProvider;

/**
 * Description of LocationController
 *
 * @author 00C226
 */
class LocationsController extends ActiveController {

    public $modelClass = 'app\modules\api\models\Location';

//    
//    public static function allowedDomain() {
//        return [
//            "*"
//        ];
//    }
//
//    public function behaviors() {
//        return array_merge(parent::behaviors(), [
//            'corsFilter' => [
//                'class' => \yii\filters\Cors::className(),
//                'cors' => [
//                    'Origin' => static::allowedDomain(),
//                    'access-control-allow-origin' => '*',
//                    'Access-Control-Request-Method' => ['POST'],
//                    //'Access-Control-Allow-Credentials' => true,
//                    'Access-Control-Max-Age' => 3600,
//                ]
//            ]
//        ]);
//    }

    public function actions() {
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex($page = 1) {
//        Yii::$app->response->format = Response::FORMAT_JSON;
//        $models = Location::find()->asArray()->all();

        $dataProvider = new ActiveDataProvider([
            'query' => Location::find(),
            'pagination' => [
                'pageSize' => 10
            ]
        ]);

        return [
            'data' => $dataProvider->getModels(),
            'totalCount' => $dataProvider->getTotalCount(),
            'currentPage' => $page,
        ];
    }

}
