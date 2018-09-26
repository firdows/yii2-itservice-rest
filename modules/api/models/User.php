<?php

namespace app\modules\api\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int $user_type
 * @property string $name
 * @property string $username
 * @property string $password
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_type'], 'integer'],
            [['name', 'username', 'password'], 'required'],
            [['name'], 'string', 'max' => 200],
            [['username', 'password'], 'string', 'max' => 20],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_type' => 'User Type',
            'name' => 'Name',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }
}
