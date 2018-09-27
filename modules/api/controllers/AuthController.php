<?php

namespace app\modules\api\controllers;

use app\components\Controller;
use Yii;

class AuthController extends Controller {

    public function actionMe() {
        $user = Yii::$app->user->identity;
        /* remove token */
        unset($user['token']);

        return $this->apiItem($user);
    }

}
