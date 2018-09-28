<?php

namespace app\modules\api\models;

use Yii;

/**
 * This is the model class for table "work".
 *
 * @property int $id
 * @property string $doc_date
 * @property string $doc_time
 * @property int $location_id
 * @property string $title
 * @property string $detail
 * @property string $phone
 * @property int $status
 * @property string $status_date
 * @property string $work_detail
 * @property int $work_user_id
 * @property int $user_id
 */
class Work extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'work';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['doc_date', 'doc_time', 'location_id', 'detail', 'phone', 'status', 'user_id'], 'required'],
            [['doc_date', 'status_date'], 'safe'],
            [['location_id', 'status', 'work_user_id', 'user_id'], 'integer'],
            [['detail', 'work_detail'], 'string'],
            [['doc_time'], 'string', 'max' => 5],
            [['title'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'doc_date' => 'Doc Date',
            'doc_time' => 'Doc Time',
            'location_id' => 'Location ID',
            'detail' => 'Title',
            'detail' => 'Detail',
            'phone' => 'Phone',
            'status' => 'Status',
            'status_date' => 'Status Date',
            'work_detail' => 'Work Detail',
            'work_user_id' => 'Work User ID',
            'user_id' => 'User ID',
        ];
    }

    public function getLocation() {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
    }

}
