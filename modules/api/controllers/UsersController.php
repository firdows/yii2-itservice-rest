<?php

namespace app\modules\api\controllers;

use Yii;
use app\modules\api\models\User;
use yii\data\ActiveDataProvider;
//use yii\web\Controller;
use app\components\Controller;
use yii\web\NotFoundHttpException;
use app\models\SignupForm;

/**
 * UserController implements the CRUD actions for User model.
 */
class UsersController extends Controller {

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex($q) {
        $model = User::find()
                ->filterWhere(['or',
            ['LIKE', 'name', $q],
            ['LIKE', 'username', $q],
            ['LIKE', 'email', $q],
        ]);
        $dataProvider = new ActiveDataProvider([
            'query' => $model,
        ]);
        //$model = User::find()->all();
        return $dataProvider->getModels();
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->findModel($id);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new SignupForm();
        $dataRequest['SignupForm'] = Yii::$app->request->getBodyParams();
        if ($model->load($dataRequest)) {
            //$model->setPassword($model->password);
            if ($user = $model->signup()) {
                return $this->apiCreated($user);
            }
        }

        return $this->apiValidate($model->errors);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $dataRequest['User'] = Yii::$app->request->getBodyParams();
        if ($model->load($dataRequest)) {
            if ($model->save()) {
                return $this->apiCreated($model);
            }
        }

        return $this->apiValidate($model->errors);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        if ($this->findModel($id)->delete()) {
            return $this->apiDeleted(true);
        }
        return $this->apiDeleted(false);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
