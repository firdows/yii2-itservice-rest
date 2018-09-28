<?php

namespace app\modules\api\controllers;

use Yii;
use app\modules\api\models\Work;
use yii\data\ActiveDataProvider;
use app\components\Controller;
use yii\web\NotFoundHttpException;

/**
 * WorkController implements the CRUD actions for Work model.
 */
class WorksController extends Controller {

    /**
     * Lists all Work models.
     * @return mixed
     */
    public function actionIndex() {
        $dataProvider = new ActiveDataProvider([
            'query' => Work::find()->joinWith('location', true, 'LEFT JOIN')->asArray(),
        ]);
        return $this->apiCollection($dataProvider->getModels());
        //return $this->apiCollection($models);
    }

    /**
     * Displays a single Work model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->findModel($id);
    }

    /**
     * Creates a new Work model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Work();

        $dataRequest['Work'] = Yii::$app->request->getBodyParams();

        if ($model->load($dataRequest)) {
            $model->doc_date = date('Y-m-d');
            $model->doc_time = date('H:i');
            $model->user_id = Yii::$app->user->identity->id;
            $model->status = 0;

//            print_r(Yii::$app->user->identity->username);
//
//            print_r($model->attributes);
//            exit();
            if ($model->save()) {
                // return $this->redirect(['view', 'id' => $model->id]);
                return $this->apiCreated($model);
            }
        }

        return $this->apiValidate($model->errors);
    }

    /**
     * Updates an existing Work model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $dataRequest['Work'] = Yii::$app->request->getBodyParams();
        if ($model->load($dataRequest) && $model->save()) {
            return $this->apiUpdated($model);
        }
        return $this->apiUpdated($model->errors);
    }

    /**
     * Deletes an existing Work model.
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
     * Finds the Work model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Work the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Work::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
