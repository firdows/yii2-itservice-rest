<?php

namespace app\modules\api;

use Yii;
use yii\web\Response;

/**
 * api module definition class
 */
class Module extends \yii\base\Module {

    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\api\controllers';

    /**
     * {@inheritdoc}
     */
    public function init() {
        parent::init();

        // custom initialization code goes here
        \Yii::configure($this, [
            'as contentNegotiator' => [
                'class' => 'yii\filters\ContentNegotiator',
                // if in a module, use the following IDs for user actions
                // 'only' => ['user/view', 'user/index']
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
        ]);


        // you can daclare handler as function in you module and pass it as parameter here
        \Yii::$app->response->on(Response::EVENT_BEFORE_SEND, function ($event) {

            // here you can get and modify everything in current response 
            // (data, headers, http status etc.)
            $response = $event->sender;
            if ($response->data !== null && is_array($response->data)) {
                /* delete code param */
                if (array_key_exists('code', $response->data)) {
                    unset($response->data['code']);
                }

                /* change status to statusCode */
                if (array_key_exists('status', $response->data)) {
                    $response->data['statusCode'] = $response->data['status'];
                    unset($response->data['status']);
                }
            }
        });
    }

}
