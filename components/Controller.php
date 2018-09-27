<?php

namespace app\components;

use Yii;
use yii\filters\auth\HttpBearerAuth;

/**
 * Controller yang digunakan di app extend dari \yii\rest\Controller
 *
 * @author Muhamad Alfan <muhamad.alfan01@gmail.com>
 * @since 1.0
 */
class Controller extends \yii\rest\Controller {

    use TraitController;

    /**
     * List of allowed domains.
     * Note: Restriction works only for AJAX (using CORS, is not secure).
     *
     * @return array List of domains, that can access to this API
     */
    public $enableCsrfValidation = false;

    public static function allowedDomains() {
        return [
            //'*', // star allows all domains
            'http://localhost:3000'
        ];
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        $behaviors = parent::behaviors();
//        $behaviors['authenticator'] = [
//            'class' => HttpBearerAuth::className(),
//        ];
//        $behaviors['corsFilter'] = [
//            'class' => \yii\filters\Cors::className(),
//            'cors' => [
//                // restrict access to domains:
////                'Origin' => static::allowedDomains(),
////                'Access-Control-Request-Method' => ['POST'],
////                'Access-Control-Allow-Credentials' => true,
////                'Access-Control-Max-Age' => 3600, // Cache (seconds)
//                'Origin' => ['*'],
////                'Access-Control-Request-Method' => ['POST', 'PUT'],
////                'Access-Control-Request-Headers' => ['X-Wsse'],
////                'Access-Control-Allow-Credentials' => true,
////                'Access-Control-Max-Age' => 3600,
////                'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
//            ],
//        ];

        return $behaviors;
    }

//    /**
//     * @inheritdoc
//     */
//    public function behaviors() {
//        $behaviors = parent::behaviors();
//        $behaviors['authenticator'] = [
//            'class' => HttpBearerAuth::className(),
//        ];
//        return $behaviors;
//    }

    /**
     * Api Validate error response
     */
    public function apiValidate($errors, $message = false) {
        Yii::$app->response->statusCode = 422;
        return [
            'statusCode' => 422,
            'name' => 'ValidateErrorException',
            'message' => $message ? $message : 'Error validation',
            'errors' => $errors
        ];
    }

    /**
     * Api Created response
     */
    public function apiCreated($data, $message = false) {
        Yii::$app->response->statusCode = 201;
        return [
            'statusCode' => 201,
            'message' => $message ? $message : 'Created successfully',
            'data' => $data
        ];
    }

    /**
     * Api Updated response
     */
    public function apiUpdated($data, $message = false) {
        Yii::$app->response->statusCode = 202;
        return [
            'statusCode' => 202,
            'message' => $message ? $message : 'Updated successfully',
            'data' => $data
        ];
    }

    /**
     * Api Deleted response
     */
    public function apiDeleted($data, $message = false) {
        Yii::$app->response->statusCode = 202;
        return [
            'statusCode' => 202,
            'message' => $message ? $message : 'Deleted successfully',
            'data' => $data
        ];
    }

    /**
     * Api Item response
     */
    public function apiItem($data, $message = false) {
        Yii::$app->response->statusCode = 200;
        
        return [
            'statusCode' => 200,
            'message' => $message ? $message : 'Data retrieval successfully',
            'data' => $data
        ];
    }

    /**
     * Api Collection response
     */
    public function apiCollection($data, $total = 0, $message = false) {
        Yii::$app->response->statusCode = 200;
        return [
            'statusCode' => 200,
            'message' => $message ? $message : 'Data retrieval successfully',
            'data' => $data,
            'total' => 0
        ];
    }

    /**
     * Api Success response
     */
    public function apiSuccess($message = false) {
        Yii::$app->response->statusCode = 200;
        return [
            'statusCode' => 200,
            'message' => $message ? $message : 'Success',
        ];
    }

}
