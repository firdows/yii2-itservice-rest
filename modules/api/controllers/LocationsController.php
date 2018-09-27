<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\api\controllers;

use Yii;
use yii\rest\ActiveController;
//use yii\web\Controller;
use yii\web\Response;
use app\components\Controller;
###
use app\modules\api\models\Location;
use yii\data\ActiveDataProvider;

/**
 * Description of LocationController
 *
 * @author 00C226
 */
class LocationsController extends Controller {

//    public function behaviors() {
//        $behaviors = parent::behaviors();
//        unset($behaviors['authenticator']);
//        $behaviors['corsFilter'] = [
//            'class' => \yii\filters\Cors::className(),
//            'cors' => [
//                'Origin' => ['*'],
////                'Access-Control-Allow-Origin' => ['*/*'],
////                'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'OPTIONS'],
////                'Access-Control-Request-Headers' => ['*'],
////                'Access-Control-Allow-Credentials' => false,
//            ],
//        ];
//
//        return $behaviors;
//    }
    // public $modelClass = 'app\modules\api\models\Location';
//    protected function verbs() {
//        return [
//            'index' => ['GET', 'HEAD'],
//            'view' => ['GET', 'HEAD'],
//            'create' => ['POST'],
//            'update' => ['PUT', 'PATCH'],
//            'delete' => ['DELETE'],
//        ];
//    }
//    public function actions() {
////        $actions = parent::actions();
////        unset($actions['index']);
////        return $actions;
//    }
//    public function actionIndex($page = 1) {
////        Yii::$app->response->format = Response::FORMAT_JSON;
////        $models = Location::find()->asArray()->all();
//
//        $dataProvider = new ActiveDataProvider([
//            'query' => Location::find(),
//            'pagination' => [
//                'pageSize' => 10
//            ]
//        ]);
//
//        return [
//            'data' => $dataProvider->getModels(),
//            'totalCount' => $dataProvider->getTotalCount(),
//            'currentPage' => $page,
//        ];
//    }

    public function actionIndex() {
        $news = Location::find()
                ->orderBy('id')
                ->all();
        return $this->apiCollection($news);
    }

    public function actionView($id) {
        $news = Location::findOne(id);
        return $this->apiCollection($news);
    }

}
